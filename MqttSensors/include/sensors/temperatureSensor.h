#ifndef TEMPERATURESENSOR_H
#define TEMPERATURESENSOR_H

class TemperatureSensor {
public:
    TemperatureSensor();

    float readTemperature() const;
};

#endif // TEMPERATURESENSOR_H