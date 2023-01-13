<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEmpleadoRequest;
use App\Http\Requests\StoreEmpleadoRequest;
use App\Http\Requests\UpdateEmpleadoRequest;
use App\Models\Actaentrega;
use App\Models\CertificacionLaboral;
use App\Models\ContactoDeEmergencium;
use App\Models\DocumentosEmpleadoo;
use App\Models\Dotacion;
use App\Models\Empleado;
use App\Models\Estudio;
use App\Models\ExperienciaLaboral;
use App\Models\Listaasistencium;
use App\Models\Salario;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmpleadoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('empleado_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleados = Empleado::with(['estudios', 'documentos_relacionados', 'contactos_de_emergencias', 'experiencia_laborals', 'actas_de_entregas', 'lista_asistencias', 'entrega_dotacions', 'asignacion_salarial', 'certificacion_laboral'])->get();

        return view('admin.empleados.index', compact('empleados'));
    }

    public function create()
    {
        abort_if(Gate::denies('empleado_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estudios = Estudio::pluck('titulo_adquirido', 'id');

        $documentos_relacionados = DocumentosEmpleadoo::pluck('tipo_de_documento', 'id');

        $contactos_de_emergencias = ContactoDeEmergencium::pluck('nombre', 'id');

        $experiencia_laborals = ExperienciaLaboral::pluck('cargo_desempenado', 'id');

        $actas_de_entregas = Actaentrega::pluck('fecha', 'id');

        $lista_asistencias = Listaasistencium::pluck('fecha', 'id');

        $entrega_dotacions = Dotacion::pluck('cantidad', 'id');

        $asignacion_salarials = Salario::pluck('salario', 'id')->prepend(trans('global.pleaseSelect'), '');

        $certificacion_laborals = CertificacionLaboral::pluck('fecha', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.empleados.create', compact('actas_de_entregas', 'asignacion_salarials', 'certificacion_laborals', 'contactos_de_emergencias', 'documentos_relacionados', 'entrega_dotacions', 'estudios', 'experiencia_laborals', 'lista_asistencias'));
    }

    public function store(StoreEmpleadoRequest $request)
    {
        $empleado = Empleado::create($request->all());
        $empleado->estudios()->sync($request->input('estudios', []));
        $empleado->documentos_relacionados()->sync($request->input('documentos_relacionados', []));
        $empleado->contactos_de_emergencias()->sync($request->input('contactos_de_emergencias', []));
        $empleado->experiencia_laborals()->sync($request->input('experiencia_laborals', []));
        $empleado->actas_de_entregas()->sync($request->input('actas_de_entregas', []));
        $empleado->lista_asistencias()->sync($request->input('lista_asistencias', []));
        $empleado->entrega_dotacions()->sync($request->input('entrega_dotacions', []));

        return redirect()->route('admin.empleados.index');
    }

    public function edit(Empleado $empleado)
    {
        abort_if(Gate::denies('empleado_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estudios = Estudio::pluck('titulo_adquirido', 'id');

        $documentos_relacionados = DocumentosEmpleadoo::pluck('tipo_de_documento', 'id');

        $contactos_de_emergencias = ContactoDeEmergencium::pluck('nombre', 'id');

        $experiencia_laborals = ExperienciaLaboral::pluck('cargo_desempenado', 'id');

        $actas_de_entregas = Actaentrega::pluck('fecha', 'id');

        $lista_asistencias = Listaasistencium::pluck('fecha', 'id');

        $entrega_dotacions = Dotacion::pluck('cantidad', 'id');

        $asignacion_salarials = Salario::pluck('salario', 'id')->prepend(trans('global.pleaseSelect'), '');

        $certificacion_laborals = CertificacionLaboral::pluck('fecha', 'id')->prepend(trans('global.pleaseSelect'), '');

        $empleado->load('estudios', 'documentos_relacionados', 'contactos_de_emergencias', 'experiencia_laborals', 'actas_de_entregas', 'lista_asistencias', 'entrega_dotacions', 'asignacion_salarial', 'certificacion_laboral');

        return view('admin.empleados.edit', compact('actas_de_entregas', 'asignacion_salarials', 'certificacion_laborals', 'contactos_de_emergencias', 'documentos_relacionados', 'empleado', 'entrega_dotacions', 'estudios', 'experiencia_laborals', 'lista_asistencias'));
    }

    public function update(UpdateEmpleadoRequest $request, Empleado $empleado)
    {
        $empleado->update($request->all());
        $empleado->estudios()->sync($request->input('estudios', []));
        $empleado->documentos_relacionados()->sync($request->input('documentos_relacionados', []));
        $empleado->contactos_de_emergencias()->sync($request->input('contactos_de_emergencias', []));
        $empleado->experiencia_laborals()->sync($request->input('experiencia_laborals', []));
        $empleado->actas_de_entregas()->sync($request->input('actas_de_entregas', []));
        $empleado->lista_asistencias()->sync($request->input('lista_asistencias', []));
        $empleado->entrega_dotacions()->sync($request->input('entrega_dotacions', []));

        return redirect()->route('admin.empleados.index');
    }

    public function show(Empleado $empleado)
    {
        abort_if(Gate::denies('empleado_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleado->load('estudios', 'documentos_relacionados', 'contactos_de_emergencias', 'experiencia_laborals', 'actas_de_entregas', 'lista_asistencias', 'entrega_dotacions', 'asignacion_salarial', 'certificacion_laboral', 'secretarioRolesSigs', 'secretarioSuplenteRolesSigs', 'empleadoTerminacionContratos', 'elaboroActaJunta', 'elaboroListaasistencia', 'elaboroActaentregas', 'recibeActaentregas', 'empleadoCertificacionLaborals', 'administradorActacierreproyectos', 'empleadoSalidaCampos', 'empleadoCocolabs', 'presidenteRolesSigs', 'empleadoActividadesCopas', 'asistentesActaJunta', 'aprobadoActainicioproyectos', 'aprobadoActacierreproyectos');

        return view('admin.empleados.show', compact('empleado'));
    }

    public function destroy(Empleado $empleado)
    {
        abort_if(Gate::denies('empleado_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $empleado->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmpleadoRequest $request)
    {
        Empleado::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
