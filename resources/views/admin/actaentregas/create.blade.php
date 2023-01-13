@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.actaentrega.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.actaentregas.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
                            <label class="required" for="fecha">{{ trans('cruds.actaentrega.fields.fecha') }}</label>
                            <input class="form-control date" type="text" name="fecha" id="fecha" value="{{ old('fecha') }}" required>
                            @if($errors->has('fecha'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.actaentrega.fields.fecha_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tipo_de_entregas') ? 'has-error' : '' }}">
                            <label class="required" for="tipo_de_entregas">{{ trans('cruds.actaentrega.fields.tipo_de_entrega') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="tipo_de_entregas[]" id="tipo_de_entregas" multiple required>
                                @foreach($tipo_de_entregas as $id => $tipo_de_entrega)
                                    <option value="{{ $id }}" {{ in_array($id, old('tipo_de_entregas', [])) ? 'selected' : '' }}>{{ $tipo_de_entrega }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('tipo_de_entregas'))
                                <span class="help-block" role="alert">{{ $errors->first('tipo_de_entregas') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.actaentrega.fields.tipo_de_entrega_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ciudad') ? 'has-error' : '' }}">
                            <label class="required" for="ciudad">{{ trans('cruds.actaentrega.fields.ciudad') }}</label>
                            <input class="form-control" type="text" name="ciudad" id="ciudad" value="{{ old('ciudad', 'Bogotá') }}" required>
                            @if($errors->has('ciudad'))
                                <span class="help-block" role="alert">{{ $errors->first('ciudad') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.actaentrega.fields.ciudad_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('modalidad') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.actaentrega.fields.modalidad') }}</label>
                            @foreach(App\Models\Actaentrega::MODALIDAD_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="modalidad_{{ $key }}" name="modalidad" value="{{ $key }}" {{ old('modalidad', 'Virtual') === (string) $key ? 'checked' : '' }} required>
                                    <label for="modalidad_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('modalidad'))
                                <span class="help-block" role="alert">{{ $errors->first('modalidad') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.actaentrega.fields.modalidad_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('gestions') ? 'has-error' : '' }}">
                            <label class="required" for="gestions">{{ trans('cruds.actaentrega.fields.gestion') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="gestions[]" id="gestions" multiple required>
                                @foreach($gestions as $id => $gestion)
                                    <option value="{{ $id }}" {{ in_array($id, old('gestions', [])) ? 'selected' : '' }}>{{ $gestion }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('gestions'))
                                <span class="help-block" role="alert">{{ $errors->first('gestions') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.actaentrega.fields.gestion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('observaciones') ? 'has-error' : '' }}">
                            <label for="observaciones">{{ trans('cruds.actaentrega.fields.observaciones') }}</label>
                            <textarea class="form-control ckeditor" name="observaciones" id="observaciones">{!! old('observaciones') !!}</textarea>
                            @if($errors->has('observaciones'))
                                <span class="help-block" role="alert">{{ $errors->first('observaciones') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.actaentrega.fields.observaciones_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('responsabilidades') ? 'has-error' : '' }}">
                            <label for="responsabilidades">{{ trans('cruds.actaentrega.fields.responsabilidades') }}</label>
                            <textarea class="form-control ckeditor" name="responsabilidades" id="responsabilidades">{!! old('responsabilidades') !!}</textarea>
                            @if($errors->has('responsabilidades'))
                                <span class="help-block" role="alert">{{ $errors->first('responsabilidades') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.actaentrega.fields.responsabilidades_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('elaboro') ? 'has-error' : '' }}">
                            <label class="required" for="elaboro_id">{{ trans('cruds.actaentrega.fields.elaboro') }}</label>
                            <select class="form-control select2" name="elaboro_id" id="elaboro_id" required>
                                @foreach($elaboros as $id => $entry)
                                    <option value="{{ $id }}" {{ old('elaboro_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('elaboro'))
                                <span class="help-block" role="alert">{{ $errors->first('elaboro') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.actaentrega.fields.elaboro_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('recibe') ? 'has-error' : '' }}">
                            <label class="required" for="recibe_id">{{ trans('cruds.actaentrega.fields.recibe') }}</label>
                            <select class="form-control select2" name="recibe_id" id="recibe_id" required>
                                @foreach($recibes as $id => $entry)
                                    <option value="{{ $id }}" {{ old('recibe_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('recibe'))
                                <span class="help-block" role="alert">{{ $errors->first('recibe') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.actaentrega.fields.recibe_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('anexo') ? 'has-error' : '' }}">
                            <label for="anexo">{{ trans('cruds.actaentrega.fields.anexo') }}</label>
                            <div class="needsclick dropzone" id="anexo-dropzone">
                            </div>
                            @if($errors->has('anexo'))
                                <span class="help-block" role="alert">{{ $errors->first('anexo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.actaentrega.fields.anexo_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.actaentregas.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $actaentrega->id ?? 0 }}');
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

<script>
    Dropzone.options.anexoDropzone = {
    url: '{{ route('admin.actaentregas.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="anexo"]').remove()
      $('form').append('<input type="hidden" name="anexo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="anexo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($actaentrega) && $actaentrega->anexo)
      var file = {!! json_encode($actaentrega->anexo) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="anexo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection