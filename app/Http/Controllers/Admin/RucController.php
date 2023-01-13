<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRucRequest;
use App\Http\Requests\StoreRucRequest;
use App\Http\Requests\UpdateRucRequest;
use App\Models\Actaentrega;
use App\Models\Listaasistencium;
use App\Models\Listadomaestro;
use App\Models\Proceso;
use App\Models\Ruc;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RucController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ruc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rucs = Ruc::with(['proceso', 'acta', 'lista_asistencia', 'listado_maestro'])->get();

        return view('admin.rucs.index', compact('rucs'));
    }

    public function create()
    {
        abort_if(Gate::denies('ruc_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procesos = Proceso::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $actas = Actaentrega::pluck('fecha', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lista_asistencias = Listaasistencium::pluck('fecha', 'id')->prepend(trans('global.pleaseSelect'), '');

        $listado_maestros = Listadomaestro::pluck('codigo_del_documento', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.rucs.create', compact('actas', 'lista_asistencias', 'listado_maestros', 'procesos'));
    }

    public function store(StoreRucRequest $request)
    {
        $ruc = Ruc::create($request->all());

        return redirect()->route('admin.rucs.index');
    }

    public function edit(Ruc $ruc)
    {
        abort_if(Gate::denies('ruc_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procesos = Proceso::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $actas = Actaentrega::pluck('fecha', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lista_asistencias = Listaasistencium::pluck('fecha', 'id')->prepend(trans('global.pleaseSelect'), '');

        $listado_maestros = Listadomaestro::pluck('codigo_del_documento', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ruc->load('proceso', 'acta', 'lista_asistencia', 'listado_maestro');

        return view('admin.rucs.edit', compact('actas', 'lista_asistencias', 'listado_maestros', 'procesos', 'ruc'));
    }

    public function update(UpdateRucRequest $request, Ruc $ruc)
    {
        $ruc->update($request->all());

        return redirect()->route('admin.rucs.index');
    }

    public function show(Ruc $ruc)
    {
        abort_if(Gate::denies('ruc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ruc->load('proceso', 'acta', 'lista_asistencia', 'listado_maestro');

        return view('admin.rucs.show', compact('ruc'));
    }

    public function destroy(Ruc $ruc)
    {
        abort_if(Gate::denies('ruc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ruc->delete();

        return back();
    }

    public function massDestroy(MassDestroyRucRequest $request)
    {
        Ruc::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
