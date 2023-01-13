@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.transaction.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.transactions.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $transaction->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.project') }}
                                    </th>
                                    <td>
                                        {{ $transaction->project->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.transaction_type') }}
                                    </th>
                                    <td>
                                        {{ $transaction->transaction_type->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.income_source') }}
                                    </th>
                                    <td>
                                        {{ $transaction->income_source->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.amount') }}
                                    </th>
                                    <td>
                                        {{ $transaction->amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.currency') }}
                                    </th>
                                    <td>
                                        {{ $transaction->currency->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.transaction_date') }}
                                    </th>
                                    <td>
                                        {{ $transaction->transaction_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $transaction->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.description') }}
                                    </th>
                                    <td>
                                        {{ $transaction->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transaction.fields.proveedor') }}
                                    </th>
                                    <td>
                                        {{ $transaction->proveedor->first_name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.transactions.index') }}">
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
                        <a href="#orden_de_servicio_ods_compra_auditoria" aria-controls="orden_de_servicio_ods_compra_auditoria" role="tab" data-toggle="tab">
                            {{ trans('cruds.odsCompraAuditorium.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#ods_seleccion_proveedors" aria-controls="ods_seleccion_proveedors" role="tab" data-toggle="tab">
                            {{ trans('cruds.seleccionProveedor.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="orden_de_servicio_ods_compra_auditoria">
                        @includeIf('admin.transactions.relationships.ordenDeServicioOdsCompraAuditoria', ['odsCompraAuditoria' => $transaction->ordenDeServicioOdsCompraAuditoria])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="ods_seleccion_proveedors">
                        @includeIf('admin.transactions.relationships.odsSeleccionProveedors', ['seleccionProveedors' => $transaction->odsSeleccionProveedors])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection