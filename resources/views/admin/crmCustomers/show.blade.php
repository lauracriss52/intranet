@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.crmCustomer.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.crm-customers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $crmCustomer->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.first_name') }}
                                    </th>
                                    <td>
                                        {{ $crmCustomer->first_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.last_name') }}
                                    </th>
                                    <td>
                                        {{ $crmCustomer->last_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $crmCustomer->status->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $crmCustomer->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.phone') }}
                                    </th>
                                    <td>
                                        {{ $crmCustomer->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $crmCustomer->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.skype') }}
                                    </th>
                                    <td>
                                        {{ $crmCustomer->skype }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.website') }}
                                    </th>
                                    <td>
                                        {{ $crmCustomer->website }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.description') }}
                                    </th>
                                    <td>
                                        {!! $crmCustomer->description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.nit') }}
                                    </th>
                                    <td>
                                        {{ $crmCustomer->nit }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.crm-customers.index') }}">
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
                        <a href="#proveedor_transactions" aria-controls="proveedor_transactions" role="tab" data-toggle="tab">
                            {{ trans('cruds.transaction.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#proveedor_salida_campos" aria-controls="proveedor_salida_campos" role="tab" data-toggle="tab">
                            {{ trans('cruds.salidaCampo.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="proveedor_transactions">
                        @includeIf('admin.crmCustomers.relationships.proveedorTransactions', ['transactions' => $crmCustomer->proveedorTransactions])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="proveedor_salida_campos">
                        @includeIf('admin.crmCustomers.relationships.proveedorSalidaCampos', ['salidaCampos' => $crmCustomer->proveedorSalidaCampos])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection