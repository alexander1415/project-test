<div class="row" style="margin-left: 2px">
	<div align="center" style="margin-bottom: 25px">
		<?php
		for ($i = 0; $i < count($images); $i++) {
			if ($i % 2 != 0) {?>
				<img src="<?php echo base_url(); ?>resource/img/banner2.jpg" style="border: none; height: 66px; width: 100px"> <?php
		} else {
		?>
		<img src="<?php echo base_url(); ?>resource/img/<?php echo $images[$i] ?>" style="border: none"><?php
		}
		};
		?>
	</div>

	<form id="form_datos" class="form-horizontal" method="post" action="<?php echo base_url(); ?>compra/pagar_procesar">
		<div style="background-color: #005580; color: #ffffff; border-radius: 2px; padding: 5px">
			PAGO
		</div>
		<div style="border: 1px solid #000; padding-top: 10px">

			<form class="form-horizontal">

				<div class="control-group">
					<label class="control-label" for="importeTotal">Cliente :</label>
					<div class="controls">
						<input type="text" id="cliente" name="cliente" value="<?php echo $val_cliente;?>">
						<input type="hidden" name="hd_cuenta" id="hd_cuenta">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="importeTotal">Importe Total :</label>
					<div class="controls">
						<input type="text" id="importeTotal" placeholder="00:00" disabled="true" name="importeTotal" value="<?php echo number_format($val_importe,2);?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="importeTotal">Importe IGV :</label>
					<div class="controls">
						<input type="text" id="importeIGV" placeholder="00:00" disabled="true" name="importeIGV" value="<?php echo number_format($val_igv,2);?>">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="importeTotal">Total a Pagar :</label>
					<div class="controls">
						<input type="text" id="total" placeholder="00:00" disabled="true" name="total" value="<?php echo number_format($val_total,2);?>">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="importeTotal">Monto Abonado :</label>
					<div class="controls">
						<input type="text" id="abonado" placeholder="00:00" name="abonado" value="00:00" disabled="true">
						<a href="#myModal" role="button" class="btn" data-toggle="modal">Conectar</a>
					</div>
				</div>

				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn" id="btnPagar">
							Pagar
						</button>
					</div>
				</div>
			</form>
		</div>
		<br/>
	</form>
	<p id="error_pago" style="color: red;"></p>
</div>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			×
		</button>
		<center><h2 id="myModalLabel">Banco Central de Huacho</h2></center>
	</div>
	<div class="modal-body">
		<form class="form-horizontal" method="post" id="form_transaccion">
		<fieldset>
			<div class="control-group">
				<label class="control-label" for="txtNumCuenta">Numero Cuenta</label>
				<div class="controls">
					<input type="text" id="txtNumCuenta" name="txtNumCuenta" required="true" placeholder="450123XXXXXXXXXX">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="txtClave">Clave</label>
				<div class="controls">
					<input type="password" required="true" id="txtClave" name="txtClave" placeholder="XXXXXXX">
				</div>
			</div>
			<p id="erros" style="color: red"></p>
			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn" id="btnSubmit">
						Sign in
					</button>
				</div>
			</div>
		</fieldset>
	</form>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">
			Close
		</button>
		<button class="btn btn-primary">
			Save changes
		</button>
	</div>
</div>

<script>
	$(document).ready(function() {
		$("#btnSubmit").click(function (){
			var txtImporte = parseFloat($('#total').val()).toFixed(2);
			var data_form =  $("#form_transaccion").serialize() + '&importe=' + txtImporte;
			$.ajax({
				type:"POST",
				url: "http://192.168.1.33/banco/operacionex/verificar.html",
				data: data_form
			}).done(function (msg){
				var error="";
				if(msg==3){
					$('#abonado').val(txtImporte);
					$('#hd_cuenta').val($('#txtNumCuenta').val());
					$('#myModal').modal('hide');				}
				else if(msg==2)error="No tiene suficiente dinero";
				else error="Datos Incorrectos";
				$('#erros').text(error);
			});
			return false;			
		});
		
		$('#btnPagar').click(function (){
			var pagado = $('#abonado');
			var total = $('#total');
			if(pagado==total){
				 $('#form_datos').submit();
			}else
				$('#error_pago').text('* Antes debe conectarse con su cuenta');
			return false;			 
		});
		
	}); 
</script>