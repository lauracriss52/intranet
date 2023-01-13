<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContrasenaRequest;
use App\Http\Requests\StoreContrasenaRequest;
use App\Http\Requests\UpdateContrasenaRequest;
use App\Models\Contrasena;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContrasenasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contrasena_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contrasenas = Contrasena::all();

        return view('admin.contrasenas.index', compact('contrasenas'));
    }

    public function create()
    {
        abort_if(Gate::denies('contrasena_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contrasenas.create');
    }

    public function store(StoreContrasenaRequest $request)
    {
        $contrasena = Contrasena::create($request->all());

        return redirect()->route('admin.contrasenas.index');
    }

    public function edit(Contrasena $contrasena)
    {
        abort_if(Gate::denies('contrasena_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contrasenas.edit', compact('contrasena'));
    }

    public function update(UpdateContrasenaRequest $request, Contrasena $contrasena)
    {
        $contrasena->update($request->all());

        return redirect()->route('admin.contrasenas.index');
    }

    public function show(Contrasena $contrasena)
    {
        abort_if(Gate::denies('contrasena_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contrasenas.show', compact('contrasena'));
    }

    public function destroy(Contrasena $contrasena)
    {
        abort_if(Gate::denies('contrasena_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contrasena->delete();

        return back();
    }

    public function massDestroy(MassDestroyContrasenaRequest $request)
    {
        Contrasena::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
