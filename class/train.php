<?php

namespace class;

use definition\trainCarTypes;
use definition\trainCarPosition;
use OutOfBoundsException;
use OutOfRangeException;
use exception\invalidTrainCarPosition;

class Train
{
    protected const MAX_NUMBER_CARS = 30;

    protected array $trainCars = [];
    protected float $totalTrainWeight = 0;

    public function __construct() {}

    public function getNumberCars(): int
    {
        return count($this->trainCars);
    }

    public function getTotalWeight(): int
    {
        return $this->totalTrainWeight;
    }

    public function setTrainCarTotalWeight(): void
    {
        $weight = 0;
        /* @var TrainCar $trainCar */
        foreach ($this->trainCars as $trainCar) {
            $weight += $trainCar->getTrainCarWeight();
        }
        $this->totalTrainWeight = $weight;
    }

    /**
     * @Throws OutOfRangeException | InvalidTrainCarPosition
     */
    public function addTrainCar(TrainCar $trainCar, TrainCarPosition $trainCarPosition = TrainCarPosition::BACK): void
    {
        match (true) {
            // check if train is at maximum number of cars
            count($this->trainCars) > Train::MAX_NUMBER_CARS => throw new OutOfRangeException("Too many train cars. The maximum allowable number of cars is " . TRAIN::MAX_NUMBER_CARS . "."),

            // check if first train is an engine
            count($this->trainCars) == 0 && ($trainCar->trainCarType != TrainCarTypes::ENGINE) => throw new InvalidTrainCarPosition("First train car must be of enumerable type `engine`."),

            // check if the caboose is placed at the back of the train
            $trainCar->trainCarType == TrainCarTypes::CABOOSE && $trainCarPosition != TrainCarPosition::BACK => throw new InvalidTrainCarPosition("Caboose must go in the back of the train."),
        
            // expected result for no errors
            default => null,
        };

        if ($trainCarPosition == TrainCarPosition::BACK) {
            // insert trainCar to back of train
            $this->trainCars[] = $trainCar;
        } elseif ($trainCarPosition == TrainCarPosition::FRONT) {
            // insert trainCar to front of train
            array_unshift($this->trainCars, $trainCar);
        }
        $this->setTrainCarTotalWeight();
    }

    /**
     * @Throws OutOfBoundsException
     */
    public function removeTrainCar(TrainCar $trainCar): void
    {
        foreach ($this->trainCars as $index => $trainCarInTrain) {
            if ($trainCar->trainCarId == $trainCarInTrain->trainCarId) {
                unset($this->trainCars[$index]);
                $this->setTrainCarTotalWeight();
                return;
            }
        }
        throw new OutOfBoundsException("Train car $trainCar->trainCarId could not be found.");
    }

    /**
     * @Throws OutOfBoundsException
     */
    public function removeFirstCar(): void
    {
        $firstCar = reset($this->trainCars) ?: throw new OutOfBoundsException("Train Car list is empty.");
        $this->removeTrainCar($firstCar);
    }

    /**
     * @Throws OutOfBoundsException
     */
    public function removeLastCar(): void
    {
        $firstCar = end($this->trainCars) ?: throw new OutOfBoundsException("Train Car list is empty.");
        $this->removeTrainCar($firstCar);
    }

    public function displayTrain(): void
    {
        if (empty($this->trainCars)) {
            echo "\n\nTrain is empty\n\n";
            return;
        }
        echo "Total number train cars is " . $this->getNumberCars() . ".\n";
        echo "Total train weight is: " . number_format($this->getTotalWeight()) . " pounds.";
        $cars = [];
        $number = 0;
        echo "\n";
        /* @var TrainCar $trainCar */
        foreach ($this->trainCars as $trainCar) {
            $cars[] = "\t[" . ++$number . "] " . $trainCar->trainCarType->name . 
            " (Empty car weight: " . number_format($trainCar->getEmptyWeight()) . ", " .
            "Cargo weight: " . number_format($trainCar->getCargoWeight()) . " lbs, " .
            "Total car weight: " . number_format($trainCar->getTrainCarWeight()) . " lbs)";
        }
        echo implode("\n  ", $cars);
        echo "\n\n\n";
    }

    public function getLastTrainCar(): ?TrainCar
    {
        return end($this->trainCars) ?: null;
    }
}