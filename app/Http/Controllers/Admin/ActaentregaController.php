<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyActaentregaRequest;
use App\Http\Requests\StoreActaentregaRequest;
use App\Http\Requests\UpdateActaentregaRequest;
use App\Models\Actaentrega;
use App\Models\Empleado;
use App\Models\Proceso;
use App\Models\Tipoentrega;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ActaentregaController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('actaentrega_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actaentregas = Actaentrega::with(['tipo_de_entregas', 'gestions', 'elaboro', 'recibe', 'media'])->get();

        $tipoentregas = Tipoentrega::get();

        $procesos = Proceso::get();

        $empleados = Empleado::get();

        return view('admin.actaentregas.index', compact('actaentregas', 'empleados', 'procesos', 'tipoentregas'));
    }

    public function create()
    {
        abort_if(Gate::denies('actaentrega_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipo_de_entregas = Tipoentrega::pluck('nombre', 'id');

        $gestions = Proceso::pluck('nombre', 'id');

        $elaboros = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $recibes = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.actaentregas.create', compact('elaboros', 'gestions', 'recibes', 'tipo_de_entregas'));
    }

    public function store(StoreActaentregaRequest $request)
    {
        $actaentrega = Actaentrega::create($request->all());
        $actaentrega->tipo_de_entregas()->sync($request->input('tipo_de_entregas', []));
        $actaentrega->gestions()->sync($request->input('gestions', []));
        if ($request->input('anexo', false)) {
            $actaentrega->addMedia(storage_path('tmp/uploads/' . basename($request->input('anexo'))))->toMediaCollection('anexo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $actaentrega->id]);
        }

        return redirect()->route('admin.actaentregas.index');
    }

    public function edit(Actaentrega $actaentrega)
    {
        abort_if(Gate::denies('actaentrega_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tipo_de_entregas = Tipoentrega::pluck('nombre', 'id');

        $gestions = Proceso::pluck('nombre', 'id');

        $elaboros = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $recibes = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $actaentrega->load('tipo_de_entregas', 'gestions', 'elaboro', 'recibe');

        return view('admin.actaentregas.edit', compact('actaentrega', 'elaboros', 'gestions', 'recibes', 'tipo_de_entregas'));
    }

    public function update(UpdateActaentregaRequest $request, Actaentrega $actaentrega)
    {
        $actaentrega->update($request->all());
        $actaentrega->tipo_de_entregas()->sync($request->input('tipo_de_entregas', []));
        $actaentrega->gestions()->sync($request->input('gestions', []));
        if ($request->input('anexo', false)) {
            if (!$actaentrega->anexo || $request->input('anexo') !== $actaentrega->anexo->file_name) {
                if ($actaentrega->anexo) {
                    $actaentrega->anexo->delete();
                }
                $actaentrega->addMedia(storage_path('tmp/uploads/' . basename($request->input('anexo'))))->toMediaCollection('anexo');
            }
        } elseif ($actaentrega->anexo) {
            $actaentrega->anexo->delete();
        }

        return redirect()->route('admin.actaentregas.index');
    }

    public function show(Actaentrega $actaentrega)
    {
        abort_if(Gate::denies('actaentrega_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actaentrega->load('tipo_de_entregas', 'gestions', 'elaboro', 'recibe', 'actaDecretoLeys', 'actaRucs', 'actasDeEntregaEmpleados');

        return view('admin.actaentregas.show', compact('actaentrega'));
    }

    public function destroy(Actaentrega $actaentrega)
    {
        abort_if(Gate::denies('actaentrega_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actaentrega->delete();

        return back();
    }

    public function massDestroy(MassDestroyActaentregaRequest $request)
    {
        Actaentrega::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('actaentrega_create') && Gate::denies('actaentrega_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Actaentrega();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
