#include "oxygenSensor.h"
#include "rng.h"
#include <sstream>

OxygenSensor::OxygenSensor()
{
    RNG::initialize();
}


float OxygenSensor::readOxygenLevel()
{
    int randomValue = RNG::getRandomNumber(100, 240);
    return randomValue / 10.0f;
}

std::string OxygenSensor::getMqttData() 
{
     std::ostringstream oss;
        oss << "{ \"oxygenLevel\": " << readOxygenLevel() << " }";
        return oss.str();
}