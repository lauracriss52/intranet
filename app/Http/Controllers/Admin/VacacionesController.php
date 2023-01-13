<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVacacioneRequest;
use App\Http\Requests\StoreVacacioneRequest;
use App\Http\Requests\UpdateVacacioneRequest;
use App\Models\Empleado;
use App\Models\Vacacione;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VacacionesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('vacacione_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vacaciones = Vacacione::with(['empleado', 'team'])->get();

        return view('admin.vacaciones.index', compact('vacaciones'));
    }

    public function create()
    {
        abort_if(Gate::denies('vacacione_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleados = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.vacaciones.create', compact('empleados'));
    }

    public function store(StoreVacacioneRequest $request)
    {
        $vacacione = Vacacione::create($request->all());

        return redirect()->route('admin.vacaciones.index');
    }

    public function edit(Vacacione $vacacione)
    {
        abort_if(Gate::denies('vacacione_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleados = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vacacione->load('empleado', 'team');

        return view('admin.vacaciones.edit', compact('empleados', 'vacacione'));
    }

    public function update(UpdateVacacioneRequest $request, Vacacione $vacacione)
    {
        $vacacione->update($request->all());

        return redirect()->route('admin.vacaciones.index');
    }

    public function show(Vacacione $vacacione)
    {
        abort_if(Gate::denies('vacacione_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vacacione->load('empleado', 'team');

        return view('admin.vacaciones.show', compact('vacacione'));
    }

    public function destroy(Vacacione $vacacione)
    {
        abort_if(Gate::denies('vacacione_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vacacione->delete();

        return back();
    }

    public function massDestroy(MassDestroyVacacioneRequest $request)
    {
        Vacacione::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
