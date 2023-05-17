@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.waanoo.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.waanoos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.waanoo.fields.island') }}</label>
                <select class="form-control {{ $errors->has('island') ? 'is-invalid' : '' }}" name="island" id="island" required>
                    <option value disabled {{ old('island', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Waanoo::ISLAND_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('island', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('island'))
                    <span class="text-danger">{{ $errors->first('island') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.waanoo.fields.island_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="no">{{ trans('cruds.waanoo.fields.no') }}</label>
                <input class="form-control {{ $errors->has('no') ? 'is-invalid' : '' }}" type="number" name="no" id="no" value="{{ old('no', '') }}" step="1" required>
                @if($errors->has('no'))
                    <span class="text-danger">{{ $errors->first('no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.waanoo.fields.no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="village">{{ trans('cruds.waanoo.fields.village') }}</label>
                <input class="form-control {{ $errors->has('village') ? 'is-invalid' : '' }}" type="text" name="village" id="village" value="{{ old('village', '') }}" required>
                @if($errors->has('village'))
                    <span class="text-danger">{{ $errors->first('village') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.waanoo.fields.village_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="recipient">{{ trans('cruds.waanoo.fields.recipient') }}</label>
                <input class="form-control {{ $errors->has('recipient') ? 'is-invalid' : '' }}" type="text" name="recipient" id="recipient" value="{{ old('recipient', '') }}" required>
                @if($errors->has('recipient'))
                    <span class="text-danger">{{ $errors->first('recipient') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.waanoo.fields.recipient_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.waanoo.fields.status') }}</label>
                @foreach(App\Models\Waanoo::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.waanoo.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="expenditure_per_trip">{{ trans('cruds.waanoo.fields.expenditure_per_trip') }}</label>
                <input class="form-control {{ $errors->has('expenditure_per_trip') ? 'is-invalid' : '' }}" type="number" name="expenditure_per_trip" id="expenditure_per_trip" value="{{ old('expenditure_per_trip', '') }}" step="0.01" required>
                @if($errors->has('expenditure_per_trip'))
                    <span class="text-danger">{{ $errors->first('expenditure_per_trip') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.waanoo.fields.expenditure_per_trip_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="hire_num">{{ trans('cruds.waanoo.fields.hire_num') }}</label>
                <input class="form-control {{ $errors->has('hire_num') ? 'is-invalid' : '' }}" type="number" name="hire_num" id="hire_num" value="{{ old('hire_num', '') }}" step="1" required>
                @if($errors->has('hire_num'))
                    <span class="text-danger">{{ $errors->first('hire_num') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.waanoo.fields.hire_num_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="catch_weight">{{ trans('cruds.waanoo.fields.catch_weight') }}</label>
                <input class="form-control {{ $errors->has('catch_weight') ? 'is-invalid' : '' }}" type="text" name="catch_weight" id="catch_weight" value="{{ old('catch_weight', '') }}" required>
                @if($errors->has('catch_weight'))
                    <span class="text-danger">{{ $errors->first('catch_weight') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.waanoo.fields.catch_weight_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total_catchval">{{ trans('cruds.waanoo.fields.total_catchval') }}</label>
                <input class="form-control {{ $errors->has('total_catchval') ? 'is-invalid' : '' }}" type="number" name="total_catchval" id="total_catchval" value="{{ old('total_catchval', '') }}" step="0.01" required>
                @if($errors->has('total_catchval'))
                    <span class="text-danger">{{ $errors->first('total_catchval') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.waanoo.fields.total_catchval_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="comments">{{ trans('cruds.waanoo.fields.comments') }}</label>
                <input class="form-control {{ $errors->has('comments') ? 'is-invalid' : '' }}" type="text" name="comments" id="comments" value="{{ old('comments', '') }}" required>
                @if($errors->has('comments'))
                    <span class="text-danger">{{ $errors->first('comments') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.waanoo.fields.comments_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="remarks">{{ trans('cruds.waanoo.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks" required>{{ old('remarks') }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.waanoo.fields.remarks_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection