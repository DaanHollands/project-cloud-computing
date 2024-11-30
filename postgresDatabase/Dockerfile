# Use the official PostgreSQL image as the base image
FROM postgres:latest

ENV POSTGRES_USER=postgres
ENV POSTGRES_PASSWORD=postgres
ENV POSTGRES_MULTIPLE_DB=user_profile_database,laravel_user_database,graphql_agenda_database,rest_restaurant_database

# Copy the script into the image
COPY create-multiple-databases.sh /docker-scripts/create-multiple-databases.sh
COPY initialize-and-run.sh /docker-scripts/initialize-and-run.sh

# Make sure the scripts are executable
RUN chmod +x /docker-scripts/create-multiple-databases.sh
RUN chmod +x /docker-scripts/initialize-and-run.sh

# Set the custom entrypoint
ENTRYPOINT ["/docker-scripts/initialize-and-run.sh"]
