# Stage 1: Build
FROM docker.io/golang:1.23 AS builder

# Set the working directory
WORKDIR /app

# Copy the Go modules and dependencies
COPY go.mod go.sum ./
RUN go mod download

# Copy the rest of the application code
COPY . .

# Build the application
RUN go build -o server ./main/server.go

# Stage 2: Run
FROM docker.io/golang:1.23

# Set the working directory in the final image
WORKDIR /app

# Copy the binary from the build stage
COPY --from=builder /app/server /app/

# Expose the port the application listens on
EXPOSE 8060

# Run the application
CMD ["./server"]
