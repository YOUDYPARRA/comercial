<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

	//20160204 ADD EMS
	public function __construct(){
		$this->middleware('auth');
	}
	//FIN
    public function index() 
    {
        return \View::make('home');
    }
}
