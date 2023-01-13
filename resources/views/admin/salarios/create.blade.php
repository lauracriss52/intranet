@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.salario.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.salarios.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('salario') ? 'has-error' : '' }}">
                            <label class="required" for="salario">{{ trans('cruds.salario.fields.salario') }}</label>
                            <input class="form-control" type="number" name="salario" id="salario" value="{{ old('salario', '') }}" step="0.01" required>
                            @if($errors->has('salario'))
                                <span class="help-block" role="alert">{{ $errors->first('salario') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salario.fields.salario_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
                            <label for="fecha">{{ trans('cruds.salario.fields.fecha') }}</label>
                            <input class="form-control date" type="text" name="fecha" id="fecha" value="{{ old('fecha') }}">
                            @if($errors->has('fecha'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salario.fields.fecha_helper') }}</span>
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