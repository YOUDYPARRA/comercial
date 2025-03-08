<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;
use App\Http\Requests;
use App\Helpers\Contracts\RolContract;
use App\Http\Requests\RolStoreRequest;
use App\Http\Controllers\Controller;

class  RolController extends Controller
{
  private $rol=null;
  public function __construct(Rol $rol){
    $this->rol=$rol;
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if(!empty($request->id) ){
        //Rol::findOrfail($request->id);
          $objetos=Rol::buscar(['id_foraneo'=>$request->id,'id'])->OrderBy('id')->OrderBy('updated_at')->paginate(25);
      }else{
        $objetos=Rol::buscar($request->all())->OrderBy('id')->OrderBy('updated_at')->paginate(25);
      }
        return view('roles.index',  compact('objetos','request'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolStoreRequest $request,RolContract $rol)
    {
        //$this->creaRol($request);
        $rol->crear($request->all());
        return redirect('roles_usuario');
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
        $objeto = Rol::find($id);
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
        $objeto = Rol::find($id);
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
        $objeto = Rol::find($id);
            $objeto->update($request->all);
            return redirect('roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //AL BORRAR UN ROL, VERIFICAR Y ELIMINAR USUARIOS RELACIONADOS. en objeto RolUsuario
    $objeto = Rol::find($id);
		$objeto->delete();
		return redirect('roles');
    }
    /*private function creaConfig($objeto){
      //dd($objeto->all());
      $this->rol->fill(
        ['clase'=>'CONFIG',//CONFIG; CND
        'id_foraneo'=>'',//SE RELACIONA CON LA SIGUIENTE CONDICION
        'condicion'=>'org_name',//CAMPO DEUSER Q SE CONDICIONA, PUESTO,AREA, ETC
        'condicionante'=>$objeto->org_name,//COORDINADOR, GERENTE, ETC
        'etiqueta'=>$objeto->etiqueta
      ]
      );
      return $this->rol->save();
    }*/


    /*private function alta(Array $objeto){
      return Rol::create(['clase'=>$objeto['clase'],//CONFIG; CND
      'id_foraneo'=>$objeto['id_foraneo'],//SE RELACIONA CON LA SIGUIENTE CONDICION
      'condicion'=>$objeto['condicion'],//CAMPO DEUSER Q SE CONDICIONA, PUESTO,AREA, ETC
      'condicionante'=>$objeto['condicionante'],//COORDINADOR, GERENTE, ETC
      'etiqueta'=>$objeto['etiqueta'] ]);
    }*/
}
