@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.salidaCampo.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.salida-campos.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('fecha_de_ingreso') ? 'has-error' : '' }}">
                            <label class="required" for="fecha_de_ingreso">{{ trans('cruds.salidaCampo.fields.fecha_de_ingreso') }}</label>
                            <input class="form-control date" type="text" name="fecha_de_ingreso" id="fecha_de_ingreso" value="{{ old('fecha_de_ingreso') }}" required>
                            @if($errors->has('fecha_de_ingreso'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha_de_ingreso') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidaCampo.fields.fecha_de_ingreso_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fecha_de_salida') ? 'has-error' : '' }}">
                            <label class="required" for="fecha_de_salida">{{ trans('cruds.salidaCampo.fields.fecha_de_salida') }}</label>
                            <input class="form-control date" type="text" name="fecha_de_salida" id="fecha_de_salida" value="{{ old('fecha_de_salida') }}" required>
                            @if($errors->has('fecha_de_salida'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha_de_salida') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidaCampo.fields.fecha_de_salida_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cliente') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.salidaCampo.fields.cliente') }}</label>
                            <select class="form-control" name="cliente" id="cliente" required>
                                <option value disabled {{ old('cliente', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\SalidaCampo::CLIENTE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('cliente', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('cliente'))
                                <span class="help-block" role="alert">{{ $errors->first('cliente') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidaCampo.fields.cliente_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('empleados') ? 'has-error' : '' }}">
                            <label class="required" for="empleados">{{ trans('cruds.salidaCampo.fields.empleado') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="empleados[]" id="empleados" multiple required>
                                @foreach($empleados as $id => $empleado)
                                    <option value="{{ $id }}" {{ in_array($id, old('empleados', [])) ? 'selected' : '' }}>{{ $empleado }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('empleados'))
                                <span class="help-block" role="alert">{{ $errors->first('empleados') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidaCampo.fields.empleado_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('transporte_casa_aeropuerto') ? 'has-error' : '' }}">
                            <div>
                                <input type="checkbox" name="transporte_casa_aeropuerto" id="transporte_casa_aeropuerto" value="1" required {{ old('transporte_casa_aeropuerto', 0) == 1 ? 'checked' : '' }}>
                                <label class="required" for="transporte_casa_aeropuerto" style="font-weight: 400">{{ trans('cruds.salidaCampo.fields.transporte_casa_aeropuerto') }}</label>
                            </div>
                            @if($errors->has('transporte_casa_aeropuerto'))
                                <span class="help-block" role="alert">{{ $errors->first('transporte_casa_aeropuerto') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidaCampo.fields.transporte_casa_aeropuerto_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('transporte_11') ? 'has-error' : '' }}">
                            <label for="transporte_11">{{ trans('cruds.salidaCampo.fields.transporte_11') }}</label>
                            <input class="form-control" type="text" name="transporte_11" id="transporte_11" value="{{ old('transporte_11', 'Nombre del Empleado:                                                                       Ciudad:') }}">
                            @if($errors->has('transporte_11'))
                                <span class="help-block" role="alert">{{ $errors->first('transporte_11') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidaCampo.fields.transporte_11_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('transporte_2') ? 'has-error' : '' }}">
                            <div>
                                <input type="checkbox" name="transporte_2" id="transporte_2" value="1" required {{ old('transporte_2', 0) == 1 ? 'checked' : '' }}>
                                <label class="required" for="transporte_2" style="font-weight: 400">{{ trans('cruds.salidaCampo.fields.transporte_2') }}</label>
                            </div>
                            @if($errors->has('transporte_2'))
                                <span class="help-block" role="alert">{{ $errors->first('transporte_2') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidaCampo.fields.transporte_2_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('transporte_22') ? 'has-error' : '' }}">
                            <label for="transporte_22">{{ trans('cruds.salidaCampo.fields.transporte_22') }}</label>
                            <input class="form-control" type="text" name="transporte_22" id="transporte_22" value="{{ old('transporte_22', 'Nombre del Empleado:                                                                       Ciudad:                                           Equipaje:') }}">
                            @if($errors->has('transporte_22'))
                                <span class="help-block" role="alert">{{ $errors->first('transporte_22') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidaCampo.fields.transporte_22_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('transporte_3') ? 'has-error' : '' }}">
                            <div>
                                <input type="checkbox" name="transporte_3" id="transporte_3" value="1" required {{ old('transporte_3', 0) == 1 ? 'checked' : '' }}>
                                <label class="required" for="transporte_3" style="font-weight: 400">{{ trans('cruds.salidaCampo.fields.transporte_3') }}</label>
                            </div>
                            @if($errors->has('transporte_3'))
                                <span class="help-block" role="alert">{{ $errors->first('transporte_3') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidaCampo.fields.transporte_3_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('transporte_4') ? 'has-error' : '' }}">
                            <div>
                                <input type="checkbox" name="transporte_4" id="transporte_4" value="1" required {{ old('transporte_4', 0) == 1 ? 'checked' : '' }}>
                                <label class="required" for="transporte_4" style="font-weight: 400">{{ trans('cruds.salidaCampo.fields.transporte_4') }}</label>
                            </div>
                            @if($errors->has('transporte_4'))
                                <span class="help-block" role="alert">{{ $errors->first('transporte_4') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidaCampo.fields.transporte_4_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('transporte_5') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="transporte_5" value="0">
                                <input type="checkbox" name="transporte_5" id="transporte_5" value="1" {{ old('transporte_5', 0) == 1 ? 'checked' : '' }}>
                                <label for="transporte_5" style="font-weight: 400">{{ trans('cruds.salidaCampo.fields.transporte_5') }}</label>
                            </div>
                            @if($errors->has('transporte_5'))
                                <span class="help-block" role="alert">{{ $errors->first('transporte_5') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidaCampo.fields.transporte_5_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('detalle') ? 'has-error' : '' }}">
                            <label for="detalle">{{ trans('cruds.salidaCampo.fields.detalle') }}</label>
                            <textarea class="form-control ckeditor" name="detalle" id="detalle">{!! old('detalle') !!}</textarea>
                            @if($errors->has('detalle'))
                                <span class="help-block" role="alert">{{ $errors->first('detalle') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidaCampo.fields.detalle_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('projecto') ? 'has-error' : '' }}">
                            <label for="projecto_id">{{ trans('cruds.salidaCampo.fields.projecto') }}</label>
                            <select class="form-control select2" name="projecto_id" id="projecto_id">
                                @foreach($projectos as $id => $entry)
                                    <option value="{{ $id }}" {{ old('projecto_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('projecto'))
                                <span class="help-block" role="alert">{{ $errors->first('projecto') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidaCampo.fields.projecto_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('proveedors') ? 'has-error' : '' }}">
                            <label for="proveedors">{{ trans('cruds.salidaCampo.fields.proveedor') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="proveedors[]" id="proveedors" multiple>
                                @foreach($proveedors as $id => $proveedor)
                                    <option value="{{ $id }}" {{ in_array($id, old('proveedors', [])) ? 'selected' : '' }}>{{ $proveedor }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('proveedors'))
                                <span class="help-block" role="alert">{{ $errors->first('proveedors') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.salidaCampo.fields.proveedor_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.salida-campos.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $salidaCampo->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection