@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.actaJuntum.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.acta-junta.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $actaJuntum->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.fecha') }}
                                    </th>
                                    <td>
                                        {{ $actaJuntum->fecha }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.hora_inicio') }}
                                    </th>
                                    <td>
                                        {{ $actaJuntum->hora_inicio }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.hora_final') }}
                                    </th>
                                    <td>
                                        {{ $actaJuntum->hora_final }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.asunto') }}
                                    </th>
                                    <td>
                                        {{ $actaJuntum->asunto }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.proceso') }}
                                    </th>
                                    <td>
                                        {{ $actaJuntum->proceso->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.modalidad') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ActaJuntum::MODALIDAD_RADIO[$actaJuntum->modalidad] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.descripcion') }}
                                    </th>
                                    <td>
                                        {!! $actaJuntum->descripcion !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.conclusiones') }}
                                    </th>
                                    <td>
                                        {!! $actaJuntum->conclusiones !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.compromisos') }}
                                    </th>
                                    <td>
                                        {!! $actaJuntum->compromisos !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.elaboro') }}
                                    </th>
                                    <td>
                                        {{ $actaJuntum->elaboro->nombre ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.asistentes') }}
                                    </th>
                                    <td>
                                        @foreach($actaJuntum->asistentes as $key => $asistentes)
                                            <span class="label label-info">{{ $asistentes->nombre }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.acta-junta.index') }}">
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
                        <a href="#acta_actividades_copas" aria-controls="acta_actividades_copas" role="tab" data-toggle="tab">
                            {{ trans('cruds.actividadesCopa.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="acta_actividades_copas">
                        @includeIf('admin.actaJunta.relationships.actaActividadesCopas', ['actividadesCopas' => $actaJuntum->actaActividadesCopas])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection