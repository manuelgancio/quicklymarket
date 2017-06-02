
<html>
    <head>
    <link href='<?= $CSS?>/bootstrap.min.css' rel="stylesheet">
    <link href='<?= $CSS?>/registro.css' rel="stylesheet">
    <script src="<?= $JS?>registro.js"></script>
    </head>
    <body>
    <div class="container">
	    <div class="row">
            <div class="col-md-7">
                <form action="<?= $LOGICA?>/procesarRegistro.php" method="POST" id="fileForm" role="form">
                <fieldset><legend class="text-center">Cree su cuenta gratis!</legend>

                <div class="form-group"> 	 
                    <label for="Nombre"><span class="req">* </span> Nombre: </label>
                        <input class="form-control" type="text" name="Nombre" id = "Nombre" onkeyup = "Validate(this)" required /> 
                            <div id="errNom"></div>    
                </div>

            <div class="form-group">
                <label for="Apellido"><span class="req">* </span> Apellido: </label> 
                    <input class="form-control" type="text" name="Apellido" id = "Apellido" onkeyup = "Validate(this)" required />  
                        <div id="errApe"></div>
            </div>

            <div class="form-group">
                <label for="Correo"><span class="req">* </span> Correo: </label> 
                    <input class="form-control" required type="text" name="Correo" id = "Correo"  onchange="email_validate(this.value);" />   
                        <div class="status" id="status"></div>
            </div>

            <div class="form-group">
                <label for="Telefono"><span class="req">* </span> Telefono: </label>
                        <input required type="text" name="Telefono" id="Telefono" class="form-control phone" maxlength="28" onkeyup="validatephone(this);"/> 
            </div>

            <div clas="form-group">
                <label class="col-md-4 control-label" for="Departamento"><span class="req">*</span> Departamento: </label>
                <div class="col-md-7">
		        <div class="input-group">
		    	<span class="input-group-addon"></span>
                <select id="Departamento" name="Departamento" class="form-control input-md">
                    <option value="Artigas">Artigas</option>
                    <option value="Canelones">Canelones</option>
                    <option value="Cerro Largo">Cerro Largo</option>
                    <option value="Colonia">Colonia</option>
                    <option value="Durazno">Durazno</option>
                    <option value="Flores">Flores</option>
                    <option value="Florida">Florida</option>
                    <option value="Lavalleja">Lavalleja</option>
                    <option value="Maldonado">Maldonado</option>
                    <option value="Montevideo">Montevideo</option>
                    <option value="Paysandu">Paysandú</option>
                    <option value="Rio Negro">Río Negro</option>
                    <option value="Rivera">Rivera</option>
                    <option value="Rocha">Rocha</option>
                    <option value="Salto">Salto</option>
                    <option value="San Jose">San José</option>
                    <option value="Soriano">Soriano</option>
                    <option value="Tacuarembo">Tacuarembó</option>
                    <option value="Treinta y tres">Treinta y Tres</option>
                </select>
                </div>
		        </div>
            </div>

            <div class="form-group">
                <label for="Ciudad">  Ciudad: </label>
                    <input class="form-control" type="text" name="Ciudad" id = "Ciudad" onkeyup = "Validate(this)"/>  
                        <div id="errCiudad"></div>
            </div>

            <div class="form-group">

                <label for="Direccion"> <span class="req">*</span> Dirección: </label>
                    <input class="form-control" type="text" name="Direccion" id = "Direccion" />  
                        <div id="errDireccion"></div>
            
            <div class="form.group">
                <label for="Numero"> <span class="req">*</span> Número: </label>
                    <input class="form-control" type="text" name="Numero" id="Numero" onkeyup ="validarNum(this)"/>
                        <div id="errNum"></div>
            </div>

            </div>
            <div class="form.group">
                <label for="T_credito"> Tarjeta de credito: </label>
                    <input class="form-control" type="text" name="T_credito" id="T_credito" onkeyup ="Validate(this)"/>
                        <div id="errT_credito"></div>
            </div>

            <div class="form-group">
                <label for="password"><span class="req">* </span> Contraseña: </label>
                    <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16"  id="pass1" /> </p>

                <label for="Password"><span class="req">* </span> Confirmación de contraseña: </label>
                    <input required name="Password" type="Password" class="form-control inputpass" minlength="4" maxlength="16" placeholder="Vuelva a ingresar su contraseña"  id="pass2" onkeyup="checkPass(); return false;" />
                        <span id="confirmMessage" class="confirmMessage"></span>
            </div>

            <div class="form-group">
            
                <?php //$date_entered = date('m/d/Y H:i:s'); ?>
                <input type="hidden" value="<?php //echo $date_entered; ?>" name="dateregistered">
                <input type="hidden" value="0" name="activate" />
                <hr>
<!--
                <input type="checkbox" required name="terms" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" id="field_terms">   <label for="terms">I agree with the <a href="terms.php" title="You may read our terms and conditions by clicking on this link">terms and conditions</a> for Registration.</label><span class="req">* </span>
            </div>
-->
            <div class="form-group">
                <input class="btn btn-success" type="submit" name="submit_reg" id="submit_reg" value="Registrarse" disabled="disabled">
            </div>
                    <!--  <h5>You will receive an email to complete the registration and validation process. </h5>
                      <h5>Be sure to check your spam folders. </h5>
                    -->

            </fieldset>
            </form><!-- ends register form -->

<script type="text/javascript">
  document.getElementById("field_terms").setCustomValidity("Please indicate that you accept the Terms and Conditions");
</script>
        </div><!-- ends col-6 -->
   
