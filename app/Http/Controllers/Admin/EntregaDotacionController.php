<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEntregaDotacionRequest;
use App\Http\Requests\StoreEntregaDotacionRequest;
use App\Http\Requests\UpdateEntregaDotacionRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EntregaDotacionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('entrega_dotacion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.entregaDotacions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('entrega_dotacion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.entregaDotacions.create');
    }

    public function store(StoreEntregaDotacionRequest $request)
    {
        $entregaDotacion = EntregaDotacion::create($request->all());

        return redirect()->route('admin.entrega-dotacions.index');
    }

    public function edit(EntregaDotacion $entregaDotacion)
    {
        abort_if(Gate::denies('entrega_dotacion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.entregaDotacions.edit', compact('entregaDotacion'));
    }

    public function update(UpdateEntregaDotacionRequest $request, EntregaDotacion $entregaDotacion)
    {
        $entregaDotacion->update($request->all());

        return redirect()->route('admin.entrega-dotacions.index');
    }

    public function show(EntregaDotacion $entregaDotacion)
    {
        abort_if(Gate::denies('entrega_dotacion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.entregaDotacions.show', compact('entregaDotacion'));
    }

    public function destroy(EntregaDotacion $entregaDotacion)
    {
        abort_if(Gate::denies('entrega_dotacion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $entregaDotacion->delete();

        return back();
    }

    public function massDestroy(MassDestroyEntregaDotacionRequest $request)
    {
        EntregaDotacion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
