<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVacacionesauditoriumRequest;
use App\Http\Requests\StoreVacacionesauditoriumRequest;
use App\Http\Requests\UpdateVacacionesauditoriumRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VacacionesauditoriaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('vacacionesauditorium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vacacionesauditoria.index');
    }

    public function create()
    {
        abort_if(Gate::denies('vacacionesauditorium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vacacionesauditoria.create');
    }

    public function store(StoreVacacionesauditoriumRequest $request)
    {
        $vacacionesauditorium = Vacacionesauditorium::create($request->all());

        return redirect()->route('admin.vacacionesauditoria.index');
    }

    public function edit(Vacacionesauditorium $vacacionesauditorium)
    {
        abort_if(Gate::denies('vacacionesauditorium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vacacionesauditoria.edit', compact('vacacionesauditorium'));
    }

    public function update(UpdateVacacionesauditoriumRequest $request, Vacacionesauditorium $vacacionesauditorium)
    {
        $vacacionesauditorium->update($request->all());

        return redirect()->route('admin.vacacionesauditoria.index');
    }

    public function show(Vacacionesauditorium $vacacionesauditorium)
    {
        abort_if(Gate::denies('vacacionesauditorium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vacacionesauditoria.show', compact('vacacionesauditorium'));
    }

    public function destroy(Vacacionesauditorium $vacacionesauditorium)
    {
        abort_if(Gate::denies('vacacionesauditorium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vacacionesauditorium->delete();

        return back();
    }

    public function massDestroy(MassDestroyVacacionesauditoriumRequest $request)
    {
        Vacacionesauditorium::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
