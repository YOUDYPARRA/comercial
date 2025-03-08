<div class="container">
    <div class="col-lg-2"></div>
   <div class="col-lg-5">
       <div class="panel panel-heading">
           <h4>SUBIR ARCHIVO.</h4>           
       </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                            {!! Form::file('file')!!}
                    </div>
                    <div class="form-group">
                        {!! Form::hidden('id',$objeto->id,array('required'=>'','class'=>'form-control','id'=>'id')) !!}
                        {!! Form::hidden('id_foraneo',$objeto->id_foraneo,array('required'=>'')) !!}
                        {!! Form::hidden('clase',$objeto->clase,array('required'=>'')) !!}
                        {!! Form::hidden('subclase',$objeto->subclase,array('required'=>'')) !!}
                        {!! Form::hidden('borrar',$objeto->borrar) !!}
                    </div>
                </div>
            </div>
            <div class="panel panel-footer">
                {!! Form::submit('AGREGAR',array('class'=>'btn btn-primary')) !!}
            </div>
       
    </div> 
    
</div>
<div class="container">
    <div class="col-lg-2"></div>
   <div class="col-lg-5">
   {{$objeto->id}}
   {{$objeto->digitalizacion}}
       @if($objeto->archivo_digital)
           <label class="has-info">ARCHIVO GUARDADO CORRECTAMENTE.</label>
           <a href="{{ route('servicios.digital',$objeto->id)}}" type="button" class="btn btn-success" title="ARCHIVO GUARDADO"><i class="material-icons">cloud_download</i></a>
       @elseif($objeto->digitalizacion)
       <label class="has-info">ARCHIVO GUARDADO CORRECTAMENTE.</label>
           <a href="{{ route('servicios.digital',$objeto->id)}}" type="button" class="btn btn-success" title="ARCHIVO GUARDADO"><i class="material-icons">cloud_download</i></a>
       @endif
   </div>
</div>