@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.salario.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.salarios.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salario.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $salario->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salario.fields.salario') }}
                                    </th>
                                    <td>
                                        {{ $salario->salario }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salario.fields.fecha') }}
                                    </th>
                                    <td>
                                        {{ $salario->fecha }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.salarios.index') }}">
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
                        <a href="#asignacion_salarial_empleados" aria-controls="asignacion_salarial_empleados" role="tab" data-toggle="tab">
                            {{ trans('cruds.empleado.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#salario_certificacion_laborals" aria-controls="salario_certificacion_laborals" role="tab" data-toggle="tab">
                            {{ trans('cruds.certificacionLaboral.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="asignacion_salarial_empleados">
                        @includeIf('admin.salarios.relationships.asignacionSalarialEmpleados', ['empleados' => $salario->asignacionSalarialEmpleados])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="salario_certificacion_laborals">
                        @includeIf('admin.salarios.relationships.salarioCertificacionLaborals', ['certificacionLaborals' => $salario->salarioCertificacionLaborals])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection