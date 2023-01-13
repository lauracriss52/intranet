<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTipoDedocumentoRequest;
use App\Http\Requests\StoreTipoDedocumentoRequest;
use App\Http\Requests\UpdateTipoDedocumentoRequest;
use App\Models\TipoDedocumento;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TipoDedocumentoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tipo_dedocumento_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipoDedocumentos = TipoDedocumento::all();

        return view('admin.tipoDedocumentos.index', compact('tipoDedocumentos'));
    }

    public function create()
    {
        abort_if(Gate::denies('tipo_dedocumento_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tipoDedocumentos.create');
    }

    public function store(StoreTipoDedocumentoRequest $request)
    {
        $tipoDedocumento = TipoDedocumento::create($request->all());

        return redirect()->route('admin.tipo-dedocumentos.index');
    }

    public function edit(TipoDedocumento $tipoDedocumento)
    {
        abort_if(Gate::denies('tipo_dedocumento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tipoDedocumentos.edit', compact('tipoDedocumento'));
    }

    public function update(UpdateTipoDedocumentoRequest $request, TipoDedocumento $tipoDedocumento)
    {
        $tipoDedocumento->update($request->all());

        return redirect()->route('admin.tipo-dedocumentos.index');
    }

    public function show(TipoDedocumento $tipoDedocumento)
    {
        abort_if(Gate::denies('tipo_dedocumento_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipoDedocumento->load('tipodocumentoListadomaestros');

        return view('admin.tipoDedocumentos.show', compact('tipoDedocumento'));
    }

    public function destroy(TipoDedocumento $tipoDedocumento)
    {
        abort_if(Gate::denies('tipo_dedocumento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipoDedocumento->delete();

        return back();
    }

    public function massDestroy(MassDestroyTipoDedocumentoRequest $request)
    {
        TipoDedocumento::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
