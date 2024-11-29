#ifndef RNG_H
#define RNG_H

#include <memory>
#include <random>

class RNG {
public:
    static void initialize();
    static int getRandomNumber(int min, int max);

private:
    RNG();
    static std::unique_ptr<std::mt19937> rng;
};

#endif // RNG_H