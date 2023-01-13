<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExpedientesCocolabRequest;
use App\Http\Requests\StoreExpedientesCocolabRequest;
use App\Http\Requests\UpdateExpedientesCocolabRequest;
use App\Models\ExpedientesCocolab;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExpedientesCocolabController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('expedientes_cocolab_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expedientesCocolabs = ExpedientesCocolab::all();

        return view('admin.expedientesCocolabs.index', compact('expedientesCocolabs'));
    }

    public function create()
    {
        abort_if(Gate::denies('expedientes_cocolab_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expedientesCocolabs.create');
    }

    public function store(StoreExpedientesCocolabRequest $request)
    {
        $expedientesCocolab = ExpedientesCocolab::create($request->all());

        return redirect()->route('admin.expedientes-cocolabs.index');
    }

    public function edit(ExpedientesCocolab $expedientesCocolab)
    {
        abort_if(Gate::denies('expedientes_cocolab_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expedientesCocolabs.edit', compact('expedientesCocolab'));
    }

    public function update(UpdateExpedientesCocolabRequest $request, ExpedientesCocolab $expedientesCocolab)
    {
        $expedientesCocolab->update($request->all());

        return redirect()->route('admin.expedientes-cocolabs.index');
    }

    public function show(ExpedientesCocolab $expedientesCocolab)
    {
        abort_if(Gate::denies('expedientes_cocolab_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expedientesCocolabs.show', compact('expedientesCocolab'));
    }

    public function destroy(ExpedientesCocolab $expedientesCocolab)
    {
        abort_if(Gate::denies('expedientes_cocolab_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expedientesCocolab->delete();

        return back();
    }

    public function massDestroy(MassDestroyExpedientesCocolabRequest $request)
    {
        ExpedientesCocolab::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
