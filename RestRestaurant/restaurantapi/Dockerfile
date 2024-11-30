# Stage 1: Build
FROM gradle:8.11-jdk17 AS build

# Set working directory
WORKDIR /app

# Copy the Gradle files and dependencies
COPY build.gradle settings.gradle gradlew /app/
COPY gradle /app/gradle

# Download dependencies and build the application
RUN ./gradlew build --no-daemon

# Stage 2: Runtime
FROM openjdk:17-jdk-slim

# Set working directory for runtime
WORKDIR /app

# Copy the JAR file from the build stage
COPY --from=build /app/build/libs/*.jar /app/app.jar

# Expose the port the app will run on (default port for Spring Boot is 8080)
EXPOSE 8080

# Run the application
CMD ["java", "-jar", "/app/app.jar"]
