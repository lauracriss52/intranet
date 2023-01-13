<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDecretoLeyRequest;
use App\Http\Requests\StoreDecretoLeyRequest;
use App\Http\Requests\UpdateDecretoLeyRequest;
use App\Models\Actaentrega;
use App\Models\DecretoLey;
use App\Models\Listaasistencium;
use App\Models\Listadomaestro;
use App\Models\Proceso;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DecretoLeyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('decreto_ley_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $decretoLeys = DecretoLey::with(['proceso', 'acta', 'lista_asistencia', 'listado_maestro'])->get();

        return view('admin.decretoLeys.index', compact('decretoLeys'));
    }

    public function create()
    {
        abort_if(Gate::denies('decreto_ley_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procesos = Proceso::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $actas = Actaentrega::pluck('fecha', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lista_asistencias = Listaasistencium::pluck('fecha', 'id')->prepend(trans('global.pleaseSelect'), '');

        $listado_maestros = Listadomaestro::pluck('codigo_del_documento', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.decretoLeys.create', compact('actas', 'lista_asistencias', 'listado_maestros', 'procesos'));
    }

    public function store(StoreDecretoLeyRequest $request)
    {
        $decretoLey = DecretoLey::create($request->all());

        return redirect()->route('admin.decreto-leys.index');
    }

    public function edit(DecretoLey $decretoLey)
    {
        abort_if(Gate::denies('decreto_ley_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procesos = Proceso::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $actas = Actaentrega::pluck('fecha', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lista_asistencias = Listaasistencium::pluck('fecha', 'id')->prepend(trans('global.pleaseSelect'), '');

        $listado_maestros = Listadomaestro::pluck('codigo_del_documento', 'id')->prepend(trans('global.pleaseSelect'), '');

        $decretoLey->load('proceso', 'acta', 'lista_asistencia', 'listado_maestro');

        return view('admin.decretoLeys.edit', compact('actas', 'decretoLey', 'lista_asistencias', 'listado_maestros', 'procesos'));
    }

    public function update(UpdateDecretoLeyRequest $request, DecretoLey $decretoLey)
    {
        $decretoLey->update($request->all());

        return redirect()->route('admin.decreto-leys.index');
    }

    public function show(DecretoLey $decretoLey)
    {
        abort_if(Gate::denies('decreto_ley_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $decretoLey->load('proceso', 'acta', 'lista_asistencia', 'listado_maestro');

        return view('admin.decretoLeys.show', compact('decretoLey'));
    }

    public function destroy(DecretoLey $decretoLey)
    {
        abort_if(Gate::denies('decreto_ley_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $decretoLey->delete();

        return back();
    }

    public function massDestroy(MassDestroyDecretoLeyRequest $request)
    {
        DecretoLey::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
