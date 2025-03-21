<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="brand" class="form-label">Marca</label>
            <input minlength="1" maxlength="30" type="text" name="brand" class="form-control @error('brand') is-invalid @enderror" value="{{ old('brand', $car?->brand) }}" id="brand" placeholder="Marca" require>
            {!! $errors->first('brand', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="model" class="form-label">Modelo</label>
            <input minlength="1" maxlength="50" type="text" name="model" class="form-control @error('model') is-invalid @enderror" value="{{ old('model', $car?->model) }}" id="model" placeholder="Modelo" require>
            {!! $errors->first('model', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="year" class="form-label">Año</label>
            <input min="1900" max="3000" type="number" name="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year', $car?->year) }}" id="year" placeholder="Año" require>
            {!! $errors->first('year', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="color" class="form-label">Color</label>
            <input minlength="1" maxlength="50" type="text" name="color" class="form-control @error('color') is-invalid @enderror" value="{{ old('color', $car?->color) }}" id="color" placeholder="Color" require>
            {!! $errors->first('color', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="price" class="form-label">Precio</label>
            <input min="0" type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $car?->price) }}" id="price" placeholder="Precio" require>
            {!! $errors->first('price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>