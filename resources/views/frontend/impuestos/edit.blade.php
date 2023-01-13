@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.impuesto.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.impuestos.update", [$impuesto->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="nombre">{{ trans('cruds.impuesto.fields.nombre') }}</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', $impuesto->nombre) }}">
                            @if($errors->has('nombre'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nombre') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.impuesto.fields.nombre_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="valor">{{ trans('cruds.impuesto.fields.valor') }}</label>
                            <input class="form-control" type="number" name="valor" id="valor" value="{{ old('valor', $impuesto->valor) }}" step="0.01">
                            @if($errors->has('valor'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('valor') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.impuesto.fields.valor_helper') }}</span>
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