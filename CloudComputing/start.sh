#!/bin/bash

# Start php artisan serve in the background
php artisan serve --host=0.0.0.0 --port=8000 &

# Start npm run dev
npm run dev

# Wait for all background jobs to finish
wait
