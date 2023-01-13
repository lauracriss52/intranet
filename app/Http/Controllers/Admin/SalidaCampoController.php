<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySalidaCampoRequest;
use App\Http\Requests\StoreSalidaCampoRequest;
use App\Http\Requests\UpdateSalidaCampoRequest;
use App\Models\CrmCustomer;
use App\Models\Empleado;
use App\Models\Project;
use App\Models\SalidaCampo;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SalidaCampoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('salida_campo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salidaCampos = SalidaCampo::with(['empleados', 'projecto', 'proveedors'])->get();

        return view('admin.salidaCampos.index', compact('salidaCampos'));
    }

    public function create()
    {
        abort_if(Gate::denies('salida_campo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleados = Empleado::pluck('nombre', 'id');

        $projectos = Project::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $proveedors = CrmCustomer::pluck('first_name', 'id');

        return view('admin.salidaCampos.create', compact('empleados', 'projectos', 'proveedors'));
    }

    public function store(StoreSalidaCampoRequest $request)
    {
        $salidaCampo = SalidaCampo::create($request->all());
        $salidaCampo->empleados()->sync($request->input('empleados', []));
        $salidaCampo->proveedors()->sync($request->input('proveedors', []));
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $salidaCampo->id]);
        }

        return redirect()->route('admin.salida-campos.index');
    }

    public function edit(SalidaCampo $salidaCampo)
    {
        abort_if(Gate::denies('salida_campo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleados = Empleado::pluck('nombre', 'id');

        $projectos = Project::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $proveedors = CrmCustomer::pluck('first_name', 'id');

        $salidaCampo->load('empleados', 'projecto', 'proveedors');

        return view('admin.salidaCampos.edit', compact('empleados', 'projectos', 'proveedors', 'salidaCampo'));
    }

    public function update(UpdateSalidaCampoRequest $request, SalidaCampo $salidaCampo)
    {
        $salidaCampo->update($request->all());
        $salidaCampo->empleados()->sync($request->input('empleados', []));
        $salidaCampo->proveedors()->sync($request->input('proveedors', []));

        return redirect()->route('admin.salida-campos.index');
    }

    public function show(SalidaCampo $salidaCampo)
    {
        abort_if(Gate::denies('salida_campo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salidaCampo->load('empleados', 'projecto', 'proveedors', 'solicitudSalidascampoauditoria', 'solicitudSalidacampoAudis');

        return view('admin.salidaCampos.show', compact('salidaCampo'));
    }

    public function destroy(SalidaCampo $salidaCampo)
    {
        abort_if(Gate::denies('salida_campo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salidaCampo->delete();

        return back();
    }

    public function massDestroy(MassDestroySalidaCampoRequest $request)
    {
        SalidaCampo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('salida_campo_create') && Gate::denies('salida_campo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SalidaCampo();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
