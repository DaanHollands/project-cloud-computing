#ifndef BLOOD_PRESSURE_H
#define BLOOD_PRESSURE_H

#include <string>

class BloodPressureSensor {
public:
    BloodPressureSensor();

    void readData();
    int getSystolic() const;
    int getDiastolic() const;
    std::string getMqttData();

private:
    int systolic;
    int diastolic;
};

#endif // BLOOD_PRESSURE_H