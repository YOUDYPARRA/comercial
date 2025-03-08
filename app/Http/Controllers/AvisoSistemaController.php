<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AvisoSistema;
use App\Permiso;
use App\Http\Requests;
use App\Helpers\HelperUtil;
use App\Http\Controllers\Controller;
use App\Helpers\Contracts\AvisosSistemaContract;

class AvisoSistemaController extends Controller
{
  private $objeto='';
  private $arr_objeto='';
  public function __construct(AvisoSistema $aviso_sistema){
      $this->objeto=$aviso_sistema;
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      switch ($request->i) {
        case '1':
          $objetos=$this->objeto->buscar($request->all())->get();
          return response()->json(
            [
                "msg"=>"Success",
                "objetos"=>$objetos->toArray()
            ],200
            );
          break;

        default:
          return view ('avisos_sistema.index');
          break;
      }

    }
    public function create(){//vista para crear configuraciones de avisos permitidos por usuario
      return view('avisos_sistema.create');
    }
    public function store(Request $request,AvisosSistemaContract $notificar){//procedimiento para almacenar las configuracion de los avisos para usuario
      //verficar si usario tiene permiso de acceso en la ruta
      //verficar si usuario tiene ya configurado el aviso actual
      $arr_val=$this->validaPermiso($request);
      if(!empty($arr_val)){
              return response()->json($arr_val,422);
      }
      HelperUtil::log(['$value'=>$request->all()]);
      foreach ($request->all() as $key=> $value) {
          if(!$this->existe($value ) ){
          $objeto=AvisoSistema::create($value);
        //Ejemplo de implementacion; al guardar un nuevo configuracion de aviso, generar aviso a los usuarios configurados
          $notificar->avisa(['recurso'=>'avisos_sistema.store',
            'estado'=>$objeto->estado,
            'acceso'=>'<a href=/home>ir</a>',
            'id_foraneo'=>$objeto->id]);
        }
      }
      return response()->json(
          [
              "msg"=>"Success",
          ],200
          );
    }
    public function show($id){
      $objeto=AvisoSistema::findOrFail($id);
      $recurso=$objeto->recurso;
      $parametro=$objeto->dato;
      $objeto->forceDelete();
      return redirect()->action($recurso, $parametro);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     **/
    public function destroy($id)
    {
        //
        $objeto = $this->objeto->withTrashed()->findOrFail($id);
        if($objeto->trashed())
                {//Si esta eliminado va a restaurar.
                       $objeto->restore();
                }else
                {//Borrado logico
                        $objeto->delete();
                }
               return back();
    }
    private function validaPermiso($request){
      $arr_val='';
      foreach ($request->all() as  $value) {
        $permiso='';
//        dd(is_array($value));
        //dd($value['recurso']);
        $permiso=Permiso::
        idUsuario($value['id_usuario'])
        ->recurso($value['recurso'])
        ->first();
        //dd($permiso);
          if(empty($permiso)){//si se encuetra en la tabla permisos con el usuario
                  $arr_val['msg']="VERIFIQUE AUTORIZACION PREVIAMENTE ".$value['recurso'];
          }
          return $arr_val;
      }
    }
    private function existe($arr){
      $existe=true;
      if($arr['clase']=='CONFIG'){
        $resultado=$this->objeto->buscar(['id_usuario'=>$arr['id_usuario'],'recurso'=>$arr['recurso'] , 'estado'=>$arr['estado'], 'clase'=>'CONFIG'])->first();
        if(empty($resultado)){
          $existe=false;
        }
      }else{
        $existe=false;
      }

      return $existe;
    }
}
