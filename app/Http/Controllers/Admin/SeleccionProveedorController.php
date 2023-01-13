<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySeleccionProveedorRequest;
use App\Http\Requests\StoreSeleccionProveedorRequest;
use App\Http\Requests\UpdateSeleccionProveedorRequest;
use App\Models\ContactCompany;
use App\Models\SeleccionProveedor;
use App\Models\Transaction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SeleccionProveedorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('seleccion_proveedor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seleccionProveedors = SeleccionProveedor::with(['ods', 'proveedors', 'empresa_seleccionada'])->get();

        return view('admin.seleccionProveedors.index', compact('seleccionProveedors'));
    }

    public function create()
    {
        abort_if(Gate::denies('seleccion_proveedor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ods = Transaction::pluck('amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        $proveedors = ContactCompany::pluck('company_name', 'id');

        $empresa_seleccionadas = ContactCompany::pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.seleccionProveedors.create', compact('empresa_seleccionadas', 'ods', 'proveedors'));
    }

    public function store(StoreSeleccionProveedorRequest $request)
    {
        $seleccionProveedor = SeleccionProveedor::create($request->all());
        $seleccionProveedor->proveedors()->sync($request->input('proveedors', []));

        return redirect()->route('admin.seleccion-proveedors.index');
    }

    public function edit(SeleccionProveedor $seleccionProveedor)
    {
        abort_if(Gate::denies('seleccion_proveedor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ods = Transaction::pluck('amount', 'id')->prepend(trans('global.pleaseSelect'), '');

        $proveedors = ContactCompany::pluck('company_name', 'id');

        $empresa_seleccionadas = ContactCompany::pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $seleccionProveedor->load('ods', 'proveedors', 'empresa_seleccionada');

        return view('admin.seleccionProveedors.edit', compact('empresa_seleccionadas', 'ods', 'proveedors', 'seleccionProveedor'));
    }

    public function update(UpdateSeleccionProveedorRequest $request, SeleccionProveedor $seleccionProveedor)
    {
        $seleccionProveedor->update($request->all());
        $seleccionProveedor->proveedors()->sync($request->input('proveedors', []));

        return redirect()->route('admin.seleccion-proveedors.index');
    }

    public function show(SeleccionProveedor $seleccionProveedor)
    {
        abort_if(Gate::denies('seleccion_proveedor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seleccionProveedor->load('ods', 'proveedors', 'empresa_seleccionada');

        return view('admin.seleccionProveedors.show', compact('seleccionProveedor'));
    }

    public function destroy(SeleccionProveedor $seleccionProveedor)
    {
        abort_if(Gate::denies('seleccion_proveedor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seleccionProveedor->delete();

        return back();
    }

    public function massDestroy(MassDestroySeleccionProveedorRequest $request)
    {
        SeleccionProveedor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
