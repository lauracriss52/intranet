<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIngesosGeoparkRequest;
use App\Http\Requests\StoreIngesosGeoparkRequest;
use App\Http\Requests\UpdateIngesosGeoparkRequest;
use App\Models\IngesosGeopark;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IngesosGeoparkController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ingesos_geopark_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ingesosGeoparks = IngesosGeopark::all();

        return view('admin.ingesosGeoparks.index', compact('ingesosGeoparks'));
    }

    public function create()
    {
        abort_if(Gate::denies('ingesos_geopark_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ingesosGeoparks.create');
    }

    public function store(StoreIngesosGeoparkRequest $request)
    {
        $ingesosGeopark = IngesosGeopark::create($request->all());

        return redirect()->route('admin.ingesos-geoparks.index');
    }

    public function edit(IngesosGeopark $ingesosGeopark)
    {
        abort_if(Gate::denies('ingesos_geopark_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ingesosGeoparks.edit', compact('ingesosGeopark'));
    }

    public function update(UpdateIngesosGeoparkRequest $request, IngesosGeopark $ingesosGeopark)
    {
        $ingesosGeopark->update($request->all());

        return redirect()->route('admin.ingesos-geoparks.index');
    }

    public function show(IngesosGeopark $ingesosGeopark)
    {
        abort_if(Gate::denies('ingesos_geopark_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ingesosGeoparks.show', compact('ingesosGeopark'));
    }

    public function destroy(IngesosGeopark $ingesosGeopark)
    {
        abort_if(Gate::denies('ingesos_geopark_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ingesosGeopark->delete();

        return back();
    }

    public function massDestroy(MassDestroyIngesosGeoparkRequest $request)
    {
        IngesosGeopark::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
