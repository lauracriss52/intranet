@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.estudio.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.estudios.update", [$estudio->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('universidad') ? 'has-error' : '' }}">
                            <label class="required" for="universidad">{{ trans('cruds.estudio.fields.universidad') }}</label>
                            <input class="form-control" type="text" name="universidad" id="universidad" value="{{ old('universidad', $estudio->universidad) }}" required>
                            @if($errors->has('universidad'))
                                <span class="help-block" role="alert">{{ $errors->first('universidad') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.estudio.fields.universidad_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('titulo_adquirido') ? 'has-error' : '' }}">
                            <label class="required" for="titulo_adquirido">{{ trans('cruds.estudio.fields.titulo_adquirido') }}</label>
                            <input class="form-control" type="text" name="titulo_adquirido" id="titulo_adquirido" value="{{ old('titulo_adquirido', $estudio->titulo_adquirido) }}" required>
                            @if($errors->has('titulo_adquirido'))
                                <span class="help-block" role="alert">{{ $errors->first('titulo_adquirido') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.estudio.fields.titulo_adquirido_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fecha_de_terminacion') ? 'has-error' : '' }}">
                            <label class="required" for="fecha_de_terminacion">{{ trans('cruds.estudio.fields.fecha_de_terminacion') }}</label>
                            <input class="form-control date" type="text" name="fecha_de_terminacion" id="fecha_de_terminacion" value="{{ old('fecha_de_terminacion', $estudio->fecha_de_terminacion) }}" required>
                            @if($errors->has('fecha_de_terminacion'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha_de_terminacion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.estudio.fields.fecha_de_terminacion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nivel_educativo') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.estudio.fields.nivel_educativo') }}</label>
                            <select class="form-control" name="nivel_educativo" id="nivel_educativo" required>
                                <option value disabled {{ old('nivel_educativo', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Estudio::NIVEL_EDUCATIVO_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('nivel_educativo', $estudio->nivel_educativo) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('nivel_educativo'))
                                <span class="help-block" role="alert">{{ $errors->first('nivel_educativo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.estudio.fields.nivel_educativo_helper') }}</span>
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