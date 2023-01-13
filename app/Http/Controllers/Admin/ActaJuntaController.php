<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyActaJuntumRequest;
use App\Http\Requests\StoreActaJuntumRequest;
use App\Http\Requests\UpdateActaJuntumRequest;
use App\Models\ActaJuntum;
use App\Models\Empleado;
use App\Models\Proceso;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ActaJuntaController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('acta_juntum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actaJunta = ActaJuntum::with(['proceso', 'elaboro', 'asistentes'])->get();

        $procesos = Proceso::get();

        $empleados = Empleado::get();

        return view('admin.actaJunta.index', compact('actaJunta', 'empleados', 'procesos'));
    }

    public function create()
    {
        abort_if(Gate::denies('acta_juntum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procesos = Proceso::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $elaboros = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $asistentes = Empleado::pluck('nombre', 'id');

        return view('admin.actaJunta.create', compact('asistentes', 'elaboros', 'procesos'));
    }

    public function store(StoreActaJuntumRequest $request)
    {
        $actaJuntum = ActaJuntum::create($request->all());
        $actaJuntum->asistentes()->sync($request->input('asistentes', []));
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $actaJuntum->id]);
        }

        return redirect()->route('admin.acta-junta.index');
    }

    public function edit(ActaJuntum $actaJuntum)
    {
        abort_if(Gate::denies('acta_juntum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procesos = Proceso::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $elaboros = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $asistentes = Empleado::pluck('nombre', 'id');

        $actaJuntum->load('proceso', 'elaboro', 'asistentes');

        return view('admin.actaJunta.edit', compact('actaJuntum', 'asistentes', 'elaboros', 'procesos'));
    }

    public function update(UpdateActaJuntumRequest $request, ActaJuntum $actaJuntum)
    {
        $actaJuntum->update($request->all());
        $actaJuntum->asistentes()->sync($request->input('asistentes', []));

        return redirect()->route('admin.acta-junta.index');
    }

    public function show(ActaJuntum $actaJuntum)
    {
        abort_if(Gate::denies('acta_juntum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actaJuntum->load('proceso', 'elaboro', 'asistentes', 'actaActividadesCopas');

        return view('admin.actaJunta.show', compact('actaJuntum'));
    }

    public function destroy(ActaJuntum $actaJuntum)
    {
        abort_if(Gate::denies('acta_juntum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actaJuntum->delete();

        return back();
    }

    public function massDestroy(MassDestroyActaJuntumRequest $request)
    {
        ActaJuntum::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('acta_juntum_create') && Gate::denies('acta_juntum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ActaJuntum();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
