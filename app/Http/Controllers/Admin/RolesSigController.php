<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRolesSigRequest;
use App\Http\Requests\StoreRolesSigRequest;
use App\Http\Requests\UpdateRolesSigRequest;
use App\Models\Empleado;
use App\Models\RolesSig;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolesSigController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('roles_sig_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rolesSigs = RolesSig::with(['presidentes', 'secretario', 'presidente_suplente', 'secretario_suplente'])->get();

        return view('admin.rolesSigs.index', compact('rolesSigs'));
    }

    public function create()
    {
        abort_if(Gate::denies('roles_sig_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presidentes = Empleado::pluck('nombre', 'id');

        $secretarios = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $presidente_suplentes = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $secretario_suplentes = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.rolesSigs.create', compact('presidente_suplentes', 'presidentes', 'secretario_suplentes', 'secretarios'));
    }

    public function store(StoreRolesSigRequest $request)
    {
        $rolesSig = RolesSig::create($request->all());
        $rolesSig->presidentes()->sync($request->input('presidentes', []));

        return redirect()->route('admin.roles-sigs.index');
    }

    public function edit(RolesSig $rolesSig)
    {
        abort_if(Gate::denies('roles_sig_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $presidentes = Empleado::pluck('nombre', 'id');

        $secretarios = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $presidente_suplentes = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $secretario_suplentes = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rolesSig->load('presidentes', 'secretario', 'presidente_suplente', 'secretario_suplente');

        return view('admin.rolesSigs.edit', compact('presidente_suplentes', 'presidentes', 'rolesSig', 'secretario_suplentes', 'secretarios'));
    }

    public function update(UpdateRolesSigRequest $request, RolesSig $rolesSig)
    {
        $rolesSig->update($request->all());
        $rolesSig->presidentes()->sync($request->input('presidentes', []));

        return redirect()->route('admin.roles-sigs.index');
    }

    public function show(RolesSig $rolesSig)
    {
        abort_if(Gate::denies('roles_sig_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rolesSig->load('presidentes', 'secretario', 'presidente_suplente', 'secretario_suplente', 'sgiPresupuestos');

        return view('admin.rolesSigs.show', compact('rolesSig'));
    }

    public function destroy(RolesSig $rolesSig)
    {
        abort_if(Gate::denies('roles_sig_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rolesSig->delete();

        return back();
    }

    public function massDestroy(MassDestroyRolesSigRequest $request)
    {
        RolesSig::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
