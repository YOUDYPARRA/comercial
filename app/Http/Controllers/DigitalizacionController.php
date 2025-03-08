<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Digitalizacion;
use App\Http\Requests\DigitalizacionStoreRequest;
use App\Http\Controllers\Controller;

class  DigitalizacionController extends Controller
{
    protected $ruta=  '/var/www/html/comercial/storage/app';
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id,$subclase){
        $objetos=Digitalizacion::buscar(['id_foraneo'=>$id,
            'clase'=>$request->clase,
            'subclase'=>$subclase,
            'asc'=>'created_at'
            ])->get();
        //dd($request->all());
        return view('digitalizaciones.index',compact('request','objetos','subclase','id'));
    }
    public function create(Request $request,$id)
    {
        //
        //dd($request->all());
        $objeto = new Digitalizacion(['id_foraneo'=>$id,'clase'=>$request->clase,'subclase'=>$request->subclase,'digitalizacion'=>null]);
        //dd($objeto->getAttributes());
        $objeto->borrar=$request->borrar;
        return view('digitalizaciones.create',compact('objeto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DigitalizacionStoreRequest $request)
    //public function store(Request $request)
    {   //
        $objeto=null;
        
        $objetos=null;
        $subclase=null;
        $id=null;
        $arr_url=explode('/',$request->url());

        $objeto= new Digitalizacion;
        $objeto->id_foraneo=$request->id_foraneo;
        $objeto->clase=$request->clase;
        $objeto->subclase=$request->subclase;
        $objeto->save();
        //$file = $request->file;
        //echo base_path('/storage/app');
       $extension = strtolower(\Input::file('file')->getClientOriginalExtension());
       $nombre=$request->subclase.$request->clase.$request->id_foraneo.$objeto->id.'.'.$extension;
       $request->file('file')->move($this->ruta,$nombre);
       if($request->borrar!=1 ){//debe ser 1 para borrar
        $objeto->buscar(['id_foraneo'=>$request->id_foraneo,'clase'=>$request->clase,'subclase'=>$request->subclase])->delete();        
       }
       $objeto->digitalizacion=$nombre;
        $objeto->save();
        $objetos = Digitalizacion::where(['id_foraneo'=>$request->id_foraneo])
            ->where(['clase'=>$request->clase])
            ->where(['subclase'=>$request->subclase])
            ->get();
        $id=$request->id_foraneo;
        $subclase=$request->subclase;
        return view('digitalizaciones.index',compact('request','objetos','subclase','id'));
        //return view('digitalizaciones.create',compact('objeto','id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd('descarga');
        $objeto = Digitalizacion::findOrFail($id);
        $this->ruta=$this->ruta.'/'.$objeto->digitalizacion;
        $headers = array('Content-Type' => 'application/octet-stream');
        return response()->download($this->ruta,$objeto->digitalizacion,$headers);
    }
    public function destroy($id){
        $objeto = Digitalizacion::findOrFail($id);
        //dd($objeto);
        $objeto->delete();
        return back();

    }
}
