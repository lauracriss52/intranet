@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.decretoLey.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.decreto-leys.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.decretoLey.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $decretoLey->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.decretoLey.fields.item') }}
                                    </th>
                                    <td>
                                        {{ $decretoLey->item }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.decretoLey.fields.documento_solicitado') }}
                                    </th>
                                    <td>
                                        {{ $decretoLey->documento_solicitado }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.decretoLey.fields.proceso') }}
                                    </th>
                                    <td>
                                        {{ $decretoLey->proceso->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.decretoLey.fields.estado') }}
                                    </th>
                                    <td>
                                        {{ App\Models\DecretoLey::ESTADO_RADIO[$decretoLey->estado] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.decretoLey.fields.acta') }}
                                    </th>
                                    <td>
                                        {{ $decretoLey->acta->fecha ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.decretoLey.fields.lista_asistencia') }}
                                    </th>
                                    <td>
                                        {{ $decretoLey->lista_asistencia->fecha ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.decretoLey.fields.listado_maestro') }}
                                    </th>
                                    <td>
                                        {{ $decretoLey->listado_maestro->codigo_del_documento ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.decreto-leys.index') }}">
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