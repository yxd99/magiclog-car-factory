<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\CarRequest;
use App\DataTables\CarsDataTable;

class CarController extends Controller
{
    private string $apiUrl;

    public function __construct()
    {
        $this->apiUrl = config('app.url') . '/api/cars';
    }

    public function index(CarsDataTable $dataTable)
    {
        $deleteModal = [
            'title' => 'Eliminar carro', 
            'text' => "¿Estás seguro de que quieres eliminar este carro?",
        ];
        confirmDelete($deleteModal['title'], $deleteModal['text']);
        return $dataTable->render('car.index');
    }

    public function create(): View
    {
        return view('car.create', ['car' => null]);
    }

    public function store(CarRequest $request): RedirectResponse
    {
        $req = Request::create($this->apiUrl, 'POST', $request->validated());
        $res = Route::dispatch($req);

        $data = json_decode($res->getContent(), true);

        if ($res->getStatusCode() !== 201) { 
            return Redirect::back()->withErrors($data['errors'] ?? 'Fallo al crear el vehículo');
        }

        return Redirect::route('cars.index')
            ->with('success', 'Carro creado correctamente');
    }

    public function show($id): View
    {
        $req = Request::create($this->apiUrl . "/{$id}", 'GET');
        $res = Route::dispatch($req);

        $car = json_decode($res->getContent());

        return view('car.show', compact('car'));
    }

    public function edit($id): View
    {
        $req = Request::create($this->apiUrl . "/{$id}", 'GET');
        $res = Route::dispatch($req);

        $car = json_decode($res->getContent());

        return view('car.edit', compact('car'));
    }

    public function update(CarRequest $request, $id): RedirectResponse
    {
        $req = Request::create($this->apiUrl . "/{$id}", 'PUT');
        $req->merge($request->validated());
        Route::dispatch($req);

        return Redirect::route('cars.index')
            ->with('success', 'Carro editado');
    }

    public function destroy($id): RedirectResponse
    {
        $req = Request::create($this->apiUrl . "/{$id}", 'DELETE');
        Route::dispatch($req);

        return Redirect::route('cars.index')
            ->with('success', 'Carro eliminado');
    }
}
