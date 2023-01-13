@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.actaentrega.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.actaentregas.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaentrega.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $actaentrega->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaentrega.fields.fecha') }}
                                    </th>
                                    <td>
                                        {{ $actaentrega->fecha }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaentrega.fields.tipo_de_entrega') }}
                                    </th>
                                    <td>
                                        @foreach($actaentrega->tipo_de_entregas as $key => $tipo_de_entrega)
                                            <span class="label label-info">{{ $tipo_de_entrega->nombre }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaentrega.fields.ciudad') }}
                                    </th>
                                    <td>
                                        {{ $actaentrega->ciudad }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaentrega.fields.modalidad') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Actaentrega::MODALIDAD_RADIO[$actaentrega->modalidad] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaentrega.fields.gestion') }}
                                    </th>
                                    <td>
                                        @foreach($actaentrega->gestions as $key => $gestion)
                                            <span class="label label-info">{{ $gestion->nombre }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaentrega.fields.observaciones') }}
                                    </th>
                                    <td>
                                        {!! $actaentrega->observaciones !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaentrega.fields.responsabilidades') }}
                                    </th>
                                    <td>
                                        {!! $actaentrega->responsabilidades !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaentrega.fields.elaboro') }}
                                    </th>
                                    <td>
                                        {{ $actaentrega->elaboro->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaentrega.fields.recibe') }}
                                    </th>
                                    <td>
                                        {{ $actaentrega->recibe->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaentrega.fields.anexo') }}
                                    </th>
                                    <td>
                                        @if($actaentrega->anexo)
                                            <a href="{{ $actaentrega->anexo->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.actaentregas.index') }}">
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
                        <a href="#acta_decreto_leys" aria-controls="acta_decreto_leys" role="tab" data-toggle="tab">
                            {{ trans('cruds.decretoLey.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#acta_rucs" aria-controls="acta_rucs" role="tab" data-toggle="tab">
                            {{ trans('cruds.ruc.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#actas_de_entrega_empleados" aria-controls="actas_de_entrega_empleados" role="tab" data-toggle="tab">
                            {{ trans('cruds.empleado.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="acta_decreto_leys">
                        @includeIf('admin.actaentregas.relationships.actaDecretoLeys', ['decretoLeys' => $actaentrega->actaDecretoLeys])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="acta_rucs">
                        @includeIf('admin.actaentregas.relationships.actaRucs', ['rucs' => $actaentrega->actaRucs])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="actas_de_entrega_empleados">
                        @includeIf('admin.actaentregas.relationships.actasDeEntregaEmpleados', ['empleados' => $actaentrega->actasDeEntregaEmpleados])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection