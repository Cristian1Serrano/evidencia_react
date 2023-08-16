function loadPublicaciones() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.querySelector('.div_publicaciones_home').innerHTML = this.responseText;
      }
    };
    xhr.open("GET", "partials/publicaciones.php", true);
    xhr.send();
  }

  function loadPerfil() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.querySelector('.div_publicaciones_home').innerHTML = this.responseText;
      }
    };
    xhr.open("GET", "partials/perfil.php", true);
    xhr.send();
  }
  