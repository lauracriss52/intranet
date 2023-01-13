@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.salidascampoauditorium.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.salidascampoauditoria.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $salidascampoauditorium->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.solicitud') }}
                                    </th>
                                    <td>
                                        {{ $salidascampoauditorium->solicitud->fecha_de_ingreso ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.gestionar_documentos') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $salidascampoauditorium->gestionar_documentos ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.solicitud_de_transporte') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $salidascampoauditorium->solicitud_de_transporte ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.vuelo') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $salidascampoauditorium->vuelo ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.formulario_edica') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $salidascampoauditorium->formulario_edica ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.covid') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $salidascampoauditorium->covid ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.induccion_campo') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $salidascampoauditorium->induccion_campo ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.estado') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $salidascampoauditorium->estado ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.matriz') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $salidascampoauditorium->matriz ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.excel') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $salidascampoauditorium->excel ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.informar') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $salidascampoauditorium->informar ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.ods') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $salidascampoauditorium->ods ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.salidascampoauditoria.index') }}">
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