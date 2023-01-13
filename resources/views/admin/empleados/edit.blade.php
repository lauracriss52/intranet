@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.empleado.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.empleados.update", [$empleado->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                            <label class="required" for="nombre">{{ trans('cruds.empleado.fields.nombre') }}</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', $empleado->nombre) }}" required>
                            @if($errors->has('nombre'))
                                <span class="help-block" role="alert">{{ $errors->first('nombre') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.empleado.fields.nombre_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('estudios') ? 'has-error' : '' }}">
                            <label class="required" for="estudios">{{ trans('cruds.empleado.fields.estudios') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="estudios[]" id="estudios" multiple required>
                                @foreach($estudios as $id => $estudio)
                                    <option value="{{ $id }}" {{ (in_array($id, old('estudios', [])) || $empleado->estudios->contains($id)) ? 'selected' : '' }}>{{ $estudio }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('estudios'))
                                <span class="help-block" role="alert">{{ $errors->first('estudios') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.empleado.fields.estudios_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cedula') ? 'has-error' : '' }}">
                            <label class="required" for="cedula">{{ trans('cruds.empleado.fields.cedula') }}</label>
                            <input class="form-control" type="number" name="cedula" id="cedula" value="{{ old('cedula', $empleado->cedula) }}" step="1" required>
                            @if($errors->has('cedula'))
                                <span class="help-block" role="alert">{{ $errors->first('cedula') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.empleado.fields.cedula_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('telefono') ? 'has-error' : '' }}">
                            <label class="required" for="telefono">{{ trans('cruds.empleado.fields.telefono') }}</label>
                            <input class="form-control" type="number" name="telefono" id="telefono" value="{{ old('telefono', $empleado->telefono) }}" step="1" required>
                            @if($errors->has('telefono'))
                                <span class="help-block" role="alert">{{ $errors->first('telefono') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.empleado.fields.telefono_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ciudadcedula') ? 'has-error' : '' }}">
                            <label for="ciudadcedula">{{ trans('cruds.empleado.fields.ciudadcedula') }}</label>
                            <input class="form-control" type="text" name="ciudadcedula" id="ciudadcedula" value="{{ old('ciudadcedula', $empleado->ciudadcedula) }}">
                            @if($errors->has('ciudadcedula'))
                                <span class="help-block" role="alert">{{ $errors->first('ciudadcedula') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.empleado.fields.ciudadcedula_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('direccion') ? 'has-error' : '' }}">
                            <label class="required" for="direccion">{{ trans('cruds.empleado.fields.direccion') }}</label>
                            <input class="form-control" type="text" name="direccion" id="direccion" value="{{ old('direccion', $empleado->direccion) }}" required>
                            @if($errors->has('direccion'))
                                <span class="help-block" role="alert">{{ $errors->first('direccion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.empleado.fields.direccion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('documentos_relacionados') ? 'has-error' : '' }}">
                            <label for="documentos_relacionados">{{ trans('cruds.empleado.fields.documentos_relacionados') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="documentos_relacionados[]" id="documentos_relacionados" multiple>
                                @foreach($documentos_relacionados as $id => $documentos_relacionado)
                                    <option value="{{ $id }}" {{ (in_array($id, old('documentos_relacionados', [])) || $empleado->documentos_relacionados->contains($id)) ? 'selected' : '' }}>{{ $documentos_relacionado }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('documentos_relacionados'))
                                <span class="help-block" role="alert">{{ $errors->first('documentos_relacionados') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.empleado.fields.documentos_relacionados_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contactos_de_emergencias') ? 'has-error' : '' }}">
                            <label for="contactos_de_emergencias">{{ trans('cruds.empleado.fields.contactos_de_emergencia') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="contactos_de_emergencias[]" id="contactos_de_emergencias" multiple>
                                @foreach($contactos_de_emergencias as $id => $contactos_de_emergencia)
                                    <option value="{{ $id }}" {{ (in_array($id, old('contactos_de_emergencias', [])) || $empleado->contactos_de_emergencias->contains($id)) ? 'selected' : '' }}>{{ $contactos_de_emergencia }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('contactos_de_emergencias'))
                                <span class="help-block" role="alert">{{ $errors->first('contactos_de_emergencias') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.empleado.fields.contactos_de_emergencia_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('experiencia_laborals') ? 'has-error' : '' }}">
                            <label for="experiencia_laborals">{{ trans('cruds.empleado.fields.experiencia_laboral') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="experiencia_laborals[]" id="experiencia_laborals" multiple>
                                @foreach($experiencia_laborals as $id => $experiencia_laboral)
                                    <option value="{{ $id }}" {{ (in_array($id, old('experiencia_laborals', [])) || $empleado->experiencia_laborals->contains($id)) ? 'selected' : '' }}>{{ $experiencia_laboral }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('experiencia_laborals'))
                                <span class="help-block" role="alert">{{ $errors->first('experiencia_laborals') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.empleado.fields.experiencia_laboral_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('actas_de_entregas') ? 'has-error' : '' }}">
                            <label for="actas_de_entregas">{{ trans('cruds.empleado.fields.actas_de_entrega') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="actas_de_entregas[]" id="actas_de_entregas" multiple>
                                @foreach($actas_de_entregas as $id => $actas_de_entrega)
                                    <option value="{{ $id }}" {{ (in_array($id, old('actas_de_entregas', [])) || $empleado->actas_de_entregas->contains($id)) ? 'selected' : '' }}>{{ $actas_de_entrega }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('actas_de_entregas'))
                                <span class="help-block" role="alert">{{ $errors->first('actas_de_entregas') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.empleado.fields.actas_de_entrega_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('lista_asistencias') ? 'has-error' : '' }}">
                            <label for="lista_asistencias">{{ trans('cruds.empleado.fields.lista_asistencia') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="lista_asistencias[]" id="lista_asistencias" multiple>
                                @foreach($lista_asistencias as $id => $lista_asistencia)
                                    <option value="{{ $id }}" {{ (in_array($id, old('lista_asistencias', [])) || $empleado->lista_asistencias->contains($id)) ? 'selected' : '' }}>{{ $lista_asistencia }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('lista_asistencias'))
                                <span class="help-block" role="alert">{{ $errors->first('lista_asistencias') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.empleado.fields.lista_asistencia_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('entrega_dotacions') ? 'has-error' : '' }}">
                            <label for="entrega_dotacions">{{ trans('cruds.empleado.fields.entrega_dotacion') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="entrega_dotacions[]" id="entrega_dotacions" multiple>
                                @foreach($entrega_dotacions as $id => $entrega_dotacion)
                                    <option value="{{ $id }}" {{ (in_array($id, old('entrega_dotacions', [])) || $empleado->entrega_dotacions->contains($id)) ? 'selected' : '' }}>{{ $entrega_dotacion }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('entrega_dotacions'))
                                <span class="help-block" role="alert">{{ $errors->first('entrega_dotacions') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.empleado.fields.entrega_dotacion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cargo') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.empleado.fields.cargo') }}</label>
                            <select class="form-control" name="cargo" id="cargo">
                                <option value disabled {{ old('cargo', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Empleado::CARGO_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('cargo', $empleado->cargo) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('cargo'))
                                <span class="help-block" role="alert">{{ $errors->first('cargo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.empleado.fields.cargo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fecha_de_ingreso') ? 'has-error' : '' }}">
                            <label for="fecha_de_ingreso">{{ trans('cruds.empleado.fields.fecha_de_ingreso') }}</label>
                            <input class="form-control date" type="text" name="fecha_de_ingreso" id="fecha_de_ingreso" value="{{ old('fecha_de_ingreso', $empleado->fecha_de_ingreso) }}">
                            @if($errors->has('fecha_de_ingreso'))
                                <span class="help-block" role="alert">{{ $errors->first('fecha_de_ingreso') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.empleado.fields.fecha_de_ingreso_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tipo_contrato') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.empleado.fields.tipo_contrato') }}</label>
                            <select class="form-control" name="tipo_contrato" id="tipo_contrato">
                                <option value disabled {{ old('tipo_contrato', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Empleado::TIPO_CONTRATO_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('tipo_contrato', $empleado->tipo_contrato) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('tipo_contrato'))
                                <span class="help-block" role="alert">{{ $errors->first('tipo_contrato') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.empleado.fields.tipo_contrato_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('asignacion_salarial') ? 'has-error' : '' }}">
                            <label for="asignacion_salarial_id">{{ trans('cruds.empleado.fields.asignacion_salarial') }}</label>
                            <select class="form-control select2" name="asignacion_salarial_id" id="asignacion_salarial_id">
                                @foreach($asignacion_salarials as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('asignacion_salarial_id') ? old('asignacion_salarial_id') : $empleado->asignacion_salarial->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('asignacion_salarial'))
                                <span class="help-block" role="alert">{{ $errors->first('asignacion_salarial') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.empleado.fields.asignacion_salarial_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('certificacion_laboral') ? 'has-error' : '' }}">
                            <label for="certificacion_laboral_id">{{ trans('cruds.empleado.fields.certificacion_laboral') }}</label>
                            <select class="form-control select2" name="certificacion_laboral_id" id="certificacion_laboral_id">
                                @foreach($certificacion_laborals as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('certificacion_laboral_id') ? old('certificacion_laboral_id') : $empleado->certificacion_laboral->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('certificacion_laboral'))
                                <span class="help-block" role="alert">{{ $errors->first('certificacion_laboral') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.empleado.fields.certificacion_laboral_helper') }}</span>
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