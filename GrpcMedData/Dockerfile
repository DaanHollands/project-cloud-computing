# Use an official Python runtime as a parent image
FROM docker.io/python:3.9-slim

# Set the working directory in the container
WORKDIR /usr/src/app

# Copy the current directory contents into the container at /usr/src/app
COPY . .

# Create a virtual environment
RUN python -m venv venv

# Activate the virtual environment and install any needed packages specified in requirements.txt
RUN . venv/bin/activate && pip install --no-cache-dir -r requirements.txt

# Make port 50051 available to the world outside this container
EXPOSE 50051

# Run server.py when the container launches
CMD ["/bin/bash", "-c", ". venv/bin/activate && python server.py"]
