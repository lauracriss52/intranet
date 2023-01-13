@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.seleccionProveedor.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.seleccion-proveedors.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.seleccionProveedor.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $seleccionProveedor->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.seleccionProveedor.fields.ods') }}
                                    </th>
                                    <td>
                                        {{ $seleccionProveedor->ods->amount ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.seleccionProveedor.fields.proveedor') }}
                                    </th>
                                    <td>
                                        @foreach($seleccionProveedor->proveedors as $key => $proveedor)
                                            <span class="label label-info">{{ $proveedor->company_name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.seleccionProveedor.fields.criterio_1') }}
                                    </th>
                                    <td>
                                        {{ $seleccionProveedor->criterio_1 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.seleccionProveedor.fields.criterio_2') }}
                                    </th>
                                    <td>
                                        {{ $seleccionProveedor->criterio_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.seleccionProveedor.fields.empresa_seleccionada') }}
                                    </th>
                                    <td>
                                        {{ $seleccionProveedor->empresa_seleccionada->company_name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.seleccion-proveedors.index') }}">
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