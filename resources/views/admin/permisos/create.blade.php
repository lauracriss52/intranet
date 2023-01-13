@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.permiso.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.permisos.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('tipo_de_permiso') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.permiso.fields.tipo_de_permiso') }}</label>
                            <select class="form-control" name="tipo_de_permiso" id="tipo_de_permiso" required>
                                <option value disabled {{ old('tipo_de_permiso', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Permiso::TIPO_DE_PERMISO_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('tipo_de_permiso', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('tipo_de_permiso'))
                                <span class="help-block" role="alert">{{ $errors->first('tipo_de_permiso') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.permiso.fields.tipo_de_permiso_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('duracion') ? 'has-error' : '' }}">
                            <label class="required" for="duracion">{{ trans('cruds.permiso.fields.duracion') }}</label>
                            <input class="form-control" type="number" name="duracion" id="duracion" value="{{ old('duracion', '1') }}" step="0.1" required>
                            @if($errors->has('duracion'))
                                <span class="help-block" role="alert">{{ $errors->first('duracion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.permiso.fields.duracion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
                            <label class="required" for="fecha">{{ trans('cruds.permiso.fields.fecha') }}</label>
                            <input class="form-control date" type="text" name="fecha" id="fecha" value="{{ old('fecha') }}" required>
                            @if($errors->has('fecha'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.permiso.fields.fecha_helper') }}</span>
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