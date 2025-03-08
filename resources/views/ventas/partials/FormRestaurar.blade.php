{!! Form::model($objeto, ['route'=>['ventas.destroy',$objeto->id],'method'=>'DELETE']) !!}
                    <div class="panel-footer"> 
                        @can('acceso','ordenes_ventas.destroy')
                            <button type="submit" class="btn btn-raised btn-danger btn-xs"><i class="material-icons">restore</i></button>
                        @endcan
                    </div>
                {!! Form::close() !!}