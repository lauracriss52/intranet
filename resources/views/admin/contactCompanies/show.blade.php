@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.contactCompany.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.contact-companies.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactCompany.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $contactCompany->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactCompany.fields.company_name') }}
                                    </th>
                                    <td>
                                        {{ $contactCompany->company_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactCompany.fields.company_address') }}
                                    </th>
                                    <td>
                                        {{ $contactCompany->company_address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactCompany.fields.company_website') }}
                                    </th>
                                    <td>
                                        {{ $contactCompany->company_website }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactCompany.fields.company_email') }}
                                    </th>
                                    <td>
                                        {{ $contactCompany->company_email }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.contact-companies.index') }}">
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
                        <a href="#empresa_seleccionada_seleccion_proveedors" aria-controls="empresa_seleccionada_seleccion_proveedors" role="tab" data-toggle="tab">
                            {{ trans('cruds.seleccionProveedor.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="empresa_seleccionada_seleccion_proveedors">
                        @includeIf('admin.contactCompanies.relationships.empresaSeleccionadaSeleccionProveedors', ['seleccionProveedors' => $contactCompany->empresaSeleccionadaSeleccionProveedors])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection