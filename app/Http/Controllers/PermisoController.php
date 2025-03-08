<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permiso;
use App\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PermisoController extends Controller
{

protected $usuario;
    public function __construct(User $consulta_usuario){
        $this->usuario=$consulta_usuario;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function __construct()
//    {
//         $this->middleware('auth');
//    }

    public function index(Request $request)
    {
        //
        switch ($request->vista) {
            case '0'://MUESTRA SOLO TODOS LOS ELIMINADOS
                # code...
            $objetos=Permiso::onlyTrashed()
                ->recurso($request->recurso)
                ->nombre($request->nombre)
                ->paginate(15);                    
                $subject=$objetos->render();
                $objetos->paginado=str_replace("?", "?vista=0&", $subject);
            return view('permisos.restaura',  compact('objetos','request'));
                break;
            case '1'://MUESTRA TODOS REGRESA JSON
                # code...
            $objetos=Permiso::
                    idmenu($request->id_menu)
                    ->idusuario($request->id_usuario)
                    ->get();
                return response()->json(
                [
                    "msg"=>"Success",
                    "permisos"=>$objetos->toArray()
                ],200
                );
                break;
            case '2'://MUESTRA TODOS REGRESA JSON
                # code...
            $objetos=Permiso::
                    recurso($request->recurso)
                    ->idusuario($request->id_usuario)
                    ->get();
                return response()->json(
                [
                    "msg"=>"Success",
                    "permisos"=>$objetos->toArray()
                ],200
                );
                break;
            case '3'://MUESTRA TODOS REGRESA JSON
                # code...
            $objetos=Permiso::
                    recurso($request->recurso)
                   // ->idusuario($request->id_usuario)
                    ->get();
                return response()->json(
                [
                    "msg"=>"Success",
                    "permisos"=>$objetos->toArray()
                ],200
                );
                break;
            
            default:
                # code...
            $objetos= Permiso::
                recurso($request->recurso)
                ->nombre($request->nombre)
                ->idusuario($request->id_usuario)
                ->paginate(25);
                //echo Auth::user()->name;
                 /*if (Gate::denies('update-post', $post)) {
                    abort(403);
                }*/
                return view('permisos.index',compact('objetos','request'));    
                break;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('permisos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $arr_rq=$request->all();
        if($this->userValido($arr_rq[0]['id_usuario']) ){

        foreach ($request->all() as $key => $value) {
            $recurso=$value['recurso'];
            $nombre=$value['nombre'];
            $permiso=Permiso::recurso($recurso)
                ->nombre($nombre)
                ->delete();
        }
        \DB::table('permisos')->insert(request()->all());
        //Permiso::create($request->all());
        //dd(request()->all());
        return response()->json(
                [
                    "msg"=>"Successz"
                ],200);
        }else{
            return response()->json(array('msg'=>'EL USUARIO AUN NO TIENE CLAVE DE ACCESO'),422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $objetos=Permiso::find($id);
                return response()->json(
                [
                    "msg"=>"Success",
                    "permiso"=>$objetos->toArray()
                ],200
                );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('permisos.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $objeto = Permiso::find($id);
        //dd($objeto);
            $objeto->update($request->all());
            return response()->json(
                [
                    "msg"=>"Success"
                ],200
                );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $objeto = Permiso::find($id);
        $objeto->delete();
        /*$objeto = Permiso::withTrashed()                
                ->find($id);
                //dd($objeto)
                if($objeto->trashed())
                {//Si esta eliminado va a restaurar.
                       $objeto->restore();
                }else
                {//Borrado FISICO...
                        # code...
                        $objeto->forceDelete();
                }*/
                return response()->json(
                [
                    "msg"=>"Success"
                ],200
                );
    }
    private function userValido($id){
        $valido=false;
        $usuario=$this->usuario->find($id);
        if(!empty($usuario->password)){
            $valido=true;
        }
        return $valido;
    }
}
