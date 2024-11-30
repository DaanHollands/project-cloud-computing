#ifndef MQTT_H
#define MQTT_H

#include "mqtt/async_client.h"
#include <string>



class MqttClient {
public:
    MqttClient();
    ~MqttClient();
    
    void publishSensorData(const std::string &topic, const std::string &payload);
    void connect();
    void start();

private:
    mqtt::async_client _client;

    static constexpr const char* SERVER_ADDRESS = "tcp://mqttbroker:1883";
    static constexpr const char* CLIENT_ID = "MqttSensorsClient";
    static constexpr const char* MQTT_USERNAME = "testServer";
    static constexpr const char* MQTT_PASSWD = "Ssy0MpLdMIdXtau";
};

void connect();

void connect();

#endif // MQTT_H