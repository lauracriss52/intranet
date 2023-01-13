<div class="content">
    @can('proceso_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.procesos.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.proceso.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.proceso.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-procedimientoProcesos">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.proceso.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.proceso.fields.procedimiento') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.proceso.fields.nombre') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.proceso.fields.lider_del_proceso') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($procesos as $key => $proceso)
                                    <tr data-entry-id="{{ $proceso->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $proceso->id ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($proceso->procedimientos as $key => $item)
                                                <span class="label label-info label-many">{{ $item->codigo }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $proceso->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $proceso->lider_del_proceso ?? '' }}
                                        </td>
                                        <td>
                                            @can('proceso_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.procesos.show', $proceso->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('proceso_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.procesos.edit', $proceso->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('proceso_delete')
                                                <form action="{{ route('admin.procesos.destroy', $proceso->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('proceso_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.procesos.massDestroy') }}",
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
  let table = $('.datatable-procedimientoProcesos:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection