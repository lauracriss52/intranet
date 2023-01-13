@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.ruc.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.rucs.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ruc.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $ruc->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ruc.fields.item') }}
                                    </th>
                                    <td>
                                        {{ $ruc->item }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ruc.fields.documento_solicitado') }}
                                    </th>
                                    <td>
                                        {{ $ruc->documento_solicitado }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ruc.fields.proceso') }}
                                    </th>
                                    <td>
                                        {{ $ruc->proceso->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ruc.fields.estado') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Ruc::ESTADO_RADIO[$ruc->estado] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ruc.fields.acta') }}
                                    </th>
                                    <td>
                                        {{ $ruc->acta->fecha ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ruc.fields.lista_asistencia') }}
                                    </th>
                                    <td>
                                        {{ $ruc->lista_asistencia->fecha ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.ruc.fields.listado_maestro') }}
                                    </th>
                                    <td>
                                        {{ $ruc->listado_maestro->codigo_del_documento ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.rucs.index') }}">
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