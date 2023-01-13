@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.rolesSig.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.roles-sigs.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rolesSig.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $rolesSig->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rolesSig.fields.nombre') }}
                                    </th>
                                    <td>
                                        {{ $rolesSig->nombre }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rolesSig.fields.fecha') }}
                                    </th>
                                    <td>
                                        {{ $rolesSig->fecha }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rolesSig.fields.presidente') }}
                                    </th>
                                    <td>
                                        @foreach($rolesSig->presidentes as $key => $presidente)
                                            <span class="label label-info">{{ $presidente->nombre }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rolesSig.fields.secretario') }}
                                    </th>
                                    <td>
                                        {{ $rolesSig->secretario->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rolesSig.fields.presidente_suplente') }}
                                    </th>
                                    <td>
                                        {{ $rolesSig->presidente_suplente->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rolesSig.fields.secretario_suplente') }}
                                    </th>
                                    <td>
                                        {{ $rolesSig->secretario_suplente->nombre ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.roles-sigs.index') }}">
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
                        <a href="#sgi_presupuestos" aria-controls="sgi_presupuestos" role="tab" data-toggle="tab">
                            {{ trans('cruds.presupuesto.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="sgi_presupuestos">
                        @includeIf('admin.rolesSigs.relationships.sgiPresupuestos', ['presupuestos' => $rolesSig->sgiPresupuestos])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection