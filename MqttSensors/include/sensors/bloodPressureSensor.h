#ifndef BLOOD_PRESSURE_H
#define BLOOD_PRESSURE_H

class BloodPressureSensor {
public:
    BloodPressureSensor();

    void initialize();
    void readData();
    int getSystolic() const;
    int getDiastolic() const;

private:
    int systolic;
    int diastolic;
};

#endif // BLOOD_PRESSURE_H