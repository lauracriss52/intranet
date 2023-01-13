<div class="content">
    @can('salida_campo_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.salida-campos.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.salidaCampo.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.salidaCampo.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-proveedorSalidaCampos">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.fecha_de_ingreso') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.fecha_de_salida') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.cliente') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.empleado') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.transporte_casa_aeropuerto') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.transporte_11') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.transporte_2') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.transporte_22') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.transporte_3') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.transporte_4') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.transporte_5') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.projecto') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidaCampo.fields.proveedor') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($salidaCampos as $key => $salidaCampo)
                                    <tr data-entry-id="{{ $salidaCampo->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $salidaCampo->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salidaCampo->fecha_de_ingreso ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salidaCampo->fecha_de_salida ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\SalidaCampo::CLIENTE_SELECT[$salidaCampo->cliente] ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($salidaCampo->empleados as $key => $item)
                                                <span class="label label-info label-many">{{ $item->nombre }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $salidaCampo->transporte_casa_aeropuerto ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $salidaCampo->transporte_casa_aeropuerto ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $salidaCampo->transporte_11 ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $salidaCampo->transporte_2 ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $salidaCampo->transporte_2 ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $salidaCampo->transporte_22 ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $salidaCampo->transporte_3 ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $salidaCampo->transporte_3 ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $salidaCampo->transporte_4 ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $salidaCampo->transporte_4 ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $salidaCampo->transporte_5 ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $salidaCampo->transporte_5 ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $salidaCampo->projecto->name ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($salidaCampo->proveedors as $key => $item)
                                                <span class="label label-info label-many">{{ $item->first_name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @can('salida_campo_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.salida-campos.show', $salidaCampo->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('salida_campo_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.salida-campos.edit', $salidaCampo->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('salida_campo_delete')
                                                <form action="{{ route('admin.salida-campos.destroy', $salidaCampo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('salida_campo_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.salida-campos.massDestroy') }}",
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
  let table = $('.datatable-proveedorSalidaCampos:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection