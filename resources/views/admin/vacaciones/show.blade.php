@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.vacacione.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.vacaciones.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vacacione.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $vacacione->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vacacione.fields.fecha_de_inicio') }}
                                    </th>
                                    <td>
                                        {{ $vacacione->fecha_de_inicio }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vacacione.fields.fecha_de_finalizacion') }}
                                    </th>
                                    <td>
                                        {{ $vacacione->fecha_de_finalizacion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vacacione.fields.reintegro') }}
                                    </th>
                                    <td>
                                        {{ $vacacione->reintegro }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vacacione.fields.dias') }}
                                    </th>
                                    <td>
                                        {{ $vacacione->dias }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vacacione.fields.aprobadas') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $vacacione->aprobadas ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vacacione.fields.perdio_de_vacaciones_que_disfruta') }}
                                    </th>
                                    <td>
                                        {{ $vacacione->perdio_de_vacaciones_que_disfruta }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vacacione.fields.empleado') }}
                                    </th>
                                    <td>
                                        {{ $vacacione->empleado->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vacacione.fields.dias_pendientes') }}
                                    </th>
                                    <td>
                                        {{ $vacacione->dias_pendientes }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.vacaciones.index') }}">
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