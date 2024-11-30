#ifndef OXYGENSENSOR_H
#define OXYGENSENSOR_H

#include <string>
class OxygenSensor {
public:
    OxygenSensor();

    float readOxygenLevel();
    std::string getMqttData();
};

#endif // OXYGENSENSOR_H