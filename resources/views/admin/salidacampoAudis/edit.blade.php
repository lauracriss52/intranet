@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.salidacampoAudi.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.salidacampo-audis.update", [$salidacampoAudi->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('solicitud') ? 'has-error' : '' }}">
                            <label for="solicitud_id">{{ trans('cruds.salidacampoAudi.fields.solicitud') }}</label>
                            <select class="form-control select2" name="solicitud_id" id="solicitud_id">
                                @foreach($solicituds as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('solicitud_id') ? old('solicitud_id') : $salidacampoAudi->solicitud->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('solicitud'))
                                <span class="help-block" role="alert">{{ $errors->first('solicitud') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidacampoAudi.fields.solicitud_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('vueloporti') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="vueloporti" value="0">
                                <input type="checkbox" name="vueloporti" id="vueloporti" value="1" {{ $salidacampoAudi->vueloporti || old('vueloporti', 0) === 1 ? 'checked' : '' }}>
                                <label for="vueloporti" style="font-weight: 400">{{ trans('cruds.salidacampoAudi.fields.vueloporti') }}</label>
                            </div>
                            @if($errors->has('vueloporti'))
                                <span class="help-block" role="alert">{{ $errors->first('vueloporti') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidacampoAudi.fields.vueloporti_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('informar') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="informar" value="0">
                                <input type="checkbox" name="informar" id="informar" value="1" {{ $salidacampoAudi->informar || old('informar', 0) === 1 ? 'checked' : '' }}>
                                <label for="informar" style="font-weight: 400">{{ trans('cruds.salidacampoAudi.fields.informar') }}</label>
                            </div>
                            @if($errors->has('informar'))
                                <span class="help-block" role="alert">{{ $errors->first('informar') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidacampoAudi.fields.informar_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('viaticos') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="viaticos" value="0">
                                <input type="checkbox" name="viaticos" id="viaticos" value="1" {{ $salidacampoAudi->viaticos || old('viaticos', 0) === 1 ? 'checked' : '' }}>
                                <label for="viaticos" style="font-weight: 400">{{ trans('cruds.salidacampoAudi.fields.viaticos') }}</label>
                            </div>
                            @if($errors->has('viaticos'))
                                <span class="help-block" role="alert">{{ $errors->first('viaticos') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidacampoAudi.fields.viaticos_helper') }}</span>
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