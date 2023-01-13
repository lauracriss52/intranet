@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.cocolab.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.cocolabs.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                            <label class="required" for="nombre">{{ trans('cruds.cocolab.fields.nombre') }}</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}" required>
                            @if($errors->has('nombre'))
                                <span class="help-block" role="alert">{{ $errors->first('nombre') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cocolab.fields.nombre_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
                            <label for="fecha">{{ trans('cruds.cocolab.fields.fecha') }}</label>
                            <input class="form-control date" type="text" name="fecha" id="fecha" value="{{ old('fecha') }}">
                            @if($errors->has('fecha'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cocolab.fields.fecha_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('empleados') ? 'has-error' : '' }}">
                            <label class="required" for="empleados">{{ trans('cruds.cocolab.fields.empleado') }}</label>
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
                            <span class="help-block">{{ trans('cruds.cocolab.fields.empleado_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('evidencia') ? 'has-error' : '' }}">
                            <label for="evidencia">{{ trans('cruds.cocolab.fields.evidencia') }}</label>
                            <div class="needsclick dropzone" id="evidencia-dropzone">
                            </div>
                            @if($errors->has('evidencia'))
                                <span class="help-block" role="alert">{{ $errors->first('evidencia') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.cocolab.fields.evidencia_helper') }}</span>
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
    Dropzone.options.evidenciaDropzone = {
    url: '{{ route('admin.cocolabs.storeMedia') }}',
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
      $('form').find('input[name="evidencia"]').remove()
      $('form').append('<input type="hidden" name="evidencia" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="evidencia"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($cocolab) && $cocolab->evidencia)
      var file = {!! json_encode($cocolab->evidencia) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="evidencia" value="' + file.file_name + '">')
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