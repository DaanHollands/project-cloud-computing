#ifndef HUMIDITYSENSOR_H
#define HUMIDITYSENSOR_H

#include <string>
class HumiditySensor {
public:
    HumiditySensor();

    float readHumidity();
    std::string getMqttData();
};

#endif // HUMIDITYSENSOR_H