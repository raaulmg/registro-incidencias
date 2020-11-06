var ventanaPerfil = false;
function accionPerfil(){
    if(!ventanaPerfil){
        ventanaPerfil = true;
        document.getElementById("menuPerfil").style.right = "0%";
    }
    else{
        ventanaPerfil = false;
        document.getElementById("menuPerfil").style.right = "calc(0% - 50%)";
    }
}


/*Evento Scroll*/

window.onscroll = function() {myFunction()};

function myFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("menuNav").style.backgroundColor = "white";
    document.getElementById("menuNav").style.height = "62px";
    document.getElementById("menuNav").style.borderBottom = "1px solid rgba(240, 240, 240, .8)";
    document.getElementById("menuNav").style.boxShadow = "0 4px 18px 0 rgba(0,0,0,.12), 0 7px 10px -5px rgba(0,0,0,.15)";
    document.getElementById("navTitulo").classList.add("text-dark");
    var x = document.getElementsByClassName("nav-link");
    var i;
 for (i = 0; i < x.length; i++) {
   x[i].style.color = "#343a40";
   }
  } else {
    document.getElementById("menuNav").style.backgroundColor = "transparent";
    document.getElementById("menuNav").style.height = "70px";
    document.getElementById("menuNav").style.borderBottom = "none";
    document.getElementById("menuNav").style.boxShadow = "unset";
    document.getElementById("navTitulo").classList.remove("text-dark");
    var x = document.getElementsByClassName("nav-link");
     var i;
  for (i = 0; i < x.length; i++) {
    x[i].style.color = "white";
    }
  }
}

var anadirIncidencias = false;
function formularioAnadirIncidencias(){
    if(!anadirIncidencias){
        document.getElementById("anadirIncidencias").style.display = "block";
        anadirIncidencias = true;
    }
    else{
        document.getElementById("anadirIncidencias").style.display = "none";
        anadirIncidencias = false;
    }
}

function mostrarGuardarEstado(count){
  document.getElementById("guardarEstado" + count).style.display = "inline";
}

var administrarIncidencias = false;
function mostrarAdmnistrarIncidencias(){
  if(administrarIncidencias == false){
    document.getElementById("menuPerfilMain").style.display = "none";
    document.getElementById("administrarIncidencias").style.display = "block";
    administrarIncidencias = true;
  }
  else{
    document.getElementById("menuPerfilMain").style.display = "block";
    document.getElementById("administrarIncidencias").style.display = "none";
    administrarIncidencias = false;
  }

}

var administrarUsuarios = false;
function mostrarAdmnistrarUsuarios(){
  if(administrarUsuarios == false){
    document.getElementById("menuPerfilMain").style.display = "none";
    document.getElementById("administrarUsuarios").style.display = "block";
    administrarUsuarios = true;
  }
  else{
    document.getElementById("menuPerfilMain").style.display = "block";
    document.getElementById("administrarUsuarios").style.display = "none";
    administrarUsuarios = false;
  }

}

function mostrarBorrarIncidencia(count){
    result = "incidenciaBorrar" + count;
      document.getElementById(result).style.display = "inline";
}

function mostrarBorrarUsuario(count){
  result = "usuarioBorrar" + count;
    document.getElementById(result).style.display = "inline";
}

function mostrarGuardarRol(count){
  document.getElementById("guardarRol" + count).style.display = "inline";
}

var changeColor = true;
function changeColorIncidencias(){
  var incidenciasTodas =document.getElementsByClassName("todosMain");
  if(changeColor == true){
    var i;
    for (i = 0; i < incidenciasTodas.length; i++) {
      incidenciasTodas[i].style.backgroundColor = "white";
    }
    changeColor = false;
  }
  else{
    var i;
    for (i = 0; i < incidenciasTodas.length; i++) {
      location.reload();
    }
    changeColor = true;
  }
}

function mostrarGuardarPrioridad(count){
  document.getElementById("guardarPrioridad" + count).style.display = "inline";
}