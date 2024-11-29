#include "temperatureSensor.h"
#include "rng.h"

TemperatureSensor::TemperatureSensor()
{
    RNG::initialize();
}

float TemperatureSensor::readTemperature() const 
{
    int randomTemp = RNG::getRandomNumber(0, 300);
    return (static_cast<float>(randomTemp)/10);
} 