<div class="content">
    @can('terminacion_contrato_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.terminacion-contratos.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.terminacionContrato.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.terminacionContrato.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-empleadoTerminacionContratos">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.terminacionContrato.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.terminacionContrato.fields.fecha_terminacion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.terminacionContrato.fields.liquidacion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.terminacionContrato.fields.empleado') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($terminacionContratos as $key => $terminacionContrato)
                                    <tr data-entry-id="{{ $terminacionContrato->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $terminacionContrato->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $terminacionContrato->fecha_terminacion ?? '' }}
                                        </td>
                                        <td>
                                            @if($terminacionContrato->liquidacion)
                                                <a href="{{ $terminacionContrato->liquidacion->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $terminacionContrato->empleado->nombre ?? '' }}
                                        </td>
                                        <td>
                                            @can('terminacion_contrato_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.terminacion-contratos.show', $terminacionContrato->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('terminacion_contrato_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.terminacion-contratos.edit', $terminacionContrato->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('terminacion_contrato_delete')
                                                <form action="{{ route('admin.terminacion-contratos.destroy', $terminacionContrato->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('terminacion_contrato_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.terminacion-contratos.massDestroy') }}",
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
  let table = $('.datatable-empleadoTerminacionContratos:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection