@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.odsCompraAuditorium.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.ods-compra-auditoria.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.odsCompraAuditorium.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $odsCompraAuditorium->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.odsCompraAuditorium.fields.orden_de_servicio') }}
                                    </th>
                                    <td>
                                        {{ $odsCompraAuditorium->orden_de_servicio->amount ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.odsCompraAuditorium.fields.proveedor') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $odsCompraAuditorium->proveedor ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.odsCompraAuditorium.fields.descuentos') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $odsCompraAuditorium->descuentos ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.odsCompraAuditorium.fields.pago') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $odsCompraAuditorium->pago ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.odsCompraAuditorium.fields.factura') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $odsCompraAuditorium->factura ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.ods-compra-auditoria.index') }}">
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