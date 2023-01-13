@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.procedimiento.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.procedimientos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.procedimiento.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $procedimiento->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.procedimiento.fields.codigo') }}
                                    </th>
                                    <td>
                                        {{ $procedimiento->codigo }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.procedimiento.fields.fecha_de_creacion') }}
                                    </th>
                                    <td>
                                        {{ $procedimiento->fecha_de_creacion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.procedimiento.fields.fecha_actualizacion') }}
                                    </th>
                                    <td>
                                        {{ $procedimiento->fecha_actualizacion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.procedimiento.fields.nota_del_procedimiento') }}
                                    </th>
                                    <td>
                                        {!! $procedimiento->nota_del_procedimiento !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.procedimientos.index') }}">
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
                        <a href="#procedimiento_procesos" aria-controls="procedimiento_procesos" role="tab" data-toggle="tab">
                            {{ trans('cruds.proceso.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="procedimiento_procesos">
                        @includeIf('admin.procedimientos.relationships.procedimientoProcesos', ['procesos' => $procedimiento->procedimientoProcesos])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection