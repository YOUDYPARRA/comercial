<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RolUsuario;
use App\User;
use App\Helpers\HelperUtil;
use App\Helpers\Contracts\RolContract;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class  RolUsuarioController extends Controller
{
  protected $usuario;
  protected $roles_usuario;
  public function __construct(User $usuarios,RolUsuario $roles_usuario){
    $this->usuario=$usuarios;
    $this->roles_usuario=$roles_usuario;
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $objetos=RolUsuario::buscar($request->all())->paginate(25);
            return view('roles_usuarios.index',  compact('objetos','request'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('roles_usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,RolContract $rol)
    {
        //Verificar rol usuario actual y si este rol ya lo tiene asignado en roles_usuarios no dar de alta
        $this->alta_rol($request,$rol);
        return redirect('roles_usuarios');
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
        $objeto = RolUsuario::find($id);
            //realizar consulta RolUsuario
            return $objeto;
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
        $objeto = RolUsuario::find($id);
            //realizar consulta RolUsuario
            return $objeto;
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
        $objeto = RolUsuario::find($id);
            $objeto->update($request->all);
            return redirect('roles_usuarios');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objeto = RolUsuario::find($id);
		$objeto->delete();
		return redirect('roles_usuarios');
    }
    private function alta_rol($request,$rol){
      $primer_rol='';
      $existe_rol='';
      $existe_rol=$this->verifica_rol($request->id_usuario);
      $user=User::findOrfail($request->id_usuario);
      //dd($primer_rol);

      if(!$existe_rol){
        //dar alta el rol seleccionado mas el rol del usuario en la cuenta de usuario actual
        $this->crea($request->all());//Crear Rol seleccionado que va  a usar
        $user->etiqueta='Default';
        $id_usuario=$user->id;
        $id=$rol->crear($user->toArray());//Crea el Rol actual para este usuario que aun no tiene roles asignados Y dar de alta como Rol usuario Default
        $this->crea(['id_rol'=>$id,'id_usuario'=>$id_usuario]);
      }else{
        //comprobar q no repita alta de rol
        $verifica_rol=$this->verifica_rol($request->id_usuario,$request->id_rol);
        if($verifica_rol){
          $this->crea($request->all());
          //RolUsuario::create($request->all());
        }
      }
    }
    private function crea($array){
      $roles_usuario=new RolUsuario($array);
      $roles_usuario->save();
      //HelperUtil::log($this->roles_usuario);
      return $roles_usuario->id;
    }
    private function verifica_rol($id_usuario,$id_rol=''){
      $alta=false;
      $rol_usuario=null;
      $usuario=$this->usuario->findOrfail($id_usuario);
      /**VERIFICA SI ROL EXISTE PARA USUARIO PASADO POR PARAMETRO
      SI viene $id_rol, validar para no duplicar alta.
      Si viene solo id_usuario ver si ya tiene roles previos, sino, autorizar alta con los de tabla user como rol default
      **/
      if(empty($id_rol)){
        //ver si rol de usuario no existe previo, buscado por usuario
        $rol_usuario=$this->roles_usuario->buscar(['id_usuario'=>$usuario->id])->get();
        if(count($rol_usuario)>=1){
          $alta=true;
        }
      }else{
        //ver si rol no existe previamente, buscado por id_rol
        $rol_usuario=$this->roles_usuario->buscar(['id_usuario'=>$usuario->id,'id_rol'=>$id_rol])->get();
        if(count($rol_usuario)>=1){
          $alta=false;
        }else{
          $alta=true;
        }
      }
        return $alta;
    }

}
