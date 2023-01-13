@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.users.update", [$user->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                            <input class="form-control" type="password" name="password" id="password">
                            @if($errors->has('password'))
                                <span class="help-block" role="alert">{{ $errors->first('password') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                            <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="roles[]" id="roles" multiple required>
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('roles'))
                                <span class="help-block" role="alert">{{ $errors->first('roles') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('telefono') ? 'has-error' : '' }}">
                            <label for="telefono">{{ trans('cruds.user.fields.telefono') }}</label>
                            <input class="form-control" type="text" name="telefono" id="telefono" value="{{ old('telefono', $user->telefono) }}">
                            @if($errors->has('telefono'))
                                <span class="help-block" role="alert">{{ $errors->first('telefono') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.telefono_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('direccion') ? 'has-error' : '' }}">
                            <label for="direccion">{{ trans('cruds.user.fields.direccion') }}</label>
                            <input class="form-control" type="text" name="direccion" id="direccion" value="{{ old('direccion', $user->direccion) }}">
                            @if($errors->has('direccion'))
                                <span class="help-block" role="alert">{{ $errors->first('direccion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.direccion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ciudad') ? 'has-error' : '' }}">
                            <label for="ciudad">{{ trans('cruds.user.fields.ciudad') }}</label>
                            <input class="form-control" type="text" name="ciudad" id="ciudad" value="{{ old('ciudad', $user->ciudad) }}">
                            @if($errors->has('ciudad'))
                                <span class="help-block" role="alert">{{ $errors->first('ciudad') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.ciudad_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('departamento') ? 'has-error' : '' }}">
                            <label for="departamento">{{ trans('cruds.user.fields.departamento') }}</label>
                            <input class="form-control" type="text" name="departamento" id="departamento" value="{{ old('departamento', $user->departamento) }}">
                            @if($errors->has('departamento'))
                                <span class="help-block" role="alert">{{ $errors->first('departamento') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.departamento_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fecha_nacimiento') ? 'has-error' : '' }}">
                            <label for="fecha_nacimiento">{{ trans('cruds.user.fields.fecha_nacimiento') }}</label>
                            <input class="form-control date" type="text" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $user->fecha_nacimiento) }}">
                            @if($errors->has('fecha_nacimiento'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha_nacimiento') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.fecha_nacimiento_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('genero') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.user.fields.genero') }}</label>
                            <select class="form-control" name="genero" id="genero">
                                <option value disabled {{ old('genero', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\User::GENERO_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('genero', $user->genero) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('genero'))
                                <span class="help-block" role="alert">{{ $errors->first('genero') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.genero_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('team') ? 'has-error' : '' }}">
                            <label for="team_id">{{ trans('cruds.user.fields.team') }}</label>
                            <select class="form-control select2" name="team_id" id="team_id">
                                @foreach($teams as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('team_id') ? old('team_id') : $user->team->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('team'))
                                <span class="help-block" role="alert">{{ $errors->first('team') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.team_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection