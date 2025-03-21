@extends('layouts.app')

@section('template_title')
    Información del carro
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="navbar navbar-expand-md navbar-light">
                            <div>
                                <a class="btn btn-primary btn-sm" href="{{ route('cars.index') }}"><i class="fa fa-arrow-left"></i> Volver</a>
                            </div>
                            <div style="margin-left: 1rem;">
                                <span class="card-title">Información del carro</span> 
                            </div>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Marca:</strong>
                                    {{ $car->brand }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Modelo:</strong>
                                    {{ $car->model }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Año:</strong>
                                    {{ $car->year }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Color:</strong>
                                    {{ $car->color }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Precio:</strong>
                                    {{ $car->price }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
