@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.cocolab.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.cocolabs.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cocolab.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $cocolab->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cocolab.fields.nombre') }}
                                    </th>
                                    <td>
                                        {{ $cocolab->nombre }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cocolab.fields.fecha') }}
                                    </th>
                                    <td>
                                        {{ $cocolab->fecha }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cocolab.fields.empleado') }}
                                    </th>
                                    <td>
                                        @foreach($cocolab->empleados as $key => $empleado)
                                            <span class="label label-info">{{ $empleado->nombre }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cocolab.fields.evidencia') }}
                                    </th>
                                    <td>
                                        @if($cocolab->evidencia)
                                            <a href="{{ $cocolab->evidencia->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.cocolabs.index') }}">
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