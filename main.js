function cargaFormulario() {
    nombre=document.getElementById("form").elements[0].value;
    apellido1=document.getElementById("form").elements[1].value;
    apellido2=document.getElementById("form").elements[2].value;
    dni=document.getElementById("form").elements[3].value;
    email=document.getElementById("form").elements[4].value;
    tipo=$( "select#tipo option:checked" ).val();
    data={ "nombre" : nombre,
           "apellido1" : apellido1, 
           "apellido2" : apellido2,  
           "dni" : dni,
           "email" : email,
           "tipo" : tipo 
         };    
}
function crear() {
    cargaFormulario();
   $.post("crear.php", data, function(datos, status){
        resultado=JSON.parse(datos);
        alert("Resultado: "+ resultado["resultado"]);        
   });
}

function consultar() {
    cargaFormulario();
   $.post("consultar.php", data, function(datos, status){
        //alert (datos);
        resultado=JSON.parse(datos);
        //console.log(resultado["nombre"]);
        document.getElementById("form").elements[0].value=resultado["nombre"];
        document.getElementById("form").elements[1].value=resultado["apellido1"];
        document.getElementById("form").elements[2].value=resultado["apellido2"];
        document.getElementById("form").elements[3].value=resultado["dni"];
        document.getElementById("form").elements[4].value=resultado["email"];
        document.getElementById("form").elements[5].value=resultado["tipo"];
        document.getElementById("form").elements[6].value=resultado["alta"];
        //resultado=JSON.parse(datos);
        //alert("Resultado: "+ resultado["nombre"]);        
   });    
}
function borrar() {
    cargaFormulario();
    $.post("borrar.php", data, function (datos, status){
        alert("Usuario borrado.");
    });
    
}

function actualizar() {

    cargaFormulario();
    $.post("actualizar.php", data, function (datos, status){
        alert("Usuario " + data["nombre"] + " actualizado.");
        resultado=JSON.parse(datos);
        document.getElementById("form").elements[0].value=resultado["nombre"];
        document.getElementById("form").elements[1].value=resultado["apellido1"];
        document.getElementById("form").elements[2].value=resultado["apellido2"];
        document.getElementById("form").elements[3].value=resultado["dni"];
        document.getElementById("form").elements[4].value=resultado["email"];
        document.getElementById("form").elements[5].value=resultado["tipo"];
        document.getElementById("form").elements[6].value=resultado["alta"];
    });   
}

function anterior() {
     
}

function siguiente() {
    
}
function crudUsuario() {
    window.open("crudusuario.php", "_self");
}
