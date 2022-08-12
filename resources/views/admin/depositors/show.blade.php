@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.depositor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.depositors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.depositor.fields.id') }}
                        </th>
                        <td>
                            {{ $depositor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.depositor.fields.name') }}
                        </th>
                        <td>
                            {{ $depositor->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.depositors.index') }}">
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
            <a class="nav-link" href="#depositor_deposits" role="tab" data-toggle="tab">
                {{ trans('cruds.deposit.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="depositor_deposits">
            @includeIf('admin.depositors.relationships.depositorDeposits', ['deposits' => $depositor->depositorDeposits])
        </div>
    </div>
</div>

@endsection