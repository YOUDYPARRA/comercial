<?php

namespace App;

use  \Maatwebsite\Excel\Files\NewExcelFile;
//use Illuminate\Database\Eloquent\Model;

class ExportList extends NewExcelFile
{
    //
    public function getFilename(){
    	return 'Archivo';

    }
}
