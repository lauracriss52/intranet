@extends('layouts.admin')
@section('content')
<div class="content">
    @can('vacacione_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.vacaciones.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.vacacione.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.vacacione.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Vacacione">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.vacacione.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vacacione.fields.fecha_de_inicio') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vacacione.fields.fecha_de_finalizacion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vacacione.fields.reintegro') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vacacione.fields.dias') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vacacione.fields.aprobadas') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vacacione.fields.perdio_de_vacaciones_que_disfruta') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vacacione.fields.empleado') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vacacione.fields.dias_pendientes') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vacaciones as $key => $vacacione)
                                    <tr data-entry-id="{{ $vacacione->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $vacacione->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $vacacione->fecha_de_inicio ?? '' }}
                                        </td>
                                        <td>
                                            {{ $vacacione->fecha_de_finalizacion ?? '' }}
                                        </td>
                                        <td>
                                            {{ $vacacione->reintegro ?? '' }}
                                        </td>
                                        <td>
                                            {{ $vacacione->dias ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $vacacione->aprobadas ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $vacacione->aprobadas ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $vacacione->perdio_de_vacaciones_que_disfruta ?? '' }}
                                        </td>
                                        <td>
                                            {{ $vacacione->empleado->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $vacacione->dias_pendientes ?? '' }}
                                        </td>
                                        <td>
                                            @can('vacacione_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.vacaciones.show', $vacacione->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('vacacione_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.vacaciones.edit', $vacacione->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('vacacione_delete')
                                                <form action="{{ route('admin.vacaciones.destroy', $vacacione->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('vacacione_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.vacaciones.massDestroy') }}",
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
  let table = $('.datatable-Vacacione:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection