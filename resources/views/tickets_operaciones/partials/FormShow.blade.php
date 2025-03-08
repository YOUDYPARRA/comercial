<div class="container" ng-controller="ticketOperacionCtrl">
    {!! Form::open(['route'=>'tikcet.store']) !!}
        <div class="panel panel-info">
            <div class='panel-heading'>VER PROYECTO {{$objeto->id}}  {{-- VER EL PROYECTO --}}
                <label class='control-label'><i class='material-icons'></i>CREADO: <div class="badge bagde-warning"> {{$objeto->created_at}}</div></label>
                <label class='control-label'><i class='material-icons'></i>AUTOR: <div class="badge bagde-warning"> {{$objeto->autor}}</div></label>
                <label class='control-label'><i class='material-icons'></i>COMPROMISO: <div class="badge bagde-warning">@if($objeto->id){{$objeto->compromiso}}@endif</div></label>
            </div>
            <div class='panel-body'>
                <fieldset ng-disabled="disabled_encabezado">
                    <div class="row" ng-disabled="disabled_encabezado">
                        <div class="col-md-2">
                            <div class="form-group has-info">
                                <label class='control-label'><i class='material-icons'></i>PROYECTO:</label>{{$objeto->proyecto}}
                                {!! Form::text('proyecto',$objeto->proyecto,array('class'=>'form-control','placeholder'=>'Proyecto')) !!}
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group has-info">
                                <label class='control-label'><i class='material-icons'></i>CLIENTE</label>
                                {!! Form::text('cliente',$objeto->cliente,array('class'=>'form-control','placeholder'=>'Razon Social')) !!}
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group has-info">
                                <label class='control-label'><i class='material-icons'></i>DIRECCION</label>
                                {!! Form::text('direccion',$objeto->entrega,array('class'=>'form-control','placeholder'=>'Dirección')) !!}
                            </div>
                        </div>    
                    </div>
                    <div class="row" ng-disabled="disabled_encabezado">
                        <div class="col-md-4">
                            <div class="form-group has-info">
                                <label class='control-label'><i class='material-icons'></i>ATENCION A</label>
                                {!! Form::text('atencion',$objeto->atencion,array('class'=>'form-control')) !!}
                            </div>
                        </div>    
                        <div class="col-md-4">
                            <div class="form-group has-info">
                                <label class='control-label'><i class='material-icons'></i>CONTACTO <%lleva%></label>
                                <!--{!! Form::text('contacto',null,array('ng-model'=>'objeto.contacto','class'=>'form-control','placeholder'=>'Telefono ETC.')) !!}-->
                                <textarea class="form-control" name="contacto" ng-model="objeto.contacto" placeholder="" required maxlength="250" ng-change="contar(objeto.contacto)"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-info">
                                <label class='control-label'><i class='material-icons'></i>CORREO</label>
                                <textarea class="form-control" name="correo" ng-model="objeto.correo" placeholder="" required maxlength="250" ng-change="contar(objeto.correo)"></textarea>
                            </div>
                        </div>
                        <!--<div class="col-md-6">
                            <div class="form-group has-info">
                                <label class='control-label'><i class='material-icons'></i>MEDIO CONTACTO</label>
                                {!! Form::text('contacto',$objeto->contacto,array('class'=>'form-control','placeholder'=>'Telefono/Mail ETC.')) !!}
                            </div>
                        </div>-->
                    </div>
                </fieldset>
            {{--FIN CAMPOS CLIENTE--}}
                <div class="row">
                        <div class="col-md-1">
                            <div class="form-group has-info">
                                <label class='control-label'><i class='material-icons'></i>PRIORIDAD</label>
                                {!!Form::select('prioridad',[1,2,3], $objeto->prioridad,['class'=>'form-control'])!!}
                                    {!! Form::hidden('clase',null) !!}
                                        {!! Form::hidden('id_foraneo',null) !!}
                                    @if($objeto->id)
                                        {!! Form::hidden('id',null) !!}
                                    @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-info">
                                    <label class='control-label'><i class='material-icons'></i>TITULO/NOMBRE</label>
                                    {!! Form::text('nombre',$objeto->nombre,['class'=>'form-control','placeholder'=>'NOMBRE/TÍTULO']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group has-info">
                                    <label class='control-label'><i class='material-icons'></i>MODULO</label>
                                    {!! Form::text('modulo',$objeto->modulo,['class'=>'form-control','placeholder'=>'MODULO/SISTEMA']) !!}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-info">
                                <label class='control-label'><i class='material-icons'></i>ATENCION</label>
                                    @if(count($departamento=Clasificaciones::listClasificacion(['clase'=>'revision','folio'=>[0,1,2]]))>=1)
                                        {!!Form::select('departamento',$departamento, null,['class'=>'form-control','placeholder'=>'ATENCION'])!!}
                                    @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group has-info">
                                <label class='control-label'><i class='material-icons'></i>ESTATUS</label>
                                    @if(count($clasificaciones=Clasificaciones::listClasificacion(['clase'=>'estado','folio'=>[0,1,2]]))>=1)
                                        {!!Form::select('estatus',$clasificaciones, null,['class'=>'form-control','placeholder'=>'ESTATUS'])!!}
                                    @endif
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group has-info">
                            <label class='control-label'><i class='material-icons'></i>OBSERVACIONES</label>
                            <textarea class="form-control" name="descripcion" placeholder="OBSERVACIONES">{{$objeto->descripcion}}</textarea>      
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group has-info">
                            <label class='control-label'><i class='material-icons'></i>LOG</label>
                            <select name="log" class="form-control" >                  
                                @foreach($objeto->calificaciones->where('nombre_tipo',$objeto->clase) as $c)
                                <option value="">{{$c->iniciales.' '.$c->calificacion.' '.$c->created_at}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">                                                       {{--IMAGENES--}}
                    <div class="col-md-12">
                        @if(count($objeto->digitalizaciones->where('clase',$objeto->clase)))
                            {{count($objeto->digitalizaciones->where('clase',$objeto->clase))}}
                            {{'Archivos adjuntos:'}}
                        @endif
                        @foreach($objeto->digitalizaciones->where('clase',$objeto->clase) as $ob)
                            <a href="{{ route('digitalizaciones.show',$ob->id)}}" type="button" class="btn btn-primary btn-xs" title="OBTENER DIGITALZACION"><i class="material-icons">cloud_download</i></a>
                        @endforeach
                    </div>
                </div>
            </div>  
            <div class="panel-footer"> 
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group has-info">
                            @if($objeto->clase=='PROYECTO')
                                <p class="text-warning">
                                    {!! link_to_route('ticket_operacion.create','RESPONDER',['id_foraneo'=>$objeto->id]) !!}
                                </p>
                            @endif
                            @if(auth()->user()->iniciales==$objeto->autor)
                                <p class="text-warning">
                                    {!! link_to_route('ticket_operacion.create','ACTUALIZAR',['id'=>$objeto->id]) !!}
                                </p>
                                @can('acceso','digitalizaciones.create')
                                    {{--DIGITALIZACIONES--}}
                                    <p class="text-warning">
                                        <a href="/digitalizaciones/{{$objeto->id}}/{{$objeto->clase}}?clase={{$objeto->clase}}&borrar=1" type="button" class="btn btn-success btn-xs" title="MÁS DIGITALIZACIONES" target="_blank"><i class="material-icons">cloud_upload</i></a>
                                    </p>
                                @endcan                                                                             {{--FIN DIGITALIZACIONES--}}
                            @endif    
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group has-success">
                            <label class='control-label'>ENTREGA
                                    {!! Form::text('compromiso',null,['class'=>'form-control','placeholder'=>'dd-mm-aaaa']) !!}</label>
                                @if($objeto->id)
                                @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                <a href="{{ route('ticket_operacion.index')}}" type="button" class="btn btn-success" title="IR AL LISTADO"><i class="material-icons">list</i></a>
                    </div>
                </div>
            </div>
        </div>
</div>