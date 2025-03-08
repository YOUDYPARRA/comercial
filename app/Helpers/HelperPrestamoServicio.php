<?php

namespace app\Helpers;
use App\Prestamo;
use App\Clase as ClasePrestamo;
use App\Cotizacion;
use App\InsumoCompraVenta;//linea de prestamo
use App\CotizacionPaqueteInsumo;//linea de cotizacion
use App\Helpers\HelperUtil;
class HelperPrestamoServicio
{
public static function setCerrPres($id_prestamo){//ver que lineas tiene y verificar si cerrar
//HelperUtil::log(['$id_prestamo'=>$id_prestamo]);
    $cerrar=0;
    $estatus=0;
    $lns_pres=[];
    $lns_pres=InsumoCompraVenta::buscar(['clase'=>'F','id_compra_venta'=>$id_prestamo])->get();
    //$lns_pres=HelperPrestamoServicio::getLineasPrestamo($id_prestamo);
    if(empty($lns_pres)){
      $estatus=1;
      $cerrar++;
    }//fin si no hay lineas de prestamo, es pq el prestamo no tiene estatus de prestado
    if($cerrar==0){
      //HelperUtil::log(['$lns_pres'=>$lns_pres]);
          foreach ($lns_pres as $insumo_prestamo) {
            if($insumo_prestamo->calculo==0){//si esta en cero, ver devoluciones y/o cotizaciones
              //obtener la linea en devolucion relacionada
              $dev_insumos=[];
              $dev_insumos=InsumoCompraVenta::buscar(['clase'=>'DEV','id_prestamo'=>$id_prestamo])->get();//OBTIENE LAS LINEAS DE TODOS LAS DEVOLUCIONES
              //HelperUtil::log(['$dev_insumos'=>$dev_insumos]);
              foreach ($dev_insumos as $dev_insumo) {//Ver devoluciones
                    $devolucion=HelperPrestamoServicio::getPrestamo($dev_insumo->id_compra_venta);
                    //HelperUtil::log(['$devolucion->estatus'=>$devolucion->estatus]);
                    if($devolucion->estatus!='CERRADO'){
                      $estatus=3;
                      $cerrar++;
                    }
              }//fin ver lineas de devoluciones y estatus dev
              //if a buscar cotizacion estatus
              $insumos_cot=[];
              $insumos_cot=CotizacionPaqueteInsumo::idPrestamo($id_prestamo)->get();
              //HelperUtil::log(['$insumo_cot'=>$insumos_cot]);
              foreach ($insumos_cot as $insumo_cot) {
                // code...ir a busar el estatus de la cotizacion
                $cotizacion=Cotizacion::withTrashed()->findOrFail($insumo_cot->id_cotizacion);
                if( ($cotizacion->estatus=='SOLICITUD') || ($cotizacion->estatus=='VALIDO') || ($cotizacion->estatus=='VALIDADO') || ($cotizacion->estatus=='ACEPTABLE') || ($cotizacion->estatus=='RECHAZADO') || ($cotizacion->estatus=='ENVIADO') || ($cotizacion->estatus=='GUARDADO')  ){//VALIDAR Q LA COTIZACION SEA HAYA PASADO POR CADENA DE SUMINISTRO, (Q YA TIENE VENTA/COMRPA LIGADA)
                  //'PROGRAMADO','ENTREGADO','RECEPCIONADO','CONCRETADO','ENTREGADO TERCERO','RUTA','PROCESADO'
                  //eSTATUS QUE SON menoR A CADENA DE SUMINISTRO 'SOLICITUD','VALIDO','VALIDADO','RECHAZADO','ENVIADO','ACEPTABLE'
                  $estatus=4;
                  $cerrar++;
                }
              }
            }else{
              $cerrar++;
              $estatus=2;
            }//fin si linea = 0
          }
    }//fin cerrar pq no hay lineas de prestado.prestado==estatus==prestado
    return array($cerrar,$estatus);
  }//fin funcion set status
  /*
  public static funcion getLnEnDev($id_insumo_devolucion){

    //obtener la linea de la devolucion
      InsumoCompraVenta::findOrFail($id_insumo_devolucion);
    //obtener el estatus de de documento
  }
  */
  /*public static funcion getLnCot($id_documento){

  }

*/
    /*public static function creaDev($insumo_devolver){
      $clase = new ClasePrestamo();
      $id_prestamo=$insumo_devolver->id_prestamo;
      $clase_prestamo=HelperPrestamoServicio::getPrestamo($id_prestamo);
      $clase->fill($clase_prestamo);
      $clase->foliar='DEV';
      $clase->estatus='PRESTADO';
      $r_prestamo=$clase->prestamo;
      $prestamo= new Prestamo($r_prestamo);
      $prestamo->clase='DEV';
      $clase->prestamo()->save($prestamo);

      $insumo=new InsumoCompraVenta($insumo_devolver);
      $insumo->id_compra_venta=$clase->id;
      $insumo->clase='F';
      $arr_insumos[]=$insumo;
      $clase->insumos_compras_ventas()->saveMany($arr_insumos);
      return $clase;

    }*/
    /*public static function insumPrestCot($id_insumo_cotizacion,$insumo_cotizacion){
      /**Verifica cantidades de insumos, cuando vienen de un prestamo y hay previos en la cotizacion
      $insumo_prestamo=null;
      if(!empty($insumo->id_insumo_prestamo) ){
        $insumo_cotizacion_ant=HelperPrestamoServicio::getInsumoCotizacion($id_insumo_cotizacion);
        $insumo_prestamo=HelperPrestamoServicio::getInsumoPrestamo($insumo_cotizacion->id_insumo_prestamo);
        $sum=HelperPrestamoServicio::suma($insumo_prestamo->calculo,$insumo_cotizacion_ant->cantidad);
        $insumo_prestamo->calculo=$sum;

        $c=HelperPrestamoServicio::resta($insumo_prestamo->calculo,$insumo_cotizacion->cantidad);
        $insumo_prestamo->calculo=$c;
        $insumo_prestamo->update();
      }
      return $insumo_prestamo;

    }*/
    public static function restInsumPrest($insumo_tomado_de_prestamo){
      //Modifica la cantidad de instumos en el campo calculo para prestamo
      $insumo_prestamo=null;
      HelperUtil::log(['$insumo_tomado_de_prestamo'=>$insumo_tomado_de_prestamo]);
      if(!empty($insumo_tomado_de_prestamo->id_insumo_prestamo) ){
        $insumo_prestamo=HelperPrestamoServicio::getInsumoPrestamo($insumo_tomado_de_prestamo->id_insumo_prestamo);
        $c=HelperPrestamoServicio::diferencia($insumo_prestamo->calculo,$insumo_tomado_de_prestamo->cantidad);
        //HelperUtil::log(['$c'=>$c]);
        $insumo_prestamo->calculo=$c;
        $insumo_prestamo->update();
      }
      return $insumo_prestamo;
    }
    public static function delInsumosCot($id_cotizacion){
      CotizacionPaqueteInsumo::idCotizacion($id_cotizacion)->delete();
    }
    private static function getInsumoCotizacion($id_insumo_cotizacion){
        return CotizacionPaqueteInsumo::withTrashed()->findOrFail($id_insumo_cotizacion);
    }
    private static function getInsumoPrestamo($id_insumo_prestamo){
      return InsumoCompraVenta::withTrashed()->findOrFail($id_insumo_prestamo);
    }
    private static function actualInsumoPrestamo($insumo_prestamo,$cantidad_actual){
      $insumo_prestamo->cantidad=$cantidad_actual;
      $insumo_prestamo->update();
      return $insumo_prestamo;
    }
    public static function getLineaServicio($id_prestamo,$codigo_proovedor){
      /**
      *1Buscar el reporte
      *2Buscar el numero de os. relacionadas
      *3Obtener las lineas de cada o.s.
      *4Cuando encuentre una linea, regresar la o.s. en la q se encuentra, asi como el estatus cundo sea != 'CANCELADO'
      **/
      $primer_prestamo=HelperPrestamoServicio::getPrestamo($id_prestamo);
      $reporte=HelperPrestamoServicio::getReporte($primer_prestamo->id_foraneo);
      $servicios=HelperPrestamoServicio::getPrestamo('',['clase'=>'S','id_foraneo'=>$reporte->id]);
      //$prestamos=ClasePrestamo::buscar(['clase'=>'F','id_foraneo'=>$reporte->id])->get();
      $arr_insumos=[];
      foreach ($servicios as $key => $servicio) {
        // code...generar arreglo de lineas de  prestamos
        //HelperUtil::log(['$prestamo'=>$prestamo]);
        if($servicio->estatus!='CANCELADO'){
            $insumos_servicio=InsumoCompraVenta::buscar(['clase'=>'S','id_compra_venta'=>$servicio->id])->get();
            //$insumos_servicio=InsumoCompraVenta::buscar(['clase'=>'F','id_compra_venta'=>$prestamo->id])
            //->get();
            foreach ($insumos_servicio as $insumo) {
              if($insumo->codigo_proovedor==$codigo_proovedor){
                $insumo->folio=$servicio->folio;
                $arr_insumos[]=$insumo;
              }
            }//FIN FOREACH INSUMOS
      }//FIN IF ESTAUS CANCELADO
      }//fin qry prestamos
      return $arr_insumos;
    }
    public static function getPrestado($id_prestamo) {
      $prestamo = HelperPrestamoServicio::getPrestamo($id_prestamo);
      return HelperPrestamoServicio::validaPrestamo($prestamo);
    }
    private static function cancelDoc($id_insumo_compra_venta,$cantidad,$id_insumo_cotizacion)
    {//recibe cantidad de linea de la cotizacion q se esta eliminando
        $insumo_prestamo = InsumoCompraVenta::withTrashed()->findOrFail($id_insumo_compra_venta);//linea prestamo
        /*if($elim_cot){
          $insumo_cotizacion=CotizacionPaqueteInsumo::findOrFail($id_insumo_cotizacion)->delete();//linea cotizacion
        }*/
        //HelperUtil::log(['$cantidad'=>$cantidad]);
        $insumo_prestamo->calculo=$insumo_prestamo->calculo+$cantidad;
        //HelperUtil::log(['$insumo_prestamo'=>$insumo_prestamo]);
        $insumo_prestamo->save();
        return $insumo_prestamo;
    }
    /*
    public static function getLineasPrestamosDelete($id_prestamo) {
      $primer_prestamo=HelperPrestamoServicio::getPrestamo($id_prestamo);
      $reporte=HelperPrestamoServicio::getReporte($primer_prestamo->id_foraneo);
      $prestamos=HelperPrestamoServicio::getPrestamo('',['clase'=>'F','id_foraneo'=>$reporte->id]);
      //$prestamos=ClasePrestamo::buscar(['clase'=>'F','id_foraneo'=>$reporte->id])->get();
      $arr_insumos=[];
      foreach ($prestamos as $key => $prestamo) {
        // code...generar arreglo de lineas de  prestamos
        //HelperUtil::log(['$prestamo'=>$prestamo]);
        if($prestamo->estatus=='PRESTADO'){

          $insumos_servicio=InsumoCompraVenta::buscar(['clase'=>'F','id_compra_venta'=>$prestamo->id])
          ->withTrashed()
          ->get();
          foreach ($insumos_servicio as $insumo) {
            $insumo->folio=$prestamo->folio;
            $insumo->estatus=$prestamo->estatus;
            $arr_insumos[]=$insumo;
          }

        }//FIN PRESTAMO ESTATYS PRESTADO
      }//fin qry prestamos
      return $arr_insumos;
    }*/
    public static function getLineasPrestamo($id_prestamo) {
      $arr_insumos=[];
      $insumos_servicio=[];
      $prestamo=HelperPrestamoServicio::getPrestamo($id_prestamo);
      //HelperUtil::log(['$prestamo'=>$prestamo->estatus]);
      if($prestamo->estatus=='PRESTADO'){
        $insumos_servicio=InsumoCompraVenta::buscar(['clase'=>'F','id_compra_venta'=>$prestamo->id])
        ->where('calculo','>=',1)
        ->get();
        //HelperUtil::log(['$insumos_servicio'=>$insumos_servicio]);
      }
      foreach ($insumos_servicio as $insumo) {
        $insumo->folio=$prestamo->folio;
        $insumo->estatus=$prestamo->estatus;
        $arr_insumos[]=$insumo;
      }
      return $arr_insumos;
    }
    public static function getLineasPrestamos($id_prestamo) {//buscar el prestamo, el reporte y regresar los insumos del prestamos realacionados
        $primer_prestamo=HelperPrestamoServicio::getPrestamo($id_prestamo);
        //HelperUtil::log(['$id_prestamo :'.count($id_prestamo)=>$id_prestamo]);

        $reporte=HelperPrestamoServicio::getReporte($primer_prestamo->id_foraneo);
        //HelperUtil::log(['$primer_prestamo :'.count($primer_prestamo)=>$primer_prestamo]);
        $prestamos=HelperPrestamoServicio::getPrestamo('',['clase'=>'F','id_foraneo'=>$reporte->id]);

        //HelperUtil::log(['$prestamos :'.count($prestamos)=>$prestamos]);
        //$prestamos=ClasePrestamo::buscar(['clase'=>'F','id_foraneo'=>$reporte->id])->get();
        $arr_insumos=[];
        foreach ($prestamos as $key => $prestamo) {
          // code...generar arreglo de lineas de  prestamos
          //HelperUtil::log(['$prestamo'=>$prestamo]);
          if($prestamo->estatus=='PRESTADO'){

            $insumos_servicio=InsumoCompraVenta::buscar(['clase'=>'F','id_compra_venta'=>$prestamo->id])
            ->where('calculo','>=',1)
            ->get();
            foreach ($insumos_servicio as $insumo) {
              $insumo->folio=$prestamo->folio;
              $insumo->estatus=$prestamo->estatus;
              $arr_insumos[]=$insumo;
            }

          }//FIN PRESTAMO ESTATYS PRESTADO
        }//fin qry prestamos
        return $arr_insumos;

    }
    private static function diferencia($a,$b){
      return $a-$b;
    }
    private static function suma($a,$b){
      return $a+$b;
    }
    private static function getPrestamo( $id, $arr=[] ){
      return HelperPrestamoServicio::getClase($id,$arr);
    }

    private static function getReporte($id){
      return HelperPrestamoServicio::getClase($id);
    }
    private static function getClase($id,$arr=[] ){
      $clase='';
      if(empty($arr)){
        return ClasePrestamo::withTrashed()->findOrFail($id);
      }else{
        return ClasePrestamo::buscar($arr)->get();
      }
    }
    private static function getEstatusPrestamo($id_prestamo){
      $valido='';
      $valido =HelperPrestamoServicio::validaPrestamo(HelperPrestamoServicio::getPrestamo($id_prestamo));
      return $valido;
    }
    private static function validaPrestamo($prestamo){
      $validacion=false;
      if($prestamo->estatus=='PRESTADO'){
        $validacion=true;
      }
      return $validacion;
    }

}
