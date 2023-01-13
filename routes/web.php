<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Contacto De Emergencia
    Route::delete('contacto-de-emergencia/destroy', 'ContactoDeEmergenciaController@massDestroy')->name('contacto-de-emergencia.massDestroy');
    Route::post('contacto-de-emergencia/parse-csv-import', 'ContactoDeEmergenciaController@parseCsvImport')->name('contacto-de-emergencia.parseCsvImport');
    Route::post('contacto-de-emergencia/process-csv-import', 'ContactoDeEmergenciaController@processCsvImport')->name('contacto-de-emergencia.processCsvImport');
    Route::resource('contacto-de-emergencia', 'ContactoDeEmergenciaController');

    // Estudios
    Route::delete('estudios/destroy', 'EstudiosController@massDestroy')->name('estudios.massDestroy');
    Route::resource('estudios', 'EstudiosController');

    // Documentos Empleadoo
    Route::delete('documentos-empleadoos/destroy', 'DocumentosEmpleadooController@massDestroy')->name('documentos-empleadoos.massDestroy');
    Route::resource('documentos-empleadoos', 'DocumentosEmpleadooController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Task Status
    Route::delete('task-statuses/destroy', 'TaskStatusController@massDestroy')->name('task-statuses.massDestroy');
    Route::resource('task-statuses', 'TaskStatusController');

    // Task Tag
    Route::delete('task-tags/destroy', 'TaskTagController@massDestroy')->name('task-tags.massDestroy');
    Route::resource('task-tags', 'TaskTagController');

    // Task
    Route::delete('tasks/destroy', 'TaskController@massDestroy')->name('tasks.massDestroy');
    Route::post('tasks/media', 'TaskController@storeMedia')->name('tasks.storeMedia');
    Route::post('tasks/ckmedia', 'TaskController@storeCKEditorImages')->name('tasks.storeCKEditorImages');
    Route::resource('tasks', 'TaskController');

    // Tasks Calendar
    Route::resource('tasks-calendars', 'TasksCalendarController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Experiencia Laboral
    Route::delete('experiencia-laborals/destroy', 'ExperienciaLaboralController@massDestroy')->name('experiencia-laborals.massDestroy');
    Route::resource('experiencia-laborals', 'ExperienciaLaboralController');

    // Empleado
    Route::delete('empleados/destroy', 'EmpleadoController@massDestroy')->name('empleados.massDestroy');
    Route::resource('empleados', 'EmpleadoController');

    // Permiso
    Route::delete('permisos/destroy', 'PermisoController@massDestroy')->name('permisos.massDestroy');
    Route::resource('permisos', 'PermisoController');

    // Salida Campo
    Route::delete('salida-campos/destroy', 'SalidaCampoController@massDestroy')->name('salida-campos.massDestroy');
    Route::post('salida-campos/media', 'SalidaCampoController@storeMedia')->name('salida-campos.storeMedia');
    Route::post('salida-campos/ckmedia', 'SalidaCampoController@storeCKEditorImages')->name('salida-campos.storeCKEditorImages');
    Route::resource('salida-campos', 'SalidaCampoController');

    // Vacaciones
    Route::delete('vacaciones/destroy', 'VacacionesController@massDestroy')->name('vacaciones.massDestroy');
    Route::resource('vacaciones', 'VacacionesController');

    // Roles Sig
    Route::delete('roles-sigs/destroy', 'RolesSigController@massDestroy')->name('roles-sigs.massDestroy');
    Route::resource('roles-sigs', 'RolesSigController');

    // Cocolab
    Route::delete('cocolabs/destroy', 'CocolabController@massDestroy')->name('cocolabs.massDestroy');
    Route::post('cocolabs/media', 'CocolabController@storeMedia')->name('cocolabs.storeMedia');
    Route::post('cocolabs/ckmedia', 'CocolabController@storeCKEditorImages')->name('cocolabs.storeCKEditorImages');
    Route::resource('cocolabs', 'CocolabController');

    // Expedientes Cocolab
    Route::delete('expedientes-cocolabs/destroy', 'ExpedientesCocolabController@massDestroy')->name('expedientes-cocolabs.massDestroy');
    Route::resource('expedientes-cocolabs', 'ExpedientesCocolabController');

    // Presupuesto
    Route::delete('presupuestos/destroy', 'PresupuestoController@massDestroy')->name('presupuestos.massDestroy');
    Route::resource('presupuestos', 'PresupuestoController');

    // Terminacion Contrato
    Route::delete('terminacion-contratos/destroy', 'TerminacionContratoController@massDestroy')->name('terminacion-contratos.massDestroy');
    Route::post('terminacion-contratos/media', 'TerminacionContratoController@storeMedia')->name('terminacion-contratos.storeMedia');
    Route::post('terminacion-contratos/ckmedia', 'TerminacionContratoController@storeCKEditorImages')->name('terminacion-contratos.storeCKEditorImages');
    Route::resource('terminacion-contratos', 'TerminacionContratoController');

    // Actividades Copas
    Route::delete('actividades-copas/destroy', 'ActividadesCopasController@massDestroy')->name('actividades-copas.massDestroy');
    Route::post('actividades-copas/media', 'ActividadesCopasController@storeMedia')->name('actividades-copas.storeMedia');
    Route::post('actividades-copas/ckmedia', 'ActividadesCopasController@storeCKEditorImages')->name('actividades-copas.storeCKEditorImages');
    Route::resource('actividades-copas', 'ActividadesCopasController');

    // Acta Junta
    Route::delete('acta-junta/destroy', 'ActaJuntaController@massDestroy')->name('acta-junta.massDestroy');
    Route::post('acta-junta/media', 'ActaJuntaController@storeMedia')->name('acta-junta.storeMedia');
    Route::post('acta-junta/ckmedia', 'ActaJuntaController@storeCKEditorImages')->name('acta-junta.storeCKEditorImages');
    Route::resource('acta-junta', 'ActaJuntaController');

    // Procedimiento
    Route::delete('procedimientos/destroy', 'ProcedimientoController@massDestroy')->name('procedimientos.massDestroy');
    Route::post('procedimientos/media', 'ProcedimientoController@storeMedia')->name('procedimientos.storeMedia');
    Route::post('procedimientos/ckmedia', 'ProcedimientoController@storeCKEditorImages')->name('procedimientos.storeCKEditorImages');
    Route::resource('procedimientos', 'ProcedimientoController');

    // Proceso
    Route::delete('procesos/destroy', 'ProcesoController@massDestroy')->name('procesos.massDestroy');
    Route::resource('procesos', 'ProcesoController');

    // Listaasistencia
    Route::delete('listaasistencia/destroy', 'ListaasistenciaController@massDestroy')->name('listaasistencia.massDestroy');
    Route::post('listaasistencia/media', 'ListaasistenciaController@storeMedia')->name('listaasistencia.storeMedia');
    Route::post('listaasistencia/ckmedia', 'ListaasistenciaController@storeCKEditorImages')->name('listaasistencia.storeCKEditorImages');
    Route::resource('listaasistencia', 'ListaasistenciaController');

    // Actaentrega
    Route::delete('actaentregas/destroy', 'ActaentregaController@massDestroy')->name('actaentregas.massDestroy');
    Route::post('actaentregas/media', 'ActaentregaController@storeMedia')->name('actaentregas.storeMedia');
    Route::post('actaentregas/ckmedia', 'ActaentregaController@storeCKEditorImages')->name('actaentregas.storeCKEditorImages');
    Route::resource('actaentregas', 'ActaentregaController');

    // Tipoentrega
    Route::delete('tipoentregas/destroy', 'TipoentregaController@massDestroy')->name('tipoentregas.massDestroy');
    Route::resource('tipoentregas', 'TipoentregaController');

    // Listadomaestro
    Route::delete('listadomaestros/destroy', 'ListadomaestroController@massDestroy')->name('listadomaestros.massDestroy');
    Route::post('listadomaestros/media', 'ListadomaestroController@storeMedia')->name('listadomaestros.storeMedia');
    Route::post('listadomaestros/ckmedia', 'ListadomaestroController@storeCKEditorImages')->name('listadomaestros.storeCKEditorImages');
    Route::resource('listadomaestros', 'ListadomaestroController');

    // Tipo Dedocumento
    Route::delete('tipo-dedocumentos/destroy', 'TipoDedocumentoController@massDestroy')->name('tipo-dedocumentos.massDestroy');
    Route::resource('tipo-dedocumentos', 'TipoDedocumentoController');

    // Decreto Ley
    Route::delete('decreto-leys/destroy', 'DecretoLeyController@massDestroy')->name('decreto-leys.massDestroy');
    Route::resource('decreto-leys', 'DecretoLeyController');

    // Ruc
    Route::delete('rucs/destroy', 'RucController@massDestroy')->name('rucs.massDestroy');
    Route::resource('rucs', 'RucController');

    // Dotacion
    Route::delete('dotacions/destroy', 'DotacionController@massDestroy')->name('dotacions.massDestroy');
    Route::resource('dotacions', 'DotacionController');

    // Contrasenas
    Route::delete('contrasenas/destroy', 'ContrasenasController@massDestroy')->name('contrasenas.massDestroy');
    Route::resource('contrasenas', 'ContrasenasController');

    // Crm Status
    Route::delete('crm-statuses/destroy', 'CrmStatusController@massDestroy')->name('crm-statuses.massDestroy');
    Route::resource('crm-statuses', 'CrmStatusController');

    // Crm Customer
    Route::delete('crm-customers/destroy', 'CrmCustomerController@massDestroy')->name('crm-customers.massDestroy');
    Route::post('crm-customers/media', 'CrmCustomerController@storeMedia')->name('crm-customers.storeMedia');
    Route::post('crm-customers/ckmedia', 'CrmCustomerController@storeCKEditorImages')->name('crm-customers.storeCKEditorImages');
    Route::resource('crm-customers', 'CrmCustomerController');

    // Crm Note
    Route::delete('crm-notes/destroy', 'CrmNoteController@massDestroy')->name('crm-notes.massDestroy');
    Route::post('crm-notes/media', 'CrmNoteController@storeMedia')->name('crm-notes.storeMedia');
    Route::post('crm-notes/ckmedia', 'CrmNoteController@storeCKEditorImages')->name('crm-notes.storeCKEditorImages');
    Route::resource('crm-notes', 'CrmNoteController');

    // Crm Document
    Route::delete('crm-documents/destroy', 'CrmDocumentController@massDestroy')->name('crm-documents.massDestroy');
    Route::post('crm-documents/media', 'CrmDocumentController@storeMedia')->name('crm-documents.storeMedia');
    Route::post('crm-documents/ckmedia', 'CrmDocumentController@storeCKEditorImages')->name('crm-documents.storeCKEditorImages');
    Route::resource('crm-documents', 'CrmDocumentController');

    // Product Category
    Route::delete('product-categories/destroy', 'ProductCategoryController@massDestroy')->name('product-categories.massDestroy');
    Route::post('product-categories/media', 'ProductCategoryController@storeMedia')->name('product-categories.storeMedia');
    Route::post('product-categories/ckmedia', 'ProductCategoryController@storeCKEditorImages')->name('product-categories.storeCKEditorImages');
    Route::resource('product-categories', 'ProductCategoryController');

    // Product Tag
    Route::delete('product-tags/destroy', 'ProductTagController@massDestroy')->name('product-tags.massDestroy');
    Route::resource('product-tags', 'ProductTagController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // Asset Category
    Route::delete('asset-categories/destroy', 'AssetCategoryController@massDestroy')->name('asset-categories.massDestroy');
    Route::resource('asset-categories', 'AssetCategoryController');

    // Asset Location
    Route::delete('asset-locations/destroy', 'AssetLocationController@massDestroy')->name('asset-locations.massDestroy');
    Route::resource('asset-locations', 'AssetLocationController');

    // Asset Status
    Route::delete('asset-statuses/destroy', 'AssetStatusController@massDestroy')->name('asset-statuses.massDestroy');
    Route::resource('asset-statuses', 'AssetStatusController');

    // Asset
    Route::delete('assets/destroy', 'AssetController@massDestroy')->name('assets.massDestroy');
    Route::post('assets/media', 'AssetController@storeMedia')->name('assets.storeMedia');
    Route::post('assets/ckmedia', 'AssetController@storeCKEditorImages')->name('assets.storeCKEditorImages');
    Route::resource('assets', 'AssetController');

    // Assets History
    Route::resource('assets-histories', 'AssetsHistoryController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Expense Category
    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'ExpenseCategoryController');

    // Income Category
    Route::delete('income-categories/destroy', 'IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');
    Route::resource('income-categories', 'IncomeCategoryController');

    // Expense
    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::resource('expenses', 'ExpenseController');

    // Income
    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::resource('incomes', 'IncomeController');

    // Expense Report
    Route::delete('expense-reports/destroy', 'ExpenseReportController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('expense-reports', 'ExpenseReportController');

    // Contact Company
    Route::delete('contact-companies/destroy', 'ContactCompanyController@massDestroy')->name('contact-companies.massDestroy');
    Route::resource('contact-companies', 'ContactCompanyController');

    // Contact Contacts
    Route::delete('contact-contacts/destroy', 'ContactContactsController@massDestroy')->name('contact-contacts.massDestroy');
    Route::resource('contact-contacts', 'ContactContactsController');

    // Currency
    Route::delete('currencies/destroy', 'CurrencyController@massDestroy')->name('currencies.massDestroy');
    Route::resource('currencies', 'CurrencyController');

    // Transaction Type
    Route::delete('transaction-types/destroy', 'TransactionTypeController@massDestroy')->name('transaction-types.massDestroy');
    Route::resource('transaction-types', 'TransactionTypeController');

    // Income Source
    Route::delete('income-sources/destroy', 'IncomeSourceController@massDestroy')->name('income-sources.massDestroy');
    Route::resource('income-sources', 'IncomeSourceController');

    // Client Status
    Route::delete('client-statuses/destroy', 'ClientStatusController@massDestroy')->name('client-statuses.massDestroy');
    Route::resource('client-statuses', 'ClientStatusController');

    // Project Status
    Route::delete('project-statuses/destroy', 'ProjectStatusController@massDestroy')->name('project-statuses.massDestroy');
    Route::resource('project-statuses', 'ProjectStatusController');

    // Client
    Route::delete('clients/destroy', 'ClientController@massDestroy')->name('clients.massDestroy');
    Route::resource('clients', 'ClientController');

    // Project
    Route::delete('projects/destroy', 'ProjectController@massDestroy')->name('projects.massDestroy');
    Route::resource('projects', 'ProjectController');

    // Note
    Route::delete('notes/destroy', 'NoteController@massDestroy')->name('notes.massDestroy');
    Route::post('notes/media', 'NoteController@storeMedia')->name('notes.storeMedia');
    Route::post('notes/ckmedia', 'NoteController@storeCKEditorImages')->name('notes.storeCKEditorImages');
    Route::resource('notes', 'NoteController');

    // Document
    Route::delete('documents/destroy', 'DocumentController@massDestroy')->name('documents.massDestroy');
    Route::post('documents/media', 'DocumentController@storeMedia')->name('documents.storeMedia');
    Route::post('documents/ckmedia', 'DocumentController@storeCKEditorImages')->name('documents.storeCKEditorImages');
    Route::resource('documents', 'DocumentController');

    // Transaction
    Route::delete('transactions/destroy', 'TransactionController@massDestroy')->name('transactions.massDestroy');
    Route::resource('transactions', 'TransactionController');

    // Client Report
    Route::delete('client-reports/destroy', 'ClientReportController@massDestroy')->name('client-reports.massDestroy');
    Route::resource('client-reports', 'ClientReportController');

    // Courses
    Route::delete('courses/destroy', 'CoursesController@massDestroy')->name('courses.massDestroy');
    Route::post('courses/media', 'CoursesController@storeMedia')->name('courses.storeMedia');
    Route::post('courses/ckmedia', 'CoursesController@storeCKEditorImages')->name('courses.storeCKEditorImages');
    Route::resource('courses', 'CoursesController');

    // Lessons
    Route::delete('lessons/destroy', 'LessonsController@massDestroy')->name('lessons.massDestroy');
    Route::post('lessons/media', 'LessonsController@storeMedia')->name('lessons.storeMedia');
    Route::post('lessons/ckmedia', 'LessonsController@storeCKEditorImages')->name('lessons.storeCKEditorImages');
    Route::resource('lessons', 'LessonsController');

    // Tests
    Route::delete('tests/destroy', 'TestsController@massDestroy')->name('tests.massDestroy');
    Route::resource('tests', 'TestsController');

    // Questions
    Route::delete('questions/destroy', 'QuestionsController@massDestroy')->name('questions.massDestroy');
    Route::post('questions/media', 'QuestionsController@storeMedia')->name('questions.storeMedia');
    Route::post('questions/ckmedia', 'QuestionsController@storeCKEditorImages')->name('questions.storeCKEditorImages');
    Route::resource('questions', 'QuestionsController');

    // Question Options
    Route::delete('question-options/destroy', 'QuestionOptionsController@massDestroy')->name('question-options.massDestroy');
    Route::resource('question-options', 'QuestionOptionsController');

    // Test Results
    Route::delete('test-results/destroy', 'TestResultsController@massDestroy')->name('test-results.massDestroy');
    Route::resource('test-results', 'TestResultsController');

    // Test Answers
    Route::delete('test-answers/destroy', 'TestAnswersController@massDestroy')->name('test-answers.massDestroy');
    Route::resource('test-answers', 'TestAnswersController');

    // Time Work Type
    Route::delete('time-work-types/destroy', 'TimeWorkTypeController@massDestroy')->name('time-work-types.massDestroy');
    Route::resource('time-work-types', 'TimeWorkTypeController');

    // Time Project
    Route::delete('time-projects/destroy', 'TimeProjectController@massDestroy')->name('time-projects.massDestroy');
    Route::resource('time-projects', 'TimeProjectController');

    // Time Entry
    Route::delete('time-entries/destroy', 'TimeEntryController@massDestroy')->name('time-entries.massDestroy');
    Route::resource('time-entries', 'TimeEntryController');

    // Time Report
    Route::delete('time-reports/destroy', 'TimeReportController@massDestroy')->name('time-reports.massDestroy');
    Route::resource('time-reports', 'TimeReportController');

    // Certificacion Laboral
    Route::delete('certificacion-laborals/destroy', 'CertificacionLaboralController@massDestroy')->name('certificacion-laborals.massDestroy');
    Route::resource('certificacion-laborals', 'CertificacionLaboralController');

    // Entrega Dotacion
    Route::delete('entrega-dotacions/destroy', 'EntregaDotacionController@massDestroy')->name('entrega-dotacions.massDestroy');
    Route::resource('entrega-dotacions', 'EntregaDotacionController');

    // Entregaequipos
    Route::delete('entregaequipos/destroy', 'EntregaequiposController@massDestroy')->name('entregaequipos.massDestroy');
    Route::resource('entregaequipos', 'EntregaequiposController');

    // Entrega Epp
    Route::delete('entrega-epps/destroy', 'EntregaEppController@massDestroy')->name('entrega-epps.massDestroy');
    Route::resource('entrega-epps', 'EntregaEppController');

    // Salario
    Route::delete('salarios/destroy', 'SalarioController@massDestroy')->name('salarios.massDestroy');
    Route::resource('salarios', 'SalarioController');

    // Impuesto
    Route::delete('impuestos/destroy', 'ImpuestoController@massDestroy')->name('impuestos.massDestroy');
    Route::resource('impuestos', 'ImpuestoController');

    // Actainicioproyecto
    Route::delete('actainicioproyectos/destroy', 'ActainicioproyectoController@massDestroy')->name('actainicioproyectos.massDestroy');
    Route::post('actainicioproyectos/media', 'ActainicioproyectoController@storeMedia')->name('actainicioproyectos.storeMedia');
    Route::post('actainicioproyectos/ckmedia', 'ActainicioproyectoController@storeCKEditorImages')->name('actainicioproyectos.storeCKEditorImages');
    Route::resource('actainicioproyectos', 'ActainicioproyectoController');

    // Actacierreproyecto
    Route::delete('actacierreproyectos/destroy', 'ActacierreproyectoController@massDestroy')->name('actacierreproyectos.massDestroy');
    Route::post('actacierreproyectos/media', 'ActacierreproyectoController@storeMedia')->name('actacierreproyectos.storeMedia');
    Route::post('actacierreproyectos/ckmedia', 'ActacierreproyectoController@storeCKEditorImages')->name('actacierreproyectos.storeCKEditorImages');
    Route::resource('actacierreproyectos', 'ActacierreproyectoController');

    // Vacacionesauditoria
    Route::delete('vacacionesauditoria/destroy', 'VacacionesauditoriaController@massDestroy')->name('vacacionesauditoria.massDestroy');
    Route::resource('vacacionesauditoria', 'VacacionesauditoriaController');

    // Salidascampoauditoria
    Route::delete('salidascampoauditoria/destroy', 'SalidascampoauditoriaController@massDestroy')->name('salidascampoauditoria.massDestroy');
    Route::resource('salidascampoauditoria', 'SalidascampoauditoriaController');

    // Salidacampo Audi
    Route::delete('salidacampo-audis/destroy', 'SalidacampoAudiController@massDestroy')->name('salidacampo-audis.massDestroy');
    Route::resource('salidacampo-audis', 'SalidacampoAudiController');

    // Ods Compra Auditoria
    Route::delete('ods-compra-auditoria/destroy', 'OdsCompraAuditoriaController@massDestroy')->name('ods-compra-auditoria.massDestroy');
    Route::resource('ods-compra-auditoria', 'OdsCompraAuditoriaController');

    // Mantenimiento
    Route::delete('mantenimientos/destroy', 'MantenimientoController@massDestroy')->name('mantenimientos.massDestroy');
    Route::resource('mantenimientos', 'MantenimientoController');

    // Politicas
    Route::delete('politicas/destroy', 'PoliticasController@massDestroy')->name('politicas.massDestroy');
    Route::post('politicas/media', 'PoliticasController@storeMedia')->name('politicas.storeMedia');
    Route::post('politicas/ckmedia', 'PoliticasController@storeCKEditorImages')->name('politicas.storeCKEditorImages');
    Route::resource('politicas', 'PoliticasController');

    // Seleccion Proveedor
    Route::delete('seleccion-proveedors/destroy', 'SeleccionProveedorController@massDestroy')->name('seleccion-proveedors.massDestroy');
    Route::resource('seleccion-proveedors', 'SeleccionProveedorController');

    // Ingesos Geopark
    Route::delete('ingesos-geoparks/destroy', 'IngesosGeoparkController@massDestroy')->name('ingesos-geoparks.massDestroy');
    Route::resource('ingesos-geoparks', 'IngesosGeoparkController');

    // Presupuesto Items
    Route::delete('presupuesto-items/destroy', 'PresupuestoItemsController@massDestroy')->name('presupuesto-items.massDestroy');
    Route::resource('presupuesto-items', 'PresupuestoItemsController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
    Route::get('team-members', 'TeamMembersController@index')->name('team-members.index');
    Route::post('team-members', 'TeamMembersController@invite')->name('team-members.invite');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
