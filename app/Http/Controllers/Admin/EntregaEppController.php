<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEntregaEppRequest;
use App\Http\Requests\StoreEntregaEppRequest;
use App\Http\Requests\UpdateEntregaEppRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EntregaEppController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('entrega_epp_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.entregaEpps.index');
    }

    public function create()
    {
        abort_if(Gate::denies('entrega_epp_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.entregaEpps.create');
    }

    public function store(StoreEntregaEppRequest $request)
    {
        $entregaEpp = EntregaEpp::create($request->all());

        return redirect()->route('admin.entrega-epps.index');
    }

    public function edit(EntregaEpp $entregaEpp)
    {
        abort_if(Gate::denies('entrega_epp_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.entregaEpps.edit', compact('entregaEpp'));
    }

    public function update(UpdateEntregaEppRequest $request, EntregaEpp $entregaEpp)
    {
        $entregaEpp->update($request->all());

        return redirect()->route('admin.entrega-epps.index');
    }

    public function show(EntregaEpp $entregaEpp)
    {
        abort_if(Gate::denies('entrega_epp_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.entregaEpps.show', compact('entregaEpp'));
    }

    public function destroy(EntregaEpp $entregaEpp)
    {
        abort_if(Gate::denies('entrega_epp_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $entregaEpp->delete();

        return back();
    }

    public function massDestroy(MassDestroyEntregaEppRequest $request)
    {
        EntregaEpp::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
