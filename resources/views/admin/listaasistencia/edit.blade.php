@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.listaasistencium.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.listaasistencia.update", [$listaasistencium->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
                            <label class="required" for="fecha">{{ trans('cruds.listaasistencium.fields.fecha') }}</label>
                            <input class="form-control date" type="text" name="fecha" id="fecha" value="{{ old('fecha', $listaasistencium->fecha) }}" required>
                            @if($errors->has('fecha'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listaasistencium.fields.fecha_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('hora_inicio') ? 'has-error' : '' }}">
                            <label for="hora_inicio">{{ trans('cruds.listaasistencium.fields.hora_inicio') }}</label>
                            <input class="form-control timepicker" type="text" name="hora_inicio" id="hora_inicio" value="{{ old('hora_inicio', $listaasistencium->hora_inicio) }}">
                            @if($errors->has('hora_inicio'))
                                <span class="help-block" role="alert">{{ $errors->first('hora_inicio') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listaasistencium.fields.hora_inicio_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('hora_final') ? 'has-error' : '' }}">
                            <label for="hora_final">{{ trans('cruds.listaasistencium.fields.hora_final') }}</label>
                            <input class="form-control timepicker" type="text" name="hora_final" id="hora_final" value="{{ old('hora_final', $listaasistencium->hora_final) }}">
                            @if($errors->has('hora_final'))
                                <span class="help-block" role="alert">{{ $errors->first('hora_final') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listaasistencium.fields.hora_final_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('temas_a_tratar') ? 'has-error' : '' }}">
                            <label for="temas_a_tratar">{{ trans('cruds.listaasistencium.fields.temas_a_tratar') }}</label>
                            <textarea class="form-control ckeditor" name="temas_a_tratar" id="temas_a_tratar">{!! old('temas_a_tratar', $listaasistencium->temas_a_tratar) !!}</textarea>
                            @if($errors->has('temas_a_tratar'))
                                <span class="help-block" role="alert">{{ $errors->first('temas_a_tratar') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listaasistencium.fields.temas_a_tratar_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('proceso') ? 'has-error' : '' }}">
                            <label for="proceso_id">{{ trans('cruds.listaasistencium.fields.proceso') }}</label>
                            <select class="form-control select2" name="proceso_id" id="proceso_id">
                                @foreach($procesos as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('proceso_id') ? old('proceso_id') : $listaasistencium->proceso->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('proceso'))
                                <span class="help-block" role="alert">{{ $errors->first('proceso') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listaasistencium.fields.proceso_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('modalidad') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.listaasistencium.fields.modalidad') }}</label>
                            @foreach(App\Models\Listaasistencium::MODALIDAD_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="modalidad_{{ $key }}" name="modalidad" value="{{ $key }}" {{ old('modalidad', $listaasistencium->modalidad) === (string) $key ? 'checked' : '' }}>
                                    <label for="modalidad_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('modalidad'))
                                <span class="help-block" role="alert">{{ $errors->first('modalidad') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listaasistencium.fields.modalidad_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('elaboro') ? 'has-error' : '' }}">
                            <label for="elaboro_id">{{ trans('cruds.listaasistencium.fields.elaboro') }}</label>
                            <select class="form-control select2" name="elaboro_id" id="elaboro_id">
                                @foreach($elaboros as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('elaboro_id') ? old('elaboro_id') : $listaasistencium->elaboro->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('elaboro'))
                                <span class="help-block" role="alert">{{ $errors->first('elaboro') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listaasistencium.fields.elaboro_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.listaasistencia.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $listaasistencium->id ?? 0 }}');
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