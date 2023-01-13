@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.actainicioproyecto.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.actainicioproyectos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $actainicioproyecto->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.proyecto') }}
                                    </th>
                                    <td>
                                        {{ $actainicioproyecto->proyecto->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.nombre') }}
                                    </th>
                                    <td>
                                        {{ $actainicioproyecto->nombre }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.fecha') }}
                                    </th>
                                    <td>
                                        {{ $actainicioproyecto->fecha }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.orde_de_compra') }}
                                    </th>
                                    <td>
                                        {{ $actainicioproyecto->orde_de_compra }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.empresa') }}
                                    </th>
                                    <td>
                                        {{ $actainicioproyecto->empresa->first_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.gerente') }}
                                    </th>
                                    <td>
                                        {{ $actainicioproyecto->gerente->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.contacto_area_desarrollo_proyecto') }}
                                    </th>
                                    <td>
                                        {{ $actainicioproyecto->contacto_area_desarrollo_proyecto->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.descripcion') }}
                                    </th>
                                    <td>
                                        {!! $actainicioproyecto->descripcion !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.objetivos_objetivos') }}
                                    </th>
                                    <td>
                                        {!! $actainicioproyecto->objetivos_objetivos !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.resumen_hitos') }}
                                    </th>
                                    <td>
                                        {!! $actainicioproyecto->resumen_hitos !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.costo') }}
                                    </th>
                                    <td>
                                        {{ $actainicioproyecto->costo }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.lista_interesados') }}
                                    </th>
                                    <td>
                                        {{ $actainicioproyecto->lista_interesados->contact_first_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.aprobado') }}
                                    </th>
                                    <td>
                                        @foreach($actainicioproyecto->aprobados as $key => $aprobado)
                                            <span class="label label-info">{{ $aprobado->nombre }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.actainicioproyectos.index') }}">
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