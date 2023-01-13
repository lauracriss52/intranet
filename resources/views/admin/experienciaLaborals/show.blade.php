@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.experienciaLaboral.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.experiencia-laborals.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.experienciaLaboral.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $experienciaLaboral->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.experienciaLaboral.fields.empresa') }}
                                    </th>
                                    <td>
                                        {{ $experienciaLaboral->empresa }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.experienciaLaboral.fields.fecha_de_inicio') }}
                                    </th>
                                    <td>
                                        {{ $experienciaLaboral->fecha_de_inicio }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.experienciaLaboral.fields.fecha_fin') }}
                                    </th>
                                    <td>
                                        {{ $experienciaLaboral->fecha_fin }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.experienciaLaboral.fields.correo_telefono') }}
                                    </th>
                                    <td>
                                        {{ $experienciaLaboral->correo_telefono }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.experienciaLaboral.fields.ubicacion') }}
                                    </th>
                                    <td>
                                        {{ $experienciaLaboral->ubicacion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.experienciaLaboral.fields.cargo_desempenado') }}
                                    </th>
                                    <td>
                                        {{ $experienciaLaboral->cargo_desempenado }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.experienciaLaboral.fields.tareas') }}
                                    </th>
                                    <td>
                                        {{ $experienciaLaboral->tareas }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.experiencia-laborals.index') }}">
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
                        <a href="#experiencia_laboral_empleados" aria-controls="experiencia_laboral_empleados" role="tab" data-toggle="tab">
                            {{ trans('cruds.empleado.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="experiencia_laboral_empleados">
                        @includeIf('admin.experienciaLaborals.relationships.experienciaLaboralEmpleados', ['empleados' => $experienciaLaboral->experienciaLaboralEmpleados])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection