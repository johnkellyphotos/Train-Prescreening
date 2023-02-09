<?php

namespace class;

use Exception;
use definition\trainCarTypes;
use definition\trainCarEmptyWeight;

class TrainCar
{
    private int $weight = 0;
    public readonly string $trainCarId;
    private readonly int $emptyWeight;

    public function __construct(
        public readonly TrainCarTypes $trainCarType,
        private int $cargoWeight = 0,
    ) {
        $this->trainCarId = uniqid();
        $this->emptyWeight = TrainCarEmptyWeight::fromName($this->trainCarType->name)->value;
        $this->setTrainCarWeight($this->cargoWeight);
    }

    /**
     * @Throws Exception
     */
    public function setTrainCarWeight(int $cargoWeight, ?Train $Train = null): void
    {
        $this->weight = $this->emptyWeight + $cargoWeight;
        $Train?->setTrainCarTotalWeight();
    }

    public function getTrainCarWeight(): int
    {
        return $this->weight;
    }

    public function getCargoWeight(): int
    {
        return $this->cargoWeight;
    }

    public function getEmptyWeight(): int
    {
        return $this->emptyWeight;
    }
}