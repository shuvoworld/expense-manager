@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.account.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.accounts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.account.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.account.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="opening_balance">{{ trans('cruds.account.fields.opening_balance') }}</label>
                <input class="form-control {{ $errors->has('opening_balance') ? 'is-invalid' : '' }}" type="number" name="opening_balance" id="opening_balance" value="{{ old('opening_balance', '0') }}" step="0.01" required>
                @if($errors->has('opening_balance'))
                    <span class="text-danger">{{ $errors->first('opening_balance') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.account.fields.opening_balance_helper') }}</span>
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