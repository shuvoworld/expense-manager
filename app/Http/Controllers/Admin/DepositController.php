<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDepositRequest;
use App\Http\Requests\StoreDepositRequest;
use App\Http\Requests\UpdateDepositRequest;
use App\Models\Account;
use App\Models\Deposit;
use App\Models\Depositor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DepositController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('deposit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deposits = Deposit::with(['depositor', 'account'])->get();

        return view('admin.deposits.index', compact('deposits'));
    }

    public function create()
    {
        abort_if(Gate::denies('deposit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $depositors = Depositor::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $accounts = Account::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.deposits.create', compact('accounts', 'depositors'));
    }

    public function store(StoreDepositRequest $request)
    {
        $deposit = Deposit::create($request->all());

        return redirect()->route('admin.deposits.index');
    }

    public function edit(Deposit $deposit)
    {
        abort_if(Gate::denies('deposit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $depositors = Depositor::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $accounts = Account::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $deposit->load('depositor', 'account');

        return view('admin.deposits.edit', compact('accounts', 'deposit', 'depositors'));
    }

    public function update(UpdateDepositRequest $request, Deposit $deposit)
    {
        $deposit->update($request->all());

        return redirect()->route('admin.deposits.index');
    }

    public function show(Deposit $deposit)
    {
        abort_if(Gate::denies('deposit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deposit->load('depositor', 'account');

        return view('admin.deposits.show', compact('deposit'));
    }

    public function destroy(Deposit $deposit)
    {
        abort_if(Gate::denies('deposit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deposit->delete();

        return back();
    }

    public function massDestroy(MassDestroyDepositRequest $request)
    {
        Deposit::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
