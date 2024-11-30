#include "humiditySensor.h"
#include "rng.h"
#include <sstream>

HumiditySensor::HumiditySensor()
{
    RNG::initialize();
}

float HumiditySensor::readHumidity()
{
    auto value = RNG::getRandomNumber(5000, 10000);
    return (static_cast<float>(value)/100);
}
std::string HumiditySensor::getMqttData() 
{
    std::ostringstream oss;
    oss << "{ \"humidity\": " << readHumidity() << " }";
    return oss.str();
}
