@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.odsCompraAuditorium.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.ods-compra-auditoria.update", [$odsCompraAuditorium->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('orden_de_servicio') ? 'has-error' : '' }}">
                            <label for="orden_de_servicio_id">{{ trans('cruds.odsCompraAuditorium.fields.orden_de_servicio') }}</label>
                            <select class="form-control select2" name="orden_de_servicio_id" id="orden_de_servicio_id">
                                @foreach($orden_de_servicios as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('orden_de_servicio_id') ? old('orden_de_servicio_id') : $odsCompraAuditorium->orden_de_servicio->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('orden_de_servicio'))
                                <span class="help-block" role="alert">{{ $errors->first('orden_de_servicio') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.odsCompraAuditorium.fields.orden_de_servicio_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('proveedor') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="proveedor" value="0">
                                <input type="checkbox" name="proveedor" id="proveedor" value="1" {{ $odsCompraAuditorium->proveedor || old('proveedor', 0) === 1 ? 'checked' : '' }}>
                                <label for="proveedor" style="font-weight: 400">{{ trans('cruds.odsCompraAuditorium.fields.proveedor') }}</label>
                            </div>
                            @if($errors->has('proveedor'))
                                <span class="help-block" role="alert">{{ $errors->first('proveedor') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.odsCompraAuditorium.fields.proveedor_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('descuentos') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="descuentos" value="0">
                                <input type="checkbox" name="descuentos" id="descuentos" value="1" {{ $odsCompraAuditorium->descuentos || old('descuentos', 0) === 1 ? 'checked' : '' }}>
                                <label for="descuentos" style="font-weight: 400">{{ trans('cruds.odsCompraAuditorium.fields.descuentos') }}</label>
                            </div>
                            @if($errors->has('descuentos'))
                                <span class="help-block" role="alert">{{ $errors->first('descuentos') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.odsCompraAuditorium.fields.descuentos_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pago') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="pago" value="0">
                                <input type="checkbox" name="pago" id="pago" value="1" {{ $odsCompraAuditorium->pago || old('pago', 0) === 1 ? 'checked' : '' }}>
                                <label for="pago" style="font-weight: 400">{{ trans('cruds.odsCompraAuditorium.fields.pago') }}</label>
                            </div>
                            @if($errors->has('pago'))
                                <span class="help-block" role="alert">{{ $errors->first('pago') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.odsCompraAuditorium.fields.pago_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('factura') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="factura" value="0">
                                <input type="checkbox" name="factura" id="factura" value="1" {{ $odsCompraAuditorium->factura || old('factura', 0) === 1 ? 'checked' : '' }}>
                                <label for="factura" style="font-weight: 400">{{ trans('cruds.odsCompraAuditorium.fields.factura') }}</label>
                            </div>
                            @if($errors->has('factura'))
                                <span class="help-block" role="alert">{{ $errors->first('factura') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.odsCompraAuditorium.fields.factura_helper') }}</span>
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