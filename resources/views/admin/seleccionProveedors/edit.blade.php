@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.seleccionProveedor.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.seleccion-proveedors.update", [$seleccionProveedor->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('ods') ? 'has-error' : '' }}">
                            <label for="ods_id">{{ trans('cruds.seleccionProveedor.fields.ods') }}</label>
                            <select class="form-control select2" name="ods_id" id="ods_id">
                                @foreach($ods as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('ods_id') ? old('ods_id') : $seleccionProveedor->ods->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('ods'))
                                <span class="help-block" role="alert">{{ $errors->first('ods') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.seleccionProveedor.fields.ods_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('proveedors') ? 'has-error' : '' }}">
                            <label for="proveedors">{{ trans('cruds.seleccionProveedor.fields.proveedor') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="proveedors[]" id="proveedors" multiple>
                                @foreach($proveedors as $id => $proveedor)
                                    <option value="{{ $id }}" {{ (in_array($id, old('proveedors', [])) || $seleccionProveedor->proveedors->contains($id)) ? 'selected' : '' }}>{{ $proveedor }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('proveedors'))
                                <span class="help-block" role="alert">{{ $errors->first('proveedors') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.seleccionProveedor.fields.proveedor_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('criterio_1') ? 'has-error' : '' }}">
                            <label for="criterio_1">{{ trans('cruds.seleccionProveedor.fields.criterio_1') }}</label>
                            <input class="form-control" type="text" name="criterio_1" id="criterio_1" value="{{ old('criterio_1', $seleccionProveedor->criterio_1) }}">
                            @if($errors->has('criterio_1'))
                                <span class="help-block" role="alert">{{ $errors->first('criterio_1') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.seleccionProveedor.fields.criterio_1_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('criterio_2') ? 'has-error' : '' }}">
                            <label for="criterio_2">{{ trans('cruds.seleccionProveedor.fields.criterio_2') }}</label>
                            <input class="form-control" type="text" name="criterio_2" id="criterio_2" value="{{ old('criterio_2', $seleccionProveedor->criterio_2) }}">
                            @if($errors->has('criterio_2'))
                                <span class="help-block" role="alert">{{ $errors->first('criterio_2') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.seleccionProveedor.fields.criterio_2_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('empresa_seleccionada') ? 'has-error' : '' }}">
                            <label for="empresa_seleccionada_id">{{ trans('cruds.seleccionProveedor.fields.empresa_seleccionada') }}</label>
                            <select class="form-control select2" name="empresa_seleccionada_id" id="empresa_seleccionada_id">
                                @foreach($empresa_seleccionadas as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('empresa_seleccionada_id') ? old('empresa_seleccionada_id') : $seleccionProveedor->empresa_seleccionada->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('empresa_seleccionada'))
                                <span class="help-block" role="alert">{{ $errors->first('empresa_seleccionada') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.seleccionProveedor.fields.empresa_seleccionada_helper') }}</span>
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