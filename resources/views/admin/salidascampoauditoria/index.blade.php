@extends('layouts.admin')
@section('content')
<div class="content">
    @can('salidascampoauditorium_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.salidascampoauditoria.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.salidascampoauditorium.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.salidascampoauditorium.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Salidascampoauditorium">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.solicitud') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.gestionar_documentos') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.solicitud_de_transporte') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.vuelo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.formulario_edica') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.covid') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.induccion_campo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.estado') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.matriz') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.excel') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.informar') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.salidascampoauditorium.fields.ods') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($salidascampoauditoria as $key => $salidascampoauditorium)
                                    <tr data-entry-id="{{ $salidascampoauditorium->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $salidascampoauditorium->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $salidascampoauditorium->solicitud->fecha_de_ingreso ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $salidascampoauditorium->gestionar_documentos ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $salidascampoauditorium->gestionar_documentos ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $salidascampoauditorium->solicitud_de_transporte ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $salidascampoauditorium->solicitud_de_transporte ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $salidascampoauditorium->vuelo ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $salidascampoauditorium->vuelo ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $salidascampoauditorium->formulario_edica ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $salidascampoauditorium->formulario_edica ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $salidascampoauditorium->covid ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $salidascampoauditorium->covid ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $salidascampoauditorium->induccion_campo ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $salidascampoauditorium->induccion_campo ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $salidascampoauditorium->estado ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $salidascampoauditorium->estado ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $salidascampoauditorium->matriz ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $salidascampoauditorium->matriz ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $salidascampoauditorium->excel ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $salidascampoauditorium->excel ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $salidascampoauditorium->informar ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $salidascampoauditorium->informar ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $salidascampoauditorium->ods ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $salidascampoauditorium->ods ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            @can('salidascampoauditorium_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.salidascampoauditoria.show', $salidascampoauditorium->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('salidascampoauditorium_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.salidascampoauditoria.edit', $salidascampoauditorium->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('salidascampoauditorium_delete')
                                                <form action="{{ route('admin.salidascampoauditoria.destroy', $salidascampoauditorium->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('salidascampoauditorium_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.salidascampoauditoria.massDestroy') }}",
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
  let table = $('.datatable-Salidascampoauditorium:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection