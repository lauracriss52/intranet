@extends('layouts.admin')
@section('content')
<div class="content">
    @can('roles_sig_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.roles-sigs.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.rolesSig.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.rolesSig.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-RolesSig">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.rolesSig.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rolesSig.fields.nombre') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rolesSig.fields.fecha') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rolesSig.fields.presidente') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rolesSig.fields.secretario') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.empleado.fields.cedula') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rolesSig.fields.presidente_suplente') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rolesSig.fields.secretario_suplente') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rolesSigs as $key => $rolesSig)
                                    <tr data-entry-id="{{ $rolesSig->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $rolesSig->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rolesSig->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rolesSig->fecha ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($rolesSig->presidentes as $key => $item)
                                                <span class="label label-info label-many">{{ $item->nombre }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $rolesSig->secretario->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rolesSig->secretario->cedula ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rolesSig->presidente_suplente->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rolesSig->secretario_suplente->nombre ?? '' }}
                                        </td>
                                        <td>
                                            @can('roles_sig_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.roles-sigs.show', $rolesSig->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('roles_sig_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.roles-sigs.edit', $rolesSig->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('roles_sig_delete')
                                                <form action="{{ route('admin.roles-sigs.destroy', $rolesSig->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('roles_sig_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.roles-sigs.massDestroy') }}",
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
  let table = $('.datatable-RolesSig:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection