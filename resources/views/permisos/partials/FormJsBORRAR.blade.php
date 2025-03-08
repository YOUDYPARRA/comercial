<div class='form-group'>
    <div class="col-sm-3">
    
        <div class="form-group">
            <label>ID</label>
            {!! Form::text('id',null,array('required'=>'','class'=>'form-control','id'=>'id','readonly'=>'readonly','ng-model'=>'id')) !!}
        </div>
        
        <div class="form-group">
            <label>RECURSO</label>
            {!! Form::text('recurso',null,array('required'=>'','class'=>'form-control','ng-model'=>'recurso','required'=>'required')) !!}
        </div>
        <div class="form-group">
            <label>OBSERVACION</label>
            {!! Form::text('observacion',null,array('required'=>'','class'=>'form-control','ng-model'=>'observacion', 'required'=>'required')) !!}
        </div>
        
    </div>
</div>