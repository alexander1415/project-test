<div class="row-fluid">
    <div align="center" style="margin-bottom: 25px">
        <?php
        for ($i = 0; $i < count($images); $i++) {
            if ($i % 2 != 0) {
                ?>
                <img src="<?php echo base_url(); ?>resource/img/banner2.jpg" style="border: none; height: 66px; width: 100px">
            <?php } else { ?>
                <img src="<?php echo base_url(); ?>resource/img/<?php echo $images[$i] ?>" style="border: none">
                <?php
            }
        };
        ?>
    </div>

    <form id="form_datos" class="form-horizontal" method="post" action="<?php echo base_url(); ?>compra/guardar_datos">  
        <div style="background-color: #005580; color: #ffffff; border-radius: 2px; padding: 5px"> 
            DATOS DE REMITENTE
        </div> 
        <div style="border: 1px solid #000; padding-top: 10px"> 
            <div class="control-group">   
                <label class="control-label">Nombres y Apellidos :</label>
                <input type="text" name="remitente" id="remitente" class="input-xlarge" />
                <div class="controls">   
                    <div id="error_remitente" class="error" ></div>                               
                </div>                                
            </div>      
            <div class="control-group"> 
                <label class="control-label">Correo :</label>
                <input type="text" name="correo" id="correo"  class="input-xlarge"/>
                <div class="controls">   
                    <div id="error_correo" class="error" ></div>                               
                </div>
            </div>

            <div class="control-group"> 
                <label class="control-label">Celular :</label>
                <input type="text" name="celular" id="celular"  class="input-xlarge" />
                <div class="controls">   
                    <div id="error_celular" class="error" ></div>                               
                </div>
            </div>            
        </div>    
        <br/> 
        <div style="background-color: #005580; color: #ffffff; border-radius: 2px; padding: 5px"> 
            DATOS DE DESTINATARIO
        </div> 
        <div style="border: 1px solid #000; padding-top: 10px"> 
            <div class="control-group">   
                <label class="control-label">Nombres y Apellidos :</label>
                <input type="text" name="destino" id="destino" />
                <div class="controls">   
                    <div id="error_destino" class="error" ></div>                               
                </div>                                
            </div>                      
            <div class="control-group">   
                <label class="control-label">Direccion :</label>
                <input type="text" name="direccion" id="destino" />
                <div class="controls">   
                    <div id="error_direccion" class="error" ></div>                               
                </div>                                
            </div>            
            
        </div>        
        
        <div id="botones" class="alignright" style="margin-top: 5px">       
            <input type="submit" class="btn btn-success" name="btn-continuar" value="Continuar" />            
        </div>
    </form>    
</div>

<style type="text/css">
    .error { color: #E13300}
        
</style>

<script type="text/javascript">
    $(document).ready(function() {
        $("form#form_datos").on("submit", function() {
            var data = $("form#form_datos").serialize();
            console.log(data);
            $.ajax({
                type: "post",
                dataType: "json",
                data: data,
                url: $(this).attr('action'),
                success: function(resp) {                    
                    if (resp === 1) {
                        $(location).attr('href','<?php echo base_url(); ?>compra/pago');
                    } else {
                        for (var i = 0; i < resp.length; i++) {
                            $("#error_" + resp[i].name).html(resp[i].error);
                        }
                        $("#msj_form").css('display', 'none');
                    }
                }
            });
            return false;
        });
    })
</script> 