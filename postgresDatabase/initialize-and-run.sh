#!/bin/bash
set -e

echo "POSTGRES_MULTIPLE_DB is: $POSTGRES_MULTIPLE_DB"

# Start PostgreSQL in the background (this is the default entrypoint)
docker-entrypoint.sh postgres &

# Wait for PostgreSQL to be ready
until pg_isready -U "$POSTGRES_USER"; do
  echo "Waiting for PostgreSQL to be ready..."
  sleep 2
done

echo "PostgreSQL is ready, now running the database creation script..."

# Add a small sleep to ensure PostgreSQL is ready to accept connections
sleep 5

# Run the custom script to create multiple databases
/docker-scripts/create-multiple-databases.sh

# Wait for the PostgreSQL process to keep it running in the foreground
wait
