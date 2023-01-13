<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDotacionRequest;
use App\Http\Requests\StoreDotacionRequest;
use App\Http\Requests\UpdateDotacionRequest;
use App\Models\Dotacion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DotacionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dotacion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dotacions = Dotacion::with(['team'])->get();

        return view('admin.dotacions.index', compact('dotacions'));
    }

    public function create()
    {
        abort_if(Gate::denies('dotacion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dotacions.create');
    }

    public function store(StoreDotacionRequest $request)
    {
        $dotacion = Dotacion::create($request->all());

        return redirect()->route('admin.dotacions.index');
    }

    public function edit(Dotacion $dotacion)
    {
        abort_if(Gate::denies('dotacion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dotacion->load('team');

        return view('admin.dotacions.edit', compact('dotacion'));
    }

    public function update(UpdateDotacionRequest $request, Dotacion $dotacion)
    {
        $dotacion->update($request->all());

        return redirect()->route('admin.dotacions.index');
    }

    public function show(Dotacion $dotacion)
    {
        abort_if(Gate::denies('dotacion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dotacion->load('team', 'entregaDotacionEmpleados');

        return view('admin.dotacions.show', compact('dotacion'));
    }

    public function destroy(Dotacion $dotacion)
    {
        abort_if(Gate::denies('dotacion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dotacion->delete();

        return back();
    }

    public function massDestroy(MassDestroyDotacionRequest $request)
    {
        Dotacion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
