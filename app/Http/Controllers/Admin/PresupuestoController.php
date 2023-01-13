<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPresupuestoRequest;
use App\Http\Requests\StorePresupuestoRequest;
use App\Http\Requests\UpdatePresupuestoRequest;
use App\Models\Presupuesto;
use App\Models\Proceso;
use App\Models\RolesSig;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PresupuestoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('presupuesto_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presupuestos = Presupuesto::with(['sgi', 'proceso'])->get();

        return view('admin.presupuestos.index', compact('presupuestos'));
    }

    public function create()
    {
        abort_if(Gate::denies('presupuesto_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sgis = RolesSig::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $procesos = Proceso::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.presupuestos.create', compact('procesos', 'sgis'));
    }

    public function store(StorePresupuestoRequest $request)
    {
        $presupuesto = Presupuesto::create($request->all());

        return redirect()->route('admin.presupuestos.index');
    }

    public function edit(Presupuesto $presupuesto)
    {
        abort_if(Gate::denies('presupuesto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sgis = RolesSig::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $procesos = Proceso::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $presupuesto->load('sgi', 'proceso');

        return view('admin.presupuestos.edit', compact('presupuesto', 'procesos', 'sgis'));
    }

    public function update(UpdatePresupuestoRequest $request, Presupuesto $presupuesto)
    {
        $presupuesto->update($request->all());

        return redirect()->route('admin.presupuestos.index');
    }

    public function show(Presupuesto $presupuesto)
    {
        abort_if(Gate::denies('presupuesto_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presupuesto->load('sgi', 'proceso');

        return view('admin.presupuestos.show', compact('presupuesto'));
    }

    public function destroy(Presupuesto $presupuesto)
    {
        abort_if(Gate::denies('presupuesto_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presupuesto->delete();

        return back();
    }

    public function massDestroy(MassDestroyPresupuestoRequest $request)
    {
        Presupuesto::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
