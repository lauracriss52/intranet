<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEntregaequipoRequest;
use App\Http\Requests\StoreEntregaequipoRequest;
use App\Http\Requests\UpdateEntregaequipoRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EntregaequiposController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('entregaequipo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.entregaequipos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('entregaequipo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.entregaequipos.create');
    }

    public function store(StoreEntregaequipoRequest $request)
    {
        $entregaequipo = Entregaequipo::create($request->all());

        return redirect()->route('admin.entregaequipos.index');
    }

    public function edit(Entregaequipo $entregaequipo)
    {
        abort_if(Gate::denies('entregaequipo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.entregaequipos.edit', compact('entregaequipo'));
    }

    public function update(UpdateEntregaequipoRequest $request, Entregaequipo $entregaequipo)
    {
        $entregaequipo->update($request->all());

        return redirect()->route('admin.entregaequipos.index');
    }

    public function show(Entregaequipo $entregaequipo)
    {
        abort_if(Gate::denies('entregaequipo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.entregaequipos.show', compact('entregaequipo'));
    }

    public function destroy(Entregaequipo $entregaequipo)
    {
        abort_if(Gate::denies('entregaequipo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $entregaequipo->delete();

        return back();
    }

    public function massDestroy(MassDestroyEntregaequipoRequest $request)
    {
        Entregaequipo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
