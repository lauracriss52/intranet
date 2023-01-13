@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.contrasena.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.contrasenas.update", [$contrasena->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('usuario') ? 'has-error' : '' }}">
                            <label class="required" for="usuario">{{ trans('cruds.contrasena.fields.usuario') }}</label>
                            <input class="form-control" type="text" name="usuario" id="usuario" value="{{ old('usuario', $contrasena->usuario) }}" required>
                            @if($errors->has('usuario'))
                                <span class="help-block" role="alert">{{ $errors->first('usuario') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contrasena.fields.usuario_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contrasena') ? 'has-error' : '' }}">
                            <label class="required" for="contrasena">{{ trans('cruds.contrasena.fields.contrasena') }}</label>
                            <input class="form-control" type="text" name="contrasena" id="contrasena" value="{{ old('contrasena', $contrasena->contrasena) }}" required>
                            @if($errors->has('contrasena'))
                                <span class="help-block" role="alert">{{ $errors->first('contrasena') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contrasena.fields.contrasena_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('link_de_la_pagina_a') ? 'has-error' : '' }}">
                            <label for="link_de_la_pagina_a">{{ trans('cruds.contrasena.fields.link_de_la_pagina_a') }}</label>
                            <input class="form-control" type="text" name="link_de_la_pagina_a" id="link_de_la_pagina_a" value="{{ old('link_de_la_pagina_a', $contrasena->link_de_la_pagina_a) }}">
                            @if($errors->has('link_de_la_pagina_a'))
                                <span class="help-block" role="alert">{{ $errors->first('link_de_la_pagina_a') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contrasena.fields.link_de_la_pagina_a_helper') }}</span>
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