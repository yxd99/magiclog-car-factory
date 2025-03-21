<?php

namespace App\Application\UseCases\Car;

use App\Domain\Repositories\CarRepositoryInterface;

class DeleteCarUseCase
{
    private CarRepositoryInterface $carRepository;

    public function __construct(CarRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function execute(int $id): bool
    {
        return $this->carRepository->delete($id);
    }
}