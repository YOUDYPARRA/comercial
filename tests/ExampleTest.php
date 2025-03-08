<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Faker\Factory as Faker;

class ExampleTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
       /* $data=[
                'numero_cotizacion'=>'prueba',
                'numero_contrato'=>'prueba',
                'numero_orden'=>'prueba',//el numero de orden del cliente
                'tipo_archivo'=>'prueba',//c= compra, v=venta'
                'folio'=>'prueba',
                'autor'=>'prueba',//nombre o iniciales del autor del documento.
                'area'=>'prueba',//coordinacion o parecido'
                'departamento'=>'prueba',//departamento, ejem: servicio, c.s., licitaciones etc...'
                'fecha_entrega'=>'prueba',//campo alendum'
                'fecha'=>'prueba',
                'fecha_embarque'=>'prueba',
                'nombre_tercero'=>'prueba',
                'direccion_tercero'=>'prueba',
                'colonia_tercero'=>'prueba',
                'cp_tercero'=>'prueba',
                'ciudad_tercero'=>'prueba',
                'estado_tercero'=>'prueba',
                'pais_tercero'=>'prueba',
                'nombre_fiscal'=>'prueba',
                'rfc'=>'prueba',
                'direccion_fiscal'=>'prueba',
                'colonia_fiscal'=>'prueba',
                'codigo_postal_fiscal'=>'prueba',
                'delegacion_fiscal'=>'prueba',
                'ciudad_fiscal'=>'prueba',
                'nombre_agente_aduanal'=>'prueba',
                'direccion_agente'=>'prueba',
                'telefono_agente'=>'prueba',
                'fax_agente'=>'prueba',
                'correo_agente'=>'prueba',
                'condicion_pago_tipo'=>'prueba',
                'condicion_pago_marca'=>'prueba',
                'condicion_pago_tiempo'=>'prueba',
                'atribuir'=>'prueba',//nombre o iniciales de vendedor de este proceso'
                'gerente'=>'prueba',//responsable de logistica o area'
                'representante_tercero'=>'prueba',// o representante legal',
                'correo_representante_tercero'=>'prueba',// o representante legal',
                'iva'=>'prueba',
                'total'=>'prueba',//'
                'digitalizacion'=>'prueba',//'
                'nota'=>'prueba',//observacion para el cliente.'
                'tipo_cambio'=>'prueba',
                'metodo_pago'=>'prueba',// campo alendum'
                'tipo_envio'=>'prueba',//campo alendum'
                'id_camp_publ'=>'prueba',//campo alendum'
                'org_name'=>'prueba',//campo alendum'
                'id_doctype_target'=>'prueba',//campo alendum'
                'c_bpartner_location'=>'prueba',//campo alendum'
                'id_warehouse'=>'prueba',//campo alendum'
                'tipo_moneda'=>'prueba',//campo alendum'
                'condicion_facturacion'=>'prueba',//   campo alendum'
                'fecha_facturacion'=>'prueba',//
                'c_bpartner_id'=>'prueba',//campo alendum'
                'org_id'=>'pruebaampo alendum',
                'centro_costo'=>'prueba',//campo alendum'
                'c_order_id'=>'prueba',
                'insumos'=>[factory(App\InsumoCompraVenta::class)->make()->toArray()]
        ];*/
        //$this->post('/compras',$data)->seeJson(['msg'=>'success']);
        //$this->post('/compras',$data)->assertViewHasAll($array);
        //$this->route('POST', 'compras.store', $data);
        //echo '->'.$rsl->status();
        //$this->assertRedirectedTo('/home');
        //$user = App\User::find(506);
        //dd($user);
        /*
        $this->actingAs($user)
        ->withSession(['foo' => 'bar']);*/
        //dd($data);
        /*$rsl=$this->call('POST', '/compras', $data);
        $this->assertEquals(200, $rsl->status());
        $this->seeInDatabase('compras_ventas', ['c_order_id' => 'prueba']);
        $this->seeInDatabase('insumos_compras_ventas', $data['insumos']);
        */
        //FIN PRUEBA  COMPRA
        //INICIO PRUEBA COMPRA...
        //inicio data
        /*
        $data=factory(App\Clase::class)->make()->toArray();
              //'insumos'=>[factory(App\InsumoCompraVenta::class)->make()->toArray()]
        $data=array_merge($data,['calificacion'=>'prueba']);
        //dd($user);
        $this->actingAs(App\User::find(506))
        ->withSession(['foo' => 'bar']);
        //fin data
        $rsl=$this->call('PUT', '/servicios/0', $data);
        //$this->assertJsonStringEqualsJsonString(json_encode($arr),$rsl);
        $this->assertEquals(200, $rsl->status());
        //FIN PRUEBA COMPRA
        */
        //inicio de prueba flujo cotizacion equipo
        //ECHO $estatus='GUARDADO';
        //echo $estatus='CONCRETADO';
        //echo $estatus='ENVIADO';
        //echo $estatus='APROBADO';
        /*
        ECHO $estatus='VALIDO';
        $cierto_clase=['id_cotizacion'=>258,'estatus'=>$estatus];
        $cierto=['id'=>258,'estatus'=>$estatus];
        $estado=[
            'clase'=>'CCCV',
            'organizacion'=>'SMH',
            'estado'=>'GUARDADO',
            'calificacion'=>$estatus
        ];
        $this->actingAs(App\User::find(427))->withSession(['foo' => 'bar']);
        $rsl=$this->call('PUT', '/cotizaciones/contratocompraventa/258', $estado);
        $rsl=$this->call('PUT', '/cotizaciones/contratocompraventa/254', $estado);
        $this->seeInDatabase('clases', $cierto_clase);
        $this->seeInDatabase('cotizaciones', $cierto);
        $this->assertEquals(302, $rsl->status());//redireccionamiento
        //FIN PRUEBA ESTATUS COTIZACION PÁQUETE INSUMO
        */
        //INICIO PRUEBA QUERY TERCEROS-CONTRATOS DESDE REPORTE
        /*$this->actingAs(App\User::find(427))->withSession(['foo' => 'bar']);
        $datos=[
            'nombre_fiscal'=>"*HOSPITAL*",
            'v'=>"4"
        ];
        $rsl=$this->call('GET', '/contratos', $datos);
        dd($rsl->msg);
        */
        //FIN PRUEBA QUERY TERCEROS-CONTRATOS DESDE REPORTE
        //INICIO PRUEBA ENVIAR Y PROCESAR VENTA
        $this->actingAs(App\User::find(427))->withSession(['foo' => 'bar']);
        $compra= App\Compra::find(782);
        $compra->issotrx='N';
        //dd($compra->insumos_compras_ventas);
        $request=$compra->toArray();
        $request['insumos']=$compra->insumos_compras_ventas->toArray();
        $rsl=$this->call('POST', '/compras', $request);//Generar compra
        //dd($rsl);
        //dd($request);
        $cierto=['id'=>797,'estatus'=>'COMPLETADO'];
        $request=[
            'id'=>"797",
            'issotrx'=>'N'
        ];
        

        $rsl=$this->call('POST', '/ordenes', $request);
        $this->assertEquals(302, $rsl->status());
        $this->seeInDatabase('compras_ventas', $cierto);
        $rsl=$this->call('PUT', '/ordenes/797', $request);
        //$this->assertSessionHasErrors($rsl, 'SE HA PROCESADO LA VENTA.');
        //FIN PRUEBA ENVIAR Y PROCESAR VENTA
    }
}