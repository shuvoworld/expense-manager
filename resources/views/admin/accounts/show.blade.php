@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.account.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.accounts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.id') }}
                        </th>
                        <td>
                            {{ $account->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.name') }}
                        </th>
                        <td>
                            {{ $account->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.opening_balance') }}
                        </th>
                        <td>
                            {{ $account->opening_balance }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.accounts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#account_deposits" role="tab" data-toggle="tab">
                {{ trans('cruds.deposit.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#account_expenses" role="tab" data-toggle="tab">
                {{ trans('cruds.expense.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="account_deposits">
            @includeIf('admin.accounts.relationships.accountDeposits', ['deposits' => $account->accountDeposits])
        </div>
        <div class="tab-pane" role="tabpanel" id="account_expenses">
            @includeIf('admin.accounts.relationships.accountExpenses', ['expenses' => $account->accountExpenses])
        </div>
    </div>
</div>

@endsection