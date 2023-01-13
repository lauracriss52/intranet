@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.terminacionContrato.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.terminacion-contratos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.terminacionContrato.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $terminacionContrato->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.terminacionContrato.fields.fecha_terminacion') }}
                                    </th>
                                    <td>
                                        {{ $terminacionContrato->fecha_terminacion }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.terminacionContrato.fields.liquidacion') }}
                                    </th>
                                    <td>
                                        @if($terminacionContrato->liquidacion)
                                            <a href="{{ $terminacionContrato->liquidacion->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.terminacionContrato.fields.empleado') }}
                                    </th>
                                    <td>
                                        {{ $terminacionContrato->empleado->nombre ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.terminacion-contratos.index') }}">
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