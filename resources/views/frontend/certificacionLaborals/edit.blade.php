@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.certificacionLaboral.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.certificacion-laborals.update", [$certificacionLaboral->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="fecha">{{ trans('cruds.certificacionLaboral.fields.fecha') }}</label>
                            <input class="form-control date" type="text" name="fecha" id="fecha" value="{{ old('fecha', $certificacionLaboral->fecha) }}">
                            @if($errors->has('fecha'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fecha') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.certificacionLaboral.fields.fecha_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="empleado_id">{{ trans('cruds.certificacionLaboral.fields.empleado') }}</label>
                            <select class="form-control select2" name="empleado_id" id="empleado_id">
                                @foreach($empleados as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('empleado_id') ? old('empleado_id') : $certificacionLaboral->empleado->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('empleado'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('empleado') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.certificacionLaboral.fields.empleado_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="salario_id">{{ trans('cruds.certificacionLaboral.fields.salario') }}</label>
                            <select class="form-control select2" name="salario_id" id="salario_id">
                                @foreach($salarios as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('salario_id') ? old('salario_id') : $certificacionLaboral->salario->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('salario'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('salario') }}
                                </div>
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