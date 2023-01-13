<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTerminacionContratoRequest;
use App\Http\Requests\StoreTerminacionContratoRequest;
use App\Http\Requests\UpdateTerminacionContratoRequest;
use App\Models\Empleado;
use App\Models\TerminacionContrato;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TerminacionContratoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('terminacion_contrato_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $terminacionContratos = TerminacionContrato::with(['empleado', 'team', 'media'])->get();

        return view('admin.terminacionContratos.index', compact('terminacionContratos'));
    }

    public function create()
    {
        abort_if(Gate::denies('terminacion_contrato_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleados = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.terminacionContratos.create', compact('empleados'));
    }

    public function store(StoreTerminacionContratoRequest $request)
    {
        $terminacionContrato = TerminacionContrato::create($request->all());

        if ($request->input('liquidacion', false)) {
            $terminacionContrato->addMedia(storage_path('tmp/uploads/' . basename($request->input('liquidacion'))))->toMediaCollection('liquidacion');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $terminacionContrato->id]);
        }

        return redirect()->route('admin.terminacion-contratos.index');
    }

    public function edit(TerminacionContrato $terminacionContrato)
    {
        abort_if(Gate::denies('terminacion_contrato_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleados = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $terminacionContrato->load('empleado', 'team');

        return view('admin.terminacionContratos.edit', compact('empleados', 'terminacionContrato'));
    }

    public function update(UpdateTerminacionContratoRequest $request, TerminacionContrato $terminacionContrato)
    {
        $terminacionContrato->update($request->all());

        if ($request->input('liquidacion', false)) {
            if (!$terminacionContrato->liquidacion || $request->input('liquidacion') !== $terminacionContrato->liquidacion->file_name) {
                if ($terminacionContrato->liquidacion) {
                    $terminacionContrato->liquidacion->delete();
                }
                $terminacionContrato->addMedia(storage_path('tmp/uploads/' . basename($request->input('liquidacion'))))->toMediaCollection('liquidacion');
            }
        } elseif ($terminacionContrato->liquidacion) {
            $terminacionContrato->liquidacion->delete();
        }

        return redirect()->route('admin.terminacion-contratos.index');
    }

    public function show(TerminacionContrato $terminacionContrato)
    {
        abort_if(Gate::denies('terminacion_contrato_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $terminacionContrato->load('empleado', 'team');

        return view('admin.terminacionContratos.show', compact('terminacionContrato'));
    }

    public function destroy(TerminacionContrato $terminacionContrato)
    {
        abort_if(Gate::denies('terminacion_contrato_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $terminacionContrato->delete();

        return back();
    }

    public function massDestroy(MassDestroyTerminacionContratoRequest $request)
    {
        TerminacionContrato::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('terminacion_contrato_create') && Gate::denies('terminacion_contrato_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TerminacionContrato();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
