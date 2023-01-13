@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.proceso.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.procesos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.proceso.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $proceso->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.proceso.fields.procedimiento') }}
                                    </th>
                                    <td>
                                        @foreach($proceso->procedimientos as $key => $procedimiento)
                                            <span class="label label-info">{{ $procedimiento->codigo }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.proceso.fields.nombre') }}
                                    </th>
                                    <td>
                                        {{ $proceso->nombre }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.proceso.fields.lider_del_proceso') }}
                                    </th>
                                    <td>
                                        {{ $proceso->lider_del_proceso }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.procesos.index') }}">
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
                        <a href="#proceso_acta_junta" aria-controls="proceso_acta_junta" role="tab" data-toggle="tab">
                            {{ trans('cruds.actaJuntum.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#proceso_presupuestos" aria-controls="proceso_presupuestos" role="tab" data-toggle="tab">
                            {{ trans('cruds.presupuesto.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#proceso_listaasistencia" aria-controls="proceso_listaasistencia" role="tab" data-toggle="tab">
                            {{ trans('cruds.listaasistencium.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#proceso_listadomaestros" aria-controls="proceso_listadomaestros" role="tab" data-toggle="tab">
                            {{ trans('cruds.listadomaestro.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#proceso_decreto_leys" aria-controls="proceso_decreto_leys" role="tab" data-toggle="tab">
                            {{ trans('cruds.decretoLey.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#proceso_rucs" aria-controls="proceso_rucs" role="tab" data-toggle="tab">
                            {{ trans('cruds.ruc.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#proceso_presupuesto_items" aria-controls="proceso_presupuesto_items" role="tab" data-toggle="tab">
                            {{ trans('cruds.presupuestoItem.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#gestion_actaentregas" aria-controls="gestion_actaentregas" role="tab" data-toggle="tab">
                            {{ trans('cruds.actaentrega.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="proceso_acta_junta">
                        @includeIf('admin.procesos.relationships.procesoActaJunta', ['actaJunta' => $proceso->procesoActaJunta])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="proceso_presupuestos">
                        @includeIf('admin.procesos.relationships.procesoPresupuestos', ['presupuestos' => $proceso->procesoPresupuestos])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="proceso_listaasistencia">
                        @includeIf('admin.procesos.relationships.procesoListaasistencia', ['listaasistencia' => $proceso->procesoListaasistencia])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="proceso_listadomaestros">
                        @includeIf('admin.procesos.relationships.procesoListadomaestros', ['listadomaestros' => $proceso->procesoListadomaestros])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="proceso_decreto_leys">
                        @includeIf('admin.procesos.relationships.procesoDecretoLeys', ['decretoLeys' => $proceso->procesoDecretoLeys])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="proceso_rucs">
                        @includeIf('admin.procesos.relationships.procesoRucs', ['rucs' => $proceso->procesoRucs])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="proceso_presupuesto_items">
                        @includeIf('admin.procesos.relationships.procesoPresupuestoItems', ['presupuestoItems' => $proceso->procesoPresupuestoItems])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="gestion_actaentregas">
                        @includeIf('admin.procesos.relationships.gestionActaentregas', ['actaentregas' => $proceso->gestionActaentregas])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection