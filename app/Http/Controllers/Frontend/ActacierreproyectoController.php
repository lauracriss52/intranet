<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyActacierreproyectoRequest;
use App\Http\Requests\StoreActacierreproyectoRequest;
use App\Http\Requests\UpdateActacierreproyectoRequest;
use App\Models\Actacierreproyecto;
use App\Models\ContactContact;
use App\Models\CrmCustomer;
use App\Models\Empleado;
use App\Models\Project;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ActacierreproyectoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('actacierreproyecto_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actacierreproyectos = Actacierreproyecto::with(['proyecto', 'empresa', 'administrador', 'contacto_area_desarrollo_proyecto', 'lista_interesados', 'aprobados'])->get();

        return view('frontend.actacierreproyectos.index', compact('actacierreproyectos'));
    }

    public function create()
    {
        abort_if(Gate::denies('actacierreproyecto_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proyectos = Project::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $empresas = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $administradors = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contacto_area_desarrollo_proyectos = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lista_interesados = ContactContact::pluck('contact_first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $aprobados = Empleado::pluck('nombre', 'id');

        return view('frontend.actacierreproyectos.create', compact('administradors', 'aprobados', 'contacto_area_desarrollo_proyectos', 'empresas', 'lista_interesados', 'proyectos'));
    }

    public function store(StoreActacierreproyectoRequest $request)
    {
        $actacierreproyecto = Actacierreproyecto::create($request->all());
        $actacierreproyecto->aprobados()->sync($request->input('aprobados', []));
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $actacierreproyecto->id]);
        }

        return redirect()->route('frontend.actacierreproyectos.index');
    }

    public function edit(Actacierreproyecto $actacierreproyecto)
    {
        abort_if(Gate::denies('actacierreproyecto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proyectos = Project::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $empresas = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $administradors = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $contacto_area_desarrollo_proyectos = Empleado::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lista_interesados = ContactContact::pluck('contact_first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $aprobados = Empleado::pluck('nombre', 'id');

        $actacierreproyecto->load('proyecto', 'empresa', 'administrador', 'contacto_area_desarrollo_proyecto', 'lista_interesados', 'aprobados');

        return view('frontend.actacierreproyectos.edit', compact('actacierreproyecto', 'administradors', 'aprobados', 'contacto_area_desarrollo_proyectos', 'empresas', 'lista_interesados', 'proyectos'));
    }

    public function update(UpdateActacierreproyectoRequest $request, Actacierreproyecto $actacierreproyecto)
    {
        $actacierreproyecto->update($request->all());
        $actacierreproyecto->aprobados()->sync($request->input('aprobados', []));

        return redirect()->route('frontend.actacierreproyectos.index');
    }

    public function show(Actacierreproyecto $actacierreproyecto)
    {
        abort_if(Gate::denies('actacierreproyecto_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actacierreproyecto->load('proyecto', 'empresa', 'administrador', 'contacto_area_desarrollo_proyecto', 'lista_interesados', 'aprobados');

        return view('frontend.actacierreproyectos.show', compact('actacierreproyecto'));
    }

    public function destroy(Actacierreproyecto $actacierreproyecto)
    {
        abort_if(Gate::denies('actacierreproyecto_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actacierreproyecto->delete();

        return back();
    }

    public function massDestroy(MassDestroyActacierreproyectoRequest $request)
    {
        Actacierreproyecto::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('actacierreproyecto_create') && Gate::denies('actacierreproyecto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Actacierreproyecto();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
