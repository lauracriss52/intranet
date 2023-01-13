@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.ingesosGeopark.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.ingesos-geoparks.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('gestionar_documentos') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="gestionar_documentos" value="0">
                                <input type="checkbox" name="gestionar_documentos" id="gestionar_documentos" value="1" {{ old('gestionar_documentos', 0) == 1 ? 'checked' : '' }}>
                                <label for="gestionar_documentos" style="font-weight: 400">{{ trans('cruds.ingesosGeopark.fields.gestionar_documentos') }}</label>
                            </div>
                            @if($errors->has('gestionar_documentos'))
                                <span class="help-block" role="alert">{{ $errors->first('gestionar_documentos') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ingesosGeopark.fields.gestionar_documentos_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('requerimiento_hse') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="requerimiento_hse" value="0">
                                <input type="checkbox" name="requerimiento_hse" id="requerimiento_hse" value="1" {{ old('requerimiento_hse', 0) == 1 ? 'checked' : '' }}>
                                <label for="requerimiento_hse" style="font-weight: 400">{{ trans('cruds.ingesosGeopark.fields.requerimiento_hse') }}</label>
                            </div>
                            @if($errors->has('requerimiento_hse'))
                                <span class="help-block" role="alert">{{ $errors->first('requerimiento_hse') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ingesosGeopark.fields.requerimiento_hse_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('diligenciar_formatos') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="diligenciar_formatos" value="0">
                                <input type="checkbox" name="diligenciar_formatos" id="diligenciar_formatos" value="1" {{ old('diligenciar_formatos', 0) == 1 ? 'checked' : '' }}>
                                <label for="diligenciar_formatos" style="font-weight: 400">{{ trans('cruds.ingesosGeopark.fields.diligenciar_formatos') }}</label>
                            </div>
                            @if($errors->has('diligenciar_formatos'))
                                <span class="help-block" role="alert">{{ $errors->first('diligenciar_formatos') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ingesosGeopark.fields.diligenciar_formatos_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('enviar_documentacion_hse') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="enviar_documentacion_hse" value="0">
                                <input type="checkbox" name="enviar_documentacion_hse" id="enviar_documentacion_hse" value="1" {{ old('enviar_documentacion_hse', 0) == 1 ? 'checked' : '' }}>
                                <label for="enviar_documentacion_hse" style="font-weight: 400">{{ trans('cruds.ingesosGeopark.fields.enviar_documentacion_hse') }}</label>
                            </div>
                            @if($errors->has('enviar_documentacion_hse'))
                                <span class="help-block" role="alert">{{ $errors->first('enviar_documentacion_hse') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ingesosGeopark.fields.enviar_documentacion_hse_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('solicitar_induccion') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="solicitar_induccion" value="0">
                                <input type="checkbox" name="solicitar_induccion" id="solicitar_induccion" value="1" {{ old('solicitar_induccion', 0) == 1 ? 'checked' : '' }}>
                                <label for="solicitar_induccion" style="font-weight: 400">{{ trans('cruds.ingesosGeopark.fields.solicitar_induccion') }}</label>
                            </div>
                            @if($errors->has('solicitar_induccion'))
                                <span class="help-block" role="alert">{{ $errors->first('solicitar_induccion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ingesosGeopark.fields.solicitar_induccion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('transporte_1') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="transporte_1" value="0">
                                <input type="checkbox" name="transporte_1" id="transporte_1" value="1" {{ old('transporte_1', 0) == 1 ? 'checked' : '' }}>
                                <label for="transporte_1" style="font-weight: 400">{{ trans('cruds.ingesosGeopark.fields.transporte_1') }}</label>
                            </div>
                            @if($errors->has('transporte_1'))
                                <span class="help-block" role="alert">{{ $errors->first('transporte_1') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ingesosGeopark.fields.transporte_1_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('transporte_2') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="transporte_2" value="0">
                                <input type="checkbox" name="transporte_2" id="transporte_2" value="1" {{ old('transporte_2', 0) == 1 ? 'checked' : '' }}>
                                <label for="transporte_2" style="font-weight: 400">{{ trans('cruds.ingesosGeopark.fields.transporte_2') }}</label>
                            </div>
                            @if($errors->has('transporte_2'))
                                <span class="help-block" role="alert">{{ $errors->first('transporte_2') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ingesosGeopark.fields.transporte_2_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('hospedaje_1') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="hospedaje_1" value="0">
                                <input type="checkbox" name="hospedaje_1" id="hospedaje_1" value="1" {{ old('hospedaje_1', 0) == 1 ? 'checked' : '' }}>
                                <label for="hospedaje_1" style="font-weight: 400">{{ trans('cruds.ingesosGeopark.fields.hospedaje_1') }}</label>
                            </div>
                            @if($errors->has('hospedaje_1'))
                                <span class="help-block" role="alert">{{ $errors->first('hospedaje_1') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ingesosGeopark.fields.hospedaje_1_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('hospedaje_villanueva') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="hospedaje_villanueva" value="0">
                                <input type="checkbox" name="hospedaje_villanueva" id="hospedaje_villanueva" value="1" {{ old('hospedaje_villanueva', 0) == 1 ? 'checked' : '' }}>
                                <label for="hospedaje_villanueva" style="font-weight: 400">{{ trans('cruds.ingesosGeopark.fields.hospedaje_villanueva') }}</label>
                            </div>
                            @if($errors->has('hospedaje_villanueva'))
                                <span class="help-block" role="alert">{{ $errors->first('hospedaje_villanueva') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ingesosGeopark.fields.hospedaje_villanueva_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('viaticos') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="viaticos" value="0">
                                <input type="checkbox" name="viaticos" id="viaticos" value="1" {{ old('viaticos', 0) == 1 ? 'checked' : '' }}>
                                <label for="viaticos" style="font-weight: 400">{{ trans('cruds.ingesosGeopark.fields.viaticos') }}</label>
                            </div>
                            @if($errors->has('viaticos'))
                                <span class="help-block" role="alert">{{ $errors->first('viaticos') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ingesosGeopark.fields.viaticos_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('notificacion_salida') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="notificacion_salida" value="0">
                                <input type="checkbox" name="notificacion_salida" id="notificacion_salida" value="1" {{ old('notificacion_salida', 0) == 1 ? 'checked' : '' }}>
                                <label for="notificacion_salida" style="font-weight: 400">{{ trans('cruds.ingesosGeopark.fields.notificacion_salida') }}</label>
                            </div>
                            @if($errors->has('notificacion_salida'))
                                <span class="help-block" role="alert">{{ $errors->first('notificacion_salida') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ingesosGeopark.fields.notificacion_salida_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('transporte_villanueva_bogota') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="transporte_villanueva_bogota" value="0">
                                <input type="checkbox" name="transporte_villanueva_bogota" id="transporte_villanueva_bogota" value="1" {{ old('transporte_villanueva_bogota', 0) == 1 ? 'checked' : '' }}>
                                <label for="transporte_villanueva_bogota" style="font-weight: 400">{{ trans('cruds.ingesosGeopark.fields.transporte_villanueva_bogota') }}</label>
                            </div>
                            @if($errors->has('transporte_villanueva_bogota'))
                                <span class="help-block" role="alert">{{ $errors->first('transporte_villanueva_bogota') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ingesosGeopark.fields.transporte_villanueva_bogota_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('hospedaje_bogota') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="hospedaje_bogota" value="0">
                                <input type="checkbox" name="hospedaje_bogota" id="hospedaje_bogota" value="1" {{ old('hospedaje_bogota', 0) == 1 ? 'checked' : '' }}>
                                <label for="hospedaje_bogota" style="font-weight: 400">{{ trans('cruds.ingesosGeopark.fields.hospedaje_bogota') }}</label>
                            </div>
                            @if($errors->has('hospedaje_bogota'))
                                <span class="help-block" role="alert">{{ $errors->first('hospedaje_bogota') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ingesosGeopark.fields.hospedaje_bogota_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('hospedaje_villanueva_salida') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="hospedaje_villanueva_salida" value="0">
                                <input type="checkbox" name="hospedaje_villanueva_salida" id="hospedaje_villanueva_salida" value="1" {{ old('hospedaje_villanueva_salida', 0) == 1 ? 'checked' : '' }}>
                                <label for="hospedaje_villanueva_salida" style="font-weight: 400">{{ trans('cruds.ingesosGeopark.fields.hospedaje_villanueva_salida') }}</label>
                            </div>
                            @if($errors->has('hospedaje_villanueva_salida'))
                                <span class="help-block" role="alert">{{ $errors->first('hospedaje_villanueva_salida') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ingesosGeopark.fields.hospedaje_villanueva_salida_helper') }}</span>
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