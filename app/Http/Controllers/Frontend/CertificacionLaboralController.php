<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCertificacionLaboralRequest;
use App\Http\Requests\StoreCertificacionLaboralRequest;
use App\Http\Requests\UpdateCertificacionLaboralRequest;
use App\Models\CertificacionLaboral;
use App\Models\Empleado;
use App\Models\Salario;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CertificacionLaboralController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('certificacion_laboral_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certificacionLaborals = CertificacionLaboral::with(['empleado', 'salario'])->get();

        return view('frontend.certificacionLaborals.index', compact('certificacionLaborals'));
    }

    public function create()
    {
        abort_if(Gate::denies('certificacion_laboral_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleados = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salarios = Salario::pluck('salario', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.certificacionLaborals.create', compact('empleados', 'salarios'));
    }

    public function store(StoreCertificacionLaboralRequest $request)
    {
        $certificacionLaboral = CertificacionLaboral::create($request->all());

        return redirect()->route('frontend.certificacion-laborals.index');
    }

    public function edit(CertificacionLaboral $certificacionLaboral)
    {
        abort_if(Gate::denies('certificacion_laboral_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleados = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salarios = Salario::pluck('salario', 'id')->prepend(trans('global.pleaseSelect'), '');

        $certificacionLaboral->load('empleado', 'salario');

        return view('frontend.certificacionLaborals.edit', compact('certificacionLaboral', 'empleados', 'salarios'));
    }

    public function update(UpdateCertificacionLaboralRequest $request, CertificacionLaboral $certificacionLaboral)
    {
        $certificacionLaboral->update($request->all());

        return redirect()->route('frontend.certificacion-laborals.index');
    }

    public function show(CertificacionLaboral $certificacionLaboral)
    {
        abort_if(Gate::denies('certificacion_laboral_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certificacionLaboral->load('empleado', 'salario', 'certificacionLaboralEmpleados');

        return view('frontend.certificacionLaborals.show', compact('certificacionLaboral'));
    }

    public function destroy(CertificacionLaboral $certificacionLaboral)
    {
        abort_if(Gate::denies('certificacion_laboral_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certificacionLaboral->delete();

        return back();
    }

    public function massDestroy(MassDestroyCertificacionLaboralRequest $request)
    {
        CertificacionLaboral::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
