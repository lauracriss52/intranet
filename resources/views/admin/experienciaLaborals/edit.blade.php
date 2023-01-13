@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.experienciaLaboral.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.experiencia-laborals.update", [$experienciaLaboral->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('empresa') ? 'has-error' : '' }}">
                            <label class="required" for="empresa">{{ trans('cruds.experienciaLaboral.fields.empresa') }}</label>
                            <input class="form-control" type="text" name="empresa" id="empresa" value="{{ old('empresa', $experienciaLaboral->empresa) }}" required>
                            @if($errors->has('empresa'))
                                <span class="help-block" role="alert">{{ $errors->first('empresa') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.experienciaLaboral.fields.empresa_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fecha_de_inicio') ? 'has-error' : '' }}">
                            <label class="required" for="fecha_de_inicio">{{ trans('cruds.experienciaLaboral.fields.fecha_de_inicio') }}</label>
                            <input class="form-control date" type="text" name="fecha_de_inicio" id="fecha_de_inicio" value="{{ old('fecha_de_inicio', $experienciaLaboral->fecha_de_inicio) }}" required>
                            @if($errors->has('fecha_de_inicio'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha_de_inicio') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.experienciaLaboral.fields.fecha_de_inicio_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fecha_fin') ? 'has-error' : '' }}">
                            <label class="required" for="fecha_fin">{{ trans('cruds.experienciaLaboral.fields.fecha_fin') }}</label>
                            <input class="form-control date" type="text" name="fecha_fin" id="fecha_fin" value="{{ old('fecha_fin', $experienciaLaboral->fecha_fin) }}" required>
                            @if($errors->has('fecha_fin'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha_fin') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.experienciaLaboral.fields.fecha_fin_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('correo_telefono') ? 'has-error' : '' }}">
                            <label class="required" for="correo_telefono">{{ trans('cruds.experienciaLaboral.fields.correo_telefono') }}</label>
                            <input class="form-control" type="text" name="correo_telefono" id="correo_telefono" value="{{ old('correo_telefono', $experienciaLaboral->correo_telefono) }}" required>
                            @if($errors->has('correo_telefono'))
                                <span class="help-block" role="alert">{{ $errors->first('correo_telefono') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.experienciaLaboral.fields.correo_telefono_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ubicacion') ? 'has-error' : '' }}">
                            <label class="required" for="ubicacion">{{ trans('cruds.experienciaLaboral.fields.ubicacion') }}</label>
                            <input class="form-control" type="text" name="ubicacion" id="ubicacion" value="{{ old('ubicacion', $experienciaLaboral->ubicacion) }}" required>
                            @if($errors->has('ubicacion'))
                                <span class="help-block" role="alert">{{ $errors->first('ubicacion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.experienciaLaboral.fields.ubicacion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cargo_desempenado') ? 'has-error' : '' }}">
                            <label class="required" for="cargo_desempenado">{{ trans('cruds.experienciaLaboral.fields.cargo_desempenado') }}</label>
                            <input class="form-control" type="text" name="cargo_desempenado" id="cargo_desempenado" value="{{ old('cargo_desempenado', $experienciaLaboral->cargo_desempenado) }}" required>
                            @if($errors->has('cargo_desempenado'))
                                <span class="help-block" role="alert">{{ $errors->first('cargo_desempenado') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.experienciaLaboral.fields.cargo_desempenado_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tareas') ? 'has-error' : '' }}">
                            <label class="required" for="tareas">{{ trans('cruds.experienciaLaboral.fields.tareas') }}</label>
                            <input class="form-control" type="text" name="tareas" id="tareas" value="{{ old('tareas', $experienciaLaboral->tareas) }}" required>
                            @if($errors->has('tareas'))
                                <span class="help-block" role="alert">{{ $errors->first('tareas') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.experienciaLaboral.fields.tareas_helper') }}</span>
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