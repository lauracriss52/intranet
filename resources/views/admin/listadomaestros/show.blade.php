@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.listadomaestro.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.listadomaestros.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listadomaestro.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $listadomaestro->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listadomaestro.fields.codigo_del_documento') }}
                                    </th>
                                    <td>
                                        {{ $listadomaestro->codigo_del_documento }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listadomaestro.fields.version') }}
                                    </th>
                                    <td>
                                        {{ $listadomaestro->version }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listadomaestro.fields.archivo') }}
                                    </th>
                                    <td>
                                        @if($listadomaestro->archivo)
                                            <a href="{{ $listadomaestro->archivo->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listadomaestro.fields.proceso') }}
                                    </th>
                                    <td>
                                        {{ $listadomaestro->proceso->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listadomaestro.fields.tipodocumento') }}
                                    </th>
                                    <td>
                                        {{ $listadomaestro->tipodocumento->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listadomaestro.fields.estado') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Listadomaestro::ESTADO_RADIO[$listadomaestro->estado] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.listadomaestros.index') }}">
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
                        <a href="#listado_maestro_decreto_leys" aria-controls="listado_maestro_decreto_leys" role="tab" data-toggle="tab">
                            {{ trans('cruds.decretoLey.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#listado_maestro_rucs" aria-controls="listado_maestro_rucs" role="tab" data-toggle="tab">
                            {{ trans('cruds.ruc.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="listado_maestro_decreto_leys">
                        @includeIf('admin.listadomaestros.relationships.listadoMaestroDecretoLeys', ['decretoLeys' => $listadomaestro->listadoMaestroDecretoLeys])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="listado_maestro_rucs">
                        @includeIf('admin.listadomaestros.relationships.listadoMaestroRucs', ['rucs' => $listadomaestro->listadoMaestroRucs])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection