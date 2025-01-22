import express from 'express';
import { WebSocketServer } from 'ws';
import { createServer } from 'http';
import database from './database.js';
import Message from './models/message.js';
import router from './routes/routes.js';

const app = express()
const server = createServer(app)
const wss = new WebSocketServer({ server })
const PORT = 3000

const clientData = new Map()

// Express Settings
app.set('view engine', 'pug')
app.use(express.static('public'))
app.use(express.urlencoded({ extended: true }))
app.use(router)

// WebSocket server
wss.on('connection', (ws) => {
  console.log('A client connected');
  
  // Send existing color data to the new client
  const colorData = Array.from(clientData.values())
  ws.send(JSON.stringify({ type: 'colorUpdate', colors: colorData }))

  ws.on('message', async (data) => {
    const messageData = JSON.parse(data.toString())

    if (messageData.type === 'colorChange') {
      clientData.set(ws, messageData.userColor)

      // Notify other clients about the color change (if needed)
      wss.clients.forEach((client) => {
        if (client.readyState === 1) {
          client.send(JSON.stringify({
            type: 'colorUpdate',
            colors: Array.from(clientData.values())
          }))
        }
      })
    } else if (messageData.content.trim() && messageData.userColor !== "none") {
      const message = await Message.create({
        content: messageData.content,
        userColor: messageData.userColor,
      })

      // Broadcast the message to other clients
      wss.clients.forEach((client) => {
        if (client.readyState === 1) {
          client.send(JSON.stringify({
            type: 'message',
            content: message.content,
            userColor: message.userColor,
          }))
        }
      })
    }
  })

  ws.on('close', () => {
    console.log('A client disconnected');
    clientData.delete(ws); // Clean up client data on disconnect
  })
})

// Start server and database
database.sync().then(() => {
  console.log('Database synchronized');
  server.listen(PORT, () => {
    console.log(`Server is running at http://localhost:${PORT}`);
  })
})