<?php

namespace App;
use App\Services\PgManager;
use Illuminate\Database\Eloquent\Model;

class ZasapiUser1 extends Model
{
    //API ALTA DE CONTRATOS, 
    //VER UPDATE 
    //VER SI REGRESA EL ID DE ALTA DE CONTRATO
    //VER ALTA DOBLE
    protected $table = 'zasapi_user1';
    protected $pgqry;
     public function __construct(){
         $this->pgqry= new PgManager;
     }
     protected $fillable=[
	     'Ad_Org_Id', //id de la organizacion
	     'Value',//numero de contrato interno
	     'Name',//nombre del tercero
	     'Description', //numero de contrato externo
	     'Isactive', 
     ];

     public function guardar(){
    	return $this->pgqry->eject("select $this->table (
			'$this->AD_Org_Id',
			'$this->Value',
			'$this->Name',
			'$this->Description',
			'$this->Isactive'
			)");
    }
}
