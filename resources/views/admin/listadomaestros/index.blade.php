@extends('layouts.admin')
@section('content')
<div class="content">
    @can('listadomaestro_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.listadomaestros.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.listadomaestro.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.listadomaestro.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Listadomaestro">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.listadomaestro.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listadomaestro.fields.codigo_del_documento') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listadomaestro.fields.version') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listadomaestro.fields.archivo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listadomaestro.fields.proceso') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.proceso.fields.lider_del_proceso') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listadomaestro.fields.tipodocumento') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listadomaestro.fields.estado') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($procesos as $key => $item)
                                                <option value="{{ $item->nombre }}">{{ $item->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($tipo_dedocumentos as $key => $item)
                                                <option value="{{ $item->nombre }}">{{ $item->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\Listadomaestro::ESTADO_RADIO as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listadomaestros as $key => $listadomaestro)
                                    <tr data-entry-id="{{ $listadomaestro->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $listadomaestro->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $listadomaestro->codigo_del_documento ?? '' }}
                                        </td>
                                        <td>
                                            {{ $listadomaestro->version ?? '' }}
                                        </td>
                                        <td>
                                            @if($listadomaestro->archivo)
                                                <a href="{{ $listadomaestro->archivo->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $listadomaestro->proceso->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $listadomaestro->proceso->lider_del_proceso ?? '' }}
                                        </td>
                                        <td>
                                            {{ $listadomaestro->tipodocumento->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Listadomaestro::ESTADO_RADIO[$listadomaestro->estado] ?? '' }}
                                        </td>
                                        <td>
                                            @can('listadomaestro_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.listadomaestros.show', $listadomaestro->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('listadomaestro_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.listadomaestros.edit', $listadomaestro->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('listadomaestro_delete')
                                                <form action="{{ route('admin.listadomaestros.destroy', $listadomaestro->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('listadomaestro_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.listadomaestros.massDestroy') }}",
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
  let table = $('.datatable-Listadomaestro:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection