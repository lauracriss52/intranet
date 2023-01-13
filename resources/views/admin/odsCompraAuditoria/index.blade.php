@extends('layouts.admin')
@section('content')
<div class="content">
    @can('ods_compra_auditorium_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.ods-compra-auditoria.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.odsCompraAuditorium.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.odsCompraAuditorium.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-OdsCompraAuditorium">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.odsCompraAuditorium.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.odsCompraAuditorium.fields.orden_de_servicio') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transaction.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.odsCompraAuditorium.fields.proveedor') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.odsCompraAuditorium.fields.descuentos') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.odsCompraAuditorium.fields.pago') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.odsCompraAuditorium.fields.factura') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($odsCompraAuditoria as $key => $odsCompraAuditorium)
                                    <tr data-entry-id="{{ $odsCompraAuditorium->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $odsCompraAuditorium->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $odsCompraAuditorium->orden_de_servicio->amount ?? '' }}
                                        </td>
                                        <td>
                                            {{ $odsCompraAuditorium->orden_de_servicio->name ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $odsCompraAuditorium->proveedor ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $odsCompraAuditorium->proveedor ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $odsCompraAuditorium->descuentos ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $odsCompraAuditorium->descuentos ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $odsCompraAuditorium->pago ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $odsCompraAuditorium->pago ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $odsCompraAuditorium->factura ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $odsCompraAuditorium->factura ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            @can('ods_compra_auditorium_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.ods-compra-auditoria.show', $odsCompraAuditorium->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('ods_compra_auditorium_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.ods-compra-auditoria.edit', $odsCompraAuditorium->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('ods_compra_auditorium_delete')
                                                <form action="{{ route('admin.ods-compra-auditoria.destroy', $odsCompraAuditorium->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('ods_compra_auditorium_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.ods-compra-auditoria.massDestroy') }}",
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
  let table = $('.datatable-OdsCompraAuditorium:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection