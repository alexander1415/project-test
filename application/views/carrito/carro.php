<style>
	.qty_item {
		width: 40px;
	}

</style>

<script>

</script>

<div class="row-fluid">

	
	
	<div align="center" style="margin-bottom: 25px">
        <?php
        for ($i = 0; $i < count($images); $i++) {
            if ($i % 2 != 0) {
                ?>
                <img src="<?php echo base_url(); ?>resource/img/banner2.jpg" style="border: none; height: 66px; width: 100px">
            <?php } else { ?>
                <img src="<?php echo base_url(); ?>resource/img/<?php echo $images[$i] ?>" style="border: none">
            <?php }
        };
        ?>
    </div>
		

	<div id="carrito_tabla">
		<?php echo $carrito; ?>
	</div>
	<br>

		
	 <div id="botones" class="form-actions alignright">        
     <a type="button" class="btn btn-success" name="btn-agregar" href="<?php echo $prev_page; ?>">Agregar Libros </a> 
        <a type="button" class="btn btn-success" name="btn-continuar" href="<?php echo base_url() . 'compra/datos' ?>">Continuar Compra </a>            
    </div>
</div>
<script>
		$(document).ready(function(){
			$('.qty_item').change(function (){
			var varcnt = $(this).val();
			var varid = $(this).attr('id');
			$.ajax({
					type:"POST",
					url: "<?php echo base_url('carrito/cambiar_cantidad.html'); ?>",
					data: { id: varid, cnt:varcnt}
				}).done(function (msg){
				//$('#carrito_tabla').html(msg);
					$(location).attr('href','<?php echo base_url('carrito')?>');
				});
			});
		});
</script>



