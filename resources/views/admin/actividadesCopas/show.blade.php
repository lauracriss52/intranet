@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.actividadesCopa.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.actividades-copas.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actividadesCopa.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $actividadesCopa->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actividadesCopa.fields.nombre') }}
                                    </th>
                                    <td>
                                        {{ $actividadesCopa->nombre }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actividadesCopa.fields.fecha') }}
                                    </th>
                                    <td>
                                        {{ $actividadesCopa->fecha }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actividadesCopa.fields.empleado') }}
                                    </th>
                                    <td>
                                        @foreach($actividadesCopa->empleados as $key => $empleado)
                                            <span class="label label-info">{{ $empleado->nombre }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actividadesCopa.fields.evidencia') }}
                                    </th>
                                    <td>
                                        @if($actividadesCopa->evidencia)
                                            <a href="{{ $actividadesCopa->evidencia->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actividadesCopa.fields.lista_de_asistencia') }}
                                    </th>
                                    <td>
                                        {{ $actividadesCopa->lista_de_asistencia->fecha ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actividadesCopa.fields.acta') }}
                                    </th>
                                    <td>
                                        {{ $actividadesCopa->acta->fecha ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.actividades-copas.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection