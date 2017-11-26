<div id="print">
	<div class="modal-footer" style="text-align: right;">	    	   	
		<a href="javascript:imprSelec('print')" class="btn btn-default">
          Imprimir 
        </a>
        <a href="javascript:window.close()" class="btn btn-default" title="Cerrar">
	    	Cerrar
	    </a>        
	</div>
	<div class="row">
		<div class="row" style="margin-left:16px">
			<table style="width: 100%">
				<tr>
					<td style="width: 8%">Cédula/RUC</td>
					<td style="width: 42%">{{$paciente->cedula}}</td>
					<td style="width: 8%">Nombre</td>
					<td style="width: 42%">{{ $paciente->nombres }} {{ $paciente->apellidos }}</td>
				</tr>
				<tr>
					<td style="width: 8%">Dirección</td>
					<td colspan="3" style="width: 92%">{{$paciente->direccion}}</td>					
				</tr>
				<tr>
					<td style="width: 8%">Teléfono</td>
					<td style="width: 42%">{{$paciente->telefono}}</td>
					<td style="width: 8%">Fecha Emisión</td>
					<td style="width: 42%">{{ $orden->fecha_facturacion }}</td>
				</tr>
			</table>
		</div>		            
		<div class="row" style="margin-left:16px;margin-right:16px">
	    	<table style="width: 100%">
		       	<thead>
		       	   	<tr>
		               	<th style="width: 10%">Cant.</th>
		                <th style="text-align: center">Descripción</th>
		                <th style="width: 10%">V.Unit</th>
		                <th style="width: 10%">V.Total</th>			                    
		            </tr>
		      	</thead>
		      	<tbody>
		   		<?php
		       			foreach ($detalleorden as $item) { ?>
		   			<tr>
		           	    <td>
		               	    	1		                	    		         		    
			            </td>
			            <td>
			                <?php echo $item->examen; ?>                   		            
			            </td>
				        <td style="text-align: right">
			                $<?php echo $item->precio; ?>
				        </td>
				        <td style="text-align: right">
			        	    $<?php echo $item->precio; ?>
				        </td>				                    
			    	</tr>
			    <?php } ?>
		    	</tbody>    
			</table>        
			<table style="width: 100%;text-align: right;">
	                    	<tr>
	                    		<td style="text-align: right;padding-bottom:12px;padding-right: 5px;width: 90%">
	                    			<label for="subtotal" class="control-label">SUBTOTAL</label>	                    				                    					
	                    		</td>	
	                    		<td style="text-align: right;padding-bottom:12px;padding-left: 2px;padding-right: 7px">
	                    			<label for="subtotal" class="control-label">
		                    			<span id="subtotal" name="subtotal">$<?php echo $orden->subtotal; ?></span>
	    	                		</label>	    	                				
	                    		</td>
	                    	</tr>
	                    	<tr>
	                    		<td style="text-align: right;padding-bottom:12px;padding-right: 5px;">
	                    			<label for="descuento" class="control-label">DESCUENTO</label>
	                    		</td>	
	                    		<td style="text-align: right;padding-bottom:12px;padding-left: 2px;padding-right: 7px">
	                    			<label for="descuento" class="control-label">
		                    			<span id="descuento" name="descuento">$<?php echo $orden->descuento; ?></span>
	    	                		</label>            				
	                    		</td>	
	                    	</tr>	                    		                    		
	                    	<tr>
	                    		<td style="text-align: right;padding-bottom:12px">
	                    			<label for="descuento" class="control-label">TARIFA IVA 0%</label>
	                    		</td>	
	                    		<td style="text-align: right;padding-bottom:12px;padding-left: 2px;padding-right: 7px">	          							
	                    			<label for="iva_cero" class="control-label">
		                    			<span id="iva_cero" name="iva_cero">$0.00</span>
	    	                		</label>            				
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    		<td style="text-align: right;padding-bottom:12px">
	                    			<label for="descuento" class="control-label">TARIFA IVA 12%</label>
	                    		</td>			
	                    		<td style="text-align: right;padding-bottom:12px;padding-left: 2px;padding-right: 7px">
	                    			<label for="iva_doce" class="control-label">
		                    			<span id="iva_doce" name="iva_cero">$0.00</span>
	    	                		</label>            				
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    		<td style="text-align: right;padding-bottom:12px">
	                    			<label for="descuento" class="control-label">IMPORTE IVA</label>
	                    		</td>			
	                    		<td style="text-align: right;padding-bottom:12px;padding-left: 2px;padding-right: 7px">
	                    			<label for="iva_doce" class="control-label">
		                    			<span id="iva_doce" name="iva_cero">$0.00</span>
	    	                		</label>            				
	                    		</td>	
	                    	</tr>
	                    	<tr>
	                    		<td style="text-align: right;padding-bottom:12px">
	                    			<label for="total" class="control-label">TOTAL $</label>
	                    		</td>			
	                    		<td style="text-align: right;padding-bottom:12px;padding-left: 2px;padding-right: 7px">
	                    			<label for="total" class="control-label">
										<span id="total" name="total">$<?php echo $orden->total; ?></span>
									</label>									
	                    		</td>	
	                    	</tr>	                    	
	                    </table>			        
        </div>		
	</div>	    	
</div>
<script type="text/javascript">
function imprSelec(print)
{	
	var ficha=document.getElementById(print);
	var ventimp=window.open(' ','popimpr');
	ventimp.document.write(ficha.innerHTML);
	ventimp.document.close();
	ventimp.print();
	ventimp.close();}
</script>