@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.proceso.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.procesos.update", [$proceso->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('procedimientos') ? 'has-error' : '' }}">
                            <label for="procedimientos">{{ trans('cruds.proceso.fields.procedimiento') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="procedimientos[]" id="procedimientos" multiple>
                                @foreach($procedimientos as $id => $procedimiento)
                                    <option value="{{ $id }}" {{ (in_array($id, old('procedimientos', [])) || $proceso->procedimientos->contains($id)) ? 'selected' : '' }}>{{ $procedimiento }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('procedimientos'))
                                <span class="help-block" role="alert">{{ $errors->first('procedimientos') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.proceso.fields.procedimiento_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                            <label for="nombre">{{ trans('cruds.proceso.fields.nombre') }}</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', $proceso->nombre) }}">
                            @if($errors->has('nombre'))
                                <span class="help-block" role="alert">{{ $errors->first('nombre') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.proceso.fields.nombre_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('lider_del_proceso') ? 'has-error' : '' }}">
                            <label for="lider_del_proceso">{{ trans('cruds.proceso.fields.lider_del_proceso') }}</label>
                            <input class="form-control" type="text" name="lider_del_proceso" id="lider_del_proceso" value="{{ old('lider_del_proceso', $proceso->lider_del_proceso) }}">
                            @if($errors->has('lider_del_proceso'))
                                <span class="help-block" role="alert">{{ $errors->first('lider_del_proceso') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.proceso.fields.lider_del_proceso_helper') }}</span>
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