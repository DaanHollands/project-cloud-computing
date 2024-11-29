#include "rng.h"
#include <memory>
#include <random>

std::unique_ptr<std::mt19937> RNG::rng = nullptr;

void RNG::initialize()
{   
    if(rng == nullptr)
    {
        std::random_device rd;
        rng = std::make_unique<std::mt19937>(rd());
    }
}

int RNG::getRandomNumber(int min, int max) 
{
    std::uniform_int_distribution<int> dist(min, max);
    return dist(*rng);
}