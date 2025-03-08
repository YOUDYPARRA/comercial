<div class="panel panel-info" ng-if='ver_legal'>
    <div class='panel-heading'><i class="material-icons">note_add</i> DATOS LEGALES <span class="badge" ng-show="msg">Cargando ...</span></div>
    <div class='panel-body'>
        <div class="row">
          <div class="col-md-3">
            <div class="form-group has-info">
                <span class="badge badge-warning" ng-show="formC_CCV.referencia.$error.required">*</span>
                <label class='control-label'><i class='material-icons'></i>REFENCIA BANCARIA 870 MXN</label>
                {!! Form::text('referencia',null,array('ng-model'=>'objeto.referencia','class'=>'form-control','required')) !!}
            </div>              
          </div>
          <div class="col-md-3">
            <div class="form-group has-info">
                <span class="badge badge-warning" ng-show="formC_CCV.referenciados.$error.required">*</span>
                <label class='control-label'><i class='material-icons'></i>REFENCIA BANCARIA 7234 USD</label>
                {!! Form::text('referenciados',null,array('ng-model'=>'objeto.referenciados','class'=>'form-control','required')) !!}
            </div>              
          </div>
            <div class="col-md-6">
                <div class="form-group has-info">
                    <!--<span class="badge badge-warning" ng-show="formC_CCV.aval.$error.required">*</span>-->
                    <label class='control-label'><i class='material-icons'></i> AVAL</label>
                    {!! Form::text('aval',null,array('ng-model'=>'objeto.aval','class'=>'form-control','placeholder'=>'aval')) !!}                
                </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formC_CCV.identificacion.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'></i>IDENTIFICACION</label>
                    {!! Form::text('identificacion',null,array('ng-model'=>'objeto.identificacion','class'=>'form-control','required')) !!}
                </div>              
            </div>
            <div class="col-md-3">
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formC_CCV.identificacionno.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'></i>NO.</label>
                    {!! Form::text('identificacionno',null,array('ng-model'=>'objeto.identificacionno','class'=>'form-control','required')) !!}
                </div>              
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formC_CCV.numero_escritura_publica.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'></i>NO. ESCRITURA PUBLICA</label>
                    {!! Form::text('numero_escritura_publica',null,array('ng-model'=>'objeto.numero_escritura_publica','class'=>'form-control','required')) !!}
                </div>              
            </div>
            <div class="col-md-3">
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formC_CCV.notario.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'></i>NOTARIO</label>
                    {!! Form::text('notario',null,array('ng-model'=>'objeto.notario','class'=>'form-control','required')) !!}
                </div>              
            </div>
            <div class="col-md-3">
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formC_CCV.ciudadnotario.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'></i>CIUDAD</label>
                    {!! Form::text('ciudadnotario',null,array('ng-model'=>'objeto.ciudadnotario','class'=>'form-control','required')) !!}
                </div>              
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formC_CCV.numero_poder.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'></i>NO. PODER</label>
                    {!! Form::text('numero_poder',null,array('ng-model'=>'objeto.numero_poder','class'=>'form-control','required')) !!}
                </div>              
            </div>
            <div class="col-md-3">
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formC_CCV.notario1.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'></i>NOTARIO</label>
                    {!! Form::text('notario1',null,array('ng-model'=>'objeto.notario1','class'=>'form-control','required')) !!}
                </div>              
            </div>
            <div class="col-md-3">
                <div class="form-group has-info">
                    <span class="badge badge-warning" ng-show="formC_CCV.ciudadnotario1.$error.required">*</span>
                    <label class='control-label'><i class='material-icons'></i>CIUDAD</label>
                    {!! Form::text('ciudadnotario1',null,array('ng-model'=>'objeto.ciudadnotario1','class'=>'form-control','required')) !!}
                </div>              
            </div>
            <!--<div class="col-md-3">
                <div class="form-group has-info">
                    <label class='control-label'><i class='material-icons'></i>ACLARACIONES AL COMPRADOR</label>
                    {!! Form::text('aclaracion_dato_comprador',null,array('ng-model'=>'objeto.aclaracion_dato_comprador','class'=>'form-control')) !!}
                </div>              
            </div>-->
        </div>
    </div>
    <!--<div class="panel-footer"> </div>-->
</div>