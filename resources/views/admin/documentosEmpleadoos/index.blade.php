@extends('layouts.admin')
@section('content')
<div class="content">
    @can('documentos_empleadoo_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.documentos-empleadoos.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.documentosEmpleadoo.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.documentosEmpleadoo.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-DocumentosEmpleadoo">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.documentosEmpleadoo.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.documentosEmpleadoo.fields.tipo_de_documento') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.documentosEmpleadoo.fields.fecha') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.documentosEmpleadoo.fields.nombre') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($documentosEmpleadoos as $key => $documentosEmpleadoo)
                                    <tr data-entry-id="{{ $documentosEmpleadoo->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $documentosEmpleadoo->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\DocumentosEmpleadoo::TIPO_DE_DOCUMENTO_SELECT[$documentosEmpleadoo->tipo_de_documento] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $documentosEmpleadoo->fecha ?? '' }}
                                        </td>
                                        <td>
                                            {{ $documentosEmpleadoo->nombre ?? '' }}
                                        </td>
                                        <td>
                                            @can('documentos_empleadoo_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.documentos-empleadoos.show', $documentosEmpleadoo->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('documentos_empleadoo_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.documentos-empleadoos.edit', $documentosEmpleadoo->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('documentos_empleadoo_delete')
                                                <form action="{{ route('admin.documentos-empleadoos.destroy', $documentosEmpleadoo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('documentos_empleadoo_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.documentos-empleadoos.massDestroy') }}",
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
  let table = $('.datatable-DocumentosEmpleadoo:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection