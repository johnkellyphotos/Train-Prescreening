# Train Exercise #

## Created by John Kelly on 9 February 2023 ##

### PHP version used: ###
v8.1.15

### Notes ###
Some comments and syntax are designed for compatability with PhpStorm, such as `/* @var TrainCar $trainCar */`, allowing the syntax analyzer to associate a 
data unknown type with a known data type. These comments may work with other IDEs and removing them does not break functionality.

### Usage: ###
First, verify your PHP version in your development environment using `php -v`. PHP 8.1+ is required for utilization of newer PHP features, such as ENUMs in this code.

From the command line in the repository root directory, execute the following command:
`php demo.php`

You can edit your train by adding or removing train cars to the `TRAIN` array constant in train.php in the repository root directory.

```php
define('TRAIN', [
    [
        'trainCar' => new TrainCar(
            TrainCarTypes::ENGINE,
            250,
        ),
        // trainCarPosition is optional, default is 'BACK' position
        'trainCarPosition' => TrainCarPosition::FRONT,
    ],
    [
        'trainCar' => new TrainCar(
            TrainCarTypes::PASSENGER,
            3500,
        ),
        'trainCarPosition' => TrainCarPosition::BACK,
    ],
    // add or remove train cars here
]);
```

You can choose from the enumerated train car types in trainCarTypes.php to add to the train.
- 30 train cars max are allowed per train
- the first train car you add must be an engine. Additional engines can be added to the train as desired
- the caboose can only be placed at the back of the train. Multiple cabooses are allowed
- any other train car (IE, cargo, passenger) can be placed in the front of back of the train


### Example: ###
```php
    // create a new instance of Train
    $Train = new Train();

    // add a train car to the train - throws OutOfRangeException | InvalidTrainCarPosition
    $Train->addTrainCar(
        // accepts TrainCar(TrainCarType, CargoWeight)
        trainCar: new TrainCar(
            TrainCarTypes::ENGINE,
            250,
        ),
        // train car position, front or back
        trainCarPosition: TrainCarPosition::FRONT
    );
```

### Verification ###

The given criteria are listed along with their verification:

*A train is made up of a series of train cars.
Using only PHP, without any additional libraries, write two classes; "Train" and "TrainCar".
Must be able to:*
- Set the weight of a TrainCar - can be verified with an existing train car using `TrainCar::setTrainCarWeight()` or when creating a new instance of `TrainCar::__construct()`
- Get the weight of a TrainCar - can be verified with `Train::displayTrain()`.
- Add TrainCars to the Train, either at the front or back, with a limit of 30 cars. - Can be verified by adding or removing trains with the `Train::addTrainCar()` method, either directly invoking the method OR by adding to the `TRAIN` array constant in train.php
- Remove a TrainCar from either end, reporting a problem if there are none left to remove. - can be verified by using `Train::removeLastCar()` or `Train::removeFirstCar()`
- Ask the Train how many cars are currently in the Train. - can be verified with `Train::getNumberCars()`
- Get the total weight of the Train. - can be verified with `Train::getTotalWeight()`.

*Bonus: Show the best way to have different types of TrainCars (i.e. cargo, passenger, engine,
etc).* - The train car types are included in an unbacked enumerable. This ensures automatic validation of adding a new train car by ensuring the train is of a valid `TrainCarTypes`