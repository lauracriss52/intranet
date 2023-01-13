@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.empleado.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.empleados.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.empleado.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $empleado->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.empleado.fields.nombre') }}
                                    </th>
                                    <td>
                                        {{ $empleado->nombre }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.empleado.fields.estudios') }}
                                    </th>
                                    <td>
                                        @foreach($empleado->estudios as $key => $estudios)
                                            <span class="label label-info">{{ $estudios->titulo_adquirido }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.empleado.fields.cedula') }}
                                    </th>
                                    <td>
                                        {{ $empleado->cedula }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.empleado.fields.telefono') }}
                                    </th>
                                    <td>
                                        {{ $empleado->telefono }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.empleado.fields.ciudadcedula') }}
                                    </th>
                                    <td>
                                        {{ $empleado->ciudadcedula }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.empleado.fields.direccion') }}
                                    </th>
                                    <td>
                                        {{ $empleado->direccion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.empleado.fields.documentos_relacionados') }}
                                    </th>
                                    <td>
                                        @foreach($empleado->documentos_relacionados as $key => $documentos_relacionados)
                                            <span class="label label-info">{{ $documentos_relacionados->tipo_de_documento }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.empleado.fields.contactos_de_emergencia') }}
                                    </th>
                                    <td>
                                        @foreach($empleado->contactos_de_emergencias as $key => $contactos_de_emergencia)
                                            <span class="label label-info">{{ $contactos_de_emergencia->nombre }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.empleado.fields.experiencia_laboral') }}
                                    </th>
                                    <td>
                                        @foreach($empleado->experiencia_laborals as $key => $experiencia_laboral)
                                            <span class="label label-info">{{ $experiencia_laboral->cargo_desempenado }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.empleado.fields.actas_de_entrega') }}
                                    </th>
                                    <td>
                                        @foreach($empleado->actas_de_entregas as $key => $actas_de_entrega)
                                            <span class="label label-info">{{ $actas_de_entrega->fecha }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.empleado.fields.lista_asistencia') }}
                                    </th>
                                    <td>
                                        @foreach($empleado->lista_asistencias as $key => $lista_asistencia)
                                            <span class="label label-info">{{ $lista_asistencia->fecha }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.empleado.fields.entrega_dotacion') }}
                                    </th>
                                    <td>
                                        @foreach($empleado->entrega_dotacions as $key => $entrega_dotacion)
                                            <span class="label label-info">{{ $entrega_dotacion->cantidad }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.empleado.fields.cargo') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Empleado::CARGO_SELECT[$empleado->cargo] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.empleado.fields.fecha_de_ingreso') }}
                                    </th>
                                    <td>
                                        {{ $empleado->fecha_de_ingreso }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.empleado.fields.tipo_contrato') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Empleado::TIPO_CONTRATO_SELECT[$empleado->tipo_contrato] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.empleado.fields.asignacion_salarial') }}
                                    </th>
                                    <td>
                                        {{ $empleado->asignacion_salarial->salario ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.empleado.fields.certificacion_laboral') }}
                                    </th>
                                    <td>
                                        {{ $empleado->certificacion_laboral->fecha ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.empleados.index') }}">
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
                        <a href="#secretario_roles_sigs" aria-controls="secretario_roles_sigs" role="tab" data-toggle="tab">
                            {{ trans('cruds.rolesSig.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#secretario_suplente_roles_sigs" aria-controls="secretario_suplente_roles_sigs" role="tab" data-toggle="tab">
                            {{ trans('cruds.rolesSig.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#empleado_terminacion_contratos" aria-controls="empleado_terminacion_contratos" role="tab" data-toggle="tab">
                            {{ trans('cruds.terminacionContrato.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#elaboro_acta_junta" aria-controls="elaboro_acta_junta" role="tab" data-toggle="tab">
                            {{ trans('cruds.actaJuntum.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#elaboro_listaasistencia" aria-controls="elaboro_listaasistencia" role="tab" data-toggle="tab">
                            {{ trans('cruds.listaasistencium.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#elaboro_actaentregas" aria-controls="elaboro_actaentregas" role="tab" data-toggle="tab">
                            {{ trans('cruds.actaentrega.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#recibe_actaentregas" aria-controls="recibe_actaentregas" role="tab" data-toggle="tab">
                            {{ trans('cruds.actaentrega.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#empleado_certificacion_laborals" aria-controls="empleado_certificacion_laborals" role="tab" data-toggle="tab">
                            {{ trans('cruds.certificacionLaboral.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#administrador_actacierreproyectos" aria-controls="administrador_actacierreproyectos" role="tab" data-toggle="tab">
                            {{ trans('cruds.actacierreproyecto.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#empleado_salida_campos" aria-controls="empleado_salida_campos" role="tab" data-toggle="tab">
                            {{ trans('cruds.salidaCampo.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#empleado_cocolabs" aria-controls="empleado_cocolabs" role="tab" data-toggle="tab">
                            {{ trans('cruds.cocolab.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#presidente_roles_sigs" aria-controls="presidente_roles_sigs" role="tab" data-toggle="tab">
                            {{ trans('cruds.rolesSig.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#empleado_actividades_copas" aria-controls="empleado_actividades_copas" role="tab" data-toggle="tab">
                            {{ trans('cruds.actividadesCopa.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#asistentes_acta_junta" aria-controls="asistentes_acta_junta" role="tab" data-toggle="tab">
                            {{ trans('cruds.actaJuntum.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#aprobado_actainicioproyectos" aria-controls="aprobado_actainicioproyectos" role="tab" data-toggle="tab">
                            {{ trans('cruds.actainicioproyecto.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#aprobado_actacierreproyectos" aria-controls="aprobado_actacierreproyectos" role="tab" data-toggle="tab">
                            {{ trans('cruds.actacierreproyecto.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="secretario_roles_sigs">
                        @includeIf('admin.empleados.relationships.secretarioRolesSigs', ['rolesSigs' => $empleado->secretarioRolesSigs])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="secretario_suplente_roles_sigs">
                        @includeIf('admin.empleados.relationships.secretarioSuplenteRolesSigs', ['rolesSigs' => $empleado->secretarioSuplenteRolesSigs])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="empleado_terminacion_contratos">
                        @includeIf('admin.empleados.relationships.empleadoTerminacionContratos', ['terminacionContratos' => $empleado->empleadoTerminacionContratos])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="elaboro_acta_junta">
                        @includeIf('admin.empleados.relationships.elaboroActaJunta', ['actaJunta' => $empleado->elaboroActaJunta])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="elaboro_listaasistencia">
                        @includeIf('admin.empleados.relationships.elaboroListaasistencia', ['listaasistencia' => $empleado->elaboroListaasistencia])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="elaboro_actaentregas">
                        @includeIf('admin.empleados.relationships.elaboroActaentregas', ['actaentregas' => $empleado->elaboroActaentregas])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="recibe_actaentregas">
                        @includeIf('admin.empleados.relationships.recibeActaentregas', ['actaentregas' => $empleado->recibeActaentregas])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="empleado_certificacion_laborals">
                        @includeIf('admin.empleados.relationships.empleadoCertificacionLaborals', ['certificacionLaborals' => $empleado->empleadoCertificacionLaborals])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="administrador_actacierreproyectos">
                        @includeIf('admin.empleados.relationships.administradorActacierreproyectos', ['actacierreproyectos' => $empleado->administradorActacierreproyectos])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="empleado_salida_campos">
                        @includeIf('admin.empleados.relationships.empleadoSalidaCampos', ['salidaCampos' => $empleado->empleadoSalidaCampos])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="empleado_cocolabs">
                        @includeIf('admin.empleados.relationships.empleadoCocolabs', ['cocolabs' => $empleado->empleadoCocolabs])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="presidente_roles_sigs">
                        @includeIf('admin.empleados.relationships.presidenteRolesSigs', ['rolesSigs' => $empleado->presidenteRolesSigs])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="empleado_actividades_copas">
                        @includeIf('admin.empleados.relationships.empleadoActividadesCopas', ['actividadesCopas' => $empleado->empleadoActividadesCopas])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="asistentes_acta_junta">
                        @includeIf('admin.empleados.relationships.asistentesActaJunta', ['actaJunta' => $empleado->asistentesActaJunta])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="aprobado_actainicioproyectos">
                        @includeIf('admin.empleados.relationships.aprobadoActainicioproyectos', ['actainicioproyectos' => $empleado->aprobadoActainicioproyectos])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="aprobado_actacierreproyectos">
                        @includeIf('admin.empleados.relationships.aprobadoActacierreproyectos', ['actacierreproyectos' => $empleado->aprobadoActacierreproyectos])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection