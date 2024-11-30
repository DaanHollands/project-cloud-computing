#ifndef TEMPERATURESENSOR_H
#define TEMPERATURESENSOR_H

#include <string>
class TemperatureSensor {
public:
    TemperatureSensor();

    float readTemperature();
    std::string getMqttData();
};

#endif // TEMPERATURESENSOR_H