<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyActividadesCopaRequest;
use App\Http\Requests\StoreActividadesCopaRequest;
use App\Http\Requests\UpdateActividadesCopaRequest;
use App\Models\ActaJuntum;
use App\Models\ActividadesCopa;
use App\Models\Empleado;
use App\Models\Listaasistencium;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ActividadesCopasController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('actividades_copa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actividadesCopas = ActividadesCopa::with(['empleados', 'lista_de_asistencia', 'acta', 'media'])->get();

        return view('admin.actividadesCopas.index', compact('actividadesCopas'));
    }

    public function create()
    {
        abort_if(Gate::denies('actividades_copa_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleados = Empleado::pluck('nombre', 'id');

        $lista_de_asistencias = Listaasistencium::pluck('fecha', 'id')->prepend(trans('global.pleaseSelect'), '');

        $actas = ActaJuntum::pluck('fecha', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.actividadesCopas.create', compact('actas', 'empleados', 'lista_de_asistencias'));
    }

    public function store(StoreActividadesCopaRequest $request)
    {
        $actividadesCopa = ActividadesCopa::create($request->all());
        $actividadesCopa->empleados()->sync($request->input('empleados', []));
        if ($request->input('evidencia', false)) {
            $actividadesCopa->addMedia(storage_path('tmp/uploads/' . basename($request->input('evidencia'))))->toMediaCollection('evidencia');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $actividadesCopa->id]);
        }

        return redirect()->route('admin.actividades-copas.index');
    }

    public function edit(ActividadesCopa $actividadesCopa)
    {
        abort_if(Gate::denies('actividades_copa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleados = Empleado::pluck('nombre', 'id');

        $lista_de_asistencias = Listaasistencium::pluck('fecha', 'id')->prepend(trans('global.pleaseSelect'), '');

        $actas = ActaJuntum::pluck('fecha', 'id')->prepend(trans('global.pleaseSelect'), '');

        $actividadesCopa->load('empleados', 'lista_de_asistencia', 'acta');

        return view('admin.actividadesCopas.edit', compact('actas', 'actividadesCopa', 'empleados', 'lista_de_asistencias'));
    }

    public function update(UpdateActividadesCopaRequest $request, ActividadesCopa $actividadesCopa)
    {
        $actividadesCopa->update($request->all());
        $actividadesCopa->empleados()->sync($request->input('empleados', []));
        if ($request->input('evidencia', false)) {
            if (!$actividadesCopa->evidencia || $request->input('evidencia') !== $actividadesCopa->evidencia->file_name) {
                if ($actividadesCopa->evidencia) {
                    $actividadesCopa->evidencia->delete();
                }
                $actividadesCopa->addMedia(storage_path('tmp/uploads/' . basename($request->input('evidencia'))))->toMediaCollection('evidencia');
            }
        } elseif ($actividadesCopa->evidencia) {
            $actividadesCopa->evidencia->delete();
        }

        return redirect()->route('admin.actividades-copas.index');
    }

    public function show(ActividadesCopa $actividadesCopa)
    {
        abort_if(Gate::denies('actividades_copa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actividadesCopa->load('empleados', 'lista_de_asistencia', 'acta');

        return view('admin.actividadesCopas.show', compact('actividadesCopa'));
    }

    public function destroy(ActividadesCopa $actividadesCopa)
    {
        abort_if(Gate::denies('actividades_copa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actividadesCopa->delete();

        return back();
    }

    public function massDestroy(MassDestroyActividadesCopaRequest $request)
    {
        ActividadesCopa::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('actividades_copa_create') && Gate::denies('actividades_copa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ActividadesCopa();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
