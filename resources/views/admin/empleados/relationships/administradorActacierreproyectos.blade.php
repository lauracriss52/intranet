<div class="content">
    @can('actacierreproyecto_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.actacierreproyectos.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.actacierreproyecto.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.actacierreproyecto.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-administradorActacierreproyectos">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.actacierreproyecto.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actacierreproyecto.fields.proyecto') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.project.fields.description') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.project.fields.start_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actacierreproyecto.fields.nombre') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actacierreproyecto.fields.fecha') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actacierreproyecto.fields.orde_de_compra') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actacierreproyecto.fields.empresa') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actacierreproyecto.fields.administrador') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actacierreproyecto.fields.contacto_area_desarrollo_proyecto') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actacierreproyecto.fields.lista_interesados') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.contact_first_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.contact_last_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actacierreproyecto.fields.aprobado') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($actacierreproyectos as $key => $actacierreproyecto)
                                    <tr data-entry-id="{{ $actacierreproyecto->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $actacierreproyecto->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actacierreproyecto->proyecto->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actacierreproyecto->proyecto->description ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actacierreproyecto->proyecto->start_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actacierreproyecto->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actacierreproyecto->fecha ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actacierreproyecto->orde_de_compra ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actacierreproyecto->empresa->first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actacierreproyecto->administrador->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actacierreproyecto->contacto_area_desarrollo_proyecto->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actacierreproyecto->lista_interesados->contact_first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actacierreproyecto->lista_interesados->contact_first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actacierreproyecto->lista_interesados->contact_last_name ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($actacierreproyecto->aprobados as $key => $item)
                                                <span class="label label-info label-many">{{ $item->nombre }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @can('actacierreproyecto_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.actacierreproyectos.show', $actacierreproyecto->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('actacierreproyecto_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.actacierreproyectos.edit', $actacierreproyecto->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('actacierreproyecto_delete')
                                                <form action="{{ route('admin.actacierreproyectos.destroy', $actacierreproyecto->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('actacierreproyecto_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.actacierreproyectos.massDestroy') }}",
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
  let table = $('.datatable-administradorActacierreproyectos:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection