<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Models\Car as CarModel;
use App\Domain\Entities\Car;
use App\Domain\Repositories\CarRepositoryInterface;

class CarRepository implements CarRepositoryInterface
{
    public function findAll(int $page, int $size): array
    {
        $paginator = CarModel::orderBy('created_at', 'desc')->paginate($size, ['*'], 'page', $page);

        return [
            'data' => array_map(function ($car) {
                return (new Car(
                    $car->id,
                    $car->brand,
                    $car->model,
                    $car->year,
                    $car->price,
                    $car->color
                ))->toArray();
            }, $paginator->items()),
            'total' => $paginator->total(),
            'per_page' => $paginator->perPage(),
            'current_page' => $paginator->currentPage(),
            'last_page' => $paginator->lastPage(),
        ];
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
            $car->price,
            $car->color
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
            $car->price,
            $car->color
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
            $car->price,
            $car->color
        );
    }

    public function delete(int $id): bool
    {
        return CarModel::destroy($id) > 0;
    }
}