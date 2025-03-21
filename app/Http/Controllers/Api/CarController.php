<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\CarRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Application\UseCases\Car\ListCarsUseCase;
use App\Application\UseCases\Car\CreateCarUseCase;
use App\Application\UseCases\Car\GetCarUseCase;
use App\Application\UseCases\Car\UpdateCarUseCase;
use App\Application\UseCases\Car\DeleteCarUseCase;

class CarController extends Controller {
    private ListCarsUseCase $listCarsUseCase;
    private CreateCarUseCase $createCarUseCase;
    private GetCarUseCase $getCarUseCase;
    private UpdateCarUseCase $updateCarUseCase;
    private DeleteCarUseCase $deleteCarUseCase;

    public function __construct(
        ListCarsUseCase $listCarsUseCase,
        CreateCarUseCase $createCarUseCase,
        GetCarUseCase $getCarUseCase,
        UpdateCarUseCase $updateCarUseCase,
        DeleteCarUseCase $deleteCarUseCase
    ) {
        $this->listCarsUseCase = $listCarsUseCase;
        $this->createCarUseCase = $createCarUseCase;
        $this->getCarUseCase = $getCarUseCase;
        $this->updateCarUseCase = $updateCarUseCase;
        $this->deleteCarUseCase = $deleteCarUseCase;
    }

    public function index(Request $request): JsonResponse
    {
        $page = $request->input('page', 1);
        $size = $request->input('size', 15);
        $cars = $this->listCarsUseCase->execute($page, $size);
        return response()->json($cars);
    }

    public function store(CarRequest $request): JsonResponse
    {
        $car = $this->createCarUseCase->execute($request->validated());
        return response()->json($car, Response::HTTP_CREATED);
    }

    public function show(int $id): JsonResponse
    {
        $car = $this->getCarUseCase->execute($id);
        if (!$car) {
            return response()->json(['message' => 'Car not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($car);
    }

    public function update(CarRequest $request, int $id): JsonResponse
    {
        $car = $this->updateCarUseCase->execute($id, $request->validated());
        return response()->json($car);
    }

    public function destroy(int $id): Response
    {
        $this->deleteCarUseCase->execute($id);
        return response()->noContent();
    }
}