<div class="content">
    @can('seleccion_proveedor_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.seleccion-proveedors.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.seleccionProveedor.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.seleccionProveedor.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-odsSeleccionProveedors">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.seleccionProveedor.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.seleccionProveedor.fields.ods') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transaction.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.seleccionProveedor.fields.proveedor') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.seleccionProveedor.fields.criterio_1') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.seleccionProveedor.fields.criterio_2') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.seleccionProveedor.fields.empresa_seleccionada') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contactCompany.fields.company_address') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contactCompany.fields.company_website') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.contactCompany.fields.company_email') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($seleccionProveedors as $key => $seleccionProveedor)
                                    <tr data-entry-id="{{ $seleccionProveedor->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $seleccionProveedor->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $seleccionProveedor->ods->amount ?? '' }}
                                        </td>
                                        <td>
                                            {{ $seleccionProveedor->ods->name ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($seleccionProveedor->proveedors as $key => $item)
                                                <span class="label label-info label-many">{{ $item->company_name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $seleccionProveedor->criterio_1 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $seleccionProveedor->criterio_2 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $seleccionProveedor->empresa_seleccionada->company_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $seleccionProveedor->empresa_seleccionada->company_address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $seleccionProveedor->empresa_seleccionada->company_website ?? '' }}
                                        </td>
                                        <td>
                                            {{ $seleccionProveedor->empresa_seleccionada->company_email ?? '' }}
                                        </td>
                                        <td>
                                            @can('seleccion_proveedor_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.seleccion-proveedors.show', $seleccionProveedor->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('seleccion_proveedor_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.seleccion-proveedors.edit', $seleccionProveedor->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('seleccion_proveedor_delete')
                                                <form action="{{ route('admin.seleccion-proveedors.destroy', $seleccionProveedor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('seleccion_proveedor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.seleccion-proveedors.massDestroy') }}",
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
  let table = $('.datatable-odsSeleccionProveedors:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection