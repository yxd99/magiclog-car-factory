<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Car;

interface CarRepositoryInterface
{
    public function findAll(int $page, int $size): array; 
    public function findById(int $id): ?Car;
    public function create(array $data): Car;
    public function update(int $id, array $data): Car;
    public function delete(int $id): bool;
}