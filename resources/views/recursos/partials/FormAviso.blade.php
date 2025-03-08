<div class='form-group'>
    <div class="col-sm-3">
        
            <div class="form-group">
            @if(isset($id) )
                <label>ID</label>
                {!! Form::text('id',null,array('required'=>'','class'=>'form-control','id'=>'id','readonly'=>'readonly','ng-model'=>'recurso.id','ng-init'=>'recurso.id='.$id)) !!}
            @endif
            </div>
            
            <div class="form-group">
                <label>AVISO</label>
                {!! Form::hidden('i',null,array('ng-init'=>'recurso.i=0','class'=>'form-control','ng-model'=>'recurso.i')) !!}
                {!! Form::text('aviso',null,array('class'=>'form-control','ng-model'=>'recurso.aviso')) !!}
            </div>
       
    </div>
    <%menu%>
</div>