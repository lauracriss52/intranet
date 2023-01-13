<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyListadomaestroRequest;
use App\Http\Requests\StoreListadomaestroRequest;
use App\Http\Requests\UpdateListadomaestroRequest;
use App\Models\Listadomaestro;
use App\Models\Proceso;
use App\Models\TipoDedocumento;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ListadomaestroController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('listadomaestro_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listadomaestros = Listadomaestro::with(['proceso', 'tipodocumento', 'media'])->get();

        $procesos = Proceso::get();

        $tipo_dedocumentos = TipoDedocumento::get();

        return view('admin.listadomaestros.index', compact('listadomaestros', 'procesos', 'tipo_dedocumentos'));
    }

    public function create()
    {
        abort_if(Gate::denies('listadomaestro_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procesos = Proceso::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tipodocumentos = TipoDedocumento::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.listadomaestros.create', compact('procesos', 'tipodocumentos'));
    }

    public function store(StoreListadomaestroRequest $request)
    {
        $listadomaestro = Listadomaestro::create($request->all());

        if ($request->input('archivo', false)) {
            $listadomaestro->addMedia(storage_path('tmp/uploads/' . basename($request->input('archivo'))))->toMediaCollection('archivo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $listadomaestro->id]);
        }

        return redirect()->route('admin.listadomaestros.index');
    }

    public function edit(Listadomaestro $listadomaestro)
    {
        abort_if(Gate::denies('listadomaestro_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procesos = Proceso::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tipodocumentos = TipoDedocumento::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $listadomaestro->load('proceso', 'tipodocumento');

        return view('admin.listadomaestros.edit', compact('listadomaestro', 'procesos', 'tipodocumentos'));
    }

    public function update(UpdateListadomaestroRequest $request, Listadomaestro $listadomaestro)
    {
        $listadomaestro->update($request->all());

        if ($request->input('archivo', false)) {
            if (!$listadomaestro->archivo || $request->input('archivo') !== $listadomaestro->archivo->file_name) {
                if ($listadomaestro->archivo) {
                    $listadomaestro->archivo->delete();
                }
                $listadomaestro->addMedia(storage_path('tmp/uploads/' . basename($request->input('archivo'))))->toMediaCollection('archivo');
            }
        } elseif ($listadomaestro->archivo) {
            $listadomaestro->archivo->delete();
        }

        return redirect()->route('admin.listadomaestros.index');
    }

    public function show(Listadomaestro $listadomaestro)
    {
        abort_if(Gate::denies('listadomaestro_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listadomaestro->load('proceso', 'tipodocumento', 'listadoMaestroDecretoLeys', 'listadoMaestroRucs');

        return view('admin.listadomaestros.show', compact('listadomaestro'));
    }

    public function destroy(Listadomaestro $listadomaestro)
    {
        abort_if(Gate::denies('listadomaestro_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listadomaestro->delete();

        return back();
    }

    public function massDestroy(MassDestroyListadomaestroRequest $request)
    {
        Listadomaestro::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('listadomaestro_create') && Gate::denies('listadomaestro_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Listadomaestro();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
