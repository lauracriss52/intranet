@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.listaasistencium.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.listaasistencia.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listaasistencium.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $listaasistencium->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listaasistencium.fields.fecha') }}
                                    </th>
                                    <td>
                                        {{ $listaasistencium->fecha }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listaasistencium.fields.hora_inicio') }}
                                    </th>
                                    <td>
                                        {{ $listaasistencium->hora_inicio }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listaasistencium.fields.hora_final') }}
                                    </th>
                                    <td>
                                        {{ $listaasistencium->hora_final }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listaasistencium.fields.temas_a_tratar') }}
                                    </th>
                                    <td>
                                        {!! $listaasistencium->temas_a_tratar !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listaasistencium.fields.proceso') }}
                                    </th>
                                    <td>
                                        {{ $listaasistencium->proceso->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listaasistencium.fields.modalidad') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Listaasistencium::MODALIDAD_RADIO[$listaasistencium->modalidad] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listaasistencium.fields.elaboro') }}
                                    </th>
                                    <td>
                                        {{ $listaasistencium->elaboro->nombre ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.listaasistencia.index') }}">
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
                        <a href="#lista_de_asistencia_actividades_copas" aria-controls="lista_de_asistencia_actividades_copas" role="tab" data-toggle="tab">
                            {{ trans('cruds.actividadesCopa.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#lista_asistencia_decreto_leys" aria-controls="lista_asistencia_decreto_leys" role="tab" data-toggle="tab">
                            {{ trans('cruds.decretoLey.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#lista_asistencia_rucs" aria-controls="lista_asistencia_rucs" role="tab" data-toggle="tab">
                            {{ trans('cruds.ruc.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#lista_asistencia_empleados" aria-controls="lista_asistencia_empleados" role="tab" data-toggle="tab">
                            {{ trans('cruds.empleado.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="lista_de_asistencia_actividades_copas">
                        @includeIf('admin.listaasistencia.relationships.listaDeAsistenciaActividadesCopas', ['actividadesCopas' => $listaasistencium->listaDeAsistenciaActividadesCopas])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="lista_asistencia_decreto_leys">
                        @includeIf('admin.listaasistencia.relationships.listaAsistenciaDecretoLeys', ['decretoLeys' => $listaasistencium->listaAsistenciaDecretoLeys])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="lista_asistencia_rucs">
                        @includeIf('admin.listaasistencia.relationships.listaAsistenciaRucs', ['rucs' => $listaasistencium->listaAsistenciaRucs])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="lista_asistencia_empleados">
                        @includeIf('admin.listaasistencia.relationships.listaAsistenciaEmpleados', ['empleados' => $listaasistencium->listaAsistenciaEmpleados])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection