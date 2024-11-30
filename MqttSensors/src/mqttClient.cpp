#include "mqttClient.h"
#include <thread>

MqttClient::MqttClient() : _client(SERVER_ADDRESS, CLIENT_ID) {}

MqttClient::~MqttClient() {
    try {
        _client.disconnect()->wait();
        std::cout << "Disconnected successfully!" << std::endl;
    } catch (const mqtt::exception& e) {
        std::cerr << "Error during disconnection: " << e.what() << std::endl;
    }
}

void MqttClient::connect() {
    mqtt::connect_options conOpts;
    conOpts.set_user_name(MQTT_USERNAME);
    conOpts.set_password(MQTT_PASSWD);

    try {
        _client.connect(conOpts)->wait();
        std::cout << "Connected successfully to the MQTT broker!" << std::endl;
    } catch (const mqtt::exception& e) {
        std::cerr << "Connection failed: " << e.what() << std::endl;
    }
}

void MqttClient::publishSensorData(const std::string &topic, const std::string &payload) {
    try {
        mqtt::message_ptr pubmsg = mqtt::make_message(topic, payload);
        pubmsg->set_qos(1);
        _client.publish(pubmsg);
        std::cout << "Data published: " << payload << std::endl;
    } catch (const mqtt::exception& e) {
        std::cerr << "Error during publish: " << e.what() << std::endl;
    }
}

void MqttClient::start() {
    try {
        std::thread consuming_thread([this]() {
            _client.start_consuming();
            while (true) {
                std::this_thread::sleep_for(std::chrono::seconds(1));
            }
        });
        consuming_thread.detach();
    } catch (const mqtt::exception& e) {
        std::cerr << "Error in MQTT loop: " << e.what() << std::endl;
    }
}
