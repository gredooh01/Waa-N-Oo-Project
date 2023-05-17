@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.waanoo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.waanoos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.waanoo.fields.id') }}
                        </th>
                        <td>
                            {{ $waanoo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.waanoo.fields.island') }}
                        </th>
                        <td>
                            {{ App\Models\Waanoo::ISLAND_SELECT[$waanoo->island] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.waanoo.fields.no') }}
                        </th>
                        <td>
                            {{ $waanoo->no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.waanoo.fields.village') }}
                        </th>
                        <td>
                            {{ $waanoo->village }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.waanoo.fields.recipient') }}
                        </th>
                        <td>
                            {{ $waanoo->recipient }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.waanoo.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Waanoo::STATUS_RADIO[$waanoo->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.waanoo.fields.expenditure_per_trip') }}
                        </th>
                        <td>
                            {{ $waanoo->expenditure_per_trip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.waanoo.fields.hire_num') }}
                        </th>
                        <td>
                            {{ $waanoo->hire_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.waanoo.fields.catch_weight') }}
                        </th>
                        <td>
                            {{ $waanoo->catch_weight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.waanoo.fields.total_catchval') }}
                        </th>
                        <td>
                            {{ $waanoo->total_catchval }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.waanoo.fields.comments') }}
                        </th>
                        <td>
                            {{ $waanoo->comments }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.waanoo.fields.remarks') }}
                        </th>
                        <td>
                            {{ $waanoo->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.waanoos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection