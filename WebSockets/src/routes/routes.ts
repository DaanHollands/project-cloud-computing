import { Request, Response, Router } from 'express'
import Message from '../models/message.js'

const router = Router();

const colors = ["Red","Orange","Gold","Green","Cyan","Blue","Indigo","Violet","HotPink","Crimson"]

// Define a simple route
router.get('/', async (req: Request, res: Response) => {
    const messages = await Message.findAll({ order: [['createdAt', 'ASC']] })
    res.render('index', { messages, colors })
})


export default router;