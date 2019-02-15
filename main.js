var result;
var ind;
function limpiar(n) {
    var i;
    for(i = 0; i <=n ; i++ ) {
    document.getElementById("form").elements[i].value="";
    }
}

function cargaTutela() {
    tutor=$( "select#tutor option:checked" ).val();
    alumno=$( "select#alumno option:checked" ).val();
    data={ "tutor" : tutor,
           "alumno" : alumno, 
         };    
}

function cargaCalificaciones() {
    asignatura=$( "select#asignatura option:checked" ).val();
    evaluacion=$( "select#evaluacion option:checked" ).val();
    data={ "asignatura" : asignatura,
           "evaluacion" : evaluacion, 
         };    
}

function cargaAlumnos() {
    grupo=$( "select#grupo option:checked" ).val();
    alumno=$( "select#alumno option:checked" ).val();
    data={ "grupo" : grupo,
           "alumno" : alumno, 
         };    
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

function cargaFormularioA() {
    // nombre=document.getElementById("form").elements[0].value;
    materia=$( "select#materia option:checked" ).val();
    profesor=$( "select#profesor option:checked" ).val();
    // taller=$( "select#taller option:checked" ).val();
    grupo=$( "select#grupo option:checked" ).val();
    // evaluacion=$( "select#evaluacion option:checked" ).val();
    data={ 
           "materia" : materia, 
           "profesor" : profesor,  
           "grupo" : grupo,
         };    
}

function cargaFormularioAG() {
    grupo=$( "select#grupo option:checked" ).val();
    alumno=$( "select#alumno option:checked" ).val();
    data={ 
           "grupo" : grupo,
           "alumno" : alumno,
         };    
}


function cargaFormularioM() {
    nombre=document.getElementById("form").elements[0].value;
    data={ "nombre" : nombre,
         };    
}

function cargaFormularioG() {
    curso=$( "select#curso option:checked" ).val();
    taller=$( "select#taller option:checked" ).val();
    data={ "taller" : taller,
           "curso" : curso, 
         };    
}

function cargaFormularioT() {
    nombre=document.getElementById("form").elements[0].value;
    data={ "nombre" : nombre,
         };    
}


function cargaFormularioTu() {
    tutor=$( "select#tutor option:checked" ).val();
    alumno=$( "select#alumno option:checked" ).val();
    //alert (tutor);
    data={ "tutor" : tutor,
           "alumno" : alumno,
         };    
}

function cargaFormularioC() {
    taller=$( "select#taller option:checked" ).val();
    curso=$( "select#curso option:checked" ).val();
    data={ "taller" : taller,
           "curso" : curso,
         };    
}

function cargaFormularioE() {
    nombre=document.getElementById("form").elements[0].value;
    data={ "nombre" : nombre,
         };    
}


function mostrarDatos() {
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

function mostrarDatosA() {
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
    
    document.getElementById("form").elements[0].value=result[ind]["materia"];
    document.getElementById("form").elements[1].value=result[ind]["grupo"];
    document.getElementById("form").elements[2].value=result[ind]["profesor"];
}

function mostrarDatosM() {
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
}

function mostrarDatosT() {
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
}

function mostrarDatosTu() {
    // if (ind == 0) {
    //     document.getElementById("ant").disabled = true;  
    //   } else {
    //       document.getElementById("ant").disabled = false;  
    //   }
    //   if (ind == result.length-1) {
    //       //ind--
    //     document.getElementById("sig").disabled = true;  
    //   } else {
    //       document.getElementById("sig").disabled = false;  
    //   }
    tabla="";
    for (i=0; i<result.length; i++){
    tabla+=result[i]['nombre'] + ' ' +  result[i]['apellido1'] + ' ' + result[i]['apellido2'] + "<br>";
    }
    document.getElementById("resultado").innerHTML=tabla; 
}

function mostrarDatosAG() {
    // if (ind == 0) {
    //     document.getElementById("ant").disabled = true;  
    //   } else {
    //       document.getElementById("ant").disabled = false;  
    //   }
    //   if (ind == result.length-1) {
    //       //ind--
    //     document.getElementById("sig").disabled = true;  
    //   } else {
    //       document.getElementById("sig").disabled = false;  
    //   }
    tabla="";
    if(result.length == 0) {
        document.getElementById("resultado").innerHTML="No hay alumnxs en este grupo."
    } else {
    for (i=0; i<result.length; i++){
    tabla+=result[i]['nombre'] + ' ' +  result[i]['apellido1'] + ' ' + result[i]['apellido2'] + "<br>";
    }
    document.getElementById("resultado").innerHTML=tabla; 
}
}
 

function mostrarFormularioNotas() {
    // if (ind == 0) {
    //     document.getElementById("ant").disabled = true;  
    //   } else {
    //       document.getElementById("ant").disabled = false;  
    //   }
    //   if (ind == result.length-1) {
    //       //ind--
    //     document.getElementById("sig").disabled = true;  
    //   } else {
    //       document.getElementById("sig").disabled = false;  
    //   }
    tabla="<table style='width:100%'>";
 
    if(result.length == 0) {
        document.getElementById("resultado").innerHTML="No hay alumnxs en este grupo."
    } else {
    for (i=0; i<result.length; i++){
        nombre = result[i]['nombre'];
        apellido1 = result[i]['apellido1'];
        apellido2 = result[i]['apellido2'];
        dni = result[i]['dni'];
        asignatura = result[i]['asignatura'];
        evaluacion = result[i]['evaluacion'];
    tabla+='<tr><td>' + nombre + ' ' +  apellido1 + ' ' + apellido2 +
     '</td><td><input type="number" id="' + dni + 
     '"></td><td><button type="button" onclick="grabarNota(\''+ dni + '\', ' + asignatura +
      ', ' + evaluacion + ')">Grabar</button></td></tr>';
    }
    tabla += "</table>";
    document.getElementById("resultado").innerHTML=tabla; 
}
}

function grabarNota (alumno, grupo, evaluacion) {
    nota = document.getElementById(alumno).value; 
    alert ("El alumno " + alumno + " tiene un " + nota + " en la " + evaluacion + " de " + grupo);
    data={ 
        "alumno" : alumno,
        "grupo" : grupo,
        "evaluacion" : evaluacion,
        "nota" : nota,
      };
      $.post("grabarNota.php", data, function(datos, status){
        resultado=JSON.parse(datos);
        alert("Resultado: "+ resultado["resultado"]);        
   });  
}

function mostrarDatosG__() {
    // if (ind == 0) {
    //     document.getElementById("ant").disabled = true;  
    //   } else {
    //       document.getElementById("ant").disabled = false;  
    //   }
    //   if (ind == result.length-1) {
    //       //ind--
    //     document.getElementById("sig").disabled = true;  
    //   } else {
    //       document.getElementById("sig").disabled = false;  
    //   }
    tabla="";
    for (i=0; i<result.length; i++){
    tabla+=result[i]['nombre'] + ' ' +  result[i]['apellido1'] + ' ' + result[i]['apellido2'] + "<br>";
    }
    document.getElementById("resultado").innerHTML=tabla; 
}

function mostrarDatosC() {
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
}

function mostrarDatosG() {
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
    
    document.getElementById("form").elements[0].value=result[ind]["taller"];
    document.getElementById("form").elements[1].value=result[ind]["curso"];
}


function mostrarDatosE() {
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
}


function crear() {
    cargaFormulario();
   $.post("crear.php", data, function(datos, status){
        resultado=JSON.parse(datos);
        alert("Resultado: "+ resultado["resultado"]);        
   });
}

function crearA() {
    cargaFormularioA();
   $.post("crearA.php", data, function(datos, status){
        resultado=JSON.parse(datos);
        alert("Resultado: "+ resultado["resultado"]);        
   });
}

function crearM() {
    cargaFormularioM();
   $.post("crearM.php", data, function(datos, status){
        resultado=JSON.parse(datos);
        alert("Resultado: "+ resultado["resultado"]);        
   });
}

function crearG() {
    cargaFormularioG();
   $.post("crearG.php", data, function(datos, status){
        resultado=JSON.parse(datos);
        alert("Resultado: "+ resultado["resultado"]);        
   });
}

function crearT() {
    cargaFormularioT();
   $.post("crearT.php", data, function(datos, status){
        resultado=JSON.parse(datos);
        alert("Resultado: "+ resultado["resultado"]);        
   });
}

function crearC() {
    cargaFormularioC();
   $.post("crearC.php", data, function(datos, status){
        resultado=JSON.parse(datos);
        alert("Resultado: "+ resultado["resultado"]);        
   });
}

function crearE() {
    cargaFormularioE();
   $.post("crearE.php", data, function(datos, status){
        resultado=JSON.parse(datos);
        alert("Resultado: "+ resultado["resultado"]);        
   });
}

function asociar() {
    cargaTutela();
   $.post("asociar.php", data, function(datos, status){
        resultado=JSON.parse(datos);
        alert("Resultado: "+ resultado["resultado"]);        
   });
}

function alumnosAsignatura() {
    cargaCalificaciones();
   $.post("calificaciones.php", data, function(datos, status){
        result=JSON.parse(datos);
        // alert("Resultado: "+ resultado["resultado"]);        
        mostrarFormularioNotas();
   });
}

//Asociar alumnos a grupo
function asociarA() {
    cargaAlumnos();
   $.post("asociarA.php", data, function(datos, status){
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
   });   
}

function consultarA() {
    cargaFormularioA();
   $.post("consultarA.php", data, function(datos, status){
       ind=0;
       result=JSON.parse(datos);
       mostrarDatosA();     
   });    
}

function consultarAG() {
    cargaFormularioAG();
   $.post("consultarAG.php", data, function(datos, status){
       ind=0;
       result=JSON.parse(datos); 
       mostrarDatosAG();     
   });    
}

function consultarM() {
    cargaFormularioM();
   $.post("consultarM.php", data, function(datos, status){
       ind=0;
       result=JSON.parse(datos);
       mostrarDatosM();     
   });    
} 
 
function consultarT() {
    cargaFormularioT();
   $.post("consultarT.php", data, function(datos, status){
       ind=0;
       result=JSON.parse(datos);
       mostrarDatosT();     
   });    
}

function consultarTu() {
    cargaFormularioTu();
   $.post("consultarTu.php", data, function(datos, status){
       ind=0;
       result=JSON.parse(datos);
       mostrarDatosTu();     
   });    
} 

function consultarG() {
    cargaFormularioG();
   $.post("consultarG.php", data, function(datos, status){
       ind=0;
       result=JSON.parse(datos);
       mostrarDatosG();     
   });  
}  


function consultarC() {
    cargaFormularioC();
   $.post("consultarC.php", data, function(datos, status){
       ind=0;
       result=JSON.parse(datos);
       mostrarDatosC();     
   });    
} 

function consultarE() {
    cargaFormularioE();
   $.post("consultarE.php", data, function(datos, status){
       ind=0;
       result=JSON.parse(datos);
       mostrarDatosE();     
   });    
} 

function borrar() {
    cargaFormulario();
    $.post("borrar.php", data, function (datos, status){
        alert(datos);
    });
}

function borrarA() {
    cargaFormularioA();
    $.post("borrarA.php", data, function (datos, status){
        alert(datos);
    });
}

function borrarM() {
    cargaFormularioM();
    $.post("borrarM.php", data, function (datos, status){
        alert(datos);
    });
}

function borrarT() {
    cargaFormularioT();
    $.post("borrarT.php", data, function (datos, status){
        alert(datos);
    });
}

function borrarTu() {
    cargaFormularioTu();
    $.post("borrarTu.php", data, function (datos, status){
        alert(datos);
    });
}

function borrarAG() {
    cargaFormularioAG();
    $.post("borrarAG.php", data, function (datos, status){
        alert(datos);
    });
}

function borrarC() {
    cargaFormularioC();
    $.post("borrarC.php", data, function (datos, status){
        alert(datos);
    });
}

function borrarE() {
    cargaFormularioE();
    $.post("borrarE.php", data, function (datos, status){
        alert(datos);
    });
}

function borrarG() {
    cargaFormularioG();
    $.post("borrarG.php", data, function (datos, status){
        alert(datos);
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

function actualizarA() {

    cargaFormularioA();
    $.post("actualizarA.php", data, function (datos, status){
        alert("Usuario " + data["nombre"] + " actualizado.");
        resultado=JSON.parse(datos);
        document.getElementById("form").elements[0].value=resultado["nombre"];
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

function anteriorA() {
    if (ind > 0) {
        ind--;
    }
    mostrarDatosA();

}

function siguienteA() {
    if (ind < result.length-1){
        ind++;
    }
    mostrarDatosA();    
}

function anteriorM() {
    if (ind > 0) {
        ind--;
    }
    mostrarDatosM();

}

function siguienteM() {
    if (ind < result.length-1){
        ind++;
    }
    mostrarDatosM();    
}

function anteriorT() {
    if (ind > 0) {
        ind--;
    }
    mostrarDatosT();

}

function siguienteT() {
    if (ind < result.length-1){
        ind++;
    }
    mostrarDatosT();    
}

function anteriorC() {
    if (ind > 0) {
        ind--;
    }
    mostrarDatosC();

}

function siguienteC() {
    if (ind < result.length-1){
        ind++;
    }
    mostrarDatosC();    
}

function anteriorE() {
    if (ind > 0) {
        ind--;
    }
    mostrarDatosE();

}

function siguienteE() {
    if (ind < result.length-1){
        ind++;
    }
    mostrarDatosE();    
}

function anteriorG() {
    if (ind > 0) {
        ind--;
    }
    mostrarDatosG();

}

function siguienteG() {
    if (ind < result.length-1){
        ind++;
    }
    mostrarDatosG();    
}

function crud (tipo) {
    window.open("crud" + tipo + ".php", "_self");
}

function crudUsuario() {
    window.open("crudusuario.php", "_self");
}

function crudAsignaturas() {
    window.open("crudAsignaturas.php", "_self");
}

