@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.actacierreproyecto.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.actacierreproyectos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actacierreproyecto.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $actacierreproyecto->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actacierreproyecto.fields.proyecto') }}
                                    </th>
                                    <td>
                                        {{ $actacierreproyecto->proyecto->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actacierreproyecto.fields.nombre') }}
                                    </th>
                                    <td>
                                        {{ $actacierreproyecto->nombre }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actacierreproyecto.fields.fecha') }}
                                    </th>
                                    <td>
                                        {{ $actacierreproyecto->fecha }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actacierreproyecto.fields.orde_de_compra') }}
                                    </th>
                                    <td>
                                        {{ $actacierreproyecto->orde_de_compra }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actacierreproyecto.fields.empresa') }}
                                    </th>
                                    <td>
                                        {{ $actacierreproyecto->empresa->first_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actacierreproyecto.fields.administrador') }}
                                    </th>
                                    <td>
                                        {{ $actacierreproyecto->administrador->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actacierreproyecto.fields.contacto_area_desarrollo_proyecto') }}
                                    </th>
                                    <td>
                                        {{ $actacierreproyecto->contacto_area_desarrollo_proyecto->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actacierreproyecto.fields.resumen_hitos') }}
                                    </th>
                                    <td>
                                        {!! $actacierreproyecto->resumen_hitos !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actacierreproyecto.fields.lista_interesados') }}
                                    </th>
                                    <td>
                                        {{ $actacierreproyecto->lista_interesados->contact_first_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actacierreproyecto.fields.aprobado') }}
                                    </th>
                                    <td>
                                        @foreach($actacierreproyecto->aprobados as $key => $aprobado)
                                            <span class="label label-info">{{ $aprobado->nombre }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.actacierreproyectos.index') }}">
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