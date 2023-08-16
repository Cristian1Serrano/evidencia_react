<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/8a894d283f.js" crossorigin="anonymous"></script>
    <title>PADTEA</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>
    <?php if(!empty($user)): ?>

      <div class="container-fluid d-flex flex-column">
      <div class="row flex-nowrap overflow-x-hidden" style="border: solid 5px white">
        <!--sidebar-->
        <div class="bg-white col-auto col-md-4 col-lg-4 col-xl-3 col-xxl-2 min-vh-100" id="sidebar_home">
          <div class="img_avatar d-flex">
            <img src="imagenes/avatar.png">
            <span class="span_hola_avatar" style="
               margin-left: 10px;">HOLA</span>
          </div>
          <div class="nombre_usuario d-flex">
            
          </div>
          <div class="container_sidebar_home d-flex">
            <ul class="sidebar_ul flex-column d-flex">
              <li class="nav-item d-flex" style="width: 100%">
                <a href="/php-login-simple/index.php" style="text-decoration: none;color: #A9A9A9">
                  <i class="fa-solid fa-house li_sidebar_home"></i>
                  <span class="fs-4 ms-3 d-none d-sm-inline">Home</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa-regular fa-bell li_sidebar_home"></i>
                  <span class="fs-4 ms-3 d-none d-sm-inline">Notificaciones</span>
                </a>
              </li>
              <li class="nav-item" id="publicaciones-link" onclick="loadPublicaciones()">
                <a href="#" class="nav-link">
                  <i class="fa-regular fa-comments li_sidebar_home"></i>
                  <span class="fs-4 ms-3 d-none d-sm-inline">Publicaciones</span>
                </a>
              </li>
              <li class="nav-item" onclick="loadPerfil()">
                <a href="#" class="nav-link">
                  <i class="fa-regular fa-user li_sidebar_home"></i>
                  <span class="fs-4 ms-3 d-none d-sm-inline">Perfil</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa-solid fa-plus li_sidebar_home"></i>
                  <span class="fs-4 ms-3 d-none d-sm-inline">mas</span>
                </a>
              </li>
              <button class="btn btn-primary" onclick="loadPublicaciones()">Publicar</button>
            </ul>
          </div>
        </div>
        <!--publicaciones-->
        <div class="container-fluid div_publicaciones_home flex-fill overflow-hidden"       style="background: #F2F3F5;">
          <div class="titulo_publicaciones bg-white">
            <span class="fs-4 fw-bold">ULTIMAS PUBLICACIONES</span>
          </div>
          <div class="ultimas_publicaciones d-flex">
            <div class="publicacion">
              <div class="encabezado_publicacion d-flex">
                <div class="col-xl-1 col-lg-2 col-md-2 col-sm-3 col-xs-3 d-flex">
                  <img class="img_avatar" src="imagenes/avatar.png">
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-9 col-xs-7 d-flex datos_usuario">
                  <span><?= $user['email']; ?></span>
                  <span>terapeuta</span>
                </div>
              </div> 
              <div class="contenido_publicacion">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing 
                  elit. Obcaecati autem mollitia ipsa veritatis natus
                   voluptatem similique deleniti atque quod quae omnis sit, 
                   culpa nemo nobis quia, harum pariatur eveniet eos.</p>
              </div>            
            </div>
            <div class="comentario">
              <button class="btn_comentar" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" >
                Comentar
              </button>
            </div>
            <div class="collapse" id="collapseExample" style="width: 80%;">
              <div class="card card-body">
                <textarea class="comentario_textarea"></textarea>
                <button class="btn_enviar">
                  <div class="svg-wrapper-1">
                    <div class="svg-wrapper">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                      </svg>
                    </div>
                  </div>
                  <span>Send</span>
                </button>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
      </ul>
      <p class="text-center text-body-secondary">© 2023 Company, Inc</p>
    </footer>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
    <script src="mobilidad/index.js"></script>


    <?php else: ?>
      <h1>Please Login or SignUp</h1>

      <a href="login.php">Login</a> or
      <a href="signup.php">SignUp</a>
    <?php endif; ?>
  </body>
</html>
