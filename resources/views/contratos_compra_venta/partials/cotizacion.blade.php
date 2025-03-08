<div class="panel panel-info">
    <div class='panel-heading'><i class="material-icons">note_add</i> COTIZACION <span class="badge" ng-show="msg">Cargando ...</span></div>
    <div class='panel-body'>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formC_CCV.numero_cotizacion.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'></i> # COTIZACION</label>
                    {!! Form::text('numero_cotizacion',null,array('ng-model'=>'objeto.numero_cotizacion','class'=>'form-control', 'ng-blur'=>'verCotizacion()','required')) !!}                
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formC_CCV.version.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'></i>VERSION</label>
                    {!! Form::text('version',null,array('ng-model'=>'objeto.version','class'=>'form-control','required')) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formC_CCV.garantia.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'></i>GARANTIA</label>
                    <select name="garantia" ng-model="objeto.garantia" class="form-control" required>
                        <option value="">Elige...</option>
                        <option ng-repeat="tiempo in garantias_contrato" value="<%tiempo.nombre%>"><% tiempo.nombre%> MESES</option>
                    </select>
                    {{-- {!! Form::text('garantia',null,array('ng-model'=>'objeto.garantia','class'=>'form-control','required')) !!} --}}
                </div>
            </div>
            <div class='col-md-2'>     
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formC_CCV.tipo_moneda.$error.required">*</span>
                    <label class="control-label"><i class="material-icons"></i>MONEDA</label>
                    {!! Form::select('tipo_moneda',array(''=>'Elegir','USD'=>'DOLARES (USD)','MXN'=>'PESOS (MXN)','EUR'=>'EUROS (EUR)'),'',array('class'=>'form-control','ng-model'=>'objeto.tipo_moneda','ng-click'=>'moneda(cotizacion.tipo_moneda);goCats = false','required')) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formC_CCV.subtotal.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'></i>SUBTOTAL</label>
                    {!! Form::text('subtotal',null,array('ng-model'=>'objeto.subtotal','class'=>'form-control','required','ng-blur'=>'subtotal(objeto.subtotal)')) !!}            
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formC_CCV.iva.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'></i>IVA</label>
                    {!! Form::text('iva',null,array('ng-model'=>'objeto.iva','class'=>'form-control','placeholder'=>'','required')) !!}
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formC_CCV.total.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'></i>TOTAL</label>
                    {!! Form::text('total',null,array('ng-model'=>'objeto.total','class'=>'form-control','required')) !!}
                </div>
            </div>

        </div>
    </div>
    <!--<div class="panel-footer"> </div> -->
</div>