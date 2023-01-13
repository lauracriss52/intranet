<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEstudioRequest;
use App\Http\Requests\StoreEstudioRequest;
use App\Http\Requests\UpdateEstudioRequest;
use App\Models\Estudio;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EstudiosController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('estudio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estudios = Estudio::all();

        return view('admin.estudios.index', compact('estudios'));
    }

    public function create()
    {
        abort_if(Gate::denies('estudio_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.estudios.create');
    }

    public function store(StoreEstudioRequest $request)
    {
        $estudio = Estudio::create($request->all());

        return redirect()->route('admin.estudios.index');
    }

    public function edit(Estudio $estudio)
    {
        abort_if(Gate::denies('estudio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.estudios.edit', compact('estudio'));
    }

    public function update(UpdateEstudioRequest $request, Estudio $estudio)
    {
        $estudio->update($request->all());

        return redirect()->route('admin.estudios.index');
    }

    public function show(Estudio $estudio)
    {
        abort_if(Gate::denies('estudio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estudio->load('estudiosEmpleados');

        return view('admin.estudios.show', compact('estudio'));
    }

    public function destroy(Estudio $estudio)
    {
        abort_if(Gate::denies('estudio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estudio->delete();

        return back();
    }

    public function massDestroy(MassDestroyEstudioRequest $request)
    {
        Estudio::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
