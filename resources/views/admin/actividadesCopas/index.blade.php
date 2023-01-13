@extends('layouts.admin')
@section('content')
<div class="content">
    @can('actividades_copa_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.actividades-copas.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.actividadesCopa.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.actividadesCopa.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ActividadesCopa">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.actividadesCopa.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actividadesCopa.fields.nombre') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actividadesCopa.fields.fecha') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actividadesCopa.fields.empleado') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actividadesCopa.fields.evidencia') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actividadesCopa.fields.lista_de_asistencia') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listaasistencium.fields.hora_inicio') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listaasistencium.fields.hora_final') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listaasistencium.fields.modalidad') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actividadesCopa.fields.acta') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.hora_inicio') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.actaJuntum.fields.hora_final') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($actividadesCopas as $key => $actividadesCopa)
                                    <tr data-entry-id="{{ $actividadesCopa->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $actividadesCopa->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actividadesCopa->nombre ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actividadesCopa->fecha ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($actividadesCopa->empleados as $key => $item)
                                                <span class="label label-info label-many">{{ $item->nombre }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($actividadesCopa->evidencia)
                                                <a href="{{ $actividadesCopa->evidencia->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $actividadesCopa->lista_de_asistencia->fecha ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actividadesCopa->lista_de_asistencia->hora_inicio ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actividadesCopa->lista_de_asistencia->hora_final ?? '' }}
                                        </td>
                                        <td>
                                            @if($actividadesCopa->lista_de_asistencia)
                                                {{ $actividadesCopa->lista_de_asistencia::MODALIDAD_RADIO[$actividadesCopa->lista_de_asistencia->modalidad] ?? '' }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $actividadesCopa->acta->fecha ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actividadesCopa->acta->hora_inicio ?? '' }}
                                        </td>
                                        <td>
                                            {{ $actividadesCopa->acta->hora_final ?? '' }}
                                        </td>
                                        <td>
                                            @can('actividades_copa_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.actividades-copas.show', $actividadesCopa->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('actividades_copa_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.actividades-copas.edit', $actividadesCopa->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('actividades_copa_delete')
                                                <form action="{{ route('admin.actividades-copas.destroy', $actividadesCopa->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('actividades_copa_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.actividades-copas.massDestroy') }}",
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
  let table = $('.datatable-ActividadesCopa:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection