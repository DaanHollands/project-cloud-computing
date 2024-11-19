#!/bin/bash
set -e

echo "Checking if multiple databases need to be created..."

# Check if the environment variable for multiple databases exists
if [ -n "$POSTGRES_MULTIPLE_DB" ]; then
  echo "Multiple database creation requested: $POSTGRES_MULTIPLE_DB"
  IFS=',' read -ra DBS <<< "$POSTGRES_MULTIPLE_DB"
  for db in "${DBS[@]}"; do
    echo "Checking if database '$db' exists..."

    # Check if the database already exists
    if psql -U "$POSTGRES_USER" -tc "SELECT 1 FROM pg_database WHERE datname = '$db'" | grep -q 1; then
      echo "Database '$db' already exists, skipping creation."
    else
      echo "Creating database '$db'..."
      psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" --dbname "$POSTGRES_DB" <<EOSQL
CREATE DATABASE $db;
EOSQL
      echo "Database '$db' created successfully."
    fi
  done
  echo "Multiple databases processed"
else
  echo "No multiple databases to create. Skipping."
fi
