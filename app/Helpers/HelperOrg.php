<?php
namespace app\Helpers;
use App\OrganizacionV;
class HelperOrg
{
    /**
     * Regresa un Array
     * 
     * **/
    public static function getOrganizaciones()
    {   //return auth()->user()->id;
        if(!auth()->guest())
        {
        return OrganizacionV::lists('name','name');
         /*   return [''=>'.',
                        'IMS'=>'IMS',
                        'SMH'=>'SMH',
                        'SMD'=>'SMD',
                        'GIANMADA'=>'GIANMADA'
                        ];
         
         */
        }else
        {
            return [];
        }
        
    }//fin funcion
}