@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.expense.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.expenses.update", [$expense->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.expense.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $expense->date) }}" required>
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.expense.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $expense->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.expense.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $expense->amount) }}" step="0.01" required>
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="account_id">{{ trans('cruds.expense.fields.account') }}</label>
                <select class="form-control select2 {{ $errors->has('account') ? 'is-invalid' : '' }}" name="account_id" id="account_id" required>
                    @foreach($accounts as $id => $entry)
                        <option value="{{ $id }}" {{ (old('account_id') ? old('account_id') : $expense->account->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('account'))
                    <span class="text-danger">{{ $errors->first('account') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.account_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.expense.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $expense->description) }}" required>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.expense.fields.description_helper') }}</span>
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