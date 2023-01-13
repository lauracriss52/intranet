@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.expedientesCocolab.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.expedientes-cocolabs.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
                            <label for="fecha">{{ trans('cruds.expedientesCocolab.fields.fecha') }}</label>
                            <input class="form-control date" type="text" name="fecha" id="fecha" value="{{ old('fecha') }}">
                            @if($errors->has('fecha'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.expedientesCocolab.fields.fecha_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('descripcion_expediente') ? 'has-error' : '' }}">
                            <label class="required" for="descripcion_expediente">{{ trans('cruds.expedientesCocolab.fields.descripcion_expediente') }}</label>
                            <input class="form-control" type="text" name="descripcion_expediente" id="descripcion_expediente" value="{{ old('descripcion_expediente', '') }}" required>
                            @if($errors->has('descripcion_expediente'))
                                <span class="help-block" role="alert">{{ $errors->first('descripcion_expediente') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.expedientesCocolab.fields.descripcion_expediente_helper') }}</span>
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