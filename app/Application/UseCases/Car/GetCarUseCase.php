<?php

namespace App\Application\UseCases\Car;

use App\Domain\Repositories\CarRepositoryInterface;

class GetCarUseCase
{
    private CarRepositoryInterface $carRepository;

    public function __construct(CarRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function execute(int $id): ?array
    {
        $car = $this->carRepository->findById($id);
        return $car ? $car->toArray() : null;
    }
}