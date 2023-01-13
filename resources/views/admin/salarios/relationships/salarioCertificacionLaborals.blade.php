<div class="content">
    @can('certificacion_laboral_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.certificacion-laborals.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.certificacionLaboral.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.certificacionLaboral.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-salarioCertificacionLaborals">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.certificacionLaboral.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.certificacionLaboral.fields.fecha') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.certificacionLaboral.fields.empleado') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.cedula') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.ciudadcedula') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.fecha_de_ingreso') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.cargo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.tipo_contrato') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.certificacionLaboral.fields.salario') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($certificacionLaborals as $key => $certificacionLaboral)
                                    <tr data-entry-id="{{ $certificacionLaboral->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $certificacionLaboral->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $certificacionLaboral->fecha ?? '' }}
                                        </td>
                                        <td>
                                            {{ $certificacionLaboral->empleado->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $certificacionLaboral->empleado->cedula ?? '' }}
                                        </td>
                                        <td>
                                            {{ $certificacionLaboral->empleado->ciudadcedula ?? '' }}
                                        </td>
                                        <td>
                                            {{ $certificacionLaboral->empleado->fecha_de_ingreso ?? '' }}
                                        </td>
                                        <td>
                                            @if($certificacionLaboral->empleado)
                                                {{ $certificacionLaboral->empleado::CARGO_SELECT[$certificacionLaboral->empleado->cargo] ?? '' }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($certificacionLaboral->empleado)
                                                {{ $certificacionLaboral->empleado::TIPO_CONTRATO_SELECT[$certificacionLaboral->empleado->tipo_contrato] ?? '' }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $certificacionLaboral->salario->salario ?? '' }}
                                        </td>
                                        <td>
                                            @can('certificacion_laboral_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.certificacion-laborals.show', $certificacionLaboral->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('certificacion_laboral_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.certificacion-laborals.edit', $certificacionLaboral->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('certificacion_laboral_delete')
                                                <form action="{{ route('admin.certificacion-laborals.destroy', $certificacionLaboral->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('certificacion_laboral_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.certificacion-laborals.massDestroy') }}",
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
  let table = $('.datatable-salarioCertificacionLaborals:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection