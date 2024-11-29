#include "bloodPressureSensor.h"
#include "humiditySensor.h"
#include "oxygenSensor.h"
#include "temperatureSensor.h"
#include <iostream>

int main()
{
    BloodPressureSensor bdSensor{};

    bdSensor.readData();

    std::cout << "Onderdruk: " << bdSensor.getDiastolic() << ", Bovendruk: " << bdSensor.getSystolic() << "\n";

    HumiditySensor hSensor{};

    std::cout << "Luchtvochtigheid: " << hSensor.readHumidity() << " %\n";

    OxygenSensor oxySensor{};
    
    std::cout << "Zuurstofgehalte: " << oxySensor.readOxygenLevel() << " %\n";

    TemperatureSensor tempSensor{};

    std::cout << "Temperatuur: " << tempSensor.readTemperature() << "°C\n";

    return 0;
}