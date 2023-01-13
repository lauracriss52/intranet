@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.mantenimiento.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.mantenimientos.update", [$mantenimiento->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('fecha_programacion') ? 'has-error' : '' }}">
                            <label for="fecha_programacion">{{ trans('cruds.mantenimiento.fields.fecha_programacion') }}</label>
                            <input class="form-control date" type="text" name="fecha_programacion" id="fecha_programacion" value="{{ old('fecha_programacion', $mantenimiento->fecha_programacion) }}">
                            @if($errors->has('fecha_programacion'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha_programacion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.mantenimiento.fields.fecha_programacion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fecha_de_ejecucion') ? 'has-error' : '' }}">
                            <label for="fecha_de_ejecucion">{{ trans('cruds.mantenimiento.fields.fecha_de_ejecucion') }}</label>
                            <input class="form-control date" type="text" name="fecha_de_ejecucion" id="fecha_de_ejecucion" value="{{ old('fecha_de_ejecucion', $mantenimiento->fecha_de_ejecucion) }}">
                            @if($errors->has('fecha_de_ejecucion'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha_de_ejecucion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.mantenimiento.fields.fecha_de_ejecucion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('valor') ? 'has-error' : '' }}">
                            <label for="valor">{{ trans('cruds.mantenimiento.fields.valor') }}</label>
                            <input class="form-control" type="number" name="valor" id="valor" value="{{ old('valor', $mantenimiento->valor) }}" step="0.01">
                            @if($errors->has('valor'))
                                <span class="help-block" role="alert">{{ $errors->first('valor') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.mantenimiento.fields.valor_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dispositivo') ? 'has-error' : '' }}">
                            <label for="dispositivo_id">{{ trans('cruds.mantenimiento.fields.dispositivo') }}</label>
                            <select class="form-control select2" name="dispositivo_id" id="dispositivo_id">
                                @foreach($dispositivos as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('dispositivo_id') ? old('dispositivo_id') : $mantenimiento->dispositivo->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('dispositivo'))
                                <span class="help-block" role="alert">{{ $errors->first('dispositivo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.mantenimiento.fields.dispositivo_helper') }}</span>
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