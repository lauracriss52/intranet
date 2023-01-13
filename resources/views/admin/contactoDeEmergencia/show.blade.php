@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.contactoDeEmergencium.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.contacto-de-emergencia.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactoDeEmergencium.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $contactoDeEmergencium->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactoDeEmergencium.fields.nombre') }}
                                    </th>
                                    <td>
                                        {{ $contactoDeEmergencium->nombre }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactoDeEmergencium.fields.relacion') }}
                                    </th>
                                    <td>
                                        {{ $contactoDeEmergencium->relacion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactoDeEmergencium.fields.telefono') }}
                                    </th>
                                    <td>
                                        {{ $contactoDeEmergencium->telefono }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.contacto-de-emergencia.index') }}">
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
                        <a href="#contactos_de_emergencia_empleados" aria-controls="contactos_de_emergencia_empleados" role="tab" data-toggle="tab">
                            {{ trans('cruds.empleado.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="contactos_de_emergencia_empleados">
                        @includeIf('admin.contactoDeEmergencia.relationships.contactosDeEmergenciaEmpleados', ['empleados' => $contactoDeEmergencium->contactosDeEmergenciaEmpleados])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection