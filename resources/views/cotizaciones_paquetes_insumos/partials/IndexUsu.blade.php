<div class="row">
        <div class="col-md-11 col-md-offset-0">
            <div class="panel panel-default">
                <div class='panel-heading'>Cotizaciones</div>
                <div class='panel-body'>
                    <p>Hay {{ $cotizaciones->total() }} Cotizacion (es)</p>
                    <table border='0' class="table table-striped">
                    <thead>
                        <tr>
                            <th>Numero cotizacion</th>  
                            <th>Fecha</th>  
                            <th>Elaborado por.</th> 
                            <th>Estado</th> 
                            <th>Cliente</th>    
                            <th>Total</th>  
                            <th>Moneda</th> 
                            <th></th> 
                            <!--<th>Equipos</th>    -->
                        </tr>
                    </thead>
                    @foreach($cotizaciones as $cotizacion)
                        <tr>
                            <td> {!! $cotizacion->numero_cotizacion !!} </td>
                            <td> {!! $cotizacion->fecha !!} </td>
                            <td> {!! $cotizacion->nombre_empleado !!} </td>
                            <td> {!! $cotizacion->estatus !!} </td>
                            <td> {!! $cotizacion->nombre_fiscal !!} </td>
                            <td> {!! number_format($cotizacion->total, 2, '.', ',') !!} </td>
                            <td> {!! $cotizacion->tipo_moneda !!} </td>
                            <td>
                                <a href="{{ route('cotizaciones.edit', $cotizacion->id)}}" type="button" class="btn btn-warning"><i class="material-icons">cached</i></a>
                            </td>
                            <td>
                            {!! Form::model($cotizacion, ['route'=>['cotizaciones.destroy',$cotizacion->id],'method'=>'DELETE']) !!}
                            
                                <button type="submit" class="btn btn-raised btn-danger btn-lg"><i class="material-icons">deleted</i></button>                       
                            
                            {!! Form::close() !!}
                            </td>
                            <td>
                                <!--GENERAR COTIZACION PDF-->
                                <div ng-controller="CotizacionPdfCtrl">

                                    <button type="button" class="btn btn-info btn-lg" ng-click="openCotizacionPdf({{$cotizacion->id}});"><i class="material-icons">picture_as_pdf</i></button>
                                </div>
                                <!--FINALIZA GENERAR COTIZACION PDF-->
                                
                            </td>
                                
                            
                        </tr>
                    @endforeach
                    </table>
                    </div>
                    <div class="panel-footer" > 
                        <a type="button" class="btn btn-raised btn btn-info" href="{{ route('cotizaciones.create') }}"><i class="material-icons">note_add</i> AGREGAR</a>
                    </div>
            </div>
        </div>
</div>