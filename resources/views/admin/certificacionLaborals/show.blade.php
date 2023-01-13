@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.certificacionLaboral.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.certificacion-laborals.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.certificacionLaboral.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $certificacionLaboral->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.certificacionLaboral.fields.fecha') }}
                                    </th>
                                    <td>
                                        {{ $certificacionLaboral->fecha }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.certificacionLaboral.fields.empleado') }}
                                    </th>
                                    <td>
                                        {{ $certificacionLaboral->empleado->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.certificacionLaboral.fields.salario') }}
                                    </th>
                                    <td>
                                        {{ $certificacionLaboral->salario->salario ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.certificacion-laborals.index') }}">
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
                        <a href="#certificacion_laboral_empleados" aria-controls="certificacion_laboral_empleados" role="tab" data-toggle="tab">
                            {{ trans('cruds.empleado.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="certificacion_laboral_empleados">
                        @includeIf('admin.certificacionLaborals.relationships.certificacionLaboralEmpleados', ['empleados' => $certificacionLaboral->certificacionLaboralEmpleados])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection