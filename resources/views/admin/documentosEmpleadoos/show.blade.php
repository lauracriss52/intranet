@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.documentosEmpleadoo.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.documentos-empleadoos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.documentosEmpleadoo.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $documentosEmpleadoo->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.documentosEmpleadoo.fields.tipo_de_documento') }}
                                    </th>
                                    <td>
                                        {{ App\Models\DocumentosEmpleadoo::TIPO_DE_DOCUMENTO_SELECT[$documentosEmpleadoo->tipo_de_documento] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.documentosEmpleadoo.fields.fecha') }}
                                    </th>
                                    <td>
                                        {{ $documentosEmpleadoo->fecha }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.documentosEmpleadoo.fields.nombre') }}
                                    </th>
                                    <td>
                                        {{ $documentosEmpleadoo->nombre }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.documentos-empleadoos.index') }}">
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
                        <a href="#documentos_relacionados_empleados" aria-controls="documentos_relacionados_empleados" role="tab" data-toggle="tab">
                            {{ trans('cruds.empleado.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="documentos_relacionados_empleados">
                        @includeIf('admin.documentosEmpleadoos.relationships.documentosRelacionadosEmpleados', ['empleados' => $documentosEmpleadoo->documentosRelacionadosEmpleados])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection