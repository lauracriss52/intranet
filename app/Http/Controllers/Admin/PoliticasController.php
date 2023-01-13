<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPoliticaRequest;
use App\Http\Requests\StorePoliticaRequest;
use App\Http\Requests\UpdatePoliticaRequest;
use App\Models\Politica;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PoliticasController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('politica_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $politicas = Politica::with(['media'])->get();

        return view('admin.politicas.index', compact('politicas'));
    }

    public function create()
    {
        abort_if(Gate::denies('politica_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.politicas.create');
    }

    public function store(StorePoliticaRequest $request)
    {
        $politica = Politica::create($request->all());

        if ($request->input('archivo_firmado', false)) {
            $politica->addMedia(storage_path('tmp/uploads/' . basename($request->input('archivo_firmado'))))->toMediaCollection('archivo_firmado');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $politica->id]);
        }

        return redirect()->route('admin.politicas.index');
    }

    public function edit(Politica $politica)
    {
        abort_if(Gate::denies('politica_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.politicas.edit', compact('politica'));
    }

    public function update(UpdatePoliticaRequest $request, Politica $politica)
    {
        $politica->update($request->all());

        if ($request->input('archivo_firmado', false)) {
            if (!$politica->archivo_firmado || $request->input('archivo_firmado') !== $politica->archivo_firmado->file_name) {
                if ($politica->archivo_firmado) {
                    $politica->archivo_firmado->delete();
                }
                $politica->addMedia(storage_path('tmp/uploads/' . basename($request->input('archivo_firmado'))))->toMediaCollection('archivo_firmado');
            }
        } elseif ($politica->archivo_firmado) {
            $politica->archivo_firmado->delete();
        }

        return redirect()->route('admin.politicas.index');
    }

    public function show(Politica $politica)
    {
        abort_if(Gate::denies('politica_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.politicas.show', compact('politica'));
    }

    public function destroy(Politica $politica)
    {
        abort_if(Gate::denies('politica_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $politica->delete();

        return back();
    }

    public function massDestroy(MassDestroyPoliticaRequest $request)
    {
        Politica::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('politica_create') && Gate::denies('politica_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Politica();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
