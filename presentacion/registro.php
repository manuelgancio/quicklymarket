<?php

require_once('../clases/persona.class.php');
require_once('../logica/funciones.php');

?>
<html>
<head>
    <title> Registro usuario</title>
</head>
<hr>
<body>
    <div>
        <form action='../logica/procesarRegistro.php' id='FormRegistro' method='POST'>
            <table align="center">
                <tr>
                    <td height="40" colspan="4"></td>

                </tr>
                <tr>
                    <td height="20" colspan="4" class="tituloPant" align="center">Cree su nueva cuenta</td>
                </tr>
                <tr>
                    <td colspan="4">
                        <hr>
                     </td>
                </tr>
                <tr>
                    <td> *Nombre </td>
                    <td><input type='text' name='Nombre' id='Nombre' placeholder='Ingrese su nombre'> </td>
                </tr>
                <tr>
                    <td> *Apellido </td>
                    <td><input type='text' name='Apellido' id='Apellido' placeholder='Ingrese su Apellido'> </td>
                </tr>
                <tr>
                    <td> *Correo </td>
                    <td><input type='text' name='Correo' id='Correo' placeholder='Ingrese su correo'> </td>
                </tr><tr>
                    <td> *Teléfono </td>
                    <td><input type='text' name='Telefono' id='Telefono' placeholder='Ingrese su Teléfono'> </td>
                </tr>
                <tr>
                    <td> *País </td>  
                    <td><input type='text' name='Departamento' id='Departamento' placeholder='Seleccione su departamanto de recidencia'> </td>
                </tr>
                <tr>
                    <td> *Ciudad </td> <!drop down menu>
                    <td><input type='text' name='Ciudad' id='Cuidad' placeholder='Seleccione su ciudad de residencia'> </td>
                </tr>
                <tr>
                    <td> *Dirección </td>
                    <td><input type='text' name='Direccion' id='Direccion' placeholder='Ingrese su calle'> </td>
                
                    <td> *Numero de Puerta </td>
                    <td><input type='text' name='NumeroPuerta' id='NumeroPuerta' placeholder='Ingrese su número de puerta'> </td>
                </tr>
                <tr>
                    <td> *Contraseña </td>
                    <td><input type='password' name='Password' id='Password' placeholder='Ingrese una contraseña'> </td>
                </tr>
                <tr>
                    <td> Tarjeta de Crédito </td>
                    <td><input type='text' name='T_credito' id='T_credito' placeholder='Ingrese una tarjeta de crédito'> </td>
                </tr>
                <tr>
                    <td align='center' colspan='4'>
                        <input type='submit' value='Registrarse'>
                    </td>
                </tr>
            </form>
        </div>
    </body>
</html>