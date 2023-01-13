@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.decretoLey.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.decreto-leys.update", [$decretoLey->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('item') ? 'has-error' : '' }}">
                            <label for="item">{{ trans('cruds.decretoLey.fields.item') }}</label>
                            <input class="form-control" type="text" name="item" id="item" value="{{ old('item', $decretoLey->item) }}">
                            @if($errors->has('item'))
                                <span class="help-block" role="alert">{{ $errors->first('item') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.decretoLey.fields.item_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('documento_solicitado') ? 'has-error' : '' }}">
                            <label for="documento_solicitado">{{ trans('cruds.decretoLey.fields.documento_solicitado') }}</label>
                            <input class="form-control" type="text" name="documento_solicitado" id="documento_solicitado" value="{{ old('documento_solicitado', $decretoLey->documento_solicitado) }}">
                            @if($errors->has('documento_solicitado'))
                                <span class="help-block" role="alert">{{ $errors->first('documento_solicitado') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.decretoLey.fields.documento_solicitado_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('proceso') ? 'has-error' : '' }}">
                            <label for="proceso_id">{{ trans('cruds.decretoLey.fields.proceso') }}</label>
                            <select class="form-control select2" name="proceso_id" id="proceso_id">
                                @foreach($procesos as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('proceso_id') ? old('proceso_id') : $decretoLey->proceso->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('proceso'))
                                <span class="help-block" role="alert">{{ $errors->first('proceso') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.decretoLey.fields.proceso_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('estado') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.decretoLey.fields.estado') }}</label>
                            @foreach(App\Models\DecretoLey::ESTADO_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="estado_{{ $key }}" name="estado" value="{{ $key }}" {{ old('estado', $decretoLey->estado) === (string) $key ? 'checked' : '' }}>
                                    <label for="estado_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('estado'))
                                <span class="help-block" role="alert">{{ $errors->first('estado') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.decretoLey.fields.estado_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('acta') ? 'has-error' : '' }}">
                            <label for="acta_id">{{ trans('cruds.decretoLey.fields.acta') }}</label>
                            <select class="form-control select2" name="acta_id" id="acta_id">
                                @foreach($actas as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('acta_id') ? old('acta_id') : $decretoLey->acta->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('acta'))
                                <span class="help-block" role="alert">{{ $errors->first('acta') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.decretoLey.fields.acta_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('lista_asistencia') ? 'has-error' : '' }}">
                            <label for="lista_asistencia_id">{{ trans('cruds.decretoLey.fields.lista_asistencia') }}</label>
                            <select class="form-control select2" name="lista_asistencia_id" id="lista_asistencia_id">
                                @foreach($lista_asistencias as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('lista_asistencia_id') ? old('lista_asistencia_id') : $decretoLey->lista_asistencia->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('lista_asistencia'))
                                <span class="help-block" role="alert">{{ $errors->first('lista_asistencia') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.decretoLey.fields.lista_asistencia_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('listado_maestro') ? 'has-error' : '' }}">
                            <label for="listado_maestro_id">{{ trans('cruds.decretoLey.fields.listado_maestro') }}</label>
                            <select class="form-control select2" name="listado_maestro_id" id="listado_maestro_id">
                                @foreach($listado_maestros as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('listado_maestro_id') ? old('listado_maestro_id') : $decretoLey->listado_maestro->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('listado_maestro'))
                                <span class="help-block" role="alert">{{ $errors->first('listado_maestro') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.decretoLey.fields.listado_maestro_helper') }}</span>
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