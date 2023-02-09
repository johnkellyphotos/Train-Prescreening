<?php

require_once "autoloader.php";
require_once "train.php"; // defines `TRAIN` constant used in line 16, only needed for demoing code in the foreach() below

use class\train;
use class\TrainCar;
use exception\InvalidTrainCarPosition;

$Train = new Train();
$Train->displayTrain();

try {
    // example usage, assuming at least 4 train cars are set in TRAIN array constant
    /* @var TrainCar @trainCar */
    foreach (TRAIN as $trainCar) {
        $Train->addTrainCar(...$trainCar);
    }

    $Train->displayTrain();

    $Train->removeTrainCar(TRAIN[2]['trainCar']);

    $Train->displayTrain();

    // could also set by indexing array like `TRAIN[3]['trainCar']?->setTrainCarWeight(3755);`
    $Train->getLastTrainCar()?->setTrainCarWeight(3755);

    $Train->displayTrain();

    $Train->removeFirstCar();

    $Train->displayTrain();

    $Train->removeLastCar();
    
    $Train->removeFirstCar();

    $Train->displayTrain();

} catch (OutOfRangeException | InvalidTrainCarPosition | OutOfBoundsException $e) {
    echo "Error! " . $e->getMessage() . " Aborting...\n";
    exit;
}