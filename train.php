<?php

use class\trainCar;
use definition\trainCarTypes;
use definition\trainCarPosition;

define('TRAIN', [
    [
        'trainCar' => new TrainCar(
            TrainCarTypes::ENGINE,
            250,
        ),
        'trainCarPosition' => TrainCarPosition::FRONT,
    ],
    [
        'trainCar' => new TrainCar(
            TrainCarTypes::PASSENGER,
            3500,
        ),
    ],
    [
        'trainCar' => new TrainCar(
            TrainCarTypes::PASSENGER,
            4000,
        ),
    ],
    [
        'trainCar' => new TrainCar(
            TrainCarTypes::PASSENGER,
            3000,
        ),
    ],
    [
        'trainCar' => new TrainCar(
            TrainCarTypes::CARGO,
            15000,
        ),
    ],
        [
        'trainCar' => new TrainCar(
            TrainCarTypes::CARGO,
            15000,
        ),
    ],
    [
        'trainCar' => new TrainCar(
            TrainCarTypes::CARGO,
            15000,
        ),
    ],
    [
        'trainCar' => new TrainCar(
            TrainCarTypes::CARGO,
            15000,
        ),
    ],
    [
        'trainCar' => new TrainCar(
            TrainCarTypes::CABOOSE,
            250,
        ),
        'trainCarPosition' => TrainCarPosition::BACK,
    ],
]);