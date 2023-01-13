@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.salidaCampo.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.salida-campos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $salidaCampo->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.fecha_de_ingreso') }}
                                    </th>
                                    <td>
                                        {{ $salidaCampo->fecha_de_ingreso }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.fecha_de_salida') }}
                                    </th>
                                    <td>
                                        {{ $salidaCampo->fecha_de_salida }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.cliente') }}
                                    </th>
                                    <td>
                                        {{ App\Models\SalidaCampo::CLIENTE_SELECT[$salidaCampo->cliente] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.empleado') }}
                                    </th>
                                    <td>
                                        @foreach($salidaCampo->empleados as $key => $empleado)
                                            <span class="label label-info">{{ $empleado->nombre }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.transporte_casa_aeropuerto') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $salidaCampo->transporte_casa_aeropuerto ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.transporte_11') }}
                                    </th>
                                    <td>
                                        {{ $salidaCampo->transporte_11 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.transporte_2') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $salidaCampo->transporte_2 ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.transporte_22') }}
                                    </th>
                                    <td>
                                        {{ $salidaCampo->transporte_22 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.transporte_3') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $salidaCampo->transporte_3 ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.transporte_4') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $salidaCampo->transporte_4 ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.transporte_5') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $salidaCampo->transporte_5 ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.detalle') }}
                                    </th>
                                    <td>
                                        {!! $salidaCampo->detalle !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.projecto') }}
                                    </th>
                                    <td>
                                        {{ $salidaCampo->projecto->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.proveedor') }}
                                    </th>
                                    <td>
                                        @foreach($salidaCampo->proveedors as $key => $proveedor)
                                            <span class="label label-info">{{ $proveedor->first_name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.salida-campos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#solicitud_salidascampoauditoria" aria-controls="solicitud_salidascampoauditoria" role="tab" data-toggle="tab">
                            {{ trans('cruds.salidascampoauditorium.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#solicitud_salidacampo_audis" aria-controls="solicitud_salidacampo_audis" role="tab" data-toggle="tab">
                            {{ trans('cruds.salidacampoAudi.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="solicitud_salidascampoauditoria">
                        @includeIf('admin.salidaCampos.relationships.solicitudSalidascampoauditoria', ['salidascampoauditoria' => $salidaCampo->solicitudSalidascampoauditoria])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="solicitud_salidacampo_audis">
                        @includeIf('admin.salidaCampos.relationships.solicitudSalidacampoAudis', ['salidacampoAudis' => $salidaCampo->solicitudSalidacampoAudis])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection