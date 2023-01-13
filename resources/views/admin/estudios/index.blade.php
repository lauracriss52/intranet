@extends('layouts.admin')
@section('content')
<div class="content">
    @can('estudio_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.estudios.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.estudio.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.estudio.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Estudio">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.estudio.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.estudio.fields.universidad') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.estudio.fields.titulo_adquirido') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.estudio.fields.fecha_de_terminacion') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.estudio.fields.nivel_educativo') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($estudios as $key => $estudio)
                                    <tr data-entry-id="{{ $estudio->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $estudio->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $estudio->universidad ?? '' }}
                                        </td>
                                        <td>
                                            {{ $estudio->titulo_adquirido ?? '' }}
                                        </td>
                                        <td>
                                            {{ $estudio->fecha_de_terminacion ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Estudio::NIVEL_EDUCATIVO_SELECT[$estudio->nivel_educativo] ?? '' }}
                                        </td>
                                        <td>
                                            @can('estudio_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.estudios.show', $estudio->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('estudio_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.estudios.edit', $estudio->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('estudio_delete')
                                                <form action="{{ route('admin.estudios.destroy', $estudio->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('estudio_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.estudios.massDestroy') }}",
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
  let table = $('.datatable-Estudio:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection