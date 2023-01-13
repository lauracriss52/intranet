@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.documentosEmpleadoo.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.documentos-empleadoos.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('tipo_de_documento') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.documentosEmpleadoo.fields.tipo_de_documento') }}</label>
                            <select class="form-control" name="tipo_de_documento" id="tipo_de_documento" required>
                                <option value disabled {{ old('tipo_de_documento', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\DocumentosEmpleadoo::TIPO_DE_DOCUMENTO_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('tipo_de_documento', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('tipo_de_documento'))
                                <span class="help-block" role="alert">{{ $errors->first('tipo_de_documento') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.documentosEmpleadoo.fields.tipo_de_documento_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
                            <label for="fecha">{{ trans('cruds.documentosEmpleadoo.fields.fecha') }}</label>
                            <input class="form-control date" type="text" name="fecha" id="fecha" value="{{ old('fecha') }}">
                            @if($errors->has('fecha'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.documentosEmpleadoo.fields.fecha_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                            <label class="required" for="nombre">{{ trans('cruds.documentosEmpleadoo.fields.nombre') }}</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}" required>
                            @if($errors->has('nombre'))
                                <span class="help-block" role="alert">{{ $errors->first('nombre') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.documentosEmpleadoo.fields.nombre_helper') }}</span>
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