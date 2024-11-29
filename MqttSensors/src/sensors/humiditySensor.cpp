#include "humiditySensor.h"
#include "rng.h"

HumiditySensor::HumiditySensor()
{
    RNG::initialize();
}

float HumiditySensor::readHumidity() const
{
    auto value = RNG::getRandomNumber(5000, 10000);
    return (static_cast<float>(value)/100);
}