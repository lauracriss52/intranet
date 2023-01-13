@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.rolesSig.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.roles-sigs.update", [$rolesSig->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                            <label class="required" for="nombre">{{ trans('cruds.rolesSig.fields.nombre') }}</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', $rolesSig->nombre) }}" required>
                            @if($errors->has('nombre'))
                                <span class="help-block" role="alert">{{ $errors->first('nombre') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.rolesSig.fields.nombre_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
                            <label class="required" for="fecha">{{ trans('cruds.rolesSig.fields.fecha') }}</label>
                            <input class="form-control date" type="text" name="fecha" id="fecha" value="{{ old('fecha', $rolesSig->fecha) }}" required>
                            @if($errors->has('fecha'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.rolesSig.fields.fecha_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('presidentes') ? 'has-error' : '' }}">
                            <label for="presidentes">{{ trans('cruds.rolesSig.fields.presidente') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="presidentes[]" id="presidentes" multiple>
                                @foreach($presidentes as $id => $presidente)
                                    <option value="{{ $id }}" {{ (in_array($id, old('presidentes', [])) || $rolesSig->presidentes->contains($id)) ? 'selected' : '' }}>{{ $presidente }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('presidentes'))
                                <span class="help-block" role="alert">{{ $errors->first('presidentes') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.rolesSig.fields.presidente_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('secretario') ? 'has-error' : '' }}">
                            <label for="secretario_id">{{ trans('cruds.rolesSig.fields.secretario') }}</label>
                            <select class="form-control select2" name="secretario_id" id="secretario_id">
                                @foreach($secretarios as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('secretario_id') ? old('secretario_id') : $rolesSig->secretario->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('secretario'))
                                <span class="help-block" role="alert">{{ $errors->first('secretario') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.rolesSig.fields.secretario_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('presidente_suplente') ? 'has-error' : '' }}">
                            <label for="presidente_suplente_id">{{ trans('cruds.rolesSig.fields.presidente_suplente') }}</label>
                            <select class="form-control select2" name="presidente_suplente_id" id="presidente_suplente_id">
                                @foreach($presidente_suplentes as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('presidente_suplente_id') ? old('presidente_suplente_id') : $rolesSig->presidente_suplente->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('presidente_suplente'))
                                <span class="help-block" role="alert">{{ $errors->first('presidente_suplente') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.rolesSig.fields.presidente_suplente_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('secretario_suplente') ? 'has-error' : '' }}">
                            <label for="secretario_suplente_id">{{ trans('cruds.rolesSig.fields.secretario_suplente') }}</label>
                            <select class="form-control select2" name="secretario_suplente_id" id="secretario_suplente_id">
                                @foreach($secretario_suplentes as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('secretario_suplente_id') ? old('secretario_suplente_id') : $rolesSig->secretario_suplente->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('secretario_suplente'))
                                <span class="help-block" role="alert">{{ $errors->first('secretario_suplente') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.rolesSig.fields.secretario_suplente_helper') }}</span>
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