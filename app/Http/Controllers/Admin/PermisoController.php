<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermisoRequest;
use App\Http\Requests\StorePermisoRequest;
use App\Http\Requests\UpdatePermisoRequest;
use App\Models\Permiso;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermisoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('permiso_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permisos = Permiso::with(['team'])->get();

        return view('admin.permisos.index', compact('permisos'));
    }

    public function create()
    {
        abort_if(Gate::denies('permiso_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permisos.create');
    }

    public function store(StorePermisoRequest $request)
    {
        $permiso = Permiso::create($request->all());

        return redirect()->route('admin.permisos.index');
    }

    public function edit(Permiso $permiso)
    {
        abort_if(Gate::denies('permiso_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permiso->load('team');

        return view('admin.permisos.edit', compact('permiso'));
    }

    public function update(UpdatePermisoRequest $request, Permiso $permiso)
    {
        $permiso->update($request->all());

        return redirect()->route('admin.permisos.index');
    }

    public function show(Permiso $permiso)
    {
        abort_if(Gate::denies('permiso_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permiso->load('team');

        return view('admin.permisos.show', compact('permiso'));
    }

    public function destroy(Permiso $permiso)
    {
        abort_if(Gate::denies('permiso_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permiso->delete();

        return back();
    }

    public function massDestroy(MassDestroyPermisoRequest $request)
    {
        Permiso::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
