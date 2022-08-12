<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDepositorRequest;
use App\Http\Requests\StoreDepositorRequest;
use App\Http\Requests\UpdateDepositorRequest;
use App\Models\Depositor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DepositorsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('depositor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $depositors = Depositor::all();

        return view('admin.depositors.index', compact('depositors'));
    }

    public function create()
    {
        abort_if(Gate::denies('depositor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.depositors.create');
    }

    public function store(StoreDepositorRequest $request)
    {
        $depositor = Depositor::create($request->all());

        return redirect()->route('admin.depositors.index');
    }

    public function edit(Depositor $depositor)
    {
        abort_if(Gate::denies('depositor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.depositors.edit', compact('depositor'));
    }

    public function update(UpdateDepositorRequest $request, Depositor $depositor)
    {
        $depositor->update($request->all());

        return redirect()->route('admin.depositors.index');
    }

    public function show(Depositor $depositor)
    {
        abort_if(Gate::denies('depositor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $depositor->load('depositorDeposits');

        return view('admin.depositors.show', compact('depositor'));
    }

    public function destroy(Depositor $depositor)
    {
        abort_if(Gate::denies('depositor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $depositor->delete();

        return back();
    }

    public function massDestroy(MassDestroyDepositorRequest $request)
    {
        Depositor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
