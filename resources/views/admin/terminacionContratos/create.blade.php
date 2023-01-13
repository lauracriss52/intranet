@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.terminacionContrato.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.terminacion-contratos.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('fecha_terminacion') ? 'has-error' : '' }}">
                            <label for="fecha_terminacion">{{ trans('cruds.terminacionContrato.fields.fecha_terminacion') }}</label>
                            <input class="form-control date" type="text" name="fecha_terminacion" id="fecha_terminacion" value="{{ old('fecha_terminacion') }}">
                            @if($errors->has('fecha_terminacion'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha_terminacion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.terminacionContrato.fields.fecha_terminacion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('liquidacion') ? 'has-error' : '' }}">
                            <label for="liquidacion">{{ trans('cruds.terminacionContrato.fields.liquidacion') }}</label>
                            <div class="needsclick dropzone" id="liquidacion-dropzone">
                            </div>
                            @if($errors->has('liquidacion'))
                                <span class="help-block" role="alert">{{ $errors->first('liquidacion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.terminacionContrato.fields.liquidacion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('empleado') ? 'has-error' : '' }}">
                            <label for="empleado_id">{{ trans('cruds.terminacionContrato.fields.empleado') }}</label>
                            <select class="form-control select2" name="empleado_id" id="empleado_id">
                                @foreach($empleados as $id => $entry)
                                    <option value="{{ $id }}" {{ old('empleado_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('empleado'))
                                <span class="help-block" role="alert">{{ $errors->first('empleado') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.terminacionContrato.fields.empleado_helper') }}</span>
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
    Dropzone.options.liquidacionDropzone = {
    url: '{{ route('admin.terminacion-contratos.storeMedia') }}',
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
      $('form').find('input[name="liquidacion"]').remove()
      $('form').append('<input type="hidden" name="liquidacion" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="liquidacion"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($terminacionContrato) && $terminacionContrato->liquidacion)
      var file = {!! json_encode($terminacionContrato->liquidacion) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="liquidacion" value="' + file.file_name + '">')
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