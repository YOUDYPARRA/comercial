<div class="row">
    @if(isset($id) )
    <div class='col-md-6'>  
        <div class="form-group has-info" >
            <label class="control-label"><i class="material-icons"></i></label>
                    {!! Form::text('id',null,array('required'=>'','class'=>'form-control','id'=>'id')) !!}
        </div>
    </div>
    @endif
    <div class='col-md-6'>  
        <div class="form-group has-info" >
            <label class="control-label"><i class="material-icons"></i>Organización</label>
            {!! Form::text('organizacion','SMH',array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class='col-md-6'>  
        <div class="form-group has-info" >
            <label class="control-label"><i class="material-icons"></i>Clase</label>
            {!! Form::text('clase',null,array('class'=>'form-control','required')) !!}
        </div>
    </div>
    <div class='col-md-6'>  
        <div class="form-group has-info" >
            <label class="control-label"><i class="material-icons"></i>Subclase</label>
            {!! Form::text('subclase',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class='col-md-6'>  
        <div class="form-group has-info" >
            <label class="control-label"><i class="material-icons"></i>Nombre</label>
            {!! Form::text('nombre',null,array('class'=>'form-control')) !!}                
        </div>
    </div>
</div>
        @if(auth()->user()->tipo_usuario=='ADMINISTRADOR')
<div class="row">
    <div class='col-md-6'> 
        <div class="form-group has-info" >
            <label class="control-label"><i class="material-icons"></i>Condicionante</label>
            {!! Form::text('condicionante',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class='col-md-6'> 
        <div class="form-group has-info" >
            <label class="control-label"><i class="material-icons"></i>Condición</label>
            {!! Form::text('condicion',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class='col-md-6'> 
        <div class="form-group has-info" >
            <label class="control-label"><i class="material-icons"></i>Folio</label>
            {!! Form::text('folio',null,array('class'=>'form-control')) !!}
        </div>            
    </div>
</div>    
        @endif
