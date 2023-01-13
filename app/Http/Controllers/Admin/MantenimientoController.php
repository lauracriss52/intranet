<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMantenimientoRequest;
use App\Http\Requests\StoreMantenimientoRequest;
use App\Http\Requests\UpdateMantenimientoRequest;
use App\Models\Asset;
use App\Models\Mantenimiento;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MantenimientoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mantenimiento_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mantenimientos = Mantenimiento::with(['dispositivo'])->get();

        return view('admin.mantenimientos.index', compact('mantenimientos'));
    }

    public function create()
    {
        abort_if(Gate::denies('mantenimiento_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dispositivos = Asset::pluck('serial_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.mantenimientos.create', compact('dispositivos'));
    }

    public function store(StoreMantenimientoRequest $request)
    {
        $mantenimiento = Mantenimiento::create($request->all());

        return redirect()->route('admin.mantenimientos.index');
    }

    public function edit(Mantenimiento $mantenimiento)
    {
        abort_if(Gate::denies('mantenimiento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dispositivos = Asset::pluck('serial_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $mantenimiento->load('dispositivo');

        return view('admin.mantenimientos.edit', compact('dispositivos', 'mantenimiento'));
    }

    public function update(UpdateMantenimientoRequest $request, Mantenimiento $mantenimiento)
    {
        $mantenimiento->update($request->all());

        return redirect()->route('admin.mantenimientos.index');
    }

    public function show(Mantenimiento $mantenimiento)
    {
        abort_if(Gate::denies('mantenimiento_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mantenimiento->load('dispositivo');

        return view('admin.mantenimientos.show', compact('mantenimiento'));
    }

    public function destroy(Mantenimiento $mantenimiento)
    {
        abort_if(Gate::denies('mantenimiento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mantenimiento->delete();

        return back();
    }

    public function massDestroy(MassDestroyMantenimientoRequest $request)
    {
        Mantenimiento::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
