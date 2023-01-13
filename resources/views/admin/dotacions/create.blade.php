@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.dotacion.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.dotacions.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('cantidad') ? 'has-error' : '' }}">
                            <label class="required" for="cantidad">{{ trans('cruds.dotacion.fields.cantidad') }}</label>
                            <input class="form-control" type="number" name="cantidad" id="cantidad" value="{{ old('cantidad', '') }}" step="1" required>
                            @if($errors->has('cantidad'))
                                <span class="help-block" role="alert">{{ $errors->first('cantidad') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.dotacion.fields.cantidad_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tipo') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.dotacion.fields.tipo') }}</label>
                            <select class="form-control" name="tipo" id="tipo" required>
                                <option value disabled {{ old('tipo', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Dotacion::TIPO_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('tipo', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('tipo'))
                                <span class="help-block" role="alert">{{ $errors->first('tipo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.dotacion.fields.tipo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('talla') ? 'has-error' : '' }}">
                            <label class="required" for="talla">{{ trans('cruds.dotacion.fields.talla') }}</label>
                            <input class="form-control" type="text" name="talla" id="talla" value="{{ old('talla', '') }}" required>
                            @if($errors->has('talla'))
                                <span class="help-block" role="alert">{{ $errors->first('talla') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.dotacion.fields.talla_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('genero') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.dotacion.fields.genero') }}</label>
                            @foreach(App\Models\Dotacion::GENERO_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="genero_{{ $key }}" name="genero" value="{{ $key }}" {{ old('genero', '') === (string) $key ? 'checked' : '' }} required>
                                    <label for="genero_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('genero'))
                                <span class="help-block" role="alert">{{ $errors->first('genero') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.dotacion.fields.genero_helper') }}</span>
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