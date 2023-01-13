@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.salario.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.salarios.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="salario">{{ trans('cruds.salario.fields.salario') }}</label>
                            <input class="form-control" type="number" name="salario" id="salario" value="{{ old('salario', '') }}" step="0.01" required>
                            @if($errors->has('salario'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('salario') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salario.fields.salario_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="fecha">{{ trans('cruds.salario.fields.fecha') }}</label>
                            <input class="form-control date" type="text" name="fecha" id="fecha" value="{{ old('fecha') }}">
                            @if($errors->has('fecha'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fecha') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salario.fields.fecha_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection