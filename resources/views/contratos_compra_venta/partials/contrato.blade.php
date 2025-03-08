<div class="panel panel-info">
    <div class='panel-heading'><i class="material-icons">note_add</i> CONTRATO COMPRA VENTA<span class="badge" ng-show="msg">Cargando ...</span></div>
    <div class='panel-body'>

        <div class="row">
          <div class="col-md-3">
            <div class="form-group has-info">            
                <span class="badge badge-warning" ng-show="formC_CCV.fecha.$error.required">*</span>
                <label class='control-label'><i class='material-icons'></i> FECHA FIRMA</label>
                {!! Form::text('fecha',null,array('ng-model'=>'objeto.fecha','class'=>'form-control','placeholder'=>'dd-mm-aaaa','required','ng-pattern'=>'/(0?[1-9]|[12][0-9]|3[01])\-^(0?[1-9]|1[012])\-(199\d)|([2-9]\d{3})$/','ng-blur'=>'validaFecha(objeto.fecha)')) !!}
                <span ng-show="formC_CCV.fecha.$error.pattern">Formato incorrecto, Formato DD-MM-YYYY</span>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group has-info">
                <span class="badge badge-warning" ng-show="formC_CCV.no_contrato.$error.required">*</span>
                <label class='control-label'><i class='material-icons'></i> # CONTRATO</label>
                {!! Form::text('no_contrato',null,array('ng-model'=>'objeto.no_contrato','class'=>'form-control','ng-blur'=>"verCCV()",'required')) !!}                
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i> # PEDIDO DE CLIENTE</label>
                {!! Form::text('no_pedido',null,array('ng-model'=>'objeto.no_pedido','class'=>'form-control')) !!}
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i> ENGANCHE: <span class="badge"><%anticipo_porcentaje%></span> %</label>
                {!! Form::text('anticipo',null,array('ng-model'=>'objeto.anticipo','class'=>'form-control','placeholder'=>'$','ng-change'=>'anticipo(objeto.anticipo)')) !!}                
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i>CONTRA ENTREGA: <span class="badge"><%contraentrega_porcentaje%></span> %</label>
                {!! Form::text('contra',null,array('ng-model'=>'objeto.contraentrega','class'=>'form-control','placeholder'=>'$','ng-change'=>'contraentrega(objeto.contraentrega)','ng-blur'=>'contraentregaTotal()')) !!}
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i>FINANCIAMIENTO: <span class="badge"><%financiamiento_porcentaje%></span> %</label>
                {!! Form::text('financiamiento',null,array('ng-model'=>'objeto.financiamiento','class'=>'form-control','placeholder'=>'$','ng-change'=>'financiamientos(objeto.financiamiento)','ng-blur'=>'finaciamientoTotal()')) !!}
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i>NO. PAGOS</label>
                {!! Form::text('mensualidades',null,array('ng-model'=>'objeto.mensualidades','class'=>'form-control','placeholder'=>'Ej. 1')) !!}
            </div>
          </div>
        
          <div class="col-md-3">
            <div class="form-group has-info">
                <label class='control-label'><i class='material-icons'></i>TOTAL DE PAGARE: <span class="badge"><%pagare_porcentaje%></span> %</label>
                {!! Form::text('pagare',null,array('ng-model'=>'objeto.pagare','class'=>'form-control')) !!}
            </div>
          </div>
        </div>  <!-- ROW -->
          <div class="col-md-12">
            <div class="form-group has-info">            
                <span class="badge badge-warning" ng-show="formC_CCV.entrega.$error.required">*</span>
                <label class='control-label'><i class='material-icons'></i> CONDICION ENTREGA</label>
                {!! Form::text('entrega',null,array('ng-model'=>'objeto.entrega','class'=>'form-control','placeholder'=>'condicion entrega','required','ng-change'=>'validaPago()')) !!}
            </div>
          </div>
          
        
      </div>    <!-- FIN BODY -->
    <!--<div class="panel-footer"> </div>-->
</div>