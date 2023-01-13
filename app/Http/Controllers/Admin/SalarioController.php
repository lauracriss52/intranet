<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySalarioRequest;
use App\Http\Requests\StoreSalarioRequest;
use App\Http\Requests\UpdateSalarioRequest;
use App\Models\Salario;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalarioController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('salario_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salarios = Salario::all();

        return view('admin.salarios.index', compact('salarios'));
    }

    public function create()
    {
        abort_if(Gate::denies('salario_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.salarios.create');
    }

    public function store(StoreSalarioRequest $request)
    {
        $salario = Salario::create($request->all());

        return redirect()->route('admin.salarios.index');
    }

    public function edit(Salario $salario)
    {
        abort_if(Gate::denies('salario_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.salarios.edit', compact('salario'));
    }

    public function update(UpdateSalarioRequest $request, Salario $salario)
    {
        $salario->update($request->all());

        return redirect()->route('admin.salarios.index');
    }

    public function show(Salario $salario)
    {
        abort_if(Gate::denies('salario_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salario->load('asignacionSalarialEmpleados', 'salarioCertificacionLaborals');

        return view('admin.salarios.show', compact('salario'));
    }

    public function destroy(Salario $salario)
    {
        abort_if(Gate::denies('salario_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salario->delete();

        return back();
    }

    public function massDestroy(MassDestroySalarioRequest $request)
    {
        Salario::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
