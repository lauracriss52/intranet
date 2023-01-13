@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.vacacione.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.vacaciones.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('fecha_de_inicio') ? 'has-error' : '' }}">
                            <label class="required" for="fecha_de_inicio">{{ trans('cruds.vacacione.fields.fecha_de_inicio') }}</label>
                            <input class="form-control date" type="text" name="fecha_de_inicio" id="fecha_de_inicio" value="{{ old('fecha_de_inicio') }}" required>
                            @if($errors->has('fecha_de_inicio'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha_de_inicio') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vacacione.fields.fecha_de_inicio_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fecha_de_finalizacion') ? 'has-error' : '' }}">
                            <label class="required" for="fecha_de_finalizacion">{{ trans('cruds.vacacione.fields.fecha_de_finalizacion') }}</label>
                            <input class="form-control date" type="text" name="fecha_de_finalizacion" id="fecha_de_finalizacion" value="{{ old('fecha_de_finalizacion') }}" required>
                            @if($errors->has('fecha_de_finalizacion'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha_de_finalizacion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vacacione.fields.fecha_de_finalizacion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('reintegro') ? 'has-error' : '' }}">
                            <label class="required" for="reintegro">{{ trans('cruds.vacacione.fields.reintegro') }}</label>
                            <input class="form-control date" type="text" name="reintegro" id="reintegro" value="{{ old('reintegro') }}" required>
                            @if($errors->has('reintegro'))
                                <span class="help-block" role="alert">{{ $errors->first('reintegro') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vacacione.fields.reintegro_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dias') ? 'has-error' : '' }}">
                            <label class="required" for="dias">{{ trans('cruds.vacacione.fields.dias') }}</label>
                            <input class="form-control" type="number" name="dias" id="dias" value="{{ old('dias', '') }}" step="0.1" required max="15">
                            @if($errors->has('dias'))
                                <span class="help-block" role="alert">{{ $errors->first('dias') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vacacione.fields.dias_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('aprobadas') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="aprobadas" value="0">
                                <input type="checkbox" name="aprobadas" id="aprobadas" value="1" {{ old('aprobadas', 0) == 1 ? 'checked' : '' }}>
                                <label for="aprobadas" style="font-weight: 400">{{ trans('cruds.vacacione.fields.aprobadas') }}</label>
                            </div>
                            @if($errors->has('aprobadas'))
                                <span class="help-block" role="alert">{{ $errors->first('aprobadas') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vacacione.fields.aprobadas_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('perdio_de_vacaciones_que_disfruta') ? 'has-error' : '' }}">
                            <label class="required" for="perdio_de_vacaciones_que_disfruta">{{ trans('cruds.vacacione.fields.perdio_de_vacaciones_que_disfruta') }}</label>
                            <input class="form-control" type="text" name="perdio_de_vacaciones_que_disfruta" id="perdio_de_vacaciones_que_disfruta" value="{{ old('perdio_de_vacaciones_que_disfruta', '') }}" required>
                            @if($errors->has('perdio_de_vacaciones_que_disfruta'))
                                <span class="help-block" role="alert">{{ $errors->first('perdio_de_vacaciones_que_disfruta') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vacacione.fields.perdio_de_vacaciones_que_disfruta_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('empleado') ? 'has-error' : '' }}">
                            <label class="required" for="empleado_id">{{ trans('cruds.vacacione.fields.empleado') }}</label>
                            <select class="form-control select2" name="empleado_id" id="empleado_id" required>
                                @foreach($empleados as $id => $entry)
                                    <option value="{{ $id }}" {{ old('empleado_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('empleado'))
                                <span class="help-block" role="alert">{{ $errors->first('empleado') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vacacione.fields.empleado_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dias_pendientes') ? 'has-error' : '' }}">
                            <label for="dias_pendientes">{{ trans('cruds.vacacione.fields.dias_pendientes') }}</label>
                            <input class="form-control" type="number" name="dias_pendientes" id="dias_pendientes" value="{{ old('dias_pendientes', '') }}" step="0.01">
                            @if($errors->has('dias_pendientes'))
                                <span class="help-block" role="alert">{{ $errors->first('dias_pendientes') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.vacacione.fields.dias_pendientes_helper') }}</span>
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