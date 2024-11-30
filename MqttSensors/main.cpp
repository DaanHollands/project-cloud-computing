#include "bloodPressureSensor.h"
#include "humiditySensor.h"
#include "mqttClient.h"
#include "oxygenSensor.h"
#include "temperatureSensor.h"
#include <chrono>
#include <thread>

int main() {
    BloodPressureSensor bloodPressureSensor;
    TemperatureSensor temperatureSensor;
    HumiditySensor humiditySensor;
    OxygenSensor oxygenSensor;

    MqttClient client;
    client.connect();  
    client.start();  

    // Infinite loop to send data
    while (true) {
        std::cout << "Sending Data...\n";
        client.publishSensorData("sensors/bloodPressure", bloodPressureSensor.getMqttData());
        client.publishSensorData("sensors/temperature", temperatureSensor.getMqttData());
        client.publishSensorData("sensors/humidity", humiditySensor.getMqttData());
        client.publishSensorData("sensors/oxygen", oxygenSensor.getMqttData());
        std::this_thread::sleep_for(std::chrono::minutes(1));  // Sleep 1 minute before sending data again
    }

    return 0;
}
