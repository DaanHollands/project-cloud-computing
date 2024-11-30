#include "temperatureSensor.h"
#include "rng.h"
#include <sstream>

TemperatureSensor::TemperatureSensor()
{
    RNG::initialize();
}


float TemperatureSensor::readTemperature() 
{
    int randomTemp = RNG::getRandomNumber(0, 300);
    return (static_cast<float>(randomTemp)/10);
}

std::string TemperatureSensor::getMqttData() 
{
    std::ostringstream oss;
    oss << "{ \"temperature\": " << readTemperature() << " }";
    return oss.str();
} 