<div class="content">
    @can('actaentrega_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.actaentregas.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.actaentrega.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.actaentrega.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-gestionActaentregas">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.actaentrega.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actaentrega.fields.fecha') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actaentrega.fields.tipo_de_entrega') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actaentrega.fields.ciudad') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actaentrega.fields.modalidad') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actaentrega.fields.gestion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actaentrega.fields.elaboro') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actaentrega.fields.recibe') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actaentrega.fields.anexo') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($actaentregas as $key => $actaentrega)
                                    <tr data-entry-id="{{ $actaentrega->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $actaentrega->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actaentrega->fecha ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($actaentrega->tipo_de_entregas as $key => $item)
                                                <span class="label label-info label-many">{{ $item->nombre }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $actaentrega->ciudad ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Actaentrega::MODALIDAD_RADIO[$actaentrega->modalidad] ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($actaentrega->gestions as $key => $item)
                                                <span class="label label-info label-many">{{ $item->nombre }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $actaentrega->elaboro->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actaentrega->recibe->nombre ?? '' }}
                                        </td>
                                        <td>
                                            @if($actaentrega->anexo)
                                                <a href="{{ $actaentrega->anexo->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @can('actaentrega_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.actaentregas.show', $actaentrega->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('actaentrega_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.actaentregas.edit', $actaentrega->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('actaentrega_delete')
                                                <form action="{{ route('admin.actaentregas.destroy', $actaentrega->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('actaentrega_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.actaentregas.massDestroy') }}",
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
  let table = $('.datatable-gestionActaentregas:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection