function validarformArticulo(){
    
    error =''
    nombre = document.getElementById("nombre").value;
    desc = document.getElementById("nombre").value;
    cat = document.getElementById("categoria").selectedIndex;
    precio = document.getElementById("precio").value;
    estado = document.getElementsByName("estado");
    cant = document.getElementById("stock").value;

    // RADIO BUTTON ESTADO
    var seleccionado = false;
        for(var i=0; i<estado.length; i++) {    
            if(estado[i].checked) {
                seleccionado = true;
                break;
            }
        }

    if( nombre == null || nombre.length == 0 || /^\s+$/.test(nombre) ) {
        document.getElementById("error_msg_nom").innerHTML = "<span class='warning'>El nombre no puede estar vacío.</span>";
        return false;
    }
    else if (desc == null || desc.length == 0 || /^\s+$/.test(desc)){
        document.getElementById("error_msg_desc").innerHTML = "<span class='warning'>La descripcioón no puede estar vacía.</span>";
        return false;
    }
    else if( cat == null || cat == 0 ) {
        document.getElementById("error_msg_cat").innerHTML = "<span class='warning'>Debe seleccionar una categoria.</span>";
        return false;
    }
    else if (precio == null || precio.length == 0 || /^\s+$/.test(precio)){
        document.getElementById('error_msg_precio').innerHTML = "<span class='warning'>El precio no puede estar vacío.</span>";
        return false;
    }
    else if (seleccionado == false){
        document.getElementById("error_msg_estado").innerHTML = "<span class='warning'>Debe seleccionar un estado.</span>";
        return false;
    }
    else if(isNaN(precio) ){
        document.getElementById("error_msg_precio").innerHTML = "<span class='warning'>El precio debe ser un número.</span>";
        return false;
    }
    else if (cant == null || cant.length == 0 || /^\s+$/.test(cant)){
        document.getElementById("error_msg_cant").innerHTML = "<span class='warning'>La cantidad no puede estar vacía.</span>";
        return false;
    }
    else if(isNaN(cant)) {
        document.getElementById("error_msg_cant").innerHTML = "<span class='warning'>La cantidad debe ser un número.</span>";
        return false;
    }
    // Si el script ha llegado a este punto, todas las condiciones
    // se han cumplido, por lo que se devuelve el valor true
    return true;
}



function checkPass()
{
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    
     //if (this.pass1.value != "" && this.pass1.value == this.pass2.value) {
    //r.innerHTML = this.match_html;
    // $("#submit_reg").removeAttr("disabled");

    //} else {
    //r.innerHTML = this.nomatch_html;
    //$("#submit_reg").attr("disabled", "disabled");
    //}


    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Las contraseñas coinciden! "
        document.getElementById("submit_reg").disabled = false;
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Las contraseñas no coinciden!"
        document.getElementById("submit_reg").disabled = true;
    }
} 
function validatephone(phone) 
{
    var maintainplus = '';
    var numval = phone.value
    if ( numval.charAt(0)=='+' )
    {
        var maintainplus = '';
    }
    curphonevar = numval.replace(/[\\A-Za-z!"£$%^&\,*+_={};:'@#~,.Š\/<>?|`¬\]\[]/g,'');
    phone.value = maintainplus + curphonevar;
    var maintainplus = '';
    phone.focus;
}
// validates text only
function Validate(txt) {
    txt.value = txt.value.replace(/[^a-zA-Z-'\n\r.]+/g, '');
}

//validar numero de puerta 
function validarNum(Num)
{
    var regNum = /([^0-9]{4})/g;
    num.value = num.value.replace(/([^0-9]{4})/g,'');

}

// validate email
function email_validate(email)
{
var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

    if(regMail.test(email) == false)
    {
    document.getElementById("status").innerHTML    = "<span class='warning'>La dirección de correo ingresador no es valida.</span>";
    }
    else
    {
    document.getElementById("status").innerHTML	= "<span class='valid'>Gracias, el correo ingresado es correcto!</span>";	
    }
}
// validate date of birth
function dob_validate(dob)  
{
var regDOB = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;

    if(regDOB.test(dob) == false)
    {
    document.getElementById("statusDOB").innerHTML	= "<span class='warning'>DOB is only used to verify your age.</span>";
    }
    else
    {
    document.getElementById("statusDOB").innerHTML	= "<span class='valid'>Thanks, you have entered a valid DOB!</span>";	
    }
}
// validate address
function add_validate(address)
{
var regAdd = /^(?=.*\d)[a-zA-Z\s\d\/]+$/;
  
    if(regAdd.test(address) == false)
    {
    document.getElementById("statusAdd").innerHTML	= "<span class='warning'>Address is not valid yet.</span>";
    }
    else
    {
    document.getElementById("statusAdd").innerHTML	= "<span class='valid'>Thanks, Address looks valid!</span>";	
    }
}

