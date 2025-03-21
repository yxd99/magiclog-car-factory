<?php

namespace App\Application\UseCases\Car;

use App\Domain\Repositories\CarRepositoryInterface;

class CreateCarUseCase
{
    private CarRepositoryInterface $carRepository;

    public function __construct(CarRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function execute(array $data): array
    {
        $car = $this->carRepository->create($data);
        return $car->toArray();
    }
}