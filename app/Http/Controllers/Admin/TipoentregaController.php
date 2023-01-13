<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTipoentregaRequest;
use App\Http\Requests\StoreTipoentregaRequest;
use App\Http\Requests\UpdateTipoentregaRequest;
use App\Models\Tipoentrega;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TipoentregaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tipoentrega_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipoentregas = Tipoentrega::all();

        return view('admin.tipoentregas.index', compact('tipoentregas'));
    }

    public function create()
    {
        abort_if(Gate::denies('tipoentrega_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tipoentregas.create');
    }

    public function store(StoreTipoentregaRequest $request)
    {
        $tipoentrega = Tipoentrega::create($request->all());

        return redirect()->route('admin.tipoentregas.index');
    }

    public function edit(Tipoentrega $tipoentrega)
    {
        abort_if(Gate::denies('tipoentrega_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tipoentregas.edit', compact('tipoentrega'));
    }

    public function update(UpdateTipoentregaRequest $request, Tipoentrega $tipoentrega)
    {
        $tipoentrega->update($request->all());

        return redirect()->route('admin.tipoentregas.index');
    }

    public function show(Tipoentrega $tipoentrega)
    {
        abort_if(Gate::denies('tipoentrega_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipoentrega->load('tipoDeEntregaActaentregas');

        return view('admin.tipoentregas.show', compact('tipoentrega'));
    }

    public function destroy(Tipoentrega $tipoentrega)
    {
        abort_if(Gate::denies('tipoentrega_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipoentrega->delete();

        return back();
    }

    public function massDestroy(MassDestroyTipoentregaRequest $request)
    {
        Tipoentrega::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
