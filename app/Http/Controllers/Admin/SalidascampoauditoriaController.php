<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySalidascampoauditoriumRequest;
use App\Http\Requests\StoreSalidascampoauditoriumRequest;
use App\Http\Requests\UpdateSalidascampoauditoriumRequest;
use App\Models\SalidaCampo;
use App\Models\Salidascampoauditorium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalidascampoauditoriaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salidascampoauditorium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salidascampoauditoria = Salidascampoauditorium::with(['solicitud'])->get();

        return view('admin.salidascampoauditoria.index', compact('salidascampoauditoria'));
    }

    public function create()
    {
        abort_if(Gate::denies('salidascampoauditorium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $solicituds = SalidaCampo::pluck('fecha_de_ingreso', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.salidascampoauditoria.create', compact('solicituds'));
    }

    public function store(StoreSalidascampoauditoriumRequest $request)
    {
        $salidascampoauditorium = Salidascampoauditorium::create($request->all());

        return redirect()->route('admin.salidascampoauditoria.index');
    }

    public function edit(Salidascampoauditorium $salidascampoauditorium)
    {
        abort_if(Gate::denies('salidascampoauditorium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $solicituds = SalidaCampo::pluck('fecha_de_ingreso', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salidascampoauditorium->load('solicitud');

        return view('admin.salidascampoauditoria.edit', compact('salidascampoauditorium', 'solicituds'));
    }

    public function update(UpdateSalidascampoauditoriumRequest $request, Salidascampoauditorium $salidascampoauditorium)
    {
        $salidascampoauditorium->update($request->all());

        return redirect()->route('admin.salidascampoauditoria.index');
    }

    public function show(Salidascampoauditorium $salidascampoauditorium)
    {
        abort_if(Gate::denies('salidascampoauditorium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salidascampoauditorium->load('solicitud');

        return view('admin.salidascampoauditoria.show', compact('salidascampoauditorium'));
    }

    public function destroy(Salidascampoauditorium $salidascampoauditorium)
    {
        abort_if(Gate::denies('salidascampoauditorium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salidascampoauditorium->delete();

        return back();
    }

    public function massDestroy(MassDestroySalidascampoauditoriumRequest $request)
    {
        Salidascampoauditorium::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
