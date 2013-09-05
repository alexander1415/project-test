<!-- Content -->

	<!-- Products -->
	<div class="products">
		<h3>Productos Ofrecidos</h3>
		<ul>						
			<?php foreach ($libros as $item): ?>							
			<li>
				<div class="product">
					<a href="<?php echo base_url('libro/detalle') . "/" . $item['id']; ?>" class="info">
						<span class="holder"> 
							<img src="<?php echo base_url() . "resource/imglibro/" . $item['img']; ?>" alt="" /> 
							<span class="book-name"><?php echo $item['titulo']; ?></span> 
							<span class="author">Por <?php echo $item['nombre']; ?></span>
							<span class="book-id"><?php echo $item['id']; ?></span> 
							<span class="description"><?php echo substr($item['descripcion'], 0, 40); ?></span>
						</span>
					</a>
					<a href="<?php echo base_url('libro/detalle') . "/" . $item['id']; ?>" class="buy-btn">Comprar<span class="price"><span class="low">S/.&nbsp;</span><?php echo number_format($item['precio'], 0, '', ''); ?><span class="high">00</span></span></a>
				</div>
			</li>							
			<?php endforeach; ?>
		</ul>
		<!-- End Products -->
	</div>
	
	
	<div class="pagination">
		
	</div>
	<div class="cl">
		&nbsp;
	</div>
	

	
	
<!-- End Content -->

     


