<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCocolabRequest;
use App\Http\Requests\StoreCocolabRequest;
use App\Http\Requests\UpdateCocolabRequest;
use App\Models\Cocolab;
use App\Models\Empleado;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CocolabController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('cocolab_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cocolabs = Cocolab::with(['empleados', 'media'])->get();

        return view('admin.cocolabs.index', compact('cocolabs'));
    }

    public function create()
    {
        abort_if(Gate::denies('cocolab_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleados = Empleado::pluck('nombre', 'id');

        return view('admin.cocolabs.create', compact('empleados'));
    }

    public function store(StoreCocolabRequest $request)
    {
        $cocolab = Cocolab::create($request->all());
        $cocolab->empleados()->sync($request->input('empleados', []));
        if ($request->input('evidencia', false)) {
            $cocolab->addMedia(storage_path('tmp/uploads/' . basename($request->input('evidencia'))))->toMediaCollection('evidencia');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $cocolab->id]);
        }

        return redirect()->route('admin.cocolabs.index');
    }

    public function edit(Cocolab $cocolab)
    {
        abort_if(Gate::denies('cocolab_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleados = Empleado::pluck('nombre', 'id');

        $cocolab->load('empleados');

        return view('admin.cocolabs.edit', compact('cocolab', 'empleados'));
    }

    public function update(UpdateCocolabRequest $request, Cocolab $cocolab)
    {
        $cocolab->update($request->all());
        $cocolab->empleados()->sync($request->input('empleados', []));
        if ($request->input('evidencia', false)) {
            if (!$cocolab->evidencia || $request->input('evidencia') !== $cocolab->evidencia->file_name) {
                if ($cocolab->evidencia) {
                    $cocolab->evidencia->delete();
                }
                $cocolab->addMedia(storage_path('tmp/uploads/' . basename($request->input('evidencia'))))->toMediaCollection('evidencia');
            }
        } elseif ($cocolab->evidencia) {
            $cocolab->evidencia->delete();
        }

        return redirect()->route('admin.cocolabs.index');
    }

    public function show(Cocolab $cocolab)
    {
        abort_if(Gate::denies('cocolab_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cocolab->load('empleados');

        return view('admin.cocolabs.show', compact('cocolab'));
    }

    public function destroy(Cocolab $cocolab)
    {
        abort_if(Gate::denies('cocolab_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cocolab->delete();

        return back();
    }

    public function massDestroy(MassDestroyCocolabRequest $request)
    {
        Cocolab::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('cocolab_create') && Gate::denies('cocolab_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Cocolab();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
