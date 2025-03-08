<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('home',[
    'as'=>'home',
    'uses'=>'HomeController@index'
]);
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);
resource('borrar','Admin\UserController@borrar');
//resource('users','Admin\UserController@index');
// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

//Route::group(['middleware' => 'auth'], function () {
Route::group(['middleware' => ['auth','permiso']], function () {

Route::get('editar',['as'=>'users.editar','uses'=>'Admin\UserController@editar']);
Route::PUT('actualizar/{id}',['as'=>'users.actualizar','uses'=>'Admin\UserController@actualizar']);
Route::PUT('switch_rol',['as'=>'users.switch_rol','uses'=>'Admin\UserController@switch_rol']);
Route::resource('users','Admin\UserController');
//    echo \Route::current()->getName();NO FUNCIA
    //Route::get('cotizaciones/firmadas',['as'=>'cotizaciones.firmadas','uses'=>'CotizacionController@indexFirmada']);

    Route::group(['prefix' => 'cotizaciones'], function () {
      Route::get('autorizadas',['as'=>'cotizaciones.autorizadas','uses'=>'CotizacionController@indexAutorizada']);
      Route::POST('observar',['as'=>'cotizaciones.observar','uses'=>'CotizacionController@observar']);
      Route::get('concreta',['as'=>'cotizaciones.concreta','uses'=>'CotizacionController@estatus']);
      Route::get('autoriza',['as'=>'cotizaciones.autoriza','uses'=>'CotizacionController@estatus']);
      Route::get('servicio',['as'=>'cotizaciones.servicio','uses'=>'CotizacionController@servicio']);
      Route::get('reporte/{id}',['as'=>'cotizaciones.reporte','uses'=>'CotizacionController@reporte']);
      Route::PUT('cancelar/{id}',['as'=>'cotizaciones.cancelar','uses'=>'CotizacionController@cancelar']);
      Route::PUT('proceso/{id}',['as'=>'cotizaciones.proceso','uses'=>'CotizacionController@proceso']);
      Route::get('contratocompraventacreate',[
        'as'=>'cotizaciones.contratocompraventacreate',
        'uses'=>'CotizacionPaqueteInsumoController@ccv_create'
        ]);
      Route::get('contratocompraventaedit/{id}',[
          'as'=>'cotizaciones.contratocompraventaedit',
          'uses'=>'CotizacionPaqueteInsumoController@ccv_edit'
          ]);
      Route::POST('contratocompraventa',[
        'as'=>'cotizaciones.contratocompraventa',
        'uses'=>'CotizacionPaqueteInsumoController@ccv_store'
        ]);
      Route::PUT('contratocompraventa/{id}',[
        'as'=>'cotizaciones.contratocompraventa',
        'uses'=>'CotizacionPaqueteInsumoController@ccv_update'
        ]);
      Route::PUT('contratocompraventa/estatus/{id}',[
        'as'=>'cotizaciones.contratocompraventa.estatus',
        'uses'=>'CotizacionPaqueteInsumoController@estatus'
        ]);
    });
      Route::resource('cotizaciones','CotizacionController');

    Route::resource('stock', 'StockController');
    Route::resource('equipos', 'EquipoController');
    Route::resource('terceros', 'TerceroController');
    Route::resource('direccion', 'DireccionController');
    Route::resource('contactos', 'ContactoController');
    Route::any('cotizaciones/pdf', 'PdfController@index');
    //Route::resource('cotizacionesPorUsuario','CotizacionController@getCotizacionesPorUsuario');
    Route::resource('ultimo','CotizacionController@ultimo');
    Route::resource('ultimoPre','PrecalculoController@ultimo'); //20160725
    Route::resource('insumos','InsumoController');
    Route::get('insumos/stock/{id}',['as'=>'insumos.stock','uses'=>'InsumoController@stock']);
    Route::get('insumos/calcularstock/{id}',['as'=>'insumos.calcularstock','uses'=>'InsumoController@calcularstock']);
    Route::PUT('isumos/stocksave/{id}',['as'=>'insumos.stocksave','uses'=>'CotizacionController@stocksave']);

    Route::resource('consultar','InsumoController@consultar');
    Route::resource('ocultar','InsumoController@delet');
    Route::resource('paquetes','PaqueteController');
    //Route::resource('consultarPaquetes','PaqueteController@consultarPaquetes');
    //Route::resource('consultaPaquete','PaqueteController@consultaPaquete');
    Route::resource('maximo','PaqueteController@maximo');

    Route::resource('cotizacionPaqueteInsumo','CotizacionPaqueteInsumoController');

    Route::resource('conversiones','ConversionController');
    Route::resource('catalogos_calculo','CatalogoCalculoController');
    Route::resource('precalculos','PrecalculoController');
    resource('sendEmail','EmailController@sendEmailReminder');

    resource('recursos','RecursoController');
    resource('componentes','ComponenteController');
    resource('permisos','PermisoController');
    resource('marcas_proveedores','MarcaProveedorController');
    resource('condiciones_cotizaciones','CondicionCotizacionController');


    resource('contratos_compra_venta','ContratoCompraVentaController');

    resource('pagares','PagareController');
    resource('catalogos_calculo','CatalogoCalculoController');
    resource('precalculos','PrecalculoController');
    resource('menus','MenuController');

    Route::get('/grupos-usuarios',['as'=>'grupos.usuarios.index',function(){//GENERADO PARA EL UNICO FIN DE CREAR UNA URL AMIGABLE...
//        \Route::current()->setName('Rl');
        return view('grupos.usuarios.index');
    }]);
    Route::get('/grupos/eliminados',['as'=>'grupos.eliminados', 'uses'=>'GrupoController@index']);
    Route::post('grupos','GrupoController@store');
    Route::get('grupos','GrupoController@index');
    Route::get('grupos/{id}','GrupoController@show');
    Route::put('grupos/{id}','GrupoController@update');
    Route::delete('grupos/{id}', 'GrupoController@destroy');
    //RUTAS DE OBJETO PIVOTE GRUPOS_USUARIOS
    Route::get('/grupos_usuarios','GrupoUsuarioController@index');
    Route::delete('/grupos_usuarios/{id}','GrupoUsuarioController@destroy');//recibe por parametro el id del grupo
    Route::post('grupos_usuarios','GrupoUsuarioController@store');

    Route::get('/insumos-opcionales',['as'=>'insumos-opcionales.index',function(){//GENERADO PARA EL UNICO FIN DE CREAR UNA URL AMIGABLE...
        return view('insumos.opcionales.index');
    }]);

    Route::get('/insumos-ensamble',function(){
        return view('insumos.opcionales.ensable');
    });
    Route::post('/insumos-opcionales',['as'=>'insumos-opcionales.store','uses'=>'InsumoOpcionalController@store' ]);
//    Route::get('insumos_opcionales/{id}',['as'=>'insumos_opcionales.show','uses'=>'InsumoOpcionalController@show']);
    Route::resource('consultarInsumoOpcional','InsumoOpcionalController@consultar');
    //inicia rutas para almacen de archivos
   Route::get('cotizaciones_digitales/create/{id}',['as'=>'cotizaciones_digitales.create','uses'=>'CotizacionDigitalController@create']);
   Route::get('cotizaciones_digitales/{id}',['as'=>'cotizaciones_digitales','uses'=>'CotizacionDigitalController@show']);
   Route::resource('cotizaciones_digitales','CotizacionDigitalController@store');
   //resource('medida','MedidaController@store');
   //Fin rutas para almacen de archivos
   Route::get('compras/create/{id}',['as'=>'compras.create','uses'=>'CompraController@create']);
   Route::get('compras/solicitud',['as'=>'compras.solicitud','uses'=>'CompraController@solicitud']);
   Route::get('devoluciones/create/{id}',['as'=>'devoluciones.create','uses'=>'DevolucionController@create']);
   Route::get('compras/digitalizar/{id}',['as'=>'compras.digitalizar','uses'=>'CompraController@digitalizar']);
   Route::get('compras/digital/{id}',['as'=>'compras.digital','uses'=>'CompraController@digital']);
   //Route::get('compras/show/{id}',['as'=>'compras.show','uses'=>'CompraController@show']);
   Route::get('compras/restaurar',['as'=>'compras.restaurar','uses'=>'CompraController@restaurar']);
   Route::get('compras/aprobar',['as'=>'compras.indexAprobar','uses'=>'CompraController@indexAprobar']);//falta agregar a seeder
   Route::get('compras/{id}',['as'=>'compras.show','uses'=>'CompraController@show']);
   Route::get('compras/edit/{id}',['as'=>'compras.edit','uses'=>'CompraController@edit']);
   Route::get('compras',['as'=>'compras.index','uses'=>'CompraController@index']);
   Route::PUT('compras/cancelar/{id}',['as'=>'compras.cancelar','uses'=>'CompraController@cancelar']);
   Route::PUT('compras/{id}',['as'=>'compras.update','uses'=>'CompraController@update']);
   Route::PUT('compras/estatus/{id}',['as'=>'compras.estatus','uses'=>'CompraController@estatus']);
   Route::DELETE('compras/destroy/{id}',['as'=>'compras.destroy','uses'=>'CompraController@destroy']);
   Route::POST('compras',['as'=>'compras.store','uses'=>'CompraController@store']);
   Route::POST('compras/observar/{observacion}',['as'=>'compras.observar','uses'=>'CompraController@observar']);
   Route::POST('compras/archivar/{digital}',['as'=>'compras.archivar','uses'=>'CompraController@archivar']);
   //inicia stock
   Route::get('/stocks','EquipoController@index');
   //fin stock
   //Route::get('/stocks',['as'=>'stocks.index','uses'=>'StockController@index']);
   //ORDEN_VENTA

   Route::get('ventas/create/{id}',['as'=>'ventas.create','uses'=>'VentaController@create']);
  Route::get('ventas/solicitud',['as'=>'ventas.solicitud','uses'=>'VentaController@solicitud']);
  Route::get('ventas/prestamo/{id}',['as'=>'ventas.prestamo','uses'=>'VentaController@prestamo']);
   Route::get('ventas/restaurar',['as'=>'ventas.restaurar','uses'=>'VentaController@restaurar']);
   Route::get('ventas/enviado',['as'=>'ventas.enviado','uses'=>'VentaController@enviado']);
   Route::get('ventas/{id}',['as'=>'ventas.show','uses'=>'VentaController@show']);
   Route::get('ventas',['as'=>'ventas.index','uses'=>'VentaController@index']);
   Route::get('ventas/edit/{id}',['as'=>'ventas.edit','uses'=>'VentaController@edit']);
   Route::DELETE('ventas/{id}',['as'=>'ventas.destroy','uses'=>'VentaController@destroy']);
   Route::PUT('ventas/estatus/{id}',['as'=>'ventas.estatus','uses'=>'VentaController@estatus']);
   Route::PUT('ventas/{id}',['as'=>'ventas.update','uses'=>'VentaController@update']);
   Route::post('ventas',['as'=>'ventas.store','uses'=>'VentaController@store']);
   Route::post('ventas/observar/{observacion}',['as'=>'ventas.observar','uses'=>'VentaController@observar']);
   Route::post('ventas/estatus/{estatus}',['as'=>'ventas.estatus','uses'=>'VentaController@estatus']);
   //////////////

   Route::get('ordenes_ventas/create/{id}',['as'=>'ordenes_ventas.create','uses'=>'OrdenVentaController@create']);
    //resource('ordenes_ventas', 'OrdenVentaController');
   Route::get('ordenes_ventas/restaurar',['as'=>'ordenes_ventas.restaurar','uses'=>'OrdenVentaController@restaurar']);
   Route::get('ordenes_ventas/entregar',['as'=>'ordenes_ventas.entregar','uses'=>'OrdenVentaController@entregar']);
   Route::get('ordenes_ventas/{id}',['as'=>'ordenes_ventas.show','uses'=>'OrdenVentaController@show']);
   Route::get('ordenes_ventas',['as'=>'ordenes_ventas.index','uses'=>'OrdenVentaController@index']);
   Route::get('ordenes_ventas/edit/{id}',['as'=>'ordenes_ventas.edit','uses'=>'OrdenVentaController@edit']);
   Route::DELETE('ordenes_ventas/{id}',['as'=>'ordenes_ventas.destroy','uses'=>'OrdenVentaController@destroy']);
   Route::PUT('ordenes_ventas/{id}',['as'=>'ordenes_ventas.update','uses'=>'OrdenVentaController@update']);
   Route::post('ordenes_ventas',['as'=>'ordenes_ventas.store','uses'=>'OrdenVentaController@store']);
   Route::post('ordenes_ventas/observar/{observacion}',['as'=>'ordenes_ventas.observar','uses'=>'OrdenVentaController@observar']);
   Route::post('ordenes_ventas/estatus/{estatus}',['as'=>'ordenes_ventas.estatus','uses'=>'OrdenVentaController@estatus']);

   //FIN ORDEN VENTA
   //INICIA REMISION
   Route::get('remisiones/digitalizarcotizacion/{cotizacion}',['as'=>'remisiones.digitalizarcotizacion','uses'=>'RemisionController@digitalizarCotizacion']);
   Route::get('remisiones/digital/{id}',['as'=>'remisiones.digital','uses'=>'RemisionController@digital']);
   Route::get('remisiones',['as'=>'remisiones.index','uses'=>'RemisionController@index']);
   Route::get('remisiones/{id}',['as'=>'remisiones.show','uses'=>'RemisionController@show']);
   Route::DELETE('remisiones/destroy/{id}',['as'=>'remisiones.destroy','uses'=>'RemisionController@destroy']);
   Route::POST('remisiones/archivar/',['as'=>'remisiones.archivar','uses'=>'RemisionController@archivar']);
   Route::PUT('remisiones/{id}',['as'=>'remisiones.update','uses'=>'RemisionController@update']);
   //FIN REMISION
   //INICIA CONDICION FACTURA
   Route::get('categoria_producto',['as'=>'categoria_producto.index','uses'=>'CategoriaProductoController@index']);
   //FIN CONDICION FACTURA
   //INICIA CONDICION FACTURA
   Route::get('condiciones_factura',['as'=>'condiciones_factura.index','uses'=>'CondicionFacturaController@index']);
   //FIN CONDICION FACTURA
   //INICIA CONDICION ENVIO
   Route::get('metodos_envio',['as'=>'metodos_envio.index','uses'=>'MetodoEnvioController@index']);
   //FIN CONDICION ENVIO
   //INICIA CONDICION PAGO TIEMPO
   Route::get('condiciones_pago_tiempo',['as'=>'condiciones_pago_tiempo.index','uses'=>'CondicionPagoTiempoController@index']);
   //FIN CONDICION PAGO TIEMPO
   //INICIA CAMPAÑA PUBLICITARIA
   Route::get('campanas_publicidad',['as'=>'campanas_publicidad.index','uses'=>'CampanaPublicidadController@index']);
   //INICIA CAMPAÑA PUBLICITARIA
   Route::get('tipos_transaccion',['as'=>'tipos_transaccion.index','uses'=>'TipoTransaccionController@index']);
   //FIN CAMPAÑA PUBLICITARIA
   //INICIA TIPO MONEDA
   Route::get('tipos_moneda',['as'=>'tipos_moneda.index','uses'=>'TipoMonedaController@index']);
   //FIN TIPO MONEDA
   //INICIA TIPO ALMACEN
   Route::get('tipos_almacen',['as'=>'tipos_almacen.index','uses'=>'TipoAlmacenController@index']);
   //FIN TIPO ALMACEN
   //INICIA METODO PAGO
   Route::get('metodos_pago',['as'=>'metodos_pago.index','uses'=>'MetodoPagoController@index']);
   //FIN METODO PAGO
   //INICIA METODO PAGO
   Route::get('centros_costo',['as'=>'centros_costo.index','uses'=>'CentroCostoController@index']);
   //FIN METODO PAGO
   //FIN CAMPAÑA PUBLICITARIA
   //INICIA CAMPAÑA PRODUCT
   Route::get('product_v',['as'=>'product_v.index','uses'=>'ProductVController@index']);
   //FIN CAMPAÑA PRODUCT
   //INICIA CAMPAÑA PRODUCT
   Route::get('tax_v',['as'=>'tax_v.index','uses'=>'TaxVController@index']);
   Route::get('organizacion_v',['as'=>'organizacion_v.index','uses'=>'OrganizacionVController@index']);
   //Route::post('organizacion_v',['as'=>'organizacion_v.store','uses'=>'OrganizacionVController@store']);

   Route::get('reference_bank',['as'=>'reference_bank.index','uses'=>'ReferenceBController@index']);
   //FIN CAMPAÑA PRODUCT
   //INICIA CAMPAÑA PRODUCT
   Route::get('warehouse_rule_v',['as'=>'warehouse_rule_v.index','uses'=>'WarehouseRuleVController@index']);
   //FIN CAMPAÑA PRODUCT
   //INICIA USUARIO EN EL PROYECTO
   Route::get('proy_user',['as'=>'proy_user.index','uses'=>'ProyUserController@index']);
   //FIN USUARIO EN EL PROYECTO
   //Route::resource('compras','CompraController');
//INICIA comerciales
   Route::get('comerciales/edit/{id}',['as'=>'comerciales.edit','uses'=>'ComercialController@edit']);
   Route::get('comerciales/create',['as'=>'comerciales.create','uses'=>'ComercialController@create']);
   Route::get('comerciales',['as'=>'comerciales.index','uses'=>'ComercialController@index']);
   Route::get('comerciales/{id}',['as'=>'comerciales.show','uses'=>'ComercialController@show']);
   Route::DELETE('comerciales/destroy/{id}',['as'=>'comerciales.destroy','uses'=>'ComercialController@destroy']);
   Route::POST('comerciales',['as'=>'comerciales.store','uses'=>'ComercialController@store']);
   Route::PUT('comerciales/{id}',['as'=>'comerciales.update','uses'=>'ComercialController@update']);
   //FIN comerciales
    resource('productos','ProductoController');
   //INICIA coordinaciones
   Route::get('coordinaciones',['as'=>'coordinaciones.edit','uses'=>'CoordinacionController@edit']);
   Route::get('coordinaciones/create',['as'=>'coordinaciones.create','uses'=>'CoordinacionController@create']);
   Route::get('coordinaciones',['as'=>'coordinaciones.index','uses'=>'CoordinacionController@index']);
   Route::get('coordinaciones/edit/{id}',['as'=>'coordinaciones.edit','uses'=>'CoordinacionController@edit']);
   Route::get('coordinaciones/{id}',['as'=>'coordinaciones.show','uses'=>'CoordinacionController@show']);
   Route::DELETE('coordinaciones/destroy/{id}',['as'=>'coordinaciones.destroy','uses'=>'CoordinacionController@destroy']);
   Route::POST('coordinaciones/store',['as'=>'coordinaciones.store','uses'=>'CoordinacionController@store']);
   Route::PUT('coordinaciones/{id}',['as'=>'coordinaciones.update','uses'=>'CoordinacionController@update']);
   //FIN coordinaciones
   Route::get('terceroscomerciales',['as'=>'terceroscomerciales.index','uses'=>'TerceroComercialController@index']);
   ///INICIA REPORTE DE SERVICIO
   //Route::get('reportes/digitalizarcotizacion/{cotizacion}',['as'=>'remisiones.digitalizarcotizacion','uses'=>'RemisionController@digitalizarCotizacion']);
   //Route::get('reportes/digital/{id}',['as'=>'remisiones.digital','uses'=>'RemisionController@digital']);
   Route::PUT('reportes/correo/{id}',['as'=>'reportes.correo','uses'=>'ReporteController@correo']);
   Route::get('reportes/observar',['as'=>'reportes.observar','uses'=>'ReporteController@observar']);
   Route::get('reportes/crea/{id}',['as'=>'reportes.crea','uses'=>'ReporteController@crea']);
   Route::get('reportes/create',['as'=>'reportes.create','uses'=>'ReporteController@create']);
   Route::get('reportes/restaurar',['as'=>'reportes.restaurar','uses'=>'ReporteController@restaurar']);
   Route::get('reportes/edit/{id}',['as'=>'reportes.edit','uses'=>'ReporteController@edit']);
   Route::get('reportes/validar',['as'=>'reportes.validar','uses'=>'ReporteController@index']);//reporte por validar
   Route::get('reportes',['as'=>'reportes.index','uses'=>'ReporteController@index']);
   Route::get('reportes/{id}',['as'=>'reportes.show','uses'=>'ReporteController@show']);
   Route::DELETE('reportes/destroy/{id}',['as'=>'reportes.destroy','uses'=>'ReporteController@destroy']);
   Route::POST('reportes',['as'=>'reportes.store','uses'=>'ReporteController@store']);
   Route::POST('reportes/{id}',['as'=>'reportes.observar','uses'=>'ReporteController@observar']);
   Route::PUT('reportes/enviar/{id}',['as'=>'reportes.enviar','uses'=>'ReporteController@enviar']);
   Route::PUT('reportes/{id}',['as'=>'reportes.update','uses'=>'ReporteController@update']);
   //FIN REPORTE DE SERVICIO
   //INICIA CUSTODIAS
   Route::get('custodias',['as'=>'custodias.index','uses'=>'CustodiaController@index']);
   Route::get('custodias/create/{id}',['as'=>'custodias.create','uses'=>'CustodiaController@create']);
   Route::POST('custodias',['as'=>'custodias.store','uses'=>'CustodiaController@store']);
   Route::PUT('custodias/{id}',['as'=>'custodias.update','uses'=>'CustodiaController@update']);
   //FIN CUSTODIAS
//INICIO PROGRAMACION
   Route::PUT('programaciones/correo/{id}',['as'=>'programaciones.correo','uses'=>'ProgramacionController@correo']);
   Route::get('programaciones',['as'=>'programaciones.index','uses'=>'ProgramacionController@index']);
   Route::get('programaciones/create/{id}',['as'=>'programaciones.create','uses'=>'ProgramacionController@create']);
   Route::get('programaciones/edit/{id}',['as'=>'programaciones.edit','uses'=>'ProgramacionController@edit']);
   Route::get('programaciones/{id}',['as'=>'programaciones.show','uses'=>'ProgramacionController@show']);
   Route::POST('programaciones',['as'=>'programaciones.store','uses'=>'ProgramacionController@store']);
   Route::PUT('programaciones/{id}',['as'=>'programaciones.update','uses'=>'ProgramacionController@update']);
   Route::DELETE('programaciones/destroy/{id}',['as'=>'programaciones.destroy','uses'=>'ProgramacionController@destroy']);
   //FIN PROGRAMACION
   //INICIO PROGRAMACION
   Route::get('servicios/digitalizar/{id}',['as'=>'servicios.digitalizar','uses'=>'ServicioController@digitalizar']);
   Route::get('servicios/registro_archivo/{id}',['as'=>'servicios.registro_archivo','uses'=>'ServicioController@registro_archivo']);
   Route::get('servicios/digital/{id}',['as'=>'servicios.digital','uses'=>'ServicioController@digital']);
   Route::get('servicios/captura',['as'=>'servicios.captura','uses'=>'ServicioController@captura']);
   Route::get('servicios/resguardos',['as'=>'servicios.resguardos','uses'=>'ServicioController@resguardos']);
   Route::get('servicios',['as'=>'servicios.index','uses'=>'ServicioController@index']);
   Route::get('servicios/create',['as'=>'servicios.create','uses'=>'ServicioController@create']);
   Route::get('servicios/restaurar',['as'=>'servicios.restaurar','uses'=>'ServicioController@restaurar']);
   Route::get('servicios/recepcion/{id}',['as'=>'servicios.recepcion','uses'=>'ServicioController@recepcion']);
   Route::get('servicios/resguardo/{id}',['as'=>'servicios.resguardo','uses'=>'ServicioController@resguardo']);
   Route::get('servicios/valida/{id}',['as'=>'servicios.valida','uses'=>'ServicioController@valida']);
   Route::get('servicios/archiva/{id}',['as'=>'servicios.archiva','uses'=>'ServicioController@archiva']);
   Route::get('servicios/edit/{id}',['as'=>'servicios.edit','uses'=>'ServicioController@edit']);
   Route::get('servicios/{id}',['as'=>'servicios.show','uses'=>'ServicioController@show']);
   Route::POST('servicios',['as'=>'servicios.store','uses'=>'ServicioController@store']);
   Route::PUT('servicios/{id}',['as'=>'servicios.update','uses'=>'ServicioController@update']);
   Route::PUT('servicios/archivo/{id}',['as'=>'servicios.archivo','uses'=>'ServicioController@archivo']);
   Route::DELETE('servicios/destroy/{id}',['as'=>'servicios.destroy','uses'=>'ServicioController@destroy']);
   Route::POST('servicios/archivar/{digital}',['as'=>'servicios.archivar','uses'=>'ServicioController@archivar']);
   //FIN PROGRAMACION
   //INICIO PRESTAMOS
   Route::get('prestamos/digitalizar/{id}',['as'=>'prestamos.digitalizar','uses'=>'PrestamoController@digitalizar']);
   Route::get('prestamos/digital/{id}',['as'=>'prestamos.digital','uses'=>'PrestamoController@digital']);
   Route::get('prestamos/archiva/{id}',['as'=>'prestamos.archiva','uses'=>'PrestamoController@archiva']);
   Route::get('prestamos',['as'=>'prestamos.index','uses'=>'PrestamoController@index']);
   Route::get('prestamos/requisicion/{id}',['as'=>'prestamos.requisicion','uses'=>'PrestamoController@requisicion']);
   Route::get('prestamos/create/{id}',['as'=>'prestamos.create','uses'=>'PrestamoController@create']);
   Route::get('prestamos/eliminados',['as'=>'prestamos.eliminados','uses'=>'PrestamoController@eliminados']);
   Route::get('prestamos/edit/{id}',['as'=>'prestamos.edit','uses'=>'PrestamoController@edit']);
   Route::get('prestamos/{id}',['as'=>'prestamos.show','uses'=>'PrestamoController@show']);
   Route::POST('prestamos',['as'=>'prestamos.store','uses'=>'PrestamoController@store']);
   Route::PUT('prestamos/estatus/{id}',['as'=>'prestamos.estatus','uses'=>'PrestamoController@estatus']);
   Route::PUT('prestamos/enviar/{id}',['as'=>'prestamos.enviar','uses'=>'PrestamoController@enviar']);
   Route::PUT('prestamos/{id}',['as'=>'prestamos.update','uses'=>'PrestamoController@update']);
   Route::DELETE('prestamos/destroy/{id}',['as'=>'prestamos.destroy','uses'=>'PrestamoController@destroy']);
   Route::POST('prestamos/archivar/{digital}',['as'=>'prestamos.archivar','uses'=>'PrestamoController@archivar']);
   Route::POST('prestamos/{id}',['as'=>'prestamos.observar','uses'=>'PrestamoController@observar']);
   //FIN PRESTAMOS
   //INICIO CONTRATOS
   Route::get('contratos/digital/{id}',['as'=>'contratos.digital','uses'=>'ContratoController@digital']);
   Route::get('contratos/digitalizar/{id}',['as'=>'contratos.digitalizar','uses'=>'ContratoController@digitalizar']);
   Route::PUT('contratos/archivar/{id}',['as'=>'contratos.archivar','uses'=>'ContratoController@archivar']);
   Route::GET('contratos/eliminados',['as'=>'contratos.eliminados','uses'=>'ContratoController@eliminados']);
   Route::get('contratos',['as'=>'contratos.index','uses'=>'ContratoController@index']);
   Route::get('contratos/create',['as'=>'contratos.create','uses'=>'ContratoController@create']);
   Route::get('contratos/restaurar',['as'=>'contratos.restaurar','uses'=>'ContratoController@restaurar']);
   Route::get('contratos/edit/{id}',['as'=>'contratos.edit','uses'=>'ContratoController@edit']);
   Route::get('contratos/{id}',['as'=>'contratos.show','uses'=>'ContratoController@show']);
   Route::POST('contratos/observar',['as'=>'contratos.observar','uses'=>'ContratoController@observar']);
   Route::POST('contratos',['as'=>'contratos.store','uses'=>'ContratoController@store']);
   /*
   Route::PUT('contratos/estatus/{id}',['as'=>'contratos.estatus','uses'=>'ContratoController@estatus']);
   */
   Route::PUT('contratos/{id}',['as'=>'contratos.update','uses'=>'ContratoController@update']);
   Route::PUT('contratos/estatus/{id}',['as'=>'contratos.estatus','uses'=>'ContratoController@estatus']);
   Route::PUT('contratos/aprobar/{id}',['as'=>'contratos.aprobar','uses'=>'ContratoController@aprobar']);
   Route::PUT('contratos/cerrar/{id}',['as'=>'contratos.cerrar','uses'=>'ContratoController@cerrar']);
   Route::PUT('contratos/cancelar/{id}',['as'=>'contratos.cancelar','uses'=>'ContratoController@cancelar']);
   Route::PUT('contratos/vigencia/{id}',['as'=>'contratos.vigencia','uses'=>'ContratoController@vigencia']);
   Route::DELETE('contratos/destroy/{id}',['as'=>'contratos.destroy','uses'=>'ContratoController@destroy']);
   /*
   Route::POST('contratos/archivar/{digital}',['as'=>'contratos.archivar','uses'=>'ContratoController@archivar']);
   */
   //FIN CONTRATOS
   //INICIO POLIDIGITALIZACIONES
   Route::get('digitalizaciones/create/{id}',['as'=>'digitalizaciones.create','uses'=>'DigitalizacionController@create']);
   Route::get('digitalizaciones/{id}/{subclase}',['as'=>'digitalizaciones.index','uses'=>'DigitalizacionController@index']);
   Route::POST('digitalizaciones',['as'=>'digitalizaciones.store','uses'=>'DigitalizacionController@store']);
   Route::get('digitalizaciones/{id}',['as'=>'digitalizaciones.show','uses'=>'DigitalizacionController@show']);
   Route::DELETE('digitalizaciones/destroy/{id}',['as'=>'digitalizaciones.destroy','uses'=>'DigitalizacionController@destroy']);
   //FIN POLIDIGITALIZACIONES
   //INICIO DESCCARGA LOG
   Route::get('logcomercial',['as'=>'logcomercial.index','uses'=>'LogComercialController@index']);
   //FIN DESCARGA LOG
   //INICIO ORDENES_SERVICIO
   resource('ordenes_servicio','OrdenServicioController');
   // FIN ORDENES_SERVICIO

   //INICIO ROUTE UNIDADES DE MEDIDAS.

Route::get('/unidades_medidas',['as'=>'unidades_medidas.index','uses'=>'UnidadMedidaController@index']);
Route::get('/unidades_medidas/restaurar',['as'=>'unidades_medidas.restaurar','uses'=>'UnidadMedidaController@restaura']);
Route::get('/unidades_medidas/edit/{id}',['as'=>'unidades_medidas.edit','uses'=>'UnidadMedidaController@edit']);
Route::get('/unidades_medidas/{id}',['as'=>'unidades_medidas.show','uses'=>'UnidadMedidaController@show']);
Route::POST('/unidades_medidas/store/{compra}',['as'=>'unidades_medidas.store','uses'=>'UnidadMedidaController@store']);
Route::PUT('/unidades_medidas/{unidad_medida}',['as'=>'unidades_medidas.update','uses'=>'UnidadMedidaController@update']);
Route::DELETE('unidades_medidas/destroy/{id}',['as'=>'unidades_medidas.destroy','uses'=>'UnidadMedidaController@destroy']);
resource('ordenes','OrdenController');
//FIN UNIDADES MEDIDAS

});//####FIN DE MIDDLEWARE AGRUPADO#####
   resource('medida','MedidaController');
   Route::get('contratos/word/{id}',['as'=>'contratos.word','uses'=>'ContratoController@word']);


//INICIA CONDICIONES PAGO
Route::get('condiciones_pagos/restaurar',['as'=>'condiciones_pagos.restaurar','uses'=>'CondicionPagoController@indexRestaurar']);
Route::resource('condiciones_pagos','CondicionPagoController');
//FINALIZA CONDICIONES PAGO
//INICIA MODO ENVIO exceptuar show
Route::get('modos_envios/restaurar',['as'=>'modos_envios.restaurar','uses'=>'ModoEnvioController@indexRestaurar']);
Route::resource('modos_envios','ModoEnvioController');
//FIN MODO ENVIO
//INICIA AGENTE ADUANAL
Route::get('agentes_aduanales/restaurar',['as'=>'agentes_aduanales.restaurar','uses'=>'AgenteAduanalController@indexRestaurar']);
Route::resource('agentes_aduanales','AgenteAduanalController');
//FIN AGENTE ADUANAL.
//ROUTE COMPRAS

Route::get('/facade', ['as'=>'facade','uses'=>'FacadeController@index']);

//Route::get('pruebas','PruebaController@index');
resource('demo','DemoController');
