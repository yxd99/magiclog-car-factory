@extends('layouts.app')

@section('template_title')
    Editar carro
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar carro</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('cars.update', $car->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('car.components.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
