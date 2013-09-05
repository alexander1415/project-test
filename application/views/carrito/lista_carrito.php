

<table id="carrito" style="border: 1px solid #000">
		<thead>
			<tr>
				<th>#</th>
				<th>Producto</th>
				<th>Cantidad</th>
				<th>Precio</th>
				<th>Sub Total</th>
				<th>Accion</th>
			</tr>
		</thead>

		<tbody>

			<?php 
			$num=1;
			foreach($productos as $item):
			?>
			<tr>
				<td><?php echo $num++; ?></td>
				<td><?php echo $item['name']; ?></td>
				<td><input type="number"  class="qty_item" value="<?php echo $item['qty'];?>" id="<?php echo $item['id'];?>"/> </td>
				<td><?php echo $item['price']; ?></td>				
				<td><?php echo number_format($item['price'] * $item['qty'], 2, '.', ''); ?></td>				
				<td><a href="<?php echo base_url('carrito/remover_producto').'/'.$item['id']; ?>"><img src="<?php  echo base_url()."resource/img/cart_delete.png"?>"></a></td>				
			</tr>		
			<?php endforeach; ?>			
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>Importe Total </td>
				<td><?php echo number_format($importeTotal, 2, '.', '');?></td>
				<td>&nbsp;</td>				
			</tr>
		</tbody>
	</table>