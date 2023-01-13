<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOdsCompraAuditoriumRequest;
use App\Http\Requests\StoreOdsCompraAuditoriumRequest;
use App\Http\Requests\UpdateOdsCompraAuditoriumRequest;
use App\Models\OdsCompraAuditorium;
use App\Models\Transaction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OdsCompraAuditoriaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ods_compra_auditorium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $odsCompraAuditoria = OdsCompraAuditorium::with(['orden_de_servicio'])->get();

        return view('admin.odsCompraAuditoria.index', compact('odsCompraAuditoria'));
    }

    public function create()
    {
        abort_if(Gate::denies('ods_compra_auditorium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orden_de_servicios = Transaction::pluck('amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.odsCompraAuditoria.create', compact('orden_de_servicios'));
    }

    public function store(StoreOdsCompraAuditoriumRequest $request)
    {
        $odsCompraAuditorium = OdsCompraAuditorium::create($request->all());

        return redirect()->route('admin.ods-compra-auditoria.index');
    }

    public function edit(OdsCompraAuditorium $odsCompraAuditorium)
    {
        abort_if(Gate::denies('ods_compra_auditorium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orden_de_servicios = Transaction::pluck('amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        $odsCompraAuditorium->load('orden_de_servicio');

        return view('admin.odsCompraAuditoria.edit', compact('odsCompraAuditorium', 'orden_de_servicios'));
    }

    public function update(UpdateOdsCompraAuditoriumRequest $request, OdsCompraAuditorium $odsCompraAuditorium)
    {
        $odsCompraAuditorium->update($request->all());

        return redirect()->route('admin.ods-compra-auditoria.index');
    }

    public function show(OdsCompraAuditorium $odsCompraAuditorium)
    {
        abort_if(Gate::denies('ods_compra_auditorium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $odsCompraAuditorium->load('orden_de_servicio');

        return view('admin.odsCompraAuditoria.show', compact('odsCompraAuditorium'));
    }

    public function destroy(OdsCompraAuditorium $odsCompraAuditorium)
    {
        abort_if(Gate::denies('ods_compra_auditorium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $odsCompraAuditorium->delete();

        return back();
    }

    public function massDestroy(MassDestroyOdsCompraAuditoriumRequest $request)
    {
        OdsCompraAuditorium::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
