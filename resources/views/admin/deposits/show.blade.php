@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.deposit.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.deposits.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.deposit.fields.id') }}
                        </th>
                        <td>
                            {{ $deposit->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deposit.fields.date') }}
                        </th>
                        <td>
                            {{ $deposit->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deposit.fields.depositor') }}
                        </th>
                        <td>
                            {{ $deposit->depositor->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deposit.fields.amount') }}
                        </th>
                        <td>
                            {{ $deposit->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.deposit.fields.account') }}
                        </th>
                        <td>
                            {{ $deposit->account->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.deposits.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection