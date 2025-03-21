<?php

namespace App\Domain\Entities;

class Car
{
    private int $id;
    private string $brand;
    private string $model;
    private int $year;
    private float $price;
    private string $color;

    public function __construct(int $id, string $brand, string $model, int $year, float $price, string $color)
    {
        $this->id = $id;
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->price = $price;
        $this->color = $color;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getColor(): float
    {
        return $this->color;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'brand' => $this->brand,
            'model' => $this->model,
            'year' => $this->year,
            'price' => $this->price,
            'color' => $this->color
        ];
    }
}