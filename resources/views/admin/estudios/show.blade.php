@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.estudio.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.estudios.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.estudio.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $estudio->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.estudio.fields.universidad') }}
                                    </th>
                                    <td>
                                        {{ $estudio->universidad }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.estudio.fields.titulo_adquirido') }}
                                    </th>
                                    <td>
                                        {{ $estudio->titulo_adquirido }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.estudio.fields.fecha_de_terminacion') }}
                                    </th>
                                    <td>
                                        {{ $estudio->fecha_de_terminacion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.estudio.fields.nivel_educativo') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Estudio::NIVEL_EDUCATIVO_SELECT[$estudio->nivel_educativo] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.estudios.index') }}">
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
                        <a href="#estudios_empleados" aria-controls="estudios_empleados" role="tab" data-toggle="tab">
                            {{ trans('cruds.empleado.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="estudios_empleados">
                        @includeIf('admin.estudios.relationships.estudiosEmpleados', ['empleados' => $estudio->estudiosEmpleados])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection