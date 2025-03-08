<?php

namespace App\Services;
class PgManager
{
	private $host;
	private $port;
	private $dbname;
	private $user;
	private $password;
	private $conect;
	public function __construct(){
	$this->host=env('DB_HOST', 'localhost');
    $this->dbname= env('DB_DATABASE', 'forge');
    $this->user= env('DB_USERNAME', 'forge');
	$this->password= env('DB_PASSWORD', '');
	$this->port="5432";
	$this->conect=pg_connect("host=$this->host port=$this->port dbname=$this->dbname user=$this->user password=$this->password");
	}
/**
* @eject: pasa por parametro un procedmiento para invocar
*return un objeto, resultado de la ejecucion del procedmiento;
**/
	public function eject($eject){
		if($this->conect){
				$resul=pg_query($this->conect,$eject);
            //dd($resul);
	            while($cmp=pg_fetch_assoc($resul)){
	                $obj=(object)$cmp;
	                $arr[]=$obj;
	                //print_r($obj->bpartner_name);
	            }
            //dd($arr);
			return $obj;

		}else{
			die(0);
		}
	}

}