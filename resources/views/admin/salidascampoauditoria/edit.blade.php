@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.salidascampoauditorium.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.salidascampoauditoria.update", [$salidascampoauditorium->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('solicitud') ? 'has-error' : '' }}">
                            <label for="solicitud_id">{{ trans('cruds.salidascampoauditorium.fields.solicitud') }}</label>
                            <select class="form-control select2" name="solicitud_id" id="solicitud_id">
                                @foreach($solicituds as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('solicitud_id') ? old('solicitud_id') : $salidascampoauditorium->solicitud->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('solicitud'))
                                <span class="help-block" role="alert">{{ $errors->first('solicitud') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidascampoauditorium.fields.solicitud_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('gestionar_documentos') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="gestionar_documentos" value="0">
                                <input type="checkbox" name="gestionar_documentos" id="gestionar_documentos" value="1" {{ $salidascampoauditorium->gestionar_documentos || old('gestionar_documentos', 0) === 1 ? 'checked' : '' }}>
                                <label for="gestionar_documentos" style="font-weight: 400">{{ trans('cruds.salidascampoauditorium.fields.gestionar_documentos') }}</label>
                            </div>
                            @if($errors->has('gestionar_documentos'))
                                <span class="help-block" role="alert">{{ $errors->first('gestionar_documentos') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidascampoauditorium.fields.gestionar_documentos_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('solicitud_de_transporte') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="solicitud_de_transporte" value="0">
                                <input type="checkbox" name="solicitud_de_transporte" id="solicitud_de_transporte" value="1" {{ $salidascampoauditorium->solicitud_de_transporte || old('solicitud_de_transporte', 0) === 1 ? 'checked' : '' }}>
                                <label for="solicitud_de_transporte" style="font-weight: 400">{{ trans('cruds.salidascampoauditorium.fields.solicitud_de_transporte') }}</label>
                            </div>
                            @if($errors->has('solicitud_de_transporte'))
                                <span class="help-block" role="alert">{{ $errors->first('solicitud_de_transporte') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidascampoauditorium.fields.solicitud_de_transporte_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('vuelo') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="vuelo" value="0">
                                <input type="checkbox" name="vuelo" id="vuelo" value="1" {{ $salidascampoauditorium->vuelo || old('vuelo', 0) === 1 ? 'checked' : '' }}>
                                <label for="vuelo" style="font-weight: 400">{{ trans('cruds.salidascampoauditorium.fields.vuelo') }}</label>
                            </div>
                            @if($errors->has('vuelo'))
                                <span class="help-block" role="alert">{{ $errors->first('vuelo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidascampoauditorium.fields.vuelo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('formulario_edica') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="formulario_edica" value="0">
                                <input type="checkbox" name="formulario_edica" id="formulario_edica" value="1" {{ $salidascampoauditorium->formulario_edica || old('formulario_edica', 0) === 1 ? 'checked' : '' }}>
                                <label for="formulario_edica" style="font-weight: 400">{{ trans('cruds.salidascampoauditorium.fields.formulario_edica') }}</label>
                            </div>
                            @if($errors->has('formulario_edica'))
                                <span class="help-block" role="alert">{{ $errors->first('formulario_edica') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidascampoauditorium.fields.formulario_edica_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('covid') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="covid" value="0">
                                <input type="checkbox" name="covid" id="covid" value="1" {{ $salidascampoauditorium->covid || old('covid', 0) === 1 ? 'checked' : '' }}>
                                <label for="covid" style="font-weight: 400">{{ trans('cruds.salidascampoauditorium.fields.covid') }}</label>
                            </div>
                            @if($errors->has('covid'))
                                <span class="help-block" role="alert">{{ $errors->first('covid') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidascampoauditorium.fields.covid_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('induccion_campo') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="induccion_campo" value="0">
                                <input type="checkbox" name="induccion_campo" id="induccion_campo" value="1" {{ $salidascampoauditorium->induccion_campo || old('induccion_campo', 0) === 1 ? 'checked' : '' }}>
                                <label for="induccion_campo" style="font-weight: 400">{{ trans('cruds.salidascampoauditorium.fields.induccion_campo') }}</label>
                            </div>
                            @if($errors->has('induccion_campo'))
                                <span class="help-block" role="alert">{{ $errors->first('induccion_campo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidascampoauditorium.fields.induccion_campo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('estado') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="estado" value="0">
                                <input type="checkbox" name="estado" id="estado" value="1" {{ $salidascampoauditorium->estado || old('estado', 0) === 1 ? 'checked' : '' }}>
                                <label for="estado" style="font-weight: 400">{{ trans('cruds.salidascampoauditorium.fields.estado') }}</label>
                            </div>
                            @if($errors->has('estado'))
                                <span class="help-block" role="alert">{{ $errors->first('estado') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidascampoauditorium.fields.estado_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('matriz') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="matriz" value="0">
                                <input type="checkbox" name="matriz" id="matriz" value="1" {{ $salidascampoauditorium->matriz || old('matriz', 0) === 1 ? 'checked' : '' }}>
                                <label for="matriz" style="font-weight: 400">{{ trans('cruds.salidascampoauditorium.fields.matriz') }}</label>
                            </div>
                            @if($errors->has('matriz'))
                                <span class="help-block" role="alert">{{ $errors->first('matriz') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidascampoauditorium.fields.matriz_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('excel') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="excel" value="0">
                                <input type="checkbox" name="excel" id="excel" value="1" {{ $salidascampoauditorium->excel || old('excel', 0) === 1 ? 'checked' : '' }}>
                                <label for="excel" style="font-weight: 400">{{ trans('cruds.salidascampoauditorium.fields.excel') }}</label>
                            </div>
                            @if($errors->has('excel'))
                                <span class="help-block" role="alert">{{ $errors->first('excel') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidascampoauditorium.fields.excel_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('informar') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="informar" value="0">
                                <input type="checkbox" name="informar" id="informar" value="1" {{ $salidascampoauditorium->informar || old('informar', 0) === 1 ? 'checked' : '' }}>
                                <label for="informar" style="font-weight: 400">{{ trans('cruds.salidascampoauditorium.fields.informar') }}</label>
                            </div>
                            @if($errors->has('informar'))
                                <span class="help-block" role="alert">{{ $errors->first('informar') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidascampoauditorium.fields.informar_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ods') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="ods" value="0">
                                <input type="checkbox" name="ods" id="ods" value="1" {{ $salidascampoauditorium->ods || old('ods', 0) === 1 ? 'checked' : '' }}>
                                <label for="ods" style="font-weight: 400">{{ trans('cruds.salidascampoauditorium.fields.ods') }}</label>
                            </div>
                            @if($errors->has('ods'))
                                <span class="help-block" role="alert">{{ $errors->first('ods') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidascampoauditorium.fields.ods_helper') }}</span>
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