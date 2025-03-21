<?php

namespace App\Application\UseCases\Car;

use App\Domain\Repositories\CarRepositoryInterface;

class ListCarsUseCase
{
    private CarRepositoryInterface $carRepository;

    public function __construct(CarRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function execute(int $page = 1, int $size = 15): array
    {
        return $this->carRepository->findAll($page, $size);
    }
}