<?php

namespace App\Http\Controllers;
//no indispensable use App\Helpers\RocketLauncher;
//use App\Helpers\Contracts\RocketShipContract;
use App\Helpers\Contracts\AvisosSistemaContract;
// no sirve use App\Providers\RocketShipServiceProvider;
//use app\Helpers\RocketShip;//indistinto
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
    //public function index(RocketShip $rocketship)
    public function index(AvisosSistemaContract $rocketship)//si funciona
//    public function index()
    {
        //
        //App\Helpers\Contracts\RocketShipContract::blastOff();
        $boom = $rocketship->guarda(['departamento'=>'dpto','puesto'=>'COORDINADOR DE SERVICIOS']);
//        $boom = $rocketship->blastOff();
        return view('demo.index', compact('boom'));
        //return view('demo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }
}
