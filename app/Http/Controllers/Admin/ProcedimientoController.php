<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProcedimientoRequest;
use App\Http\Requests\StoreProcedimientoRequest;
use App\Http\Requests\UpdateProcedimientoRequest;
use App\Models\Procedimiento;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProcedimientoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('procedimiento_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procedimientos = Procedimiento::all();

        return view('admin.procedimientos.index', compact('procedimientos'));
    }

    public function create()
    {
        abort_if(Gate::denies('procedimiento_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.procedimientos.create');
    }

    public function store(StoreProcedimientoRequest $request)
    {
        $procedimiento = Procedimiento::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $procedimiento->id]);
        }

        return redirect()->route('admin.procedimientos.index');
    }

    public function edit(Procedimiento $procedimiento)
    {
        abort_if(Gate::denies('procedimiento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.procedimientos.edit', compact('procedimiento'));
    }

    public function update(UpdateProcedimientoRequest $request, Procedimiento $procedimiento)
    {
        $procedimiento->update($request->all());

        return redirect()->route('admin.procedimientos.index');
    }

    public function show(Procedimiento $procedimiento)
    {
        abort_if(Gate::denies('procedimiento_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procedimiento->load('procedimientoProcesos');

        return view('admin.procedimientos.show', compact('procedimiento'));
    }

    public function destroy(Procedimiento $procedimiento)
    {
        abort_if(Gate::denies('procedimiento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procedimiento->delete();

        return back();
    }

    public function massDestroy(MassDestroyProcedimientoRequest $request)
    {
        Procedimiento::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('procedimiento_create') && Gate::denies('procedimiento_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Procedimiento();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
