<div class="container">
    {!! Form::open(['route'=>'tikcet.store']) !!}
        <div class="panel panel-info">
            <div class='panel-heading'>{{$objeto->id}} 
                <label class='control-label'><i class='material-icons'></i>CREADO: <div class="badge bagde-warning"> {{$objeto->created_at}}</div></label>
                <label class='control-label'><i class='material-icons'></i>AUTOR: <div class="badge bagde-warning"> {{$objeto->autor}}</div></label>
                <label class='control-label'><i class='material-icons'></i>COMPROMISO: <div class="badge bagde-warning">@if($objeto->id){{$objeto->compromiso}}@endif</div></label>
            </div>
            <div class='panel-body'>
                <div class="row">
                    @if($objeto->clase=='ticket')
                        @include('tickets.partials.ticket')
                    @else
                        @include('tickets.partials.hilo')
                    @endif
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
                            @if(empty($objeto->id))
                                {!! Form::submit('GUARDAR',array('class'=>'btn btn-primary')) !!}
                            @elseif(auth()->user()->iniciales==$objeto->autor)
                                {!! Form::submit('ACTUALIZAR',array('class'=>'btn btn-primary')) !!}                {{--DIGITALIZACIONES--}}
                                @can('acceso','digitalizaciones.create')
                                    <a href="/digitalizaciones/{{$objeto->id}}/{{$objeto->clase}}?clase={{$objeto->clase}}&borrar=1" type="button" class="btn btn-success btn-xs" title="MÁS DIGITALIZACIONES" target="_blank"><i class="material-icons">cloud_upload</i></a>
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
                        <div class="form-group has-warn">
                            <label class='control-label'><i class='material-icons'></i></label> 
                            @if($objeto->clase=='ticket' && $objeto->id>0 )
                            <p class="text-warning">
                                {!! link_to_route('tikcet.create','RESPODER',['id_foraneo'=>$objeto->id]) !!}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>