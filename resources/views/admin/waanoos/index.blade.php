@extends('layouts.admin')
@section('content')
@can('waanoo_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.waanoos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.waanoo.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.waanoo.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Waanoo">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.waanoo.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.waanoo.fields.island') }}
                        </th>
                        <th>
                            {{ trans('cruds.waanoo.fields.no') }}
                        </th>
                        <th>
                            {{ trans('cruds.waanoo.fields.village') }}
                        </th>
                        <th>
                            {{ trans('cruds.waanoo.fields.recipient') }}
                        </th>
                        <th>
                            {{ trans('cruds.waanoo.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.waanoo.fields.expenditure_per_trip') }}
                        </th>
                        <th>
                            {{ trans('cruds.waanoo.fields.hire_num') }}
                        </th>
                        <th>
                            {{ trans('cruds.waanoo.fields.catch_weight') }}
                        </th>
                        <th>
                            {{ trans('cruds.waanoo.fields.total_catchval') }}
                        </th>
                        <th>
                            {{ trans('cruds.waanoo.fields.comments') }}
                        </th>
                        <th>
                            {{ trans('cruds.waanoo.fields.remarks') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($waanoos as $key => $waanoo)
                        <tr data-entry-id="{{ $waanoo->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $waanoo->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Waanoo::ISLAND_SELECT[$waanoo->island] ?? '' }}
                            </td>
                            <td>
                                {{ $waanoo->no ?? '' }}
                            </td>
                            <td>
                                {{ $waanoo->village ?? '' }}
                            </td>
                            <td>
                                {{ $waanoo->recipient ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Waanoo::STATUS_RADIO[$waanoo->status] ?? '' }}
                            </td>
                            <td>
                                {{ $waanoo->expenditure_per_trip ?? '' }}
                            </td>
                            <td>
                                {{ $waanoo->hire_num ?? '' }}
                            </td>
                            <td>
                                {{ $waanoo->catch_weight ?? '' }}
                            </td>
                            <td>
                                {{ $waanoo->total_catchval ?? '' }}
                            </td>
                            <td>
                                {{ $waanoo->comments ?? '' }}
                            </td>
                            <td>
                                {{ $waanoo->remarks ?? '' }}
                            </td>
                            <td>
                                @can('waanoo_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.waanoos.show', $waanoo->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('waanoo_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.waanoos.edit', $waanoo->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('waanoo_delete')
                                    <form action="{{ route('admin.waanoos.destroy', $waanoo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('waanoo_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.waanoos.massDestroy') }}",
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
    pageLength: 50,
  });
  let table = $('.datatable-Waanoo:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection