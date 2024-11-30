cmake_minimum_required(VERSION 3.10)

# Set the project name
project(MqttSensors)

# Set the C++ standard
set(CMAKE_CXX_STANDARD 17)
set(CMAKE_CXX_STANDARD_REQUIRED True)

# Explicitly define paths for the Paho MQTT libraries
set(PAHO_MQTT_CPP_INCLUDE_DIRS "/usr/local/include")
set(PAHO_MQTT_CPP_LIBRARIES "/usr/local/lib/libpaho-mqttpp3.so")
set(PAHO_MQTT_C_INCLUDE_DIRS "/usr/local/include")
set(PAHO_MQTT_C_LIBRARIES "/usr/local/lib/libpaho-mqtt3c.so")

# Specify the output directory for build files
set(CMAKE_RUNTIME_OUTPUT_DIRECTORY ${CMAKE_BINARY_DIR}/)

# Explicitly define all source files
set(SOURCES
    src/sensors/bloodPressureSensor.cpp
    src/sensors/humiditySensor.cpp
    src/sensors/oxygenSensor.cpp
    src/sensors/temperatureSensor.cpp
    src/mqttClient.cpp
    src/rng.cpp
)

# Add the executable
add_executable(MqttSensors ${SOURCES} main.cpp)

# Add include directories for the MQTT libraries and general project includes
target_include_directories(MqttSensors
    PRIVATE
    ${CMAKE_SOURCE_DIR}/include
    ${CMAKE_SOURCE_DIR}/include/sensors
    ${PAHO_MQTT_CPP_INCLUDE_DIRS}
    ${PAHO_MQTT_C_INCLUDE_DIRS}
)

# Link the libraries to the executable
target_link_libraries(MqttSensors
    PRIVATE
    ${PAHO_MQTT_CPP_LIBRARIES}
    ${PAHO_MQTT_C_LIBRARIES}
)

# Set the runtime output directory for the executable
set_target_properties(MqttSensors PROPERTIES RUNTIME_OUTPUT_DIRECTORY ${CMAKE_BINARY_DIR})
