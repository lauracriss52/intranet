@extends('layouts.admin')
@section('content')
<div class="content">
    @can('ingesos_geopark_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.ingesos-geoparks.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.ingesosGeopark.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.ingesosGeopark.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-IngesosGeopark">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.gestionar_documentos') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.requerimiento_hse') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.diligenciar_formatos') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.enviar_documentacion_hse') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.solicitar_induccion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.transporte_1') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.transporte_2') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.hospedaje_1') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.hospedaje_villanueva') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.viaticos') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.notificacion_salida') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.transporte_villanueva_bogota') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.hospedaje_bogota') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ingesosGeopark.fields.hospedaje_villanueva_salida') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ingesosGeoparks as $key => $ingesosGeopark)
                                    <tr data-entry-id="{{ $ingesosGeopark->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $ingesosGeopark->id ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $ingesosGeopark->gestionar_documentos ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->gestionar_documentos ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $ingesosGeopark->requerimiento_hse ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->requerimiento_hse ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $ingesosGeopark->diligenciar_formatos ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->diligenciar_formatos ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $ingesosGeopark->enviar_documentacion_hse ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->enviar_documentacion_hse ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $ingesosGeopark->solicitar_induccion ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->solicitar_induccion ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $ingesosGeopark->transporte_1 ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->transporte_1 ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $ingesosGeopark->transporte_2 ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->transporte_2 ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $ingesosGeopark->hospedaje_1 ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->hospedaje_1 ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $ingesosGeopark->hospedaje_villanueva ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->hospedaje_villanueva ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $ingesosGeopark->viaticos ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->viaticos ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $ingesosGeopark->notificacion_salida ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->notificacion_salida ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $ingesosGeopark->transporte_villanueva_bogota ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->transporte_villanueva_bogota ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $ingesosGeopark->hospedaje_bogota ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->hospedaje_bogota ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $ingesosGeopark->hospedaje_villanueva_salida ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $ingesosGeopark->hospedaje_villanueva_salida ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            @can('ingesos_geopark_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.ingesos-geoparks.show', $ingesosGeopark->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('ingesos_geopark_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.ingesos-geoparks.edit', $ingesosGeopark->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('ingesos_geopark_delete')
                                                <form action="{{ route('admin.ingesos-geoparks.destroy', $ingesosGeopark->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('ingesos_geopark_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.ingesos-geoparks.massDestroy') }}",
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
  let table = $('.datatable-IngesosGeopark:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection