<?php
    namespace App;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    class CotizacionPaqueteInsumo extends Model{
        use SoftDeletes;
        protected $dates = ['deleted_at'];
        protected $table='cotizaciones_paquetes_insumos';
        protected $fillable=[
            'id_cotizacion',
            'id_paquete',
            'id_insumo',
            'bandera_insumo',
            'codigo_proovedor',
            'tipo_equipo',
            'marca',
            'modelo',
            'descripcion',
            'caracteristicas',
            'especificaciones',
            'precio',
            'costos',
            'unidad_medida',
            'tipo_cambio',
            'estado',
            'cantidad',
            'unidad_compra',
            'costo_moneda',
            'cantidad_unidad_compra',
            'descuento',
            'm_product_category_id',
            'id_insumo_prestamo',
            'id_prestamo',
        ];

        public function cotizaciones(){
            return $this->hasMany('App\Cotizacion', 'id','id_cotizacion');
        }

        public function insumos(){
            return $this->hasMany('App\Insumo', 'id','id_paquete');
        }

        public function paquetes(){
            return $this->hasMany('App\Paquete', 'id_pack','id_paquete');
        }

        public function scopeId($query,$id){
            if(trim($id)!=""){
                $arr=explode("*", $id);
                if(count($arr)>=2){
                    $id=  str_replace("*", "%", $id);
                    $query->where('id','like',$id);
                }else{
                    $query->where('id',$id);
                }
            }
        }

        public function scopeIdCotizacion($query,$id_cotizacion){
            if(trim($id_cotizacion)!=""){
                $arr=explode("*", $id_cotizacion);
                if(count($arr)>=2){
                    $id_cotizacion=  str_replace("*", "%", $id_cotizacion);
                    $query->where('id_cotizacion','like',$id_cotizacion);
                }else{
                    $query->where('id_cotizacion',$id_cotizacion);
                }
            }
        }

        public function scopeIdPaquete($query,$id_paquete){
            if(trim($id_paquete)!=""){
                $arr=explode("*", $id_paquete);
                if(count($arr)>=2){
                    $id_paquete=  str_replace("*", "%", $id_paquete);
                    $query->where('id_paquete','like',$id_paquete);
                }else{
                    $query->where('id_paquete',$id_paquete);
                }
            }
        }

        public function scopeIdInsumo($query,$id_insumo){
            if(trim($id_insumo)!=""){
                $arr=explode("*", $id_insumo);
                if(count($arr)>=2){
                    $id_insumo=  str_replace("*", "%", $id_insumo);
                    $query->where('id_insumo','like',$id_insumo);
                }else{
                    $query->where('id_insumo',$id_insumo);
                }
            }
        }
        public function scopeIdInsumoPrestamo ($query,$id_insumo){
            if(trim($id_insumo)!=""){
                $arr=explode("*", $id_insumo);
                if(count($arr)>=2){
                    $id_insumo=  str_replace("*", "%", $id_insumo);
                    $query->where('id_insumo_prestamo','like',$id_insumo);
                }else{
                    $query->where('id_insumo_prestamo',$id_insumo);
                }
            }
        }
        public function scopeIdPrestamo ($query,$id_insumo){
            if(trim($id_insumo)!=""){
                $arr=explode("*", $id_insumo);
                if(count($arr)>=2){
                    $id_insumo=  str_replace("*", "%", $id_insumo);
                    $query->where('id_prestamo','like',$id_insumo);
                }else{
                    $query->where('id_prestamo',$id_insumo);
                }
            }
        }

        public function scopeBanderaInsumo($query,$bandera_insumo){
            if(trim($bandera_insumo)!=""){
                $arr=explode("*", $bandera_insumo);
                if(count($arr)>=2){
                    $bandera_insumo=  str_replace("*", "%", $bandera_insumo);
                    $query->where('bandera_insumo','like',$bandera_insumo);
                }  else {
                    $query->where('bandera_insumo',$bandera_insumo);
                }
            }
        }

        public function scopeCodigoProovedor($query,$codigo_proovedor){
            if(trim($codigo_proovedor)!=""){
                $arr=explode("*", $codigo_proovedor);
                if(count($arr)>=2){
                    $codigo_proovedor=  str_replace("*", "%", $codigo_proovedor);
                    $query->where('codigo_proovedor','like',$codigo_proovedor);
                }  else {
                    $query->where('codigo_proovedor',$codigo_proovedor);
                }
            }
        }

        public function scopeTipoEquipo($query,$tipo_equipo){
            if(trim($tipo_equipo)!=""){
                $arr=explode("*", $tipo_equipo);
                if(count($arr)>=2){
                    $tipo_equipo=  str_replace("*", "%", $tipo_equipo);
                    $query->where('tipo_equipo','like',$tipo_equipo);
                }  else{
                    $query->where('tipo_equipo',$tipo_equipo);
                }
            }
        }

        public function scopeMarca($query,$marca){
            if(trim($marca)!=""){
                $arr=explode("*", $marca);
                if(count($arr)>=2){
                    $marca=  str_replace("*", "%", $marca);
                    $query->where('marca','like',$marca);
                }  else {
                    $query->where('marca',$marca);
                }
            }
        }

        public function scopeModelo($query,$modelo){
            if(trim($modelo)!=""){
                $arr=explode("*", $modelo);
                if(count($arr)>=2){
                    $modelo=  str_replace("*", "%", $modelo);
                    $query->where('modelo','like',$modelo);
                }  else {
                    $query->where('modelo',$modelo);
                }
            }
        }

        public function scopeDescripcion($query,$descripcion){
            if(trim($descripcion)!=""){
                $arr=explode("*", $descripcion);
                if(count($arr)>=2){
                    $descripcion=  str_replace("*", "%", $descripcion);
                    $query->where('descripcion','like',$descripcion);
                }  else {
                    $query->where('descripcion',$descripcion);
                }
            }
        }

        public function scopeCaracteristicas($query,$caracteristicas){
            if(trim($caracteristicas)!=""){
                $arr=explode("*", $caracteristicas);
                if(count($arr)>=2){
                    $caracteristicas=  str_replace("*", "%", $caracteristicas);
                    $query->where('caracteristicas','like',$caracteristicas);
                }  else {
                    $query->where('caracteristicas',$caracteristicas);
                }
            }
        }

        public function scopeEspecificaciones($query,$especificaciones){
            if(trim($especificaciones)!="")    {
                $arr=explode("*", $especificaciones);
                if(count($arr)>=2){
                    $especificaciones=  str_replace("*", "%", $especificaciones);
                    $query->where('especificaciones','like',$especificaciones);
                }  else {
                    $query->where('especificaciones',$especificaciones);
                }
            }
        }

        public function scopePrecio($query,$precio){
            if(trim($precio)!="")    {
                $arr=explode("*", $precio);
                if(count($arr)>=2){
                    $precio=  str_replace("*", "%", $precio);
                    $query->where('precio','like',$precio);
                }  else {
                    $query->where('precio',$precio);
                }
            }
        }

        public function scopeCostos($query,$costos){
            if(trim($costos)!="")    {
                $arr=explode("*", $costos);
                if(count($arr)>=2){
                    $costos=  str_replace("*", "%", $costos);
                    $query->where('costos','like',$costos);
                }  else {
                    $query->where('costos',$costos);
                }
            }
        }

        public function scopeUnidadMedida($query,$unidad_medida){
            if(trim($unidad_medida)!=""){
                $arr=explode("*", $unidad_medida);
                if(count($arr)>=2){
                    $unidad_medida=  str_replace("*", "%", $unidad_medida);
                    $query->where('unidad_medida','like',$unidad_medida);
                }  else {
                    $query->where('unidad_medida',$unidad_medida);
                }
            }
        }

        public function scopeTipoCambio($query,$tipo_cambio){
            if(trim($tipo_cambio)!="")        {
                $arr=explode("*", $tipo_cambio);
                if(count($arr)>=2)            {
                    $tipo_cambio=  str_replace("*", "%", $tipo_cambio);
                    $query->where('tipo_cambio','like',$tipo_cambio);
                }  else             {
                    $query->where('tipo_cambio',$tipo_cambio);
                }
            }
        }

        public function scopeEstado($query,$estado){
            if(trim($estado)!="")        {
                $arr=explode("*", $estado);
                if(count($arr)>=2)            {
                    $estado=  str_replace("*", "%", $estado);
                    $query->where('estado','like',$estado);
                }  else             {
                    $query->where('estado',$estado);
                }
            }
        }
    }
