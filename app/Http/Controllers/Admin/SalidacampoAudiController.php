<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySalidacampoAudiRequest;
use App\Http\Requests\StoreSalidacampoAudiRequest;
use App\Http\Requests\UpdateSalidacampoAudiRequest;
use App\Models\SalidaCampo;
use App\Models\SalidacampoAudi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalidacampoAudiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salidacampo_audi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salidacampoAudis = SalidacampoAudi::with(['solicitud'])->get();

        return view('admin.salidacampoAudis.index', compact('salidacampoAudis'));
    }

    public function create()
    {
        abort_if(Gate::denies('salidacampo_audi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $solicituds = SalidaCampo::pluck('fecha_de_ingreso', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.salidacampoAudis.create', compact('solicituds'));
    }

    public function store(StoreSalidacampoAudiRequest $request)
    {
        $salidacampoAudi = SalidacampoAudi::create($request->all());

        return redirect()->route('admin.salidacampo-audis.index');
    }

    public function edit(SalidacampoAudi $salidacampoAudi)
    {
        abort_if(Gate::denies('salidacampo_audi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $solicituds = SalidaCampo::pluck('fecha_de_ingreso', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salidacampoAudi->load('solicitud');

        return view('admin.salidacampoAudis.edit', compact('salidacampoAudi', 'solicituds'));
    }

    public function update(UpdateSalidacampoAudiRequest $request, SalidacampoAudi $salidacampoAudi)
    {
        $salidacampoAudi->update($request->all());

        return redirect()->route('admin.salidacampo-audis.index');
    }

    public function show(SalidacampoAudi $salidacampoAudi)
    {
        abort_if(Gate::denies('salidacampo_audi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salidacampoAudi->load('solicitud');

        return view('admin.salidacampoAudis.show', compact('salidacampoAudi'));
    }

    public function destroy(SalidacampoAudi $salidacampoAudi)
    {
        abort_if(Gate::denies('salidacampo_audi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salidacampoAudi->delete();

        return back();
    }

    public function massDestroy(MassDestroySalidacampoAudiRequest $request)
    {
        SalidacampoAudi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
