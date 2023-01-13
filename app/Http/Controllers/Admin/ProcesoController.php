<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProcesoRequest;
use App\Http\Requests\StoreProcesoRequest;
use App\Http\Requests\UpdateProcesoRequest;
use App\Models\Procedimiento;
use App\Models\Proceso;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProcesoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('proceso_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procesos = Proceso::with(['procedimientos'])->get();

        return view('admin.procesos.index', compact('procesos'));
    }

    public function create()
    {
        abort_if(Gate::denies('proceso_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procedimientos = Procedimiento::pluck('codigo', 'id');

        return view('admin.procesos.create', compact('procedimientos'));
    }

    public function store(StoreProcesoRequest $request)
    {
        $proceso = Proceso::create($request->all());
        $proceso->procedimientos()->sync($request->input('procedimientos', []));

        return redirect()->route('admin.procesos.index');
    }

    public function edit(Proceso $proceso)
    {
        abort_if(Gate::denies('proceso_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procedimientos = Procedimiento::pluck('codigo', 'id');

        $proceso->load('procedimientos');

        return view('admin.procesos.edit', compact('procedimientos', 'proceso'));
    }

    public function update(UpdateProcesoRequest $request, Proceso $proceso)
    {
        $proceso->update($request->all());
        $proceso->procedimientos()->sync($request->input('procedimientos', []));

        return redirect()->route('admin.procesos.index');
    }

    public function show(Proceso $proceso)
    {
        abort_if(Gate::denies('proceso_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proceso->load('procedimientos', 'procesoActaJunta', 'procesoPresupuestos', 'procesoListaasistencia', 'procesoListadomaestros', 'procesoDecretoLeys', 'procesoRucs', 'procesoPresupuestoItems', 'gestionActaentregas');

        return view('admin.procesos.show', compact('proceso'));
    }

    public function destroy(Proceso $proceso)
    {
        abort_if(Gate::denies('proceso_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proceso->delete();

        return back();
    }

    public function massDestroy(MassDestroyProcesoRequest $request)
    {
        Proceso::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
