@extends('layouts.admin')
@section('content')
<div class="content">
    @can('cocolab_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.cocolabs.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.cocolab.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.cocolab.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Cocolab">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.cocolab.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cocolab.fields.nombre') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cocolab.fields.fecha') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cocolab.fields.empleado') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cocolab.fields.evidencia') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cocolabs as $key => $cocolab)
                                    <tr data-entry-id="{{ $cocolab->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $cocolab->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cocolab->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cocolab->fecha ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($cocolab->empleados as $key => $item)
                                                <span class="label label-info label-many">{{ $item->nombre }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($cocolab->evidencia)
                                                <a href="{{ $cocolab->evidencia->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @can('cocolab_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.cocolabs.show', $cocolab->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('cocolab_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.cocolabs.edit', $cocolab->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('cocolab_delete')
                                                <form action="{{ route('admin.cocolabs.destroy', $cocolab->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('cocolab_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.cocolabs.massDestroy') }}",
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
  let table = $('.datatable-Cocolab:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection