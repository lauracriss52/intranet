@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.listadomaestro.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.listadomaestros.update", [$listadomaestro->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('codigo_del_documento') ? 'has-error' : '' }}">
                            <label class="required" for="codigo_del_documento">{{ trans('cruds.listadomaestro.fields.codigo_del_documento') }}</label>
                            <input class="form-control" type="text" name="codigo_del_documento" id="codigo_del_documento" value="{{ old('codigo_del_documento', $listadomaestro->codigo_del_documento) }}" required>
                            @if($errors->has('codigo_del_documento'))
                                <span class="help-block" role="alert">{{ $errors->first('codigo_del_documento') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listadomaestro.fields.codigo_del_documento_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('version') ? 'has-error' : '' }}">
                            <label class="required" for="version">{{ trans('cruds.listadomaestro.fields.version') }}</label>
                            <input class="form-control" type="number" name="version" id="version" value="{{ old('version', $listadomaestro->version) }}" step="1" required>
                            @if($errors->has('version'))
                                <span class="help-block" role="alert">{{ $errors->first('version') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listadomaestro.fields.version_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('archivo') ? 'has-error' : '' }}">
                            <label class="required" for="archivo">{{ trans('cruds.listadomaestro.fields.archivo') }}</label>
                            <div class="needsclick dropzone" id="archivo-dropzone">
                            </div>
                            @if($errors->has('archivo'))
                                <span class="help-block" role="alert">{{ $errors->first('archivo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listadomaestro.fields.archivo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('proceso') ? 'has-error' : '' }}">
                            <label class="required" for="proceso_id">{{ trans('cruds.listadomaestro.fields.proceso') }}</label>
                            <select class="form-control select2" name="proceso_id" id="proceso_id" required>
                                @foreach($procesos as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('proceso_id') ? old('proceso_id') : $listadomaestro->proceso->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('proceso'))
                                <span class="help-block" role="alert">{{ $errors->first('proceso') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listadomaestro.fields.proceso_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tipodocumento') ? 'has-error' : '' }}">
                            <label class="required" for="tipodocumento_id">{{ trans('cruds.listadomaestro.fields.tipodocumento') }}</label>
                            <select class="form-control select2" name="tipodocumento_id" id="tipodocumento_id" required>
                                @foreach($tipodocumentos as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('tipodocumento_id') ? old('tipodocumento_id') : $listadomaestro->tipodocumento->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('tipodocumento'))
                                <span class="help-block" role="alert">{{ $errors->first('tipodocumento') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listadomaestro.fields.tipodocumento_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('estado') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.listadomaestro.fields.estado') }}</label>
                            @foreach(App\Models\Listadomaestro::ESTADO_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="estado_{{ $key }}" name="estado" value="{{ $key }}" {{ old('estado', $listadomaestro->estado) === (string) $key ? 'checked' : '' }} required>
                                    <label for="estado_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('estado'))
                                <span class="help-block" role="alert">{{ $errors->first('estado') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listadomaestro.fields.estado_helper') }}</span>
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
    Dropzone.options.archivoDropzone = {
    url: '{{ route('admin.listadomaestros.storeMedia') }}',
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
      $('form').find('input[name="archivo"]').remove()
      $('form').append('<input type="hidden" name="archivo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="archivo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($listadomaestro) && $listadomaestro->archivo)
      var file = {!! json_encode($listadomaestro->archivo) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="archivo" value="' + file.file_name + '">')
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