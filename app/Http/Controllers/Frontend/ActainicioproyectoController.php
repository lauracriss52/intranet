<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyActainicioproyectoRequest;
use App\Http\Requests\StoreActainicioproyectoRequest;
use App\Http\Requests\UpdateActainicioproyectoRequest;
use App\Models\Actainicioproyecto;
use App\Models\ContactContact;
use App\Models\CrmCustomer;
use App\Models\Empleado;
use App\Models\Project;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ActainicioproyectoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('actainicioproyecto_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actainicioproyectos = Actainicioproyecto::with(['proyecto', 'empresa', 'gerente', 'contacto_area_desarrollo_proyecto', 'lista_interesados', 'aprobados'])->get();

        return view('frontend.actainicioproyectos.index', compact('actainicioproyectos'));
    }

    public function create()
    {
        abort_if(Gate::denies('actainicioproyecto_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proyectos = Project::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $empresas = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gerentes = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contacto_area_desarrollo_proyectos = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lista_interesados = ContactContact::pluck('contact_first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $aprobados = Empleado::pluck('nombre', 'id');

        return view('frontend.actainicioproyectos.create', compact('aprobados', 'contacto_area_desarrollo_proyectos', 'empresas', 'gerentes', 'lista_interesados', 'proyectos'));
    }

    public function store(StoreActainicioproyectoRequest $request)
    {
        $actainicioproyecto = Actainicioproyecto::create($request->all());
        $actainicioproyecto->aprobados()->sync($request->input('aprobados', []));
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $actainicioproyecto->id]);
        }

        return redirect()->route('frontend.actainicioproyectos.index');
    }

    public function edit(Actainicioproyecto $actainicioproyecto)
    {
        abort_if(Gate::denies('actainicioproyecto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proyectos = Project::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $empresas = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gerentes = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contacto_area_desarrollo_proyectos = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lista_interesados = ContactContact::pluck('contact_first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $aprobados = Empleado::pluck('nombre', 'id');

        $actainicioproyecto->load('proyecto', 'empresa', 'gerente', 'contacto_area_desarrollo_proyecto', 'lista_interesados', 'aprobados');

        return view('frontend.actainicioproyectos.edit', compact('actainicioproyecto', 'aprobados', 'contacto_area_desarrollo_proyectos', 'empresas', 'gerentes', 'lista_interesados', 'proyectos'));
    }

    public function update(UpdateActainicioproyectoRequest $request, Actainicioproyecto $actainicioproyecto)
    {
        $actainicioproyecto->update($request->all());
        $actainicioproyecto->aprobados()->sync($request->input('aprobados', []));

        return redirect()->route('frontend.actainicioproyectos.index');
    }

    public function show(Actainicioproyecto $actainicioproyecto)
    {
        abort_if(Gate::denies('actainicioproyecto_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actainicioproyecto->load('proyecto', 'empresa', 'gerente', 'contacto_area_desarrollo_proyecto', 'lista_interesados', 'aprobados');

        return view('frontend.actainicioproyectos.show', compact('actainicioproyecto'));
    }

    public function destroy(Actainicioproyecto $actainicioproyecto)
    {
        abort_if(Gate::denies('actainicioproyecto_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actainicioproyecto->delete();

        return back();
    }

    public function massDestroy(MassDestroyActainicioproyectoRequest $request)
    {
        Actainicioproyecto::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('actainicioproyecto_create') && Gate::denies('actainicioproyecto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Actainicioproyecto();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
