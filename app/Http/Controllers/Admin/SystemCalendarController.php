<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\Models\Empleado',
            'date_field' => 'created_at',
            'field'      => 'id',
            'prefix'     => '',
            'suffix'     => 'Cumpleaños Empleados',
            'route'      => 'admin.empleados.edit',
        ],
        [
            'model'      => '\App\Models\SalidaCampo',
            'date_field' => 'fecha_de_ingreso',
            'field'      => 'cliente',
            'prefix'     => 'Proyectos',
            'suffix'     => 'Ingreso a Campo',
            'route'      => 'admin.salida-campos.edit',
        ],
        [
            'model'      => '\App\Models\Cocolab',
            'date_field' => 'fecha',
            'field'      => 'id',
            'prefix'     => 'SGI',
            'suffix'     => 'COCOLAB',
            'route'      => 'admin.cocolabs.edit',
        ],
        [
            'model'      => '\App\Models\Mantenimiento',
            'date_field' => 'fecha_programacion',
            'field'      => 'id',
            'prefix'     => 'Mantenimiento',
            'suffix'     => '',
            'route'      => 'admin.mantenimientos.edit',
        ],
    ];

    public function index()
    {
        $events = [];
        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . ' ' . $model->{$source['field']} . ' ' . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
