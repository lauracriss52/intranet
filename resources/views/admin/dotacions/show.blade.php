@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.dotacion.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.dotacions.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dotacion.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $dotacion->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dotacion.fields.cantidad') }}
                                    </th>
                                    <td>
                                        {{ $dotacion->cantidad }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dotacion.fields.tipo') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Dotacion::TIPO_SELECT[$dotacion->tipo] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dotacion.fields.talla') }}
                                    </th>
                                    <td>
                                        {{ $dotacion->talla }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dotacion.fields.genero') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Dotacion::GENERO_RADIO[$dotacion->genero] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.dotacions.index') }}">
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
                        <a href="#entrega_dotacion_empleados" aria-controls="entrega_dotacion_empleados" role="tab" data-toggle="tab">
                            {{ trans('cruds.empleado.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="entrega_dotacion_empleados">
                        @includeIf('admin.dotacions.relationships.entregaDotacionEmpleados', ['empleados' => $dotacion->entregaDotacionEmpleados])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection