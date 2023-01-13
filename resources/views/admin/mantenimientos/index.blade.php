@extends('layouts.admin')
@section('content')
<div class="content">
    @can('mantenimiento_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.mantenimientos.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.mantenimiento.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.mantenimiento.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Mantenimiento">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.mantenimiento.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.mantenimiento.fields.fecha_programacion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.mantenimiento.fields.fecha_de_ejecucion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.mantenimiento.fields.valor') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.mantenimiento.fields.dispositivo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.asset.fields.name') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mantenimientos as $key => $mantenimiento)
                                    <tr data-entry-id="{{ $mantenimiento->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $mantenimiento->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $mantenimiento->fecha_programacion ?? '' }}
                                        </td>
                                        <td>
                                            {{ $mantenimiento->fecha_de_ejecucion ?? '' }}
                                        </td>
                                        <td>
                                            {{ $mantenimiento->valor ?? '' }}
                                        </td>
                                        <td>
                                            {{ $mantenimiento->dispositivo->serial_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $mantenimiento->dispositivo->name ?? '' }}
                                        </td>
                                        <td>
                                            @can('mantenimiento_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.mantenimientos.show', $mantenimiento->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('mantenimiento_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.mantenimientos.edit', $mantenimiento->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('mantenimiento_delete')
                                                <form action="{{ route('admin.mantenimientos.destroy', $mantenimiento->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('mantenimiento_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.mantenimientos.massDestroy') }}",
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
  let table = $('.datatable-Mantenimiento:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection