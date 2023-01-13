<div class="content">
    @can('decreto_ley_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.decreto-leys.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.decretoLey.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.decretoLey.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-procesoDecretoLeys">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.decretoLey.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.decretoLey.fields.item') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.decretoLey.fields.documento_solicitado') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.decretoLey.fields.proceso') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.proceso.fields.lider_del_proceso') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.decretoLey.fields.estado') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.decretoLey.fields.acta') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.decretoLey.fields.lista_asistencia') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.decretoLey.fields.listado_maestro') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($decretoLeys as $key => $decretoLey)
                                    <tr data-entry-id="{{ $decretoLey->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $decretoLey->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $decretoLey->item ?? '' }}
                                        </td>
                                        <td>
                                            {{ $decretoLey->documento_solicitado ?? '' }}
                                        </td>
                                        <td>
                                            {{ $decretoLey->proceso->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $decretoLey->proceso->lider_del_proceso ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\DecretoLey::ESTADO_RADIO[$decretoLey->estado] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $decretoLey->acta->fecha ?? '' }}
                                        </td>
                                        <td>
                                            {{ $decretoLey->lista_asistencia->fecha ?? '' }}
                                        </td>
                                        <td>
                                            {{ $decretoLey->listado_maestro->codigo_del_documento ?? '' }}
                                        </td>
                                        <td>
                                            @can('decreto_ley_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.decreto-leys.show', $decretoLey->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('decreto_ley_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.decreto-leys.edit', $decretoLey->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('decreto_ley_delete')
                                                <form action="{{ route('admin.decreto-leys.destroy', $decretoLey->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('decreto_ley_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.decreto-leys.massDestroy') }}",
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
  let table = $('.datatable-procesoDecretoLeys:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection