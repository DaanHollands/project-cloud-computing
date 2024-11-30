# Stage 1: Build
FROM mcr.microsoft.com/dotnet/sdk:8.0 AS build

# Set working directory
WORKDIR /app

# Copy the project files and solution file
COPY *.csproj ./
COPY *.sln ./

# Restore dependencies
RUN dotnet restore

# Copy the remaining source code
COPY . ./

# Build the application
RUN dotnet publish -c Release -o /app/out

# Stage 2: Runtime
FROM mcr.microsoft.com/dotnet/aspnet:8.0

# Set working directory for runtime
WORKDIR /app

# Copy the published output from the build stage
COPY --from=build /app/out .

# Expose port 5109
EXPOSE 5109

# Command to run the application
CMD ["dotnet", "SoapDotnet.dll", "--urls=http://0.0.0.0:5109"]
