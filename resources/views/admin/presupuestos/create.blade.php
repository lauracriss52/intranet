@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.presupuesto.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.presupuestos.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                            <label class="required" for="nombre">{{ trans('cruds.presupuesto.fields.nombre') }}</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}" required>
                            @if($errors->has('nombre'))
                                <span class="help-block" role="alert">{{ $errors->first('nombre') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.presupuesto.fields.nombre_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                            <label for="descripcion">{{ trans('cruds.presupuesto.fields.descripcion') }}</label>
                            <input class="form-control" type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', '') }}">
                            @if($errors->has('descripcion'))
                                <span class="help-block" role="alert">{{ $errors->first('descripcion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.presupuesto.fields.descripcion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('valor') ? 'has-error' : '' }}">
                            <label class="required" for="valor">{{ trans('cruds.presupuesto.fields.valor') }}</label>
                            <input class="form-control" type="number" name="valor" id="valor" value="{{ old('valor', '') }}" step="1" required>
                            @if($errors->has('valor'))
                                <span class="help-block" role="alert">{{ $errors->first('valor') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.presupuesto.fields.valor_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('sgi') ? 'has-error' : '' }}">
                            <label for="sgi_id">{{ trans('cruds.presupuesto.fields.sgi') }}</label>
                            <select class="form-control select2" name="sgi_id" id="sgi_id">
                                @foreach($sgis as $id => $entry)
                                    <option value="{{ $id }}" {{ old('sgi_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('sgi'))
                                <span class="help-block" role="alert">{{ $errors->first('sgi') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.presupuesto.fields.sgi_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('proceso') ? 'has-error' : '' }}">
                            <label class="required" for="proceso_id">{{ trans('cruds.presupuesto.fields.proceso') }}</label>
                            <select class="form-control select2" name="proceso_id" id="proceso_id" required>
                                @foreach($procesos as $id => $entry)
                                    <option value="{{ $id }}" {{ old('proceso_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('proceso'))
                                <span class="help-block" role="alert">{{ $errors->first('proceso') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.presupuesto.fields.proceso_helper') }}</span>
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