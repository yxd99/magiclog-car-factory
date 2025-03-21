<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Models\Car as CarModel;
use App\Domain\Entities\Car;
use App\Domain\Repositories\CarRepositoryInterface;

class CarRepository implements CarRepositoryInterface
{
    public function findAll(int $page, int $size): array
    {
        $paginator = CarModel::paginate($size, ['*'], 'page', $page);

        return array_map(function ($car) {
            return (new Car(
                $car->id,
                $car->brand,
                $car->model,
                $car->year,
                $car->price
            ))->toArray();
        }, $paginator->items());
    }


    public function findById(int $id): ?Car
    {
        $car = CarModel::find($id);
        if (!$car) {
            return null;
        }

        return new Car(
            $car->id,
            $car->brand,
            $car->model,
            $car->year,
            $car->price
        );
    }

    public function create(array $data): Car
    {
        $car = CarModel::create($data);

        return new Car(
            $car->id,
            $car->brand,
            $car->model,
            $car->year,
            $car->price
        );
    }

    public function update(int $id, array $data): Car
    {
        $car = CarModel::findOrFail($id);
        $car->update($data);

        return new Car(
            $car->id,
            $car->brand,
            $car->model,
            $car->year,
            $car->price
        );
    }

    public function delete(int $id): bool
    {
        return CarModel::destroy($id) > 0;
    }
}