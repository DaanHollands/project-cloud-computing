#ifndef HUMIDITYSENSOR_H
#define HUMIDITYSENSOR_H

class HumiditySensor {
public:
    HumiditySensor();

    float readHumidity() const;
};

#endif // HUMIDITYSENSOR_H