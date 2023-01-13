<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyContactoDeEmergenciumRequest;
use App\Http\Requests\StoreContactoDeEmergenciumRequest;
use App\Http\Requests\UpdateContactoDeEmergenciumRequest;
use App\Models\ContactoDeEmergencium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ContactoDeEmergenciaController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('contacto_de_emergencium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ContactoDeEmergencium::query()->select(sprintf('%s.*', (new ContactoDeEmergencium())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'contacto_de_emergencium_show';
                $editGate = 'contacto_de_emergencium_edit';
                $deleteGate = 'contacto_de_emergencium_delete';
                $crudRoutePart = 'contacto-de-emergencia';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('nombre', function ($row) {
                return $row->nombre ? $row->nombre : '';
            });
            $table->editColumn('relacion', function ($row) {
                return $row->relacion ? $row->relacion : '';
            });
            $table->editColumn('telefono', function ($row) {
                return $row->telefono ? $row->telefono : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.contactoDeEmergencia.index');
    }

    public function create()
    {
        abort_if(Gate::denies('contacto_de_emergencium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contactoDeEmergencia.create');
    }

    public function store(StoreContactoDeEmergenciumRequest $request)
    {
        $contactoDeEmergencium = ContactoDeEmergencium::create($request->all());

        return redirect()->route('admin.contacto-de-emergencia.index');
    }

    public function edit(ContactoDeEmergencium $contactoDeEmergencium)
    {
        abort_if(Gate::denies('contacto_de_emergencium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contactoDeEmergencia.edit', compact('contactoDeEmergencium'));
    }

    public function update(UpdateContactoDeEmergenciumRequest $request, ContactoDeEmergencium $contactoDeEmergencium)
    {
        $contactoDeEmergencium->update($request->all());

        return redirect()->route('admin.contacto-de-emergencia.index');
    }

    public function show(ContactoDeEmergencium $contactoDeEmergencium)
    {
        abort_if(Gate::denies('contacto_de_emergencium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactoDeEmergencium->load('contactosDeEmergenciaEmpleados');

        return view('admin.contactoDeEmergencia.show', compact('contactoDeEmergencium'));
    }

    public function destroy(ContactoDeEmergencium $contactoDeEmergencium)
    {
        abort_if(Gate::denies('contacto_de_emergencium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactoDeEmergencium->delete();

        return back();
    }

    public function massDestroy(MassDestroyContactoDeEmergenciumRequest $request)
    {
        ContactoDeEmergencium::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
