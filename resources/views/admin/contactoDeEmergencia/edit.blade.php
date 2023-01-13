@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.contactoDeEmergencium.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.contacto-de-emergencia.update", [$contactoDeEmergencium->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                            <label class="required" for="nombre">{{ trans('cruds.contactoDeEmergencium.fields.nombre') }}</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', $contactoDeEmergencium->nombre) }}" required>
                            @if($errors->has('nombre'))
                                <span class="help-block" role="alert">{{ $errors->first('nombre') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactoDeEmergencium.fields.nombre_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('relacion') ? 'has-error' : '' }}">
                            <label class="required" for="relacion">{{ trans('cruds.contactoDeEmergencium.fields.relacion') }}</label>
                            <input class="form-control" type="text" name="relacion" id="relacion" value="{{ old('relacion', $contactoDeEmergencium->relacion) }}" required>
                            @if($errors->has('relacion'))
                                <span class="help-block" role="alert">{{ $errors->first('relacion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactoDeEmergencium.fields.relacion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('telefono') ? 'has-error' : '' }}">
                            <label class="required" for="telefono">{{ trans('cruds.contactoDeEmergencium.fields.telefono') }}</label>
                            <input class="form-control" type="text" name="telefono" id="telefono" value="{{ old('telefono', $contactoDeEmergencium->telefono) }}" required>
                            @if($errors->has('telefono'))
                                <span class="help-block" role="alert">{{ $errors->first('telefono') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactoDeEmergencium.fields.telefono_helper') }}</span>
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