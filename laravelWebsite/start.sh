#!/bin/bash

# Run Migrations
php artisan migrate --force

# Start php artisan serve in the background
php artisan serve --host=0.0.0.0 --port=8000 &

# Start npm run dev
npm run dev -- --host=0.0.0.0 --port=5173 &

# Start running periodic jobs
php artisan schedule:work &

# Wait for all background jobs to finish
wait
