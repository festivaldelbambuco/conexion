<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<title>Ejemplo de uso de Simple Facebook Graph Javascript SDK</title>

<!-- CARGA DE SIMPLE FACEBOOK GRAPH -->
<script src="http://blog.ikhuerta.com/jsDownload/simpleFacebookGraph.js"></script>

<!-- SCRIPTS PROPIOS QUE USA ESTA P�GINA -->
<script>

// Cuando la pagina carga miramos si ya hay un usuario identificado.
fb.ready(function(){ 
  if (fb.logged)
  {
    // Cambiamos el link de identificarse por el nombre y la foto del usuario.
    html = "<p>Hola " + fb.user.name + "</p>";
    html += '<p><img src="' + fb.user.picture + '"/></p>';
    html += '<p><a href="#" onclick="fb.logout(); return false;">Salir</a></p>';
    document.getElementById("conectar_facebook").innerHTML = html;
  }
});


// Funcion para logarse con Facebook.
function login() {
  fb.login(function(){ 
    if (fb.logged) {
      // Cambiamos el link de identificarse por el nombre y la foto del usuario.
      html = "<p>Hola " + fb.user.name + "</p>";
      html += "<p><img src='" + fb.user.picture + "'/></p>";
      document.getElementById("conectar_facebook").innerHTML = html;
    } else {
      alert("No se pudo identificar al usuario");
    }
  })
};

// Funcion para publicar un mensaje en tu muro
var publish = function () {
    fb.publish({
      message : "Estoy probando un script para que la gente publique desde mi/s web/s en Facebook",
      picture : "http://blog.ikhuerta.com/wp-content/themes/ikhuerta3/images/ikhuerta.jpg",
      link : "http://blog.ikhuerta.com/simple-facebook-graph-javascript-sdk",
      name : "Simple Facebook Graph Javascript SDK",
      description : "Facebook Graph es una nueva forma de conectar tu web Facebook. Con este script es muy f�cil conseguirlo :)"
    },function(published){ 
      if (published)
       alert("publicado!");
      else
       alert("No publicado :(, seguramente porque no estas identificado o no diste permisos");
    });  
}
</script>


</head>
<body>

  <div id="conectar_facebook">
    <a href="#" onclick="login(); return false;">Contectarse a Facebook</a>
  </div>

  <br/><br/>

  <p><a href="#" onclick="publish(); return false;">Publicar algo en tu muro</p>

</body>
</html>