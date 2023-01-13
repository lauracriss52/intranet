@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.salidacampoAudi.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.salidacampo-audis.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidacampoAudi.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $salidacampoAudi->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidacampoAudi.fields.solicitud') }}
                                    </th>
                                    <td>
                                        {{ $salidacampoAudi->solicitud->fecha_de_ingreso ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidacampoAudi.fields.vueloporti') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $salidacampoAudi->vueloporti ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidacampoAudi.fields.informar') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $salidacampoAudi->informar ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salidacampoAudi.fields.viaticos') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $salidacampoAudi->viaticos ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.salidacampo-audis.index') }}">
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