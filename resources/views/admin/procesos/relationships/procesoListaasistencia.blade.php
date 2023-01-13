<div class="content">
    @can('listaasistencium_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.listaasistencia.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.listaasistencium.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.listaasistencium.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-procesoListaasistencia">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.listaasistencium.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listaasistencium.fields.fecha') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listaasistencium.fields.hora_inicio') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listaasistencium.fields.hora_final') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listaasistencium.fields.proceso') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listaasistencium.fields.modalidad') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listaasistencium.fields.elaboro') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listaasistencia as $key => $listaasistencium)
                                    <tr data-entry-id="{{ $listaasistencium->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $listaasistencium->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $listaasistencium->fecha ?? '' }}
                                        </td>
                                        <td>
                                            {{ $listaasistencium->hora_inicio ?? '' }}
                                        </td>
                                        <td>
                                            {{ $listaasistencium->hora_final ?? '' }}
                                        </td>
                                        <td>
                                            {{ $listaasistencium->proceso->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Listaasistencium::MODALIDAD_RADIO[$listaasistencium->modalidad] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $listaasistencium->elaboro->nombre ?? '' }}
                                        </td>
                                        <td>
                                            @can('listaasistencium_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.listaasistencia.show', $listaasistencium->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('listaasistencium_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.listaasistencia.edit', $listaasistencium->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('listaasistencium_delete')
                                                <form action="{{ route('admin.listaasistencia.destroy', $listaasistencium->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('listaasistencium_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.listaasistencia.massDestroy') }}",
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
  let table = $('.datatable-procesoListaasistencia:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection