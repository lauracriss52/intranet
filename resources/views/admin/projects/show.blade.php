@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.project.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.projects.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.project.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $project->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.project.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $project->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.project.fields.client') }}
                                    </th>
                                    <td>
                                        {{ $project->client->first_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.project.fields.description') }}
                                    </th>
                                    <td>
                                        {{ $project->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.project.fields.start_date') }}
                                    </th>
                                    <td>
                                        {{ $project->start_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.project.fields.budget') }}
                                    </th>
                                    <td>
                                        {{ $project->budget }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.project.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $project->status->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.projects.index') }}">
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
                        <a href="#proyecto_actacierreproyectos" aria-controls="proyecto_actacierreproyectos" role="tab" data-toggle="tab">
                            {{ trans('cruds.actacierreproyecto.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#proyecto_actainicioproyectos" aria-controls="proyecto_actainicioproyectos" role="tab" data-toggle="tab">
                            {{ trans('cruds.actainicioproyecto.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="proyecto_actacierreproyectos">
                        @includeIf('admin.projects.relationships.proyectoActacierreproyectos', ['actacierreproyectos' => $project->proyectoActacierreproyectos])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="proyecto_actainicioproyectos">
                        @includeIf('admin.projects.relationships.proyectoActainicioproyectos', ['actainicioproyectos' => $project->proyectoActainicioproyectos])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection