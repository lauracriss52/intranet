<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyImpuestoRequest;
use App\Http\Requests\StoreImpuestoRequest;
use App\Http\Requests\UpdateImpuestoRequest;
use App\Models\Impuesto;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImpuestoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('impuesto_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $impuestos = Impuesto::all();

        return view('frontend.impuestos.index', compact('impuestos'));
    }

    public function create()
    {
        abort_if(Gate::denies('impuesto_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.impuestos.create');
    }

    public function store(StoreImpuestoRequest $request)
    {
        $impuesto = Impuesto::create($request->all());

        return redirect()->route('frontend.impuestos.index');
    }

    public function edit(Impuesto $impuesto)
    {
        abort_if(Gate::denies('impuesto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.impuestos.edit', compact('impuesto'));
    }

    public function update(UpdateImpuestoRequest $request, Impuesto $impuesto)
    {
        $impuesto->update($request->all());

        return redirect()->route('frontend.impuestos.index');
    }

    public function show(Impuesto $impuesto)
    {
        abort_if(Gate::denies('impuesto_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.impuestos.show', compact('impuesto'));
    }

    public function destroy(Impuesto $impuesto)
    {
        abort_if(Gate::denies('impuesto_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $impuesto->delete();

        return back();
    }

    public function massDestroy(MassDestroyImpuestoRequest $request)
    {
        Impuesto::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
