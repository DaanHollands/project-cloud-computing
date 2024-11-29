#include "oxygenSensor.h"
#include "rng.h"

OxygenSensor::OxygenSensor()
{
    RNG::initialize();
}

float OxygenSensor::readOxygenLevel() const
{
    int randomValue = RNG::getRandomNumber(100, 240);
    return randomValue / 10.0f;
}