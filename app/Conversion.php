<?php

                namespace App;

                use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
                {
                    //
protected $table='zascust_proy_conversion_rate_v';
protected $fillable=[
	'c_conversion_rate_id',
    'currency_id_from',
    'currency_from_name',
    'c_currency_id_to',
    'currency_to_name',
    'validfrom',
    'validto',
    'multiplyrate',
    'dividerate'
	];

   public function scopeRecientes($query,$request)
   {
    $objetos=Conversion::on('pgsql')
        //->select MAX(validto)
        ->CConversionRateId($request->get('c_conversion_rate_id'))
        ->currencyIdFrom($request->get('currency_id_from'))
        ->CurrencyFromName($request->get('currency_from_name'))
        ->currencyIdTo($request->get('c_currency_id_to'))
        ->CurrencyToName($request->get('currency_to_name'))
        ->Validfrom($request->get('validfrom'))
        ->validto($request->get('validto'))
        ->Multiplyrate($request->get('multiplyrate'))
        ->Dividerate($request->get('dividerate'))
        //->groupBy('validto')
        //->max('validto');
        ->orderBy('validto','desc')
        ->limit(6)
        ->get();
        return $objetos;
   }
   public function scopeHistorico($query,$request)
   {
    //dd($request->get('validto'));
    $objetos=Conversion::on('pgsql')
        //->select MAX(validto)
        ->CConversionRateId($request->get('c_conversion_rate_id'))
        ->currencyIdFrom($request->get('currency_id_from'))
        ->CurrencyFromName($request->get('currency_from_name'))
        ->currencyIdTo($request->get('c_currency_id_to'))
        ->CurrencyToName($request->get('currency_to_name'))
        ->Validfrom($request->get('validfrom'))
        ->validto($request->get('validto'))
        //->validto($request->validto)
        ->Multiplyrate($request->get('multiplyrate'))
        ->Dividerate($request->get('dividerate'))
        //->groupBy('validto')
        //->max('validto');
        /*->orderBy('validto','desc')
        ->limit(10)*/
        ->get();
        return $objetos;
   }
   public function scopeCConversionRateId($query,$c_conversion_rate_id)
    {
        if(trim($c_conversion_rate_id)!="")
        {
            $arr=explode("*", $c_conversion_rate_id);
            if(count($arr)>=2)
            {
                $c_conversion_rate_id=  str_replace("*", "%", $c_conversion_rate_id);
                $query->where('c_conversion_rate_id','like',$c_conversion_rate_id);
            }  else 
            {
                $query->where('c_conversion_rate_id',$c_conversion_rate_id);
            }
        }
    }	   

    public function scopeCurrencyIdFrom($query,$currency_id_from){
        if(trim($currency_id_from)!=""){
            $arr=explode("*", $currency_id_from);
            if(count($arr)>=2){
                $currency_id_from=  str_replace("*", "%", $currency_id_from);
                $query->where('currency_id_from','like',$currency_id_from);
            }  else{
                $query->where('currency_id_from',$currency_id_from);
            }
        }
    }

    	   public function scopeCurrencyFromName($query,$currency_from_name)
    {
        if(trim($currency_from_name)!="")
        {
            $arr=explode("*", $currency_from_name);
            if(count($arr)>=2)
            {
                $currency_from_name=  str_replace("*", "%", $currency_from_name);
                $query->where('currency_from_name','like',$currency_from_name);
            }  else 
            {
                $query->where('currency_from_name',$currency_from_name);
            }
        }
    }	  

     public function scopeCurrencyIdTo($query,$c_currency_id_to){
        if(trim($c_currency_id_to)!=""){
            $arr=explode("*", $c_currency_id_to);
            if(count($arr)>=2){
                $c_currency_id_to=  str_replace("*", "%", $c_currency_id_to);
                $query->where('c_currency_id_to','like',$c_currency_id_to);
            }  
            else{
                $query->where('c_currency_id_to',$c_currency_id_to);
            }
        }
    }	   

    public function scopeCurrencyToName($query,$currency_to_name)
    {
        if(trim($currency_to_name)!="")
        {
            $arr=explode("*", $currency_to_name);
            if(count($arr)>=2)
            {
                $currency_to_name=  str_replace("*", "%", $currency_to_name);
                $query->where('currency_to_name','like',$currency_to_name);
            }  else 
            {
                $query->where('currency_to_name',$currency_to_name);
            }
        }
    }	   public function scopeValidfrom($query,$validfrom)
    {
        if(trim($validfrom)!="")
        {
            $arr=explode("*", $validfrom);
            if(count($arr)>=2)
            {
                $validfrom=  str_replace("*", "%", $validfrom);
                $query->where('validfrom','like',$validfrom);
            }  else 
            {
                $query->where('validfrom',$validfrom);
            }
        }
    }	   

    public function scopeValidto($query,$validto){
        if(trim($validto)!=""){
            $arr=explode("*", $validto);
            if(count($arr)>=2){
                $validto=  str_replace("*", "%", $validto);
                $query->where('validto','like',$validto);
            } 
            else{
                $query->where('validto',$validto);
            }
        }
    }	   

    public function scopeMultiplyrate($query,$multiplyrate)
    {
        if(trim($multiplyrate)!="")
        {
            $arr=explode("*", $multiplyrate);
            if(count($arr)>=2)
            {
                $multiplyrate=  str_replace("*", "%", $multiplyrate);
                $query->where('multiplyrate','like',$multiplyrate);
            }  else 
            {
                $query->where('multiplyrate',$multiplyrate);
            }
        }
    }	   public function scopeDividerate($query,$dividerate)
    {
        if(trim($dividerate)!="")
        {
            $arr=explode("*", $dividerate);
            if(count($arr)>=2)
            {
                $dividerate=  str_replace("*", "%", $dividerate);
                $query->where('dividerate','like',$dividerate);
            }  else 
            {
                $query->where('dividerate',$dividerate);
            }
        }
    }	
}
