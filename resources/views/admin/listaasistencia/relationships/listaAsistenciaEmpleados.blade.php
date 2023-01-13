<div class="content">
    @can('empleado_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.empleados.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.empleado.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.empleado.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-listaAsistenciaEmpleados">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.nombre') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.estudios') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.cedula') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.telefono') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.ciudadcedula') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.direccion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.documentos_relacionados') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.contactos_de_emergencia') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.experiencia_laboral') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.actas_de_entrega') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.lista_asistencia') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.entrega_dotacion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.cargo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.fecha_de_ingreso') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.tipo_contrato') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.asignacion_salarial') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salario.fields.fecha') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.certificacion_laboral') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($empleados as $key => $empleado)
                                    <tr data-entry-id="{{ $empleado->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $empleado->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $empleado->nombre ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($empleado->estudios as $key => $item)
                                                <span class="label label-info label-many">{{ $item->titulo_adquirido }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $empleado->cedula ?? '' }}
                                        </td>
                                        <td>
                                            {{ $empleado->telefono ?? '' }}
                                        </td>
                                        <td>
                                            {{ $empleado->ciudadcedula ?? '' }}
                                        </td>
                                        <td>
                                            {{ $empleado->direccion ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($empleado->documentos_relacionados as $key => $item)
                                                <span class="label label-info label-many">{{ $item->tipo_de_documento }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($empleado->contactos_de_emergencias as $key => $item)
                                                <span class="label label-info label-many">{{ $item->nombre }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($empleado->experiencia_laborals as $key => $item)
                                                <span class="label label-info label-many">{{ $item->cargo_desempenado }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($empleado->actas_de_entregas as $key => $item)
                                                <span class="label label-info label-many">{{ $item->fecha }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($empleado->lista_asistencias as $key => $item)
                                                <span class="label label-info label-many">{{ $item->fecha }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($empleado->entrega_dotacions as $key => $item)
                                                <span class="label label-info label-many">{{ $item->cantidad }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ App\Models\Empleado::CARGO_SELECT[$empleado->cargo] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $empleado->fecha_de_ingreso ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Empleado::TIPO_CONTRATO_SELECT[$empleado->tipo_contrato] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $empleado->asignacion_salarial->salario ?? '' }}
                                        </td>
                                        <td>
                                            {{ $empleado->asignacion_salarial->fecha ?? '' }}
                                        </td>
                                        <td>
                                            {{ $empleado->certificacion_laboral->fecha ?? '' }}
                                        </td>
                                        <td>
                                            @can('empleado_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.empleados.show', $empleado->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('empleado_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.empleados.edit', $empleado->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('empleado_delete')
                                                <form action="{{ route('admin.empleados.destroy', $empleado->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('empleado_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.empleados.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-listaAsistenciaEmpleados:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection