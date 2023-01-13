@extends('layouts.admin')
@section('content')
<div class="content">
    @can('permiso_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.permisos.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.permiso.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.permiso.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Permiso">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.permiso.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.permiso.fields.tipo_de_permiso') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.permiso.fields.duracion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.permiso.fields.fecha') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permisos as $key => $permiso)
                                    <tr data-entry-id="{{ $permiso->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $permiso->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Permiso::TIPO_DE_PERMISO_SELECT[$permiso->tipo_de_permiso] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $permiso->duracion ?? '' }}
                                        </td>
                                        <td>
                                            {{ $permiso->fecha ?? '' }}
                                        </td>
                                        <td>
                                            @can('permiso_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.permisos.show', $permiso->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('permiso_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.permisos.edit', $permiso->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('permiso_delete')
                                                <form action="{{ route('admin.permisos.destroy', $permiso->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('permiso_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.permisos.massDestroy') }}",
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
  let table = $('.datatable-Permiso:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection