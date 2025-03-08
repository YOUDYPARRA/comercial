<div class='form-group'>
    <div class="col-sm-3">
        
            <div class="form-group">
            @if(isset($id) )
                <label>ID</label>
                {!! Form::text('id',null,array('required'=>'','class'=>'form-control','id'=>'id','readonly'=>'readonly','ng-model'=>'recurso.id','ng-init'=>'recurso.id='.$id)) !!}
            @endif
            </div>
            <div class="form-group">
                <label>RECURSO</label>
                {!! Form::text('recurso',null,array('class'=>'form-control','ng-model'=>'recurso.recurso','required')) !!}
                 
            </div>
            <div class="form-group">
                <label>ETIQUETA</label>
                {!! Form::text('etiqueta',null,array('class'=>'form-control','ng-model'=>'recurso.etiqueta')) !!}
            </div>
            <div class="form-group">
                <label>MENU</label>
                {!! Form::select('id_menu',['0'=>'Seleccione Opcion']+\DB::table('menus')->whereNull('deleted_at')->lists('menu', 'id'),null,['required'=>'','class'=>'form-control','size'=>'1','ng-model'=>'recurso.id_menu']) !!}

            </div>
            <div class="form-group">
                <label>OBSERVACION</label>
                {!! Form::text('observacion',null,array('class'=>'form-control','ng-model'=>'recurso.observacion')) !!}
            </div>
       
    </div>
    <%menu%>
</div>