@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.actacierreproyecto.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.actacierreproyectos.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('proyecto') ? 'has-error' : '' }}">
                            <label for="proyecto_id">{{ trans('cruds.actacierreproyecto.fields.proyecto') }}</label>
                            <select class="form-control select2" name="proyecto_id" id="proyecto_id">
                                @foreach($proyectos as $id => $entry)
                                    <option value="{{ $id }}" {{ old('proyecto_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('proyecto'))
                                <span class="help-block" role="alert">{{ $errors->first('proyecto') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.actacierreproyecto.fields.proyecto_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                            <label for="nombre">{{ trans('cruds.actacierreproyecto.fields.nombre') }}</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}">
                            @if($errors->has('nombre'))
                                <span class="help-block" role="alert">{{ $errors->first('nombre') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.actacierreproyecto.fields.nombre_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
                            <label for="fecha">{{ trans('cruds.actacierreproyecto.fields.fecha') }}</label>
                            <input class="form-control date" type="text" name="fecha" id="fecha" value="{{ old('fecha') }}">
                            @if($errors->has('fecha'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.actacierreproyecto.fields.fecha_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('orde_de_compra') ? 'has-error' : '' }}">
                            <label for="orde_de_compra">{{ trans('cruds.actacierreproyecto.fields.orde_de_compra') }}</label>
                            <input class="form-control" type="text" name="orde_de_compra" id="orde_de_compra" value="{{ old('orde_de_compra', '') }}">
                            @if($errors->has('orde_de_compra'))
                                <span class="help-block" role="alert">{{ $errors->first('orde_de_compra') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.actacierreproyecto.fields.orde_de_compra_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('empresa') ? 'has-error' : '' }}">
                            <label for="empresa_id">{{ trans('cruds.actacierreproyecto.fields.empresa') }}</label>
                            <select class="form-control select2" name="empresa_id" id="empresa_id">
                                @foreach($empresas as $id => $entry)
                                    <option value="{{ $id }}" {{ old('empresa_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('empresa'))
                                <span class="help-block" role="alert">{{ $errors->first('empresa') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.actacierreproyecto.fields.empresa_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('administrador') ? 'has-error' : '' }}">
                            <label for="administrador_id">{{ trans('cruds.actacierreproyecto.fields.administrador') }}</label>
                            <select class="form-control select2" name="administrador_id" id="administrador_id">
                                @foreach($administradors as $id => $entry)
                                    <option value="{{ $id }}" {{ old('administrador_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('administrador'))
                                <span class="help-block" role="alert">{{ $errors->first('administrador') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.actacierreproyecto.fields.administrador_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contacto_area_desarrollo_proyecto') ? 'has-error' : '' }}">
                            <label for="contacto_area_desarrollo_proyecto_id">{{ trans('cruds.actacierreproyecto.fields.contacto_area_desarrollo_proyecto') }}</label>
                            <select class="form-control select2" name="contacto_area_desarrollo_proyecto_id" id="contacto_area_desarrollo_proyecto_id">
                                @foreach($contacto_area_desarrollo_proyectos as $id => $entry)
                                    <option value="{{ $id }}" {{ old('contacto_area_desarrollo_proyecto_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('contacto_area_desarrollo_proyecto'))
                                <span class="help-block" role="alert">{{ $errors->first('contacto_area_desarrollo_proyecto') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.actacierreproyecto.fields.contacto_area_desarrollo_proyecto_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('resumen_hitos') ? 'has-error' : '' }}">
                            <label for="resumen_hitos">{{ trans('cruds.actacierreproyecto.fields.resumen_hitos') }}</label>
                            <textarea class="form-control ckeditor" name="resumen_hitos" id="resumen_hitos">{!! old('resumen_hitos') !!}</textarea>
                            @if($errors->has('resumen_hitos'))
                                <span class="help-block" role="alert">{{ $errors->first('resumen_hitos') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.actacierreproyecto.fields.resumen_hitos_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('lista_interesados') ? 'has-error' : '' }}">
                            <label for="lista_interesados_id">{{ trans('cruds.actacierreproyecto.fields.lista_interesados') }}</label>
                            <select class="form-control select2" name="lista_interesados_id" id="lista_interesados_id">
                                @foreach($lista_interesados as $id => $entry)
                                    <option value="{{ $id }}" {{ old('lista_interesados_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('lista_interesados'))
                                <span class="help-block" role="alert">{{ $errors->first('lista_interesados') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.actacierreproyecto.fields.lista_interesados_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('aprobados') ? 'has-error' : '' }}">
                            <label for="aprobados">{{ trans('cruds.actacierreproyecto.fields.aprobado') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="aprobados[]" id="aprobados" multiple>
                                @foreach($aprobados as $id => $aprobado)
                                    <option value="{{ $id }}" {{ in_array($id, old('aprobados', [])) ? 'selected' : '' }}>{{ $aprobado }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('aprobados'))
                                <span class="help-block" role="alert">{{ $errors->first('aprobados') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.actacierreproyecto.fields.aprobado_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.actacierreproyectos.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $actacierreproyecto->id ?? 0 }}');
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