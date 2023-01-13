<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPresupuestoItemRequest;
use App\Http\Requests\StorePresupuestoItemRequest;
use App\Http\Requests\UpdatePresupuestoItemRequest;
use App\Models\PresupuestoItem;
use App\Models\Proceso;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PresupuestoItemsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('presupuesto_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presupuestoItems = PresupuestoItem::with(['proceso'])->get();

        return view('admin.presupuestoItems.index', compact('presupuestoItems'));
    }

    public function create()
    {
        abort_if(Gate::denies('presupuesto_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procesos = Proceso::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.presupuestoItems.create', compact('procesos'));
    }

    public function store(StorePresupuestoItemRequest $request)
    {
        $presupuestoItem = PresupuestoItem::create($request->all());

        return redirect()->route('admin.presupuesto-items.index');
    }

    public function edit(PresupuestoItem $presupuestoItem)
    {
        abort_if(Gate::denies('presupuesto_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procesos = Proceso::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $presupuestoItem->load('proceso');

        return view('admin.presupuestoItems.edit', compact('presupuestoItem', 'procesos'));
    }

    public function update(UpdatePresupuestoItemRequest $request, PresupuestoItem $presupuestoItem)
    {
        $presupuestoItem->update($request->all());

        return redirect()->route('admin.presupuesto-items.index');
    }

    public function show(PresupuestoItem $presupuestoItem)
    {
        abort_if(Gate::denies('presupuesto_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presupuestoItem->load('proceso');

        return view('admin.presupuestoItems.show', compact('presupuestoItem'));
    }

    public function destroy(PresupuestoItem $presupuestoItem)
    {
        abort_if(Gate::denies('presupuesto_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presupuestoItem->delete();

        return back();
    }

    public function massDestroy(MassDestroyPresupuestoItemRequest $request)
    {
        PresupuestoItem::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
