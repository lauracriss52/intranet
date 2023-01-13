@extends('layouts.admin')
@section('content')
<div class="content">
    @can('experiencia_laboral_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.experiencia-laborals.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.experienciaLaboral.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.experienciaLaboral.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ExperienciaLaboral">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.experienciaLaboral.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.experienciaLaboral.fields.empresa') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.experienciaLaboral.fields.fecha_de_inicio') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.experienciaLaboral.fields.fecha_fin') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.experienciaLaboral.fields.correo_telefono') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.experienciaLaboral.fields.ubicacion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.experienciaLaboral.fields.cargo_desempenado') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.experienciaLaboral.fields.tareas') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($experienciaLaborals as $key => $experienciaLaboral)
                                    <tr data-entry-id="{{ $experienciaLaboral->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $experienciaLaboral->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $experienciaLaboral->empresa ?? '' }}
                                        </td>
                                        <td>
                                            {{ $experienciaLaboral->fecha_de_inicio ?? '' }}
                                        </td>
                                        <td>
                                            {{ $experienciaLaboral->fecha_fin ?? '' }}
                                        </td>
                                        <td>
                                            {{ $experienciaLaboral->correo_telefono ?? '' }}
                                        </td>
                                        <td>
                                            {{ $experienciaLaboral->ubicacion ?? '' }}
                                        </td>
                                        <td>
                                            {{ $experienciaLaboral->cargo_desempenado ?? '' }}
                                        </td>
                                        <td>
                                            {{ $experienciaLaboral->tareas ?? '' }}
                                        </td>
                                        <td>
                                            @can('experiencia_laboral_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.experiencia-laborals.show', $experienciaLaboral->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('experiencia_laboral_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.experiencia-laborals.edit', $experienciaLaboral->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('experiencia_laboral_delete')
                                                <form action="{{ route('admin.experiencia-laborals.destroy', $experienciaLaboral->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('experiencia_laboral_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.experiencia-laborals.massDestroy') }}",
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
  let table = $('.datatable-ExperienciaLaboral:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection