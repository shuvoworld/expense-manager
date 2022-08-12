@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.deposit.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.deposits.update", [$deposit->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.deposit.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $deposit->date) }}" required>
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.deposit.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="depositor_id">{{ trans('cruds.deposit.fields.depositor') }}</label>
                <select class="form-control select2 {{ $errors->has('depositor') ? 'is-invalid' : '' }}" name="depositor_id" id="depositor_id" required>
                    @foreach($depositors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('depositor_id') ? old('depositor_id') : $deposit->depositor->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('depositor'))
                    <span class="text-danger">{{ $errors->first('depositor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.deposit.fields.depositor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.deposit.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $deposit->amount) }}" step="0.01" required>
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.deposit.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="account_id">{{ trans('cruds.deposit.fields.account') }}</label>
                <select class="form-control select2 {{ $errors->has('account') ? 'is-invalid' : '' }}" name="account_id" id="account_id" required>
                    @foreach($accounts as $id => $entry)
                        <option value="{{ $id }}" {{ (old('account_id') ? old('account_id') : $deposit->account->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('account'))
                    <span class="text-danger">{{ $errors->first('account') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.deposit.fields.account_helper') }}</span>
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