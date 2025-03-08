<div class="container" ng-controller="ticketOperacionCtrl">
        <div class="panel panel-info">
            <div class='panel-heading'>
                <label class='control-label'><i class='material-icons'></i>CREADO: <div class="badge bagde-warning"><%objeto.created_at%></div></label>
                <label class='control-label'><i class='material-icons'></i>AUTOR: <div class="badge bagde-warning"><%objeto.autor%></div></label>
                <label class='control-label'><i class='material-icons'></i>COMPROMISO: <div class="badge bagde-warning"><%objeto.compromiso%></div></label>
            </div>
            <div class='panel-body' ng-init="inicio('{{json_encode($request->all())}}');">
                    @include('tickets_operaciones.partials.Cliente')

                    <!--<fieldset ng-disabled="disabled_encabezado">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group has-info">
                                <label class='control-label'><i class='material-icons'></i>PROYECTO:</label>
                                {!! Form::text('proyecto',null,array('class'=>'form-control','placeholder'=>'Proyecto','ng-model'=>'objeto.proyecto')) !!}
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group has-info">
                                <label class='control-label'><i class='material-icons'></i>CLIENTE</label>
                                {!! Form::text('cliente',null,array('class'=>'form-control','placeholder'=>'Razon Social','ng-model'=>'objeto.cliente')) !!}
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group has-info">
                                <label class='control-label'><i class='material-icons'></i>DIRECCION</label>
                                {!! Form::text('direccion',null,array('class'=>'form-control','placeholder'=>'Dirección','ng-model'=>'objeto.entrega')) !!}
                            </div>
                        </div>    
                    </div>
                    </fieldset>
                    <fieldset ng-disabled="disabled_atencion">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-info">
                                    <label class='control-label'><i class='material-icons'></i>ATENCION A</label>
                                    {!! Form::text('atencion',null,array('class'=>'form-control','ng-model'=>'objeto.atencion')) !!}
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group has-info">
                                    <label class='control-label'><i class='material-icons'></i>MEDIO CONTACTO</label>
                                    {!! Form::text('contacto',null,array('class'=>'form-control','placeholder'=>'Telefono/Mail ETC.','ng-model'=>'objeto.contacto')) !!}
                                </div>
                            </div>
                        </div>
                    </fieldset>-->
                <div class="row">
                    @include('tickets_operaciones.partials.Principio')
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group has-info">
                            <label class='control-label'><i class='material-icons'></i>OBSERVACIONES</label>
                            <textarea class="form-control" name="descripcion" placeholder="OBSERVACIONES" ng-model="objeto.descripcion"></textarea>      
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group has-info">
                            <label class='control-label'><i class='material-icons'></i>LOG</label>
                            <select name="log" class="form-control" >
                                <option value="">
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="panel-footer"> 
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group has-info">
                            <button type="button" ng-click='guardar()' ng-disabled="save" class="btn btn-raised btn-info btn-lg" title="GUARDAR" ><i class="material-icons">save</i></button>
                            <span><%msg%></span>
                                {{--DIGITALIZACIONES--}}
                                @if($request->id>0)
                                    <a href="/digitalizaciones/{{$request->id}}/{{$request->clase}}?clase='PROYECTOS'&borrar=1" type="button" class="btn btn-success btn-xs" title="MÁS DIGITALIZACIONES" target="_blank"><i class="material-icons">cloud_upload</i></a>
                                @endif
                                {{--FIN DIGITALIZACIONES--}}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group has-success">
                            <label class='control-label'>ENTREGA</label>
                                    {!! Form::text('compromiso',null,['ng-model'=>'objeto.compromiso','class'=>'form-control','placeholder'=>'dd-mm-aaaa']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group has-warn">
                            <label class='control-label'>HORA ENTREGA</label> 
                            {!! Form::text('hora_entrega',null,['ng-model'=>'objeto.hora_entrega','class'=>'form-control','placeholder'=>'hh:mm']) !!}
                        </div>
                    </div>
                    <a href="{{ route('ticket_operacion.index')}}" type="button" class="btn btn-success" title="IR AL LISTADO"><i class="material-icons">list</i></a>
                </div>
            </div>
        </div>
</div>