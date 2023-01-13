<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContrasenaRequest;
use App\Http\Requests\UpdateContrasenaRequest;
use App\Http\Resources\Admin\ContrasenaResource;
use App\Models\Contrasena;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContrasenasApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('contrasena_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContrasenaResource(Contrasena::all());
    }

    public function store(StoreContrasenaRequest $request)
    {
        $contrasena = Contrasena::create($request->all());

        return (new ContrasenaResource($contrasena))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Contrasena $contrasena)
    {
        abort_if(Gate::denies('contrasena_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ContrasenaResource($contrasena);
    }

    public function update(UpdateContrasenaRequest $request, Contrasena $contrasena)
    {
        $contrasena->update($request->all());

        return (new ContrasenaResource($contrasena))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Contrasena $contrasena)
    {
        abort_if(Gate::denies('contrasena_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contrasena->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
