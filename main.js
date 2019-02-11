var result;
var ind;
function limpiar() {
    document.getElementById("form").elements[0].value="";
    document.getElementById("form").elements[1].value="";
    document.getElementById("form").elements[2].value="";
    document.getElementById("form").elements[3].value="";
    document.getElementById("form").elements[4].value="";
    document.getElementById("form").elements[5].value="";
    document.getElementById("form").elements[6].value="";
}

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

function mostrarDatos() {
    //resultado=JSON.parse(data);
    //console.log(resultado["nombre"]);
    if (ind == 0) {
        document.getElementById("ant").disabled = true;  
      } else {
          document.getElementById("ant").disabled = false;  
      }
      if (ind == result.length-1) {
          //ind--
        document.getElementById("sig").disabled = true;  
      } else {
          document.getElementById("sig").disabled = false;  
      }
    
    document.getElementById("form").elements[0].value=result[ind]["nombre"];
    document.getElementById("form").elements[1].value=result[ind]["apellido1"];
    document.getElementById("form").elements[2].value=result[ind]["apellido2"];
    document.getElementById("form").elements[3].value=result[ind]["dni"];
    document.getElementById("form").elements[4].value=result[ind]["email"];
    document.getElementById("form").elements[5].value=result[ind]["tipo"];
    document.getElementById("form").elements[6].value=result[ind]["alta"];
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
       ind=0;
       result=JSON.parse(datos);
       mostrarDatos();
        //alert (datos);
        // resultado=JSON.parse(datos);
        // //console.log(resultado["nombre"]);
        // document.getElementById("form").elements[0].value=resultado[0]["nombre"];
        // document.getElementById("form").elements[1].value=resultado[0]["apellido1"];
        // document.getElementById("form").elements[2].value=resultado[0]["apellido2"];
        // document.getElementById("form").elements[3].value=resultado[0]["dni"];
        // document.getElementById("form").elements[4].value=resultado[0]["email"];
        // document.getElementById("form").elements[5].value=resultado[0]["tipo"];
        // document.getElementById("form").elements[6].value=resultado[0]["alta"];
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
    if (ind > 0) {
        ind--;
    }
    mostrarDatos();

}

function siguiente() {
    if (ind < result.length-1){
        ind++;
    }
    mostrarDatos();    
}
function crudUsuario() {
    window.open("crudusuario.php", "_self");
}
