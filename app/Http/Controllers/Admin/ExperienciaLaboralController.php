<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExperienciaLaboralRequest;
use App\Http\Requests\StoreExperienciaLaboralRequest;
use App\Http\Requests\UpdateExperienciaLaboralRequest;
use App\Models\ExperienciaLaboral;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExperienciaLaboralController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('experiencia_laboral_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $experienciaLaborals = ExperienciaLaboral::all();

        return view('admin.experienciaLaborals.index', compact('experienciaLaborals'));
    }

    public function create()
    {
        abort_if(Gate::denies('experiencia_laboral_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.experienciaLaborals.create');
    }

    public function store(StoreExperienciaLaboralRequest $request)
    {
        $experienciaLaboral = ExperienciaLaboral::create($request->all());

        return redirect()->route('admin.experiencia-laborals.index');
    }

    public function edit(ExperienciaLaboral $experienciaLaboral)
    {
        abort_if(Gate::denies('experiencia_laboral_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.experienciaLaborals.edit', compact('experienciaLaboral'));
    }

    public function update(UpdateExperienciaLaboralRequest $request, ExperienciaLaboral $experienciaLaboral)
    {
        $experienciaLaboral->update($request->all());

        return redirect()->route('admin.experiencia-laborals.index');
    }

    public function show(ExperienciaLaboral $experienciaLaboral)
    {
        abort_if(Gate::denies('experiencia_laboral_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $experienciaLaboral->load('experienciaLaboralEmpleados');

        return view('admin.experienciaLaborals.show', compact('experienciaLaboral'));
    }

    public function destroy(ExperienciaLaboral $experienciaLaboral)
    {
        abort_if(Gate::denies('experiencia_laboral_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $experienciaLaboral->delete();

        return back();
    }

    public function massDestroy(MassDestroyExperienciaLaboralRequest $request)
    {
        ExperienciaLaboral::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
