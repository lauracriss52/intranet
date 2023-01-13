@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.certificacionLaboral.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.certificacion-laborals.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
                            <label for="fecha">{{ trans('cruds.certificacionLaboral.fields.fecha') }}</label>
                            <input class="form-control date" type="text" name="fecha" id="fecha" value="{{ old('fecha') }}">
                            @if($errors->has('fecha'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.certificacionLaboral.fields.fecha_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('empleado') ? 'has-error' : '' }}">
                            <label for="empleado_id">{{ trans('cruds.certificacionLaboral.fields.empleado') }}</label>
                            <select class="form-control select2" name="empleado_id" id="empleado_id">
                                @foreach($empleados as $id => $entry)
                                    <option value="{{ $id }}" {{ old('empleado_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('empleado'))
                                <span class="help-block" role="alert">{{ $errors->first('empleado') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.certificacionLaboral.fields.empleado_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('salario') ? 'has-error' : '' }}">
                            <label for="salario_id">{{ trans('cruds.certificacionLaboral.fields.salario') }}</label>
                            <select class="form-control select2" name="salario_id" id="salario_id">
                                @foreach($salarios as $id => $entry)
                                    <option value="{{ $id }}" {{ old('salario_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('salario'))
                                <span class="help-block" role="alert">{{ $errors->first('salario') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.certificacionLaboral.fields.salario_helper') }}</span>
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