<div class="content">
    @can('ruc_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.rucs.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.ruc.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.ruc.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-actaRucs">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.ruc.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ruc.fields.item') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ruc.fields.documento_solicitado') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ruc.fields.proceso') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.proceso.fields.lider_del_proceso') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ruc.fields.estado') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ruc.fields.acta') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ruc.fields.lista_asistencia') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ruc.fields.listado_maestro') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rucs as $key => $ruc)
                                    <tr data-entry-id="{{ $ruc->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $ruc->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ruc->item ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ruc->documento_solicitado ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ruc->proceso->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ruc->proceso->lider_del_proceso ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Ruc::ESTADO_RADIO[$ruc->estado] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ruc->acta->fecha ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ruc->lista_asistencia->fecha ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ruc->listado_maestro->codigo_del_documento ?? '' }}
                                        </td>
                                        <td>
                                            @can('ruc_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.rucs.show', $ruc->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('ruc_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.rucs.edit', $ruc->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('ruc_delete')
                                                <form action="{{ route('admin.rucs.destroy', $ruc->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('ruc_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.rucs.massDestroy') }}",
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
  let table = $('.datatable-actaRucs:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection