<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const CARGO_SELECT = [
        'coordinador de sistemas Integrados' => 'Coordinador de Sistemas Integrados',
        'lider de automatizacion'            => 'Líder de automatización',
    ];

    public const TIPO_CONTRATO_SELECT = [
        'termino fijo'         => 'Termino Fijo',
        'termino indefinido'   => 'Término Indefinido',
        'prestacion servicios' => 'Prestación de Servicios',
    ];

    public $table = 'empleados';

    protected $dates = [
        'fecha_de_ingreso',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nombre',
        'cedula',
        'telefono',
        'ciudadcedula',
        'direccion',
        'cargo',
        'fecha_de_ingreso',
        'tipo_contrato',
        'asignacion_salarial_id',
        'certificacion_laboral_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function secretarioRolesSigs()
    {
        return $this->hasMany(RolesSig::class, 'secretario_id', 'id');
    }

    public function secretarioSuplenteRolesSigs()
    {
        return $this->hasMany(RolesSig::class, 'secretario_suplente_id', 'id');
    }

    public function empleadoTerminacionContratos()
    {
        return $this->hasMany(TerminacionContrato::class, 'empleado_id', 'id');
    }

    public function elaboroActaJunta()
    {
        return $this->hasMany(ActaJuntum::class, 'elaboro_id', 'id');
    }

    public function elaboroListaasistencia()
    {
        return $this->hasMany(Listaasistencium::class, 'elaboro_id', 'id');
    }

    public function elaboroActaentregas()
    {
        return $this->hasMany(Actaentrega::class, 'elaboro_id', 'id');
    }

    public function recibeActaentregas()
    {
        return $this->hasMany(Actaentrega::class, 'recibe_id', 'id');
    }

    public function empleadoCertificacionLaborals()
    {
        return $this->hasMany(CertificacionLaboral::class, 'empleado_id', 'id');
    }

    public function administradorActacierreproyectos()
    {
        return $this->hasMany(Actacierreproyecto::class, 'administrador_id', 'id');
    }

    public function empleadoSalidaCampos()
    {
        return $this->belongsToMany(SalidaCampo::class);
    }

    public function empleadoCocolabs()
    {
        return $this->belongsToMany(Cocolab::class);
    }

    public function presidenteRolesSigs()
    {
        return $this->belongsToMany(RolesSig::class);
    }

    public function empleadoActividadesCopas()
    {
        return $this->belongsToMany(ActividadesCopa::class);
    }

    public function asistentesActaJunta()
    {
        return $this->belongsToMany(ActaJuntum::class);
    }

    public function aprobadoActainicioproyectos()
    {
        return $this->belongsToMany(Actainicioproyecto::class);
    }

    public function aprobadoActacierreproyectos()
    {
        return $this->belongsToMany(Actacierreproyecto::class);
    }

    public function estudios()
    {
        return $this->belongsToMany(Estudio::class);
    }

    public function documentos_relacionados()
    {
        return $this->belongsToMany(DocumentosEmpleadoo::class);
    }

    public function contactos_de_emergencias()
    {
        return $this->belongsToMany(ContactoDeEmergencium::class);
    }

    public function experiencia_laborals()
    {
        return $this->belongsToMany(ExperienciaLaboral::class);
    }

    public function actas_de_entregas()
    {
        return $this->belongsToMany(Actaentrega::class);
    }

    public function lista_asistencias()
    {
        return $this->belongsToMany(Listaasistencium::class);
    }

    public function entrega_dotacions()
    {
        return $this->belongsToMany(Dotacion::class);
    }

    public function getFechaDeIngresoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeIngresoAttribute($value)
    {
        $this->attributes['fecha_de_ingreso'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function asignacion_salarial()
    {
        return $this->belongsTo(Salario::class, 'asignacion_salarial_id');
    }

    public function certificacion_laboral()
    {
        return $this->belongsTo(CertificacionLaboral::class, 'certificacion_laboral_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
