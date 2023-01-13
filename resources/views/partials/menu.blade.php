<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <select class="searchable-field form-control">

                </select>
            </li>
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="{{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.audit-logs.index") }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.auditLog.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('team_access')
                            <li class="{{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "active" : "" }}">
                                <a href="{{ route("admin.teams.index") }}">
                                    <i class="fa-fw fas fa-users">

                                    </i>
                                    <span>{{ trans('cruds.team.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('recursos_humano_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.recursosHumano.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('user_alert_access')
                            <li class="{{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                                <a href="{{ route("admin.user-alerts.index") }}">
                                    <i class="fa-fw fas fa-bell">

                                    </i>
                                    <span>{{ trans('cruds.userAlert.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('permiso_access')
                            <li class="{{ request()->is("admin/permisos") || request()->is("admin/permisos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permisos.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.permiso.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('vacacione_access')
                            <li class="{{ request()->is("admin/vacaciones") || request()->is("admin/vacaciones/*") ? "active" : "" }}">
                                <a href="{{ route("admin.vacaciones.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.vacacione.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('terminacion_contrato_access')
                            <li class="{{ request()->is("admin/terminacion-contratos") || request()->is("admin/terminacion-contratos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.terminacion-contratos.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.terminacionContrato.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('dotacion_access')
                            <li class="{{ request()->is("admin/dotacions") || request()->is("admin/dotacions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.dotacions.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.dotacion.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('certificacion_laboral_access')
                            <li class="{{ request()->is("admin/certificacion-laborals") || request()->is("admin/certificacion-laborals/*") ? "active" : "" }}">
                                <a href="{{ route("admin.certificacion-laborals.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.certificacionLaboral.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('salario_access')
                            <li class="{{ request()->is("admin/salarios") || request()->is("admin/salarios/*") ? "active" : "" }}">
                                <a href="{{ route("admin.salarios.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.salario.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('task_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-list">

                        </i>
                        <span>{{ trans('cruds.taskManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('task_status_access')
                            <li class="{{ request()->is("admin/task-statuses") || request()->is("admin/task-statuses/*") ? "active" : "" }}">
                                <a href="{{ route("admin.task-statuses.index") }}">
                                    <i class="fa-fw fas fa-server">

                                    </i>
                                    <span>{{ trans('cruds.taskStatus.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('task_tag_access')
                            <li class="{{ request()->is("admin/task-tags") || request()->is("admin/task-tags/*") ? "active" : "" }}">
                                <a href="{{ route("admin.task-tags.index") }}">
                                    <i class="fa-fw fas fa-server">

                                    </i>
                                    <span>{{ trans('cruds.taskTag.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('task_access')
                            <li class="{{ request()->is("admin/tasks") || request()->is("admin/tasks/*") ? "active" : "" }}">
                                <a href="{{ route("admin.tasks.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.task.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('tasks_calendar_access')
                            <li class="{{ request()->is("admin/tasks-calendars") || request()->is("admin/tasks-calendars/*") ? "active" : "" }}">
                                <a href="{{ route("admin.tasks-calendars.index") }}">
                                    <i class="fa-fw fas fa-calendar">

                                    </i>
                                    <span>{{ trans('cruds.tasksCalendar.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('datos_basico_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.datosBasico.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('estudio_access')
                            <li class="{{ request()->is("admin/estudios") || request()->is("admin/estudios/*") ? "active" : "" }}">
                                <a href="{{ route("admin.estudios.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.estudio.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('documentos_empleadoo_access')
                            <li class="{{ request()->is("admin/documentos-empleadoos") || request()->is("admin/documentos-empleadoos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.documentos-empleadoos.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.documentosEmpleadoo.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('contacto_de_emergencium_access')
                            <li class="{{ request()->is("admin/contacto-de-emergencia") || request()->is("admin/contacto-de-emergencia/*") ? "active" : "" }}">
                                <a href="{{ route("admin.contacto-de-emergencia.index") }}">
                                    <i class="fa-fw fas fa-address-book">

                                    </i>
                                    <span>{{ trans('cruds.contactoDeEmergencium.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('experiencia_laboral_access')
                            <li class="{{ request()->is("admin/experiencia-laborals") || request()->is("admin/experiencia-laborals/*") ? "active" : "" }}">
                                <a href="{{ route("admin.experiencia-laborals.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.experienciaLaboral.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('empleado_access')
                            <li class="{{ request()->is("admin/empleados") || request()->is("admin/empleados/*") ? "active" : "" }}">
                                <a href="{{ route("admin.empleados.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.empleado.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('gestion_sgi_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.gestionSgi.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('roles_sig_access')
                            <li class="{{ request()->is("admin/roles-sigs") || request()->is("admin/roles-sigs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles-sigs.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.rolesSig.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('gestion_cocolab_access')
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.gestionCocolab.title') }}</span>
                                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu">
                                    @can('cocolab_access')
                                        <li class="{{ request()->is("admin/cocolabs") || request()->is("admin/cocolabs/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.cocolabs.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.cocolab.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                    @can('expedientes_cocolab_access')
                                        <li class="{{ request()->is("admin/expedientes-cocolabs") || request()->is("admin/expedientes-cocolabs/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.expedientes-cocolabs.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.expedientesCocolab.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('copass_access')
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.copass.title') }}</span>
                                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu">
                                    @can('actividades_copa_access')
                                        <li class="{{ request()->is("admin/actividades-copas") || request()->is("admin/actividades-copas/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.actividades-copas.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.actividadesCopa.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('gestion_proceso_access')
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.gestionProceso.title') }}</span>
                                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu">
                                    @can('procedimiento_access')
                                        <li class="{{ request()->is("admin/procedimientos") || request()->is("admin/procedimientos/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.procedimientos.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.procedimiento.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                    @can('proceso_access')
                                        <li class="{{ request()->is("admin/procesos") || request()->is("admin/procesos/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.procesos.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.proceso.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('politica_access')
                            <li class="{{ request()->is("admin/politicas") || request()->is("admin/politicas/*") ? "active" : "" }}">
                                <a href="{{ route("admin.politicas.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.politica.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('gestion_documental_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.gestionDocumental.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('acta_juntum_access')
                            <li class="{{ request()->is("admin/acta-junta") || request()->is("admin/acta-junta/*") ? "active" : "" }}">
                                <a href="{{ route("admin.acta-junta.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.actaJuntum.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('listaasistencium_access')
                            <li class="{{ request()->is("admin/listaasistencia") || request()->is("admin/listaasistencia/*") ? "active" : "" }}">
                                <a href="{{ route("admin.listaasistencia.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.listaasistencium.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('actaentrega_access')
                            <li class="{{ request()->is("admin/actaentregas") || request()->is("admin/actaentregas/*") ? "active" : "" }}">
                                <a href="{{ route("admin.actaentregas.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.actaentrega.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('tipoentrega_access')
                            <li class="{{ request()->is("admin/tipoentregas") || request()->is("admin/tipoentregas/*") ? "active" : "" }}">
                                <a href="{{ route("admin.tipoentregas.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.tipoentrega.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('listadomaestro_access')
                            <li class="{{ request()->is("admin/listadomaestros") || request()->is("admin/listadomaestros/*") ? "active" : "" }}">
                                <a href="{{ route("admin.listadomaestros.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.listadomaestro.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('tipo_dedocumento_access')
                            <li class="{{ request()->is("admin/tipo-dedocumentos") || request()->is("admin/tipo-dedocumentos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.tipo-dedocumentos.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.tipoDedocumento.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('entrega_dotacion_access')
                            <li class="{{ request()->is("admin/entrega-dotacions") || request()->is("admin/entrega-dotacions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.entrega-dotacions.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.entregaDotacion.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('entregaequipo_access')
                            <li class="{{ request()->is("admin/entregaequipos") || request()->is("admin/entregaequipos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.entregaequipos.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.entregaequipo.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('entrega_epp_access')
                            <li class="{{ request()->is("admin/entrega-epps") || request()->is("admin/entrega-epps/*") ? "active" : "" }}">
                                <a href="{{ route("admin.entrega-epps.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.entregaEpp.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('gestion_administrativa_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.gestionAdministrativa.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('gestion_presupuesto_access')
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.gestionPresupuesto.title') }}</span>
                                    <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu">
                                    @can('presupuesto_access')
                                        <li class="{{ request()->is("admin/presupuestos") || request()->is("admin/presupuestos/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.presupuestos.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.presupuesto.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                    @can('presupuesto_item_access')
                                        <li class="{{ request()->is("admin/presupuesto-items") || request()->is("admin/presupuesto-items/*") ? "active" : "" }}">
                                            <a href="{{ route("admin.presupuesto-items.index") }}">
                                                <i class="fa-fw fas fa-cogs">

                                                </i>
                                                <span>{{ trans('cruds.presupuestoItem.title') }}</span>

                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('contrasena_access')
                            <li class="{{ request()->is("admin/contrasenas") || request()->is("admin/contrasenas/*") ? "active" : "" }}">
                                <a href="{{ route("admin.contrasenas.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.contrasena.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('gestion_de_auditorium_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.gestionDeAuditorium.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('decreto_ley_access')
                            <li class="{{ request()->is("admin/decreto-leys") || request()->is("admin/decreto-leys/*") ? "active" : "" }}">
                                <a href="{{ route("admin.decreto-leys.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.decretoLey.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('ruc_access')
                            <li class="{{ request()->is("admin/rucs") || request()->is("admin/rucs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.rucs.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.ruc.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('vacacionesauditorium_access')
                            <li class="{{ request()->is("admin/vacacionesauditoria") || request()->is("admin/vacacionesauditoria/*") ? "active" : "" }}">
                                <a href="{{ route("admin.vacacionesauditoria.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.vacacionesauditorium.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('salidascampoauditorium_access')
                            <li class="{{ request()->is("admin/salidascampoauditoria") || request()->is("admin/salidascampoauditoria/*") ? "active" : "" }}">
                                <a href="{{ route("admin.salidascampoauditoria.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.salidascampoauditorium.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('salidacampo_audi_access')
                            <li class="{{ request()->is("admin/salidacampo-audis") || request()->is("admin/salidacampo-audis/*") ? "active" : "" }}">
                                <a href="{{ route("admin.salidacampo-audis.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.salidacampoAudi.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('ods_compra_auditorium_access')
                            <li class="{{ request()->is("admin/ods-compra-auditoria") || request()->is("admin/ods-compra-auditoria/*") ? "active" : "" }}">
                                <a href="{{ route("admin.ods-compra-auditoria.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.odsCompraAuditorium.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('seleccion_proveedor_access')
                            <li class="{{ request()->is("admin/seleccion-proveedors") || request()->is("admin/seleccion-proveedors/*") ? "active" : "" }}">
                                <a href="{{ route("admin.seleccion-proveedors.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.seleccionProveedor.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('ingesos_geopark_access')
                            <li class="{{ request()->is("admin/ingesos-geoparks") || request()->is("admin/ingesos-geoparks/*") ? "active" : "" }}">
                                <a href="{{ route("admin.ingesos-geoparks.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.ingesosGeopark.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('basic_c_r_m_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-briefcase">

                        </i>
                        <span>{{ trans('cruds.basicCRM.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('crm_status_access')
                            <li class="{{ request()->is("admin/crm-statuses") || request()->is("admin/crm-statuses/*") ? "active" : "" }}">
                                <a href="{{ route("admin.crm-statuses.index") }}">
                                    <i class="fa-fw fas fa-folder">

                                    </i>
                                    <span>{{ trans('cruds.crmStatus.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('crm_customer_access')
                            <li class="{{ request()->is("admin/crm-customers") || request()->is("admin/crm-customers/*") ? "active" : "" }}">
                                <a href="{{ route("admin.crm-customers.index") }}">
                                    <i class="fa-fw fas fa-user-plus">

                                    </i>
                                    <span>{{ trans('cruds.crmCustomer.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('crm_note_access')
                            <li class="{{ request()->is("admin/crm-notes") || request()->is("admin/crm-notes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.crm-notes.index") }}">
                                    <i class="fa-fw fas fa-sticky-note">

                                    </i>
                                    <span>{{ trans('cruds.crmNote.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('crm_document_access')
                            <li class="{{ request()->is("admin/crm-documents") || request()->is("admin/crm-documents/*") ? "active" : "" }}">
                                <a href="{{ route("admin.crm-documents.index") }}">
                                    <i class="fa-fw fas fa-folder">

                                    </i>
                                    <span>{{ trans('cruds.crmDocument.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('product_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-shopping-cart">

                        </i>
                        <span>{{ trans('cruds.productManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('product_category_access')
                            <li class="{{ request()->is("admin/product-categories") || request()->is("admin/product-categories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.product-categories.index") }}">
                                    <i class="fa-fw fas fa-folder">

                                    </i>
                                    <span>{{ trans('cruds.productCategory.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('product_tag_access')
                            <li class="{{ request()->is("admin/product-tags") || request()->is("admin/product-tags/*") ? "active" : "" }}">
                                <a href="{{ route("admin.product-tags.index") }}">
                                    <i class="fa-fw fas fa-folder">

                                    </i>
                                    <span>{{ trans('cruds.productTag.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('product_access')
                            <li class="{{ request()->is("admin/products") || request()->is("admin/products/*") ? "active" : "" }}">
                                <a href="{{ route("admin.products.index") }}">
                                    <i class="fa-fw fas fa-shopping-cart">

                                    </i>
                                    <span>{{ trans('cruds.product.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('asset_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-book">

                        </i>
                        <span>{{ trans('cruds.assetManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('asset_category_access')
                            <li class="{{ request()->is("admin/asset-categories") || request()->is("admin/asset-categories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.asset-categories.index") }}">
                                    <i class="fa-fw fas fa-tags">

                                    </i>
                                    <span>{{ trans('cruds.assetCategory.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('asset_location_access')
                            <li class="{{ request()->is("admin/asset-locations") || request()->is("admin/asset-locations/*") ? "active" : "" }}">
                                <a href="{{ route("admin.asset-locations.index") }}">
                                    <i class="fa-fw fas fa-map-marker">

                                    </i>
                                    <span>{{ trans('cruds.assetLocation.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('asset_status_access')
                            <li class="{{ request()->is("admin/asset-statuses") || request()->is("admin/asset-statuses/*") ? "active" : "" }}">
                                <a href="{{ route("admin.asset-statuses.index") }}">
                                    <i class="fa-fw fas fa-server">

                                    </i>
                                    <span>{{ trans('cruds.assetStatus.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('asset_access')
                            <li class="{{ request()->is("admin/assets") || request()->is("admin/assets/*") ? "active" : "" }}">
                                <a href="{{ route("admin.assets.index") }}">
                                    <i class="fa-fw fas fa-book">

                                    </i>
                                    <span>{{ trans('cruds.asset.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('assets_history_access')
                            <li class="{{ request()->is("admin/assets-histories") || request()->is("admin/assets-histories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.assets-histories.index") }}">
                                    <i class="fa-fw fas fa-th-list">

                                    </i>
                                    <span>{{ trans('cruds.assetsHistory.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('mantenimiento_access')
                            <li class="{{ request()->is("admin/mantenimientos") || request()->is("admin/mantenimientos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.mantenimientos.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.mantenimiento.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('expense_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-money-bill">

                        </i>
                        <span>{{ trans('cruds.expenseManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('expense_category_access')
                            <li class="{{ request()->is("admin/expense-categories") || request()->is("admin/expense-categories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.expense-categories.index") }}">
                                    <i class="fa-fw fas fa-list">

                                    </i>
                                    <span>{{ trans('cruds.expenseCategory.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('income_category_access')
                            <li class="{{ request()->is("admin/income-categories") || request()->is("admin/income-categories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.income-categories.index") }}">
                                    <i class="fa-fw fas fa-list">

                                    </i>
                                    <span>{{ trans('cruds.incomeCategory.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('expense_access')
                            <li class="{{ request()->is("admin/expenses") || request()->is("admin/expenses/*") ? "active" : "" }}">
                                <a href="{{ route("admin.expenses.index") }}">
                                    <i class="fa-fw fas fa-arrow-circle-right">

                                    </i>
                                    <span>{{ trans('cruds.expense.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('income_access')
                            <li class="{{ request()->is("admin/incomes") || request()->is("admin/incomes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.incomes.index") }}">
                                    <i class="fa-fw fas fa-arrow-circle-right">

                                    </i>
                                    <span>{{ trans('cruds.income.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('expense_report_access')
                            <li class="{{ request()->is("admin/expense-reports") || request()->is("admin/expense-reports/*") ? "active" : "" }}">
                                <a href="{{ route("admin.expense-reports.index") }}">
                                    <i class="fa-fw fas fa-chart-line">

                                    </i>
                                    <span>{{ trans('cruds.expenseReport.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('impuesto_access')
                            <li class="{{ request()->is("admin/impuestos") || request()->is("admin/impuestos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.impuestos.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.impuesto.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('contact_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-phone-square">

                        </i>
                        <span>{{ trans('cruds.contactManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('contact_company_access')
                            <li class="{{ request()->is("admin/contact-companies") || request()->is("admin/contact-companies/*") ? "active" : "" }}">
                                <a href="{{ route("admin.contact-companies.index") }}">
                                    <i class="fa-fw fas fa-building">

                                    </i>
                                    <span>{{ trans('cruds.contactCompany.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('contact_contact_access')
                            <li class="{{ request()->is("admin/contact-contacts") || request()->is("admin/contact-contacts/*") ? "active" : "" }}">
                                <a href="{{ route("admin.contact-contacts.index") }}">
                                    <i class="fa-fw fas fa-user-plus">

                                    </i>
                                    <span>{{ trans('cruds.contactContact.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('client_management_setting_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cog">

                        </i>
                        <span>{{ trans('cruds.clientManagementSetting.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('currency_access')
                            <li class="{{ request()->is("admin/currencies") || request()->is("admin/currencies/*") ? "active" : "" }}">
                                <a href="{{ route("admin.currencies.index") }}">
                                    <i class="fa-fw fas fa-money-bill">

                                    </i>
                                    <span>{{ trans('cruds.currency.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('transaction_type_access')
                            <li class="{{ request()->is("admin/transaction-types") || request()->is("admin/transaction-types/*") ? "active" : "" }}">
                                <a href="{{ route("admin.transaction-types.index") }}">
                                    <i class="fa-fw fas fa-money-check">

                                    </i>
                                    <span>{{ trans('cruds.transactionType.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('income_source_access')
                            <li class="{{ request()->is("admin/income-sources") || request()->is("admin/income-sources/*") ? "active" : "" }}">
                                <a href="{{ route("admin.income-sources.index") }}">
                                    <i class="fa-fw fas fa-database">

                                    </i>
                                    <span>{{ trans('cruds.incomeSource.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('client_status_access')
                            <li class="{{ request()->is("admin/client-statuses") || request()->is("admin/client-statuses/*") ? "active" : "" }}">
                                <a href="{{ route("admin.client-statuses.index") }}">
                                    <i class="fa-fw fas fa-server">

                                    </i>
                                    <span>{{ trans('cruds.clientStatus.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('project_status_access')
                            <li class="{{ request()->is("admin/project-statuses") || request()->is("admin/project-statuses/*") ? "active" : "" }}">
                                <a href="{{ route("admin.project-statuses.index") }}">
                                    <i class="fa-fw fas fa-server">

                                    </i>
                                    <span>{{ trans('cruds.projectStatus.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('client_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-briefcase">

                        </i>
                        <span>{{ trans('cruds.clientManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('salida_campo_access')
                            <li class="{{ request()->is("admin/salida-campos") || request()->is("admin/salida-campos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.salida-campos.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.salidaCampo.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('client_access')
                            <li class="{{ request()->is("admin/clients") || request()->is("admin/clients/*") ? "active" : "" }}">
                                <a href="{{ route("admin.clients.index") }}">
                                    <i class="fa-fw fas fa-user-plus">

                                    </i>
                                    <span>{{ trans('cruds.client.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('project_access')
                            <li class="{{ request()->is("admin/projects") || request()->is("admin/projects/*") ? "active" : "" }}">
                                <a href="{{ route("admin.projects.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.project.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('note_access')
                            <li class="{{ request()->is("admin/notes") || request()->is("admin/notes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.notes.index") }}">
                                    <i class="fa-fw fas fa-sticky-note">

                                    </i>
                                    <span>{{ trans('cruds.note.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('document_access')
                            <li class="{{ request()->is("admin/documents") || request()->is("admin/documents/*") ? "active" : "" }}">
                                <a href="{{ route("admin.documents.index") }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.document.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('transaction_access')
                            <li class="{{ request()->is("admin/transactions") || request()->is("admin/transactions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.transactions.index") }}">
                                    <i class="fa-fw fas fa-credit-card">

                                    </i>
                                    <span>{{ trans('cruds.transaction.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('client_report_access')
                            <li class="{{ request()->is("admin/client-reports") || request()->is("admin/client-reports/*") ? "active" : "" }}">
                                <a href="{{ route("admin.client-reports.index") }}">
                                    <i class="fa-fw fas fa-chart-line">

                                    </i>
                                    <span>{{ trans('cruds.clientReport.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('actainicioproyecto_access')
                            <li class="{{ request()->is("admin/actainicioproyectos") || request()->is("admin/actainicioproyectos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.actainicioproyectos.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.actainicioproyecto.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('actacierreproyecto_access')
                            <li class="{{ request()->is("admin/actacierreproyectos") || request()->is("admin/actacierreproyectos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.actacierreproyectos.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.actacierreproyecto.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('time_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-clock">

                        </i>
                        <span>{{ trans('cruds.timeManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('time_work_type_access')
                            <li class="{{ request()->is("admin/time-work-types") || request()->is("admin/time-work-types/*") ? "active" : "" }}">
                                <a href="{{ route("admin.time-work-types.index") }}">
                                    <i class="fa-fw fas fa-th">

                                    </i>
                                    <span>{{ trans('cruds.timeWorkType.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('time_project_access')
                            <li class="{{ request()->is("admin/time-projects") || request()->is("admin/time-projects/*") ? "active" : "" }}">
                                <a href="{{ route("admin.time-projects.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.timeProject.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('time_entry_access')
                            <li class="{{ request()->is("admin/time-entries") || request()->is("admin/time-entries/*") ? "active" : "" }}">
                                <a href="{{ route("admin.time-entries.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.timeEntry.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('time_report_access')
                            <li class="{{ request()->is("admin/time-reports") || request()->is("admin/time-reports/*") ? "active" : "" }}">
                                <a href="{{ route("admin.time-reports.index") }}">
                                    <i class="fa-fw fas fa-chart-line">

                                    </i>
                                    <span>{{ trans('cruds.timeReport.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('capacitacione_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.capacitacione.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('course_access')
                            <li class="{{ request()->is("admin/courses") || request()->is("admin/courses/*") ? "active" : "" }}">
                                <a href="{{ route("admin.courses.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.course.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('lesson_access')
                            <li class="{{ request()->is("admin/lessons") || request()->is("admin/lessons/*") ? "active" : "" }}">
                                <a href="{{ route("admin.lessons.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.lesson.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('test_access')
                            <li class="{{ request()->is("admin/tests") || request()->is("admin/tests/*") ? "active" : "" }}">
                                <a href="{{ route("admin.tests.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.test.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('question_access')
                            <li class="{{ request()->is("admin/questions") || request()->is("admin/questions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.questions.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.question.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('question_option_access')
                            <li class="{{ request()->is("admin/question-options") || request()->is("admin/question-options/*") ? "active" : "" }}">
                                <a href="{{ route("admin.question-options.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.questionOption.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('test_result_access')
                            <li class="{{ request()->is("admin/test-results") || request()->is("admin/test-results/*") ? "active" : "" }}">
                                <a href="{{ route("admin.test-results.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.testResult.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('test_answer_access')
                            <li class="{{ request()->is("admin/test-answers") || request()->is("admin/test-answers/*") ? "active" : "" }}">
                                <a href="{{ route("admin.test-answers.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.testAnswer.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <li class="{{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "active" : "" }}">
                <a href="{{ route("admin.systemCalendar") }}">
                    <i class="fas fa-fw fa-calendar">

                    </i>
                    <span>{{ trans('global.systemCalendar') }}</span>
                </a>
            </li>
            @php($unread = \App\Models\QaTopic::unreadCount())
                <li class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }}">
                    <a href="{{ route("admin.messenger.index") }}">
                        <i class="fa-fw fa fa-envelope">

                        </i>
                        <span>{{ trans('global.messages') }}</span>
                        @if($unread > 0)
                            <strong>( {{ $unread }} )</strong>
                        @endif

                    </a>
                </li>
                @if(\Illuminate\Support\Facades\Schema::hasColumn('teams', 'owner_id') && \App\Models\Team::where('owner_id', auth()->user()->id)->exists())
                    <li class="nav-item">
                        <a class="{{ request()->is("admin/team-members") || request()->is("admin/team-members/*") ? "active" : "" }}" href="{{ route("admin.team-members.index") }}">
                            <i class="fa-fw fa fa-users">
                            </i>
                            <span>{{ trans("global.team-members") }}</span>
                        </a>
                    </li>
                @endif
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                            <a href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key">
                                </i>
                                {{ trans('global.change_password') }}
                            </a>
                        </li>
                    @endcan
                @endif
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i class="fas fa-fw fa-sign-out-alt">

                        </i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
        </ul>
    </section>
</aside>