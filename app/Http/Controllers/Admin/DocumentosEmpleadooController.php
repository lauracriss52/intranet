<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDocumentosEmpleadooRequest;
use App\Http\Requests\StoreDocumentosEmpleadooRequest;
use App\Http\Requests\UpdateDocumentosEmpleadooRequest;
use App\Models\DocumentosEmpleadoo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocumentosEmpleadooController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('documentos_empleadoo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentosEmpleadoos = DocumentosEmpleadoo::all();

        return view('admin.documentosEmpleadoos.index', compact('documentosEmpleadoos'));
    }

    public function create()
    {
        abort_if(Gate::denies('documentos_empleadoo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.documentosEmpleadoos.create');
    }

    public function store(StoreDocumentosEmpleadooRequest $request)
    {
        $documentosEmpleadoo = DocumentosEmpleadoo::create($request->all());

        return redirect()->route('admin.documentos-empleadoos.index');
    }

    public function edit(DocumentosEmpleadoo $documentosEmpleadoo)
    {
        abort_if(Gate::denies('documentos_empleadoo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.documentosEmpleadoos.edit', compact('documentosEmpleadoo'));
    }

    public function update(UpdateDocumentosEmpleadooRequest $request, DocumentosEmpleadoo $documentosEmpleadoo)
    {
        $documentosEmpleadoo->update($request->all());

        return redirect()->route('admin.documentos-empleadoos.index');
    }

    public function show(DocumentosEmpleadoo $documentosEmpleadoo)
    {
        abort_if(Gate::denies('documentos_empleadoo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentosEmpleadoo->load('documentosRelacionadosEmpleados');

        return view('admin.documentosEmpleadoos.show', compact('documentosEmpleadoo'));
    }

    public function destroy(DocumentosEmpleadoo $documentosEmpleadoo)
    {
        abort_if(Gate::denies('documentos_empleadoo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentosEmpleadoo->delete();

        return back();
    }

    public function massDestroy(MassDestroyDocumentosEmpleadooRequest $request)
    {
        DocumentosEmpleadoo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
