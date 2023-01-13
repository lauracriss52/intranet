<div class="content">
    @can('actainicioproyecto_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.actainicioproyectos.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.actainicioproyecto.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.actainicioproyecto.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-proyectoActainicioproyectos">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.proyecto') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.project.fields.description') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.project.fields.start_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.nombre') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.fecha') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.orde_de_compra') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.empresa') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.gerente') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.contacto_area_desarrollo_proyecto') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.costo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.lista_interesados') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.contact_first_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contactContact.fields.contact_last_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actainicioproyecto.fields.aprobado') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($actainicioproyectos as $key => $actainicioproyecto)
                                    <tr data-entry-id="{{ $actainicioproyecto->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $actainicioproyecto->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actainicioproyecto->proyecto->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actainicioproyecto->proyecto->description ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actainicioproyecto->proyecto->start_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actainicioproyecto->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actainicioproyecto->fecha ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actainicioproyecto->orde_de_compra ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actainicioproyecto->empresa->first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actainicioproyecto->gerente->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actainicioproyecto->contacto_area_desarrollo_proyecto->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actainicioproyecto->costo ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actainicioproyecto->lista_interesados->contact_first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actainicioproyecto->lista_interesados->contact_first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actainicioproyecto->lista_interesados->contact_last_name ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($actainicioproyecto->aprobados as $key => $item)
                                                <span class="label label-info label-many">{{ $item->nombre }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @can('actainicioproyecto_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.actainicioproyectos.show', $actainicioproyecto->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('actainicioproyecto_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.actainicioproyectos.edit', $actainicioproyecto->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('actainicioproyecto_delete')
                                                <form action="{{ route('admin.actainicioproyectos.destroy', $actainicioproyecto->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('actainicioproyecto_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.actainicioproyectos.massDestroy') }}",
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
  let table = $('.datatable-proyectoActainicioproyectos:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection