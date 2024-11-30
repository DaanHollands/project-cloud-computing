#include "bloodPressureSensor.h"
#include "rng.h"

BloodPressureSensor::BloodPressureSensor() : systolic(0), diastolic(0) 
{
    RNG::initialize();
}

void BloodPressureSensor::readData() 
{
    systolic = RNG::getRandomNumber(70, 160);
    diastolic = RNG::getRandomNumber(40, 100);
}

int BloodPressureSensor::getSystolic() const 
{
    return systolic;
}

int BloodPressureSensor::getDiastolic() const 
{
    return diastolic;
}