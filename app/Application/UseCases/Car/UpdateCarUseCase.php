<?php

namespace App\Application\UseCases\Car;

use App\Domain\Repositories\CarRepositoryInterface;

class UpdateCarUseCase
{
    private CarRepositoryInterface $carRepository;

    public function __construct(CarRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function execute(int $id, array $data): array
    {
        $car = $this->carRepository->update($id, $data);
        return $car->toArray();
    }
}