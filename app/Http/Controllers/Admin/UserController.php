<?php

namespace App\Http\Controllers\Admin;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UsuarioStoreRequest;
use App\Http\Requests\UsuarioUpdateRequest;
use App\User;
use App\Rol;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct(){
        // $this->middleware('auth');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $rq)
    {
        switch ($rq->vista) {
            case '0':
                //ir a habilitar los usuarios
                $users = User::on('mysql')
                ->onlyTrashed()
                ->paginate('25');
                //dd(" A REHABILITAR ".$rq->id);
                return view('admin.users.habilita',compact('users'));
                break;
            case '1':
                //ir a habilitar los usuarios
                $users = User::on('mysql')->iduser($rq->id_usuario)
                ->puesto($rq->puesto)
                ->nombre($rq->nombre)
                ->orderBy('name')
                ->get();
                //->paginate('25');
                return response()->json(
                [
                    "msg"=>"Success",
                    "users"=>$users->toArray()
                ],200
                );
                break;
            case '2':
                $objetos=User::all();
                return response()->json(
                [
                    "msg"=>"Success",
                    "usuarios"=>$objetos->toArray()
                ],200
                );
                break;
            case '3':
                $objetos = User::buscar($rq->all())->get();
                return response()->json(
                [
                    "msg"=>"Success",
                    "usuarios"=>$objetos->toArray()
                ],200
                );
                break;
            default:
                # code...
                $users = User::buscar($rq->all())
                ->paginate('10');
                return view('admin.users.index',compact('users','rq'));
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
        //return 'hola';
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioStoreRequest $request)
    {
        //dd($request->nume);
        $arr_cc=\App\Helpers\HelperUtil::getCentrosCostos();

        User::create([
            'remember_token' => $request['remember_token'],
            'numero_empleado' => $request['numero_empleado'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'iniciales' => $request['iniciales'],
            'org_name' => $request['org_name'],
            'puesto' => $request['puesto'],
            'area' => $request['area'],
            'departamento' => $request['departamento'],
            'centro_costo' => $arr_cc[$request->departamento],
            'lugar_centro_costo' => $request['lugar_centro_costo'],
            'tipo_usuario' => $request['tipo_usuario'],
            'c_bpartner_id' => $request['c_bpartner_id'],
        ]);
        //dd($request);
       /* $user = new User($request->all());
        $user->save();*/

        return redirect('users');
        //\Redirect::route('users');
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
        $user = User::findOrFail($id);
        return view('admin.users.delete',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        //dd($user);

        return view('admin.users.edit',compact('user'));
    }
    public function editar()
    {
        $user = User::findOrFail(auth()->user()->id);

        //dd($user);

        return view('admin.users.editar',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioUpdateRequest $request, $id)
    {
        //dd($request);
//        $request->centro_costo='bla bla bla';
        $arr_cc=\App\Helpers\HelperUtil::getCentrosCostos();
//        dd($arr_cc);
        $user = User::findOrFail($id);
        foreach ($request->all() as $key => $value) {
            if($key=='password'){

                $arr_user[$key]=bcrypt($value);
            }else{

                $arr_user[$key]=$value;
            }
        }
        $user->fill($arr_user);
        if(isset($request->departamento)){
            $user->centro_costo=$arr_cc[$request->departamento];
        }
        $user->save();
        //\Redirect::route('users.index');
        //verificar q pantalla proviene para redireccionars
        return redirect('users');
    }
    public function actualizar(Request $request, $id)//actualiza la contraseña
    {
        $pass_valida=$this->passValidacion($request);
        if(empty( $pass_valida) ){            //dar alta
            $user = User::findOrFail($id);
            $arr_user['password']=bcrypt($request->passw);
            $user->fill($arr_user);
            $user->save();
        }else{//enviar errores a pagina
            return back()->withErrors($pass_valida);
        }
        return redirect()->guest('auth/logout');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd('OK');
        $objeto=User::withTrashed()->find($id);
        //dd($objeto);
        if ($objeto->trashed())
        {//el elemento fue borrado y habra que habiltarlo
            $objeto->restore();
        }else
        {//BORRADO LOGICO DEL ELEMENTO.

            $objeto->delete();
            $objeto->permisos()->delete();
            Session::flash('message','El registro fue eliminado');
            //return redirect()->route('users');
            //dd("Eliminado ".$id);
        }
        return redirect('users');
    }

    public function borrar($id)
    {
        //dd($id);
        $user = User::findOrFail($id);

        //dd($user);

        return view('admin.users.delete',compact('user'));
    }
    private function passValidacion($request){
        $msg=null;
        if (Hash::check($request->password, auth()->user()->password)){
            if($request->pass != $request->passw ){
                $msg=array('CONTRASEÑAS NO SON IGUALES');
            }
        }else{
            $msg=array('PASSWORD ACTUAL NO VALIDA');
        }

        return $msg;
    }
    public function switch_rol(Request $request){//ID DE EL ROL A CONSULTAR.
      $user = User::findOrFail(auth()->user()->id);
      $arr_roles=$this->creaRol($request->id);
      $user->update($arr_roles);
      return redirect('home');
    }
    private function creaRol($id_rol){
      $arr[]='';
      $rol=Rol::findOrfail($id_rol);
    $arr[$rol->condicion]=$rol->condicionante;
      foreach ($rol->condiciones as $cnd) {
          $arr[$cnd->condicion]=$cnd->condicionante;
      }
      return $arr;
    }

}
