@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.ingesosGeopark.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.ingesos-geoparks.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $ingesosGeopark->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.gestionar_documentos') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->gestionar_documentos ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.requerimiento_hse') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->requerimiento_hse ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.diligenciar_formatos') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->diligenciar_formatos ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.enviar_documentacion_hse') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->enviar_documentacion_hse ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.solicitar_induccion') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->solicitar_induccion ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.transporte_1') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->transporte_1 ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.transporte_2') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->transporte_2 ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.hospedaje_1') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->hospedaje_1 ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.hospedaje_villanueva') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->hospedaje_villanueva ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.viaticos') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->viaticos ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.notificacion_salida') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->notificacion_salida ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.transporte_villanueva_bogota') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->transporte_villanueva_bogota ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.hospedaje_bogota') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->hospedaje_bogota ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.hospedaje_villanueva_salida') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->hospedaje_villanueva_salida ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.ingesos-geoparks.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection