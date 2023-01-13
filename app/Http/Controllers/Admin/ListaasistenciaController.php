<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyListaasistenciumRequest;
use App\Http\Requests\StoreListaasistenciumRequest;
use App\Http\Requests\UpdateListaasistenciumRequest;
use App\Models\Empleado;
use App\Models\Listaasistencium;
use App\Models\Proceso;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ListaasistenciaController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('listaasistencium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listaasistencia = Listaasistencium::with(['proceso', 'elaboro'])->get();

        return view('admin.listaasistencia.index', compact('listaasistencia'));
    }

    public function create()
    {
        abort_if(Gate::denies('listaasistencium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procesos = Proceso::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $elaboros = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.listaasistencia.create', compact('elaboros', 'procesos'));
    }

    public function store(StoreListaasistenciumRequest $request)
    {
        $listaasistencium = Listaasistencium::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $listaasistencium->id]);
        }

        return redirect()->route('admin.listaasistencia.index');
    }

    public function edit(Listaasistencium $listaasistencium)
    {
        abort_if(Gate::denies('listaasistencium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procesos = Proceso::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $elaboros = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $listaasistencium->load('proceso', 'elaboro');

        return view('admin.listaasistencia.edit', compact('elaboros', 'listaasistencium', 'procesos'));
    }

    public function update(UpdateListaasistenciumRequest $request, Listaasistencium $listaasistencium)
    {
        $listaasistencium->update($request->all());

        return redirect()->route('admin.listaasistencia.index');
    }

    public function show(Listaasistencium $listaasistencium)
    {
        abort_if(Gate::denies('listaasistencium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listaasistencium->load('proceso', 'elaboro', 'listaDeAsistenciaActividadesCopas', 'listaAsistenciaDecretoLeys', 'listaAsistenciaRucs', 'listaAsistenciaEmpleados');

        return view('admin.listaasistencia.show', compact('listaasistencium'));
    }

    public function destroy(Listaasistencium $listaasistencium)
    {
        abort_if(Gate::denies('listaasistencium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listaasistencium->delete();

        return back();
    }

    public function massDestroy(MassDestroyListaasistenciumRequest $request)
    {
        Listaasistencium::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('listaasistencium_create') && Gate::denies('listaasistencium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Listaasistencium();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
