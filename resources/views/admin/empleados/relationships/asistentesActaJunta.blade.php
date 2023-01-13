<div class="content">
    @can('acta_juntum_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.acta-junta.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.actaJuntum.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.actaJuntum.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-asistentesActaJunta">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.fecha') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.hora_inicio') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.hora_final') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.asunto') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.proceso') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.modalidad') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.elaboro') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.asistentes') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($actaJunta as $key => $actaJuntum)
                                    <tr data-entry-id="{{ $actaJuntum->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $actaJuntum->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actaJuntum->fecha ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actaJuntum->hora_inicio ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actaJuntum->hora_final ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actaJuntum->asunto ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actaJuntum->proceso->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ActaJuntum::MODALIDAD_RADIO[$actaJuntum->modalidad] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actaJuntum->elaboro->nombre ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($actaJuntum->asistentes as $key => $item)
                                                <span class="label label-info label-many">{{ $item->nombre }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @can('acta_juntum_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.acta-junta.show', $actaJuntum->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('acta_juntum_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.acta-junta.edit', $actaJuntum->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('acta_juntum_delete')
                                                <form action="{{ route('admin.acta-junta.destroy', $actaJuntum->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('acta_juntum_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.acta-junta.massDestroy') }}",
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
  let table = $('.datatable-asistentesActaJunta:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection