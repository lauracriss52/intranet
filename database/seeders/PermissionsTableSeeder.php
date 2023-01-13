<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'contacto_de_emergencium_create',
            ],
            [
                'id'    => 18,
                'title' => 'contacto_de_emergencium_edit',
            ],
            [
                'id'    => 19,
                'title' => 'contacto_de_emergencium_show',
            ],
            [
                'id'    => 20,
                'title' => 'contacto_de_emergencium_delete',
            ],
            [
                'id'    => 21,
                'title' => 'contacto_de_emergencium_access',
            ],
            [
                'id'    => 22,
                'title' => 'estudio_create',
            ],
            [
                'id'    => 23,
                'title' => 'estudio_edit',
            ],
            [
                'id'    => 24,
                'title' => 'estudio_show',
            ],
            [
                'id'    => 25,
                'title' => 'estudio_delete',
            ],
            [
                'id'    => 26,
                'title' => 'estudio_access',
            ],
            [
                'id'    => 27,
                'title' => 'recursos_humano_access',
            ],
            [
                'id'    => 28,
                'title' => 'documentos_empleadoo_create',
            ],
            [
                'id'    => 29,
                'title' => 'documentos_empleadoo_edit',
            ],
            [
                'id'    => 30,
                'title' => 'documentos_empleadoo_show',
            ],
            [
                'id'    => 31,
                'title' => 'documentos_empleadoo_delete',
            ],
            [
                'id'    => 32,
                'title' => 'documentos_empleadoo_access',
            ],
            [
                'id'    => 33,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 34,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 35,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 36,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 37,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 38,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 39,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 40,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 41,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 42,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 43,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 44,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 45,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 46,
                'title' => 'task_create',
            ],
            [
                'id'    => 47,
                'title' => 'task_edit',
            ],
            [
                'id'    => 48,
                'title' => 'task_show',
            ],
            [
                'id'    => 49,
                'title' => 'task_delete',
            ],
            [
                'id'    => 50,
                'title' => 'task_access',
            ],
            [
                'id'    => 51,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 52,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 53,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 54,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 55,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 56,
                'title' => 'datos_basico_access',
            ],
            [
                'id'    => 57,
                'title' => 'experiencia_laboral_create',
            ],
            [
                'id'    => 58,
                'title' => 'experiencia_laboral_edit',
            ],
            [
                'id'    => 59,
                'title' => 'experiencia_laboral_show',
            ],
            [
                'id'    => 60,
                'title' => 'experiencia_laboral_delete',
            ],
            [
                'id'    => 61,
                'title' => 'experiencia_laboral_access',
            ],
            [
                'id'    => 62,
                'title' => 'empleado_create',
            ],
            [
                'id'    => 63,
                'title' => 'empleado_edit',
            ],
            [
                'id'    => 64,
                'title' => 'empleado_show',
            ],
            [
                'id'    => 65,
                'title' => 'empleado_delete',
            ],
            [
                'id'    => 66,
                'title' => 'empleado_access',
            ],
            [
                'id'    => 67,
                'title' => 'permiso_create',
            ],
            [
                'id'    => 68,
                'title' => 'permiso_edit',
            ],
            [
                'id'    => 69,
                'title' => 'permiso_show',
            ],
            [
                'id'    => 70,
                'title' => 'permiso_delete',
            ],
            [
                'id'    => 71,
                'title' => 'permiso_access',
            ],
            [
                'id'    => 72,
                'title' => 'salida_campo_create',
            ],
            [
                'id'    => 73,
                'title' => 'salida_campo_edit',
            ],
            [
                'id'    => 74,
                'title' => 'salida_campo_show',
            ],
            [
                'id'    => 75,
                'title' => 'salida_campo_delete',
            ],
            [
                'id'    => 76,
                'title' => 'salida_campo_access',
            ],
            [
                'id'    => 77,
                'title' => 'vacacione_create',
            ],
            [
                'id'    => 78,
                'title' => 'vacacione_edit',
            ],
            [
                'id'    => 79,
                'title' => 'vacacione_show',
            ],
            [
                'id'    => 80,
                'title' => 'vacacione_delete',
            ],
            [
                'id'    => 81,
                'title' => 'vacacione_access',
            ],
            [
                'id'    => 82,
                'title' => 'gestion_sgi_access',
            ],
            [
                'id'    => 83,
                'title' => 'gestion_documental_access',
            ],
            [
                'id'    => 84,
                'title' => 'roles_sig_create',
            ],
            [
                'id'    => 85,
                'title' => 'roles_sig_edit',
            ],
            [
                'id'    => 86,
                'title' => 'roles_sig_show',
            ],
            [
                'id'    => 87,
                'title' => 'roles_sig_delete',
            ],
            [
                'id'    => 88,
                'title' => 'roles_sig_access',
            ],
            [
                'id'    => 89,
                'title' => 'gestion_administrativa_access',
            ],
            [
                'id'    => 90,
                'title' => 'cocolab_create',
            ],
            [
                'id'    => 91,
                'title' => 'cocolab_edit',
            ],
            [
                'id'    => 92,
                'title' => 'cocolab_show',
            ],
            [
                'id'    => 93,
                'title' => 'cocolab_delete',
            ],
            [
                'id'    => 94,
                'title' => 'cocolab_access',
            ],
            [
                'id'    => 95,
                'title' => 'expedientes_cocolab_create',
            ],
            [
                'id'    => 96,
                'title' => 'expedientes_cocolab_edit',
            ],
            [
                'id'    => 97,
                'title' => 'expedientes_cocolab_show',
            ],
            [
                'id'    => 98,
                'title' => 'expedientes_cocolab_delete',
            ],
            [
                'id'    => 99,
                'title' => 'expedientes_cocolab_access',
            ],
            [
                'id'    => 100,
                'title' => 'presupuesto_create',
            ],
            [
                'id'    => 101,
                'title' => 'presupuesto_edit',
            ],
            [
                'id'    => 102,
                'title' => 'presupuesto_show',
            ],
            [
                'id'    => 103,
                'title' => 'presupuesto_delete',
            ],
            [
                'id'    => 104,
                'title' => 'presupuesto_access',
            ],
            [
                'id'    => 105,
                'title' => 'gestion_cocolab_access',
            ],
            [
                'id'    => 106,
                'title' => 'gestion_presupuesto_access',
            ],
            [
                'id'    => 107,
                'title' => 'gestion_de_auditorium_access',
            ],
            [
                'id'    => 108,
                'title' => 'terminacion_contrato_create',
            ],
            [
                'id'    => 109,
                'title' => 'terminacion_contrato_edit',
            ],
            [
                'id'    => 110,
                'title' => 'terminacion_contrato_show',
            ],
            [
                'id'    => 111,
                'title' => 'terminacion_contrato_delete',
            ],
            [
                'id'    => 112,
                'title' => 'terminacion_contrato_access',
            ],
            [
                'id'    => 113,
                'title' => 'actividades_copa_create',
            ],
            [
                'id'    => 114,
                'title' => 'actividades_copa_edit',
            ],
            [
                'id'    => 115,
                'title' => 'actividades_copa_show',
            ],
            [
                'id'    => 116,
                'title' => 'actividades_copa_delete',
            ],
            [
                'id'    => 117,
                'title' => 'actividades_copa_access',
            ],
            [
                'id'    => 118,
                'title' => 'copass_access',
            ],
            [
                'id'    => 119,
                'title' => 'acta_juntum_create',
            ],
            [
                'id'    => 120,
                'title' => 'acta_juntum_edit',
            ],
            [
                'id'    => 121,
                'title' => 'acta_juntum_show',
            ],
            [
                'id'    => 122,
                'title' => 'acta_juntum_delete',
            ],
            [
                'id'    => 123,
                'title' => 'acta_juntum_access',
            ],
            [
                'id'    => 124,
                'title' => 'gestion_proceso_access',
            ],
            [
                'id'    => 125,
                'title' => 'procedimiento_create',
            ],
            [
                'id'    => 126,
                'title' => 'procedimiento_edit',
            ],
            [
                'id'    => 127,
                'title' => 'procedimiento_show',
            ],
            [
                'id'    => 128,
                'title' => 'procedimiento_delete',
            ],
            [
                'id'    => 129,
                'title' => 'procedimiento_access',
            ],
            [
                'id'    => 130,
                'title' => 'proceso_create',
            ],
            [
                'id'    => 131,
                'title' => 'proceso_edit',
            ],
            [
                'id'    => 132,
                'title' => 'proceso_show',
            ],
            [
                'id'    => 133,
                'title' => 'proceso_delete',
            ],
            [
                'id'    => 134,
                'title' => 'proceso_access',
            ],
            [
                'id'    => 135,
                'title' => 'listaasistencium_create',
            ],
            [
                'id'    => 136,
                'title' => 'listaasistencium_edit',
            ],
            [
                'id'    => 137,
                'title' => 'listaasistencium_show',
            ],
            [
                'id'    => 138,
                'title' => 'listaasistencium_delete',
            ],
            [
                'id'    => 139,
                'title' => 'listaasistencium_access',
            ],
            [
                'id'    => 140,
                'title' => 'actaentrega_create',
            ],
            [
                'id'    => 141,
                'title' => 'actaentrega_edit',
            ],
            [
                'id'    => 142,
                'title' => 'actaentrega_show',
            ],
            [
                'id'    => 143,
                'title' => 'actaentrega_delete',
            ],
            [
                'id'    => 144,
                'title' => 'actaentrega_access',
            ],
            [
                'id'    => 145,
                'title' => 'tipoentrega_create',
            ],
            [
                'id'    => 146,
                'title' => 'tipoentrega_edit',
            ],
            [
                'id'    => 147,
                'title' => 'tipoentrega_show',
            ],
            [
                'id'    => 148,
                'title' => 'tipoentrega_delete',
            ],
            [
                'id'    => 149,
                'title' => 'tipoentrega_access',
            ],
            [
                'id'    => 150,
                'title' => 'listadomaestro_create',
            ],
            [
                'id'    => 151,
                'title' => 'listadomaestro_edit',
            ],
            [
                'id'    => 152,
                'title' => 'listadomaestro_show',
            ],
            [
                'id'    => 153,
                'title' => 'listadomaestro_delete',
            ],
            [
                'id'    => 154,
                'title' => 'listadomaestro_access',
            ],
            [
                'id'    => 155,
                'title' => 'tipo_dedocumento_create',
            ],
            [
                'id'    => 156,
                'title' => 'tipo_dedocumento_edit',
            ],
            [
                'id'    => 157,
                'title' => 'tipo_dedocumento_show',
            ],
            [
                'id'    => 158,
                'title' => 'tipo_dedocumento_delete',
            ],
            [
                'id'    => 159,
                'title' => 'tipo_dedocumento_access',
            ],
            [
                'id'    => 160,
                'title' => 'decreto_ley_create',
            ],
            [
                'id'    => 161,
                'title' => 'decreto_ley_edit',
            ],
            [
                'id'    => 162,
                'title' => 'decreto_ley_show',
            ],
            [
                'id'    => 163,
                'title' => 'decreto_ley_delete',
            ],
            [
                'id'    => 164,
                'title' => 'decreto_ley_access',
            ],
            [
                'id'    => 165,
                'title' => 'ruc_create',
            ],
            [
                'id'    => 166,
                'title' => 'ruc_edit',
            ],
            [
                'id'    => 167,
                'title' => 'ruc_show',
            ],
            [
                'id'    => 168,
                'title' => 'ruc_delete',
            ],
            [
                'id'    => 169,
                'title' => 'ruc_access',
            ],
            [
                'id'    => 170,
                'title' => 'dotacion_create',
            ],
            [
                'id'    => 171,
                'title' => 'dotacion_edit',
            ],
            [
                'id'    => 172,
                'title' => 'dotacion_show',
            ],
            [
                'id'    => 173,
                'title' => 'dotacion_delete',
            ],
            [
                'id'    => 174,
                'title' => 'dotacion_access',
            ],
            [
                'id'    => 175,
                'title' => 'contrasena_create',
            ],
            [
                'id'    => 176,
                'title' => 'contrasena_edit',
            ],
            [
                'id'    => 177,
                'title' => 'contrasena_show',
            ],
            [
                'id'    => 178,
                'title' => 'contrasena_delete',
            ],
            [
                'id'    => 179,
                'title' => 'contrasena_access',
            ],
            [
                'id'    => 180,
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 181,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 182,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 183,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 184,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 185,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 186,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 187,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 188,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 189,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 190,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 191,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 192,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 193,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 194,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 195,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 196,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 197,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 198,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 199,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 200,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 201,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 202,
                'title' => 'product_category_create',
            ],
            [
                'id'    => 203,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 204,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 205,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 206,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 207,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 208,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 209,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 210,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 211,
                'title' => 'product_tag_access',
            ],
            [
                'id'    => 212,
                'title' => 'product_create',
            ],
            [
                'id'    => 213,
                'title' => 'product_edit',
            ],
            [
                'id'    => 214,
                'title' => 'product_show',
            ],
            [
                'id'    => 215,
                'title' => 'product_delete',
            ],
            [
                'id'    => 216,
                'title' => 'product_access',
            ],
            [
                'id'    => 217,
                'title' => 'team_create',
            ],
            [
                'id'    => 218,
                'title' => 'team_edit',
            ],
            [
                'id'    => 219,
                'title' => 'team_show',
            ],
            [
                'id'    => 220,
                'title' => 'team_delete',
            ],
            [
                'id'    => 221,
                'title' => 'team_access',
            ],
            [
                'id'    => 222,
                'title' => 'asset_management_access',
            ],
            [
                'id'    => 223,
                'title' => 'asset_category_create',
            ],
            [
                'id'    => 224,
                'title' => 'asset_category_edit',
            ],
            [
                'id'    => 225,
                'title' => 'asset_category_show',
            ],
            [
                'id'    => 226,
                'title' => 'asset_category_delete',
            ],
            [
                'id'    => 227,
                'title' => 'asset_category_access',
            ],
            [
                'id'    => 228,
                'title' => 'asset_location_create',
            ],
            [
                'id'    => 229,
                'title' => 'asset_location_edit',
            ],
            [
                'id'    => 230,
                'title' => 'asset_location_show',
            ],
            [
                'id'    => 231,
                'title' => 'asset_location_delete',
            ],
            [
                'id'    => 232,
                'title' => 'asset_location_access',
            ],
            [
                'id'    => 233,
                'title' => 'asset_status_create',
            ],
            [
                'id'    => 234,
                'title' => 'asset_status_edit',
            ],
            [
                'id'    => 235,
                'title' => 'asset_status_show',
            ],
            [
                'id'    => 236,
                'title' => 'asset_status_delete',
            ],
            [
                'id'    => 237,
                'title' => 'asset_status_access',
            ],
            [
                'id'    => 238,
                'title' => 'asset_create',
            ],
            [
                'id'    => 239,
                'title' => 'asset_edit',
            ],
            [
                'id'    => 240,
                'title' => 'asset_show',
            ],
            [
                'id'    => 241,
                'title' => 'asset_delete',
            ],
            [
                'id'    => 242,
                'title' => 'asset_access',
            ],
            [
                'id'    => 243,
                'title' => 'assets_history_access',
            ],
            [
                'id'    => 244,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 245,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 246,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 247,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 248,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 249,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 250,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 251,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 252,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 253,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 254,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 255,
                'title' => 'expense_create',
            ],
            [
                'id'    => 256,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 257,
                'title' => 'expense_show',
            ],
            [
                'id'    => 258,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 259,
                'title' => 'expense_access',
            ],
            [
                'id'    => 260,
                'title' => 'income_create',
            ],
            [
                'id'    => 261,
                'title' => 'income_edit',
            ],
            [
                'id'    => 262,
                'title' => 'income_show',
            ],
            [
                'id'    => 263,
                'title' => 'income_delete',
            ],
            [
                'id'    => 264,
                'title' => 'income_access',
            ],
            [
                'id'    => 265,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 266,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 267,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 268,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 269,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 270,
                'title' => 'contact_management_access',
            ],
            [
                'id'    => 271,
                'title' => 'contact_company_create',
            ],
            [
                'id'    => 272,
                'title' => 'contact_company_edit',
            ],
            [
                'id'    => 273,
                'title' => 'contact_company_show',
            ],
            [
                'id'    => 274,
                'title' => 'contact_company_delete',
            ],
            [
                'id'    => 275,
                'title' => 'contact_company_access',
            ],
            [
                'id'    => 276,
                'title' => 'contact_contact_create',
            ],
            [
                'id'    => 277,
                'title' => 'contact_contact_edit',
            ],
            [
                'id'    => 278,
                'title' => 'contact_contact_show',
            ],
            [
                'id'    => 279,
                'title' => 'contact_contact_delete',
            ],
            [
                'id'    => 280,
                'title' => 'contact_contact_access',
            ],
            [
                'id'    => 281,
                'title' => 'client_management_setting_access',
            ],
            [
                'id'    => 282,
                'title' => 'currency_create',
            ],
            [
                'id'    => 283,
                'title' => 'currency_edit',
            ],
            [
                'id'    => 284,
                'title' => 'currency_show',
            ],
            [
                'id'    => 285,
                'title' => 'currency_delete',
            ],
            [
                'id'    => 286,
                'title' => 'currency_access',
            ],
            [
                'id'    => 287,
                'title' => 'transaction_type_create',
            ],
            [
                'id'    => 288,
                'title' => 'transaction_type_edit',
            ],
            [
                'id'    => 289,
                'title' => 'transaction_type_show',
            ],
            [
                'id'    => 290,
                'title' => 'transaction_type_delete',
            ],
            [
                'id'    => 291,
                'title' => 'transaction_type_access',
            ],
            [
                'id'    => 292,
                'title' => 'income_source_create',
            ],
            [
                'id'    => 293,
                'title' => 'income_source_edit',
            ],
            [
                'id'    => 294,
                'title' => 'income_source_show',
            ],
            [
                'id'    => 295,
                'title' => 'income_source_delete',
            ],
            [
                'id'    => 296,
                'title' => 'income_source_access',
            ],
            [
                'id'    => 297,
                'title' => 'client_status_create',
            ],
            [
                'id'    => 298,
                'title' => 'client_status_edit',
            ],
            [
                'id'    => 299,
                'title' => 'client_status_show',
            ],
            [
                'id'    => 300,
                'title' => 'client_status_delete',
            ],
            [
                'id'    => 301,
                'title' => 'client_status_access',
            ],
            [
                'id'    => 302,
                'title' => 'project_status_create',
            ],
            [
                'id'    => 303,
                'title' => 'project_status_edit',
            ],
            [
                'id'    => 304,
                'title' => 'project_status_show',
            ],
            [
                'id'    => 305,
                'title' => 'project_status_delete',
            ],
            [
                'id'    => 306,
                'title' => 'project_status_access',
            ],
            [
                'id'    => 307,
                'title' => 'client_management_access',
            ],
            [
                'id'    => 308,
                'title' => 'client_create',
            ],
            [
                'id'    => 309,
                'title' => 'client_edit',
            ],
            [
                'id'    => 310,
                'title' => 'client_show',
            ],
            [
                'id'    => 311,
                'title' => 'client_delete',
            ],
            [
                'id'    => 312,
                'title' => 'client_access',
            ],
            [
                'id'    => 313,
                'title' => 'project_create',
            ],
            [
                'id'    => 314,
                'title' => 'project_edit',
            ],
            [
                'id'    => 315,
                'title' => 'project_show',
            ],
            [
                'id'    => 316,
                'title' => 'project_delete',
            ],
            [
                'id'    => 317,
                'title' => 'project_access',
            ],
            [
                'id'    => 318,
                'title' => 'note_create',
            ],
            [
                'id'    => 319,
                'title' => 'note_edit',
            ],
            [
                'id'    => 320,
                'title' => 'note_show',
            ],
            [
                'id'    => 321,
                'title' => 'note_delete',
            ],
            [
                'id'    => 322,
                'title' => 'note_access',
            ],
            [
                'id'    => 323,
                'title' => 'document_create',
            ],
            [
                'id'    => 324,
                'title' => 'document_edit',
            ],
            [
                'id'    => 325,
                'title' => 'document_show',
            ],
            [
                'id'    => 326,
                'title' => 'document_delete',
            ],
            [
                'id'    => 327,
                'title' => 'document_access',
            ],
            [
                'id'    => 328,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 329,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 330,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 331,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 332,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 333,
                'title' => 'client_report_create',
            ],
            [
                'id'    => 334,
                'title' => 'client_report_edit',
            ],
            [
                'id'    => 335,
                'title' => 'client_report_show',
            ],
            [
                'id'    => 336,
                'title' => 'client_report_delete',
            ],
            [
                'id'    => 337,
                'title' => 'client_report_access',
            ],
            [
                'id'    => 338,
                'title' => 'course_create',
            ],
            [
                'id'    => 339,
                'title' => 'course_edit',
            ],
            [
                'id'    => 340,
                'title' => 'course_show',
            ],
            [
                'id'    => 341,
                'title' => 'course_delete',
            ],
            [
                'id'    => 342,
                'title' => 'course_access',
            ],
            [
                'id'    => 343,
                'title' => 'lesson_create',
            ],
            [
                'id'    => 344,
                'title' => 'lesson_edit',
            ],
            [
                'id'    => 345,
                'title' => 'lesson_show',
            ],
            [
                'id'    => 346,
                'title' => 'lesson_delete',
            ],
            [
                'id'    => 347,
                'title' => 'lesson_access',
            ],
            [
                'id'    => 348,
                'title' => 'test_create',
            ],
            [
                'id'    => 349,
                'title' => 'test_edit',
            ],
            [
                'id'    => 350,
                'title' => 'test_show',
            ],
            [
                'id'    => 351,
                'title' => 'test_delete',
            ],
            [
                'id'    => 352,
                'title' => 'test_access',
            ],
            [
                'id'    => 353,
                'title' => 'question_create',
            ],
            [
                'id'    => 354,
                'title' => 'question_edit',
            ],
            [
                'id'    => 355,
                'title' => 'question_show',
            ],
            [
                'id'    => 356,
                'title' => 'question_delete',
            ],
            [
                'id'    => 357,
                'title' => 'question_access',
            ],
            [
                'id'    => 358,
                'title' => 'question_option_create',
            ],
            [
                'id'    => 359,
                'title' => 'question_option_edit',
            ],
            [
                'id'    => 360,
                'title' => 'question_option_show',
            ],
            [
                'id'    => 361,
                'title' => 'question_option_delete',
            ],
            [
                'id'    => 362,
                'title' => 'question_option_access',
            ],
            [
                'id'    => 363,
                'title' => 'test_result_create',
            ],
            [
                'id'    => 364,
                'title' => 'test_result_edit',
            ],
            [
                'id'    => 365,
                'title' => 'test_result_show',
            ],
            [
                'id'    => 366,
                'title' => 'test_result_delete',
            ],
            [
                'id'    => 367,
                'title' => 'test_result_access',
            ],
            [
                'id'    => 368,
                'title' => 'test_answer_create',
            ],
            [
                'id'    => 369,
                'title' => 'test_answer_edit',
            ],
            [
                'id'    => 370,
                'title' => 'test_answer_show',
            ],
            [
                'id'    => 371,
                'title' => 'test_answer_delete',
            ],
            [
                'id'    => 372,
                'title' => 'test_answer_access',
            ],
            [
                'id'    => 373,
                'title' => 'time_management_access',
            ],
            [
                'id'    => 374,
                'title' => 'time_work_type_create',
            ],
            [
                'id'    => 375,
                'title' => 'time_work_type_edit',
            ],
            [
                'id'    => 376,
                'title' => 'time_work_type_show',
            ],
            [
                'id'    => 377,
                'title' => 'time_work_type_delete',
            ],
            [
                'id'    => 378,
                'title' => 'time_work_type_access',
            ],
            [
                'id'    => 379,
                'title' => 'time_project_create',
            ],
            [
                'id'    => 380,
                'title' => 'time_project_edit',
            ],
            [
                'id'    => 381,
                'title' => 'time_project_show',
            ],
            [
                'id'    => 382,
                'title' => 'time_project_delete',
            ],
            [
                'id'    => 383,
                'title' => 'time_project_access',
            ],
            [
                'id'    => 384,
                'title' => 'time_entry_create',
            ],
            [
                'id'    => 385,
                'title' => 'time_entry_edit',
            ],
            [
                'id'    => 386,
                'title' => 'time_entry_show',
            ],
            [
                'id'    => 387,
                'title' => 'time_entry_delete',
            ],
            [
                'id'    => 388,
                'title' => 'time_entry_access',
            ],
            [
                'id'    => 389,
                'title' => 'time_report_create',
            ],
            [
                'id'    => 390,
                'title' => 'time_report_edit',
            ],
            [
                'id'    => 391,
                'title' => 'time_report_show',
            ],
            [
                'id'    => 392,
                'title' => 'time_report_delete',
            ],
            [
                'id'    => 393,
                'title' => 'time_report_access',
            ],
            [
                'id'    => 394,
                'title' => 'capacitacione_access',
            ],
            [
                'id'    => 395,
                'title' => 'certificacion_laboral_create',
            ],
            [
                'id'    => 396,
                'title' => 'certificacion_laboral_edit',
            ],
            [
                'id'    => 397,
                'title' => 'certificacion_laboral_show',
            ],
            [
                'id'    => 398,
                'title' => 'certificacion_laboral_delete',
            ],
            [
                'id'    => 399,
                'title' => 'certificacion_laboral_access',
            ],
            [
                'id'    => 400,
                'title' => 'entrega_dotacion_create',
            ],
            [
                'id'    => 401,
                'title' => 'entrega_dotacion_edit',
            ],
            [
                'id'    => 402,
                'title' => 'entrega_dotacion_show',
            ],
            [
                'id'    => 403,
                'title' => 'entrega_dotacion_delete',
            ],
            [
                'id'    => 404,
                'title' => 'entrega_dotacion_access',
            ],
            [
                'id'    => 405,
                'title' => 'entregaequipo_create',
            ],
            [
                'id'    => 406,
                'title' => 'entregaequipo_edit',
            ],
            [
                'id'    => 407,
                'title' => 'entregaequipo_show',
            ],
            [
                'id'    => 408,
                'title' => 'entregaequipo_delete',
            ],
            [
                'id'    => 409,
                'title' => 'entregaequipo_access',
            ],
            [
                'id'    => 410,
                'title' => 'entrega_epp_create',
            ],
            [
                'id'    => 411,
                'title' => 'entrega_epp_edit',
            ],
            [
                'id'    => 412,
                'title' => 'entrega_epp_show',
            ],
            [
                'id'    => 413,
                'title' => 'entrega_epp_delete',
            ],
            [
                'id'    => 414,
                'title' => 'entrega_epp_access',
            ],
            [
                'id'    => 415,
                'title' => 'salario_create',
            ],
            [
                'id'    => 416,
                'title' => 'salario_edit',
            ],
            [
                'id'    => 417,
                'title' => 'salario_show',
            ],
            [
                'id'    => 418,
                'title' => 'salario_delete',
            ],
            [
                'id'    => 419,
                'title' => 'salario_access',
            ],
            [
                'id'    => 420,
                'title' => 'impuesto_create',
            ],
            [
                'id'    => 421,
                'title' => 'impuesto_edit',
            ],
            [
                'id'    => 422,
                'title' => 'impuesto_show',
            ],
            [
                'id'    => 423,
                'title' => 'impuesto_delete',
            ],
            [
                'id'    => 424,
                'title' => 'impuesto_access',
            ],
            [
                'id'    => 425,
                'title' => 'actainicioproyecto_create',
            ],
            [
                'id'    => 426,
                'title' => 'actainicioproyecto_edit',
            ],
            [
                'id'    => 427,
                'title' => 'actainicioproyecto_show',
            ],
            [
                'id'    => 428,
                'title' => 'actainicioproyecto_delete',
            ],
            [
                'id'    => 429,
                'title' => 'actainicioproyecto_access',
            ],
            [
                'id'    => 430,
                'title' => 'actacierreproyecto_create',
            ],
            [
                'id'    => 431,
                'title' => 'actacierreproyecto_edit',
            ],
            [
                'id'    => 432,
                'title' => 'actacierreproyecto_show',
            ],
            [
                'id'    => 433,
                'title' => 'actacierreproyecto_delete',
            ],
            [
                'id'    => 434,
                'title' => 'actacierreproyecto_access',
            ],
            [
                'id'    => 435,
                'title' => 'vacacionesauditorium_create',
            ],
            [
                'id'    => 436,
                'title' => 'vacacionesauditorium_edit',
            ],
            [
                'id'    => 437,
                'title' => 'vacacionesauditorium_show',
            ],
            [
                'id'    => 438,
                'title' => 'vacacionesauditorium_delete',
            ],
            [
                'id'    => 439,
                'title' => 'vacacionesauditorium_access',
            ],
            [
                'id'    => 440,
                'title' => 'salidascampoauditorium_create',
            ],
            [
                'id'    => 441,
                'title' => 'salidascampoauditorium_edit',
            ],
            [
                'id'    => 442,
                'title' => 'salidascampoauditorium_show',
            ],
            [
                'id'    => 443,
                'title' => 'salidascampoauditorium_delete',
            ],
            [
                'id'    => 444,
                'title' => 'salidascampoauditorium_access',
            ],
            [
                'id'    => 445,
                'title' => 'salidacampo_audi_create',
            ],
            [
                'id'    => 446,
                'title' => 'salidacampo_audi_edit',
            ],
            [
                'id'    => 447,
                'title' => 'salidacampo_audi_show',
            ],
            [
                'id'    => 448,
                'title' => 'salidacampo_audi_delete',
            ],
            [
                'id'    => 449,
                'title' => 'salidacampo_audi_access',
            ],
            [
                'id'    => 450,
                'title' => 'ods_compra_auditorium_create',
            ],
            [
                'id'    => 451,
                'title' => 'ods_compra_auditorium_edit',
            ],
            [
                'id'    => 452,
                'title' => 'ods_compra_auditorium_show',
            ],
            [
                'id'    => 453,
                'title' => 'ods_compra_auditorium_delete',
            ],
            [
                'id'    => 454,
                'title' => 'ods_compra_auditorium_access',
            ],
            [
                'id'    => 455,
                'title' => 'mantenimiento_create',
            ],
            [
                'id'    => 456,
                'title' => 'mantenimiento_edit',
            ],
            [
                'id'    => 457,
                'title' => 'mantenimiento_show',
            ],
            [
                'id'    => 458,
                'title' => 'mantenimiento_delete',
            ],
            [
                'id'    => 459,
                'title' => 'mantenimiento_access',
            ],
            [
                'id'    => 460,
                'title' => 'politica_create',
            ],
            [
                'id'    => 461,
                'title' => 'politica_edit',
            ],
            [
                'id'    => 462,
                'title' => 'politica_show',
            ],
            [
                'id'    => 463,
                'title' => 'politica_delete',
            ],
            [
                'id'    => 464,
                'title' => 'politica_access',
            ],
            [
                'id'    => 465,
                'title' => 'seleccion_proveedor_create',
            ],
            [
                'id'    => 466,
                'title' => 'seleccion_proveedor_edit',
            ],
            [
                'id'    => 467,
                'title' => 'seleccion_proveedor_show',
            ],
            [
                'id'    => 468,
                'title' => 'seleccion_proveedor_delete',
            ],
            [
                'id'    => 469,
                'title' => 'seleccion_proveedor_access',
            ],
            [
                'id'    => 470,
                'title' => 'ingesos_geopark_create',
            ],
            [
                'id'    => 471,
                'title' => 'ingesos_geopark_edit',
            ],
            [
                'id'    => 472,
                'title' => 'ingesos_geopark_show',
            ],
            [
                'id'    => 473,
                'title' => 'ingesos_geopark_delete',
            ],
            [
                'id'    => 474,
                'title' => 'ingesos_geopark_access',
            ],
            [
                'id'    => 475,
                'title' => 'presupuesto_item_create',
            ],
            [
                'id'    => 476,
                'title' => 'presupuesto_item_edit',
            ],
            [
                'id'    => 477,
                'title' => 'presupuesto_item_show',
            ],
            [
                'id'    => 478,
                'title' => 'presupuesto_item_delete',
            ],
            [
                'id'    => 479,
                'title' => 'presupuesto_item_access',
            ],
            [
                'id'    => 480,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
