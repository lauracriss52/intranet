@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.procedimiento.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.procedimientos.update", [$procedimiento->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('codigo') ? 'has-error' : '' }}">
                            <label for="codigo">{{ trans('cruds.procedimiento.fields.codigo') }}</label>
                            <input class="form-control" type="text" name="codigo" id="codigo" value="{{ old('codigo', $procedimiento->codigo) }}">
                            @if($errors->has('codigo'))
                                <span class="help-block" role="alert">{{ $errors->first('codigo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.procedimiento.fields.codigo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fecha_de_creacion') ? 'has-error' : '' }}">
                            <label class="required" for="fecha_de_creacion">{{ trans('cruds.procedimiento.fields.fecha_de_creacion') }}</label>
                            <input class="form-control date" type="text" name="fecha_de_creacion" id="fecha_de_creacion" value="{{ old('fecha_de_creacion', $procedimiento->fecha_de_creacion) }}" required>
                            @if($errors->has('fecha_de_creacion'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha_de_creacion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.procedimiento.fields.fecha_de_creacion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fecha_actualizacion') ? 'has-error' : '' }}">
                            <label class="required" for="fecha_actualizacion">{{ trans('cruds.procedimiento.fields.fecha_actualizacion') }}</label>
                            <input class="form-control date" type="text" name="fecha_actualizacion" id="fecha_actualizacion" value="{{ old('fecha_actualizacion', $procedimiento->fecha_actualizacion) }}" required>
                            @if($errors->has('fecha_actualizacion'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha_actualizacion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.procedimiento.fields.fecha_actualizacion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nota_del_procedimiento') ? 'has-error' : '' }}">
                            <label for="nota_del_procedimiento">{{ trans('cruds.procedimiento.fields.nota_del_procedimiento') }}</label>
                            <textarea class="form-control ckeditor" name="nota_del_procedimiento" id="nota_del_procedimiento">{!! old('nota_del_procedimiento', $procedimiento->nota_del_procedimiento) !!}</textarea>
                            @if($errors->has('nota_del_procedimiento'))
                                <span class="help-block" role="alert">{{ $errors->first('nota_del_procedimiento') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.procedimiento.fields.nota_del_procedimiento_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.procedimientos.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $procedimiento->id ?? 0 }}');
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