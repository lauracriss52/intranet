@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.tipoentrega.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.tipoentregas.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tipoentrega.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $tipoentrega->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.tipoentrega.fields.nombre') }}
                                    </th>
                                    <td>
                                        {{ $tipoentrega->nombre }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.tipoentregas.index') }}">
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
                        <a href="#tipo_de_entrega_actaentregas" aria-controls="tipo_de_entrega_actaentregas" role="tab" data-toggle="tab">
                            {{ trans('cruds.actaentrega.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="tipo_de_entrega_actaentregas">
                        @includeIf('admin.tipoentregas.relationships.tipoDeEntregaActaentregas', ['actaentregas' => $tipoentrega->tipoDeEntregaActaentregas])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection