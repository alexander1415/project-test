
	
	
	<h1><?php echo $libro['titulo']?></h1>	
	<table  id="tblDetalle">		
		<tr >
			<td class="titulos">Autor</td>
			<td><?php echo $libro['nombre']?></td>			
			<td><img  src="<?php  echo base_url() . 'resource/imglibro/' . $libro['img']; ?>"/></td>			
		</tr>		
		<tr>
			<td class="titulos">Descripcion</td>
			<td colspan="2"> <span style="text-align: justify"><?php echo $libro['descripcion']?></span></td>			
		</tr>		
		<tr>
			<td class="titulos">Fecha de Publicacion</td>
			<td colspan="2"><?php echo $libro['fecha_publicacion']; ?></td>
		</tr>
		<tr>
			<td class="titulos">Precio</td>
			<td colspan="2"><?php echo "S/. " . $libro['precio']; ?></td>
		</tr>					
		<tr>
			<td colspan="3" class="enlaces" align="center">   
				<a href="<?php echo base_url('carrito/agregar_producto') . '/' . $libro['id']; ?>">Agregar Carrito</a>  &nbsp;&nbsp; 
				<a href="<?php echo $prev_page; ?> ">Regresar</a> </td>							
		</tr>		
	</table>
	
