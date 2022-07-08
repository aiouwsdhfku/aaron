<?php 
require('mail/conexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Suñay</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons
    ================================================== -->
<!--<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">-->
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Rochester" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation
    ==========================================-->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#features" class="page-scroll">Productos</a></li>        
        <li><a href="#team" class="page-scroll">Conocenos</a></li>
        <li><a href="#contact" class="page-scroll">Contacto</a></li>
        <li><a href="form/contratos.php" class="page-scroll">Reservaciones</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
</nav>
<!-- Header -->
<header id="header">
  <div class="intro">
    <div class="overlay">
      <div class="container" >
        <div class="row" >
          <div class="intro-text" >
            <h1>Suñay</h1>
            <h1>Regalos con amor</h1>
            <p>Reservaciones: 922501407</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Features Section -->
<div id="features" class="text-center">
  <div class="container">
      <!--Mostrar los banquetes con sus respectivos platillos-->
    <div class="section-title">
      <h2> Chop cervecero  A  s/.35  </h2>
      <div class="gallery-item"> <img src="img/gallery/1.JPEG" width="650px" class="img-responsive" alt=""></div>
    </div>
    <div class="row">
      <?php
        $mostrarPlatillos = "SELECT productos.codigo, productos.descripcion, productos.imagen, productos.precio_venta FROM productos INNER JOIN categorias WHERE productos.id_categoria = categorias.id";
        $datosPlatillos = mysqli_query($conn,$mostrarPlatillos);
        $contarCategoria = "SELECT * FROM categorias";
        $datosCategoria = mysqli_query($conn,$contarCategoria);
        if(mysqli_num_rows($datosCategoria) > 0){
          while ($rowPlatillos=mysqli_fetch_array($datosPlatillos)) {
    ?>
      <div class="col-xs-12 col-sm-4">
        <div class="features-item">
          <h3> <?php echo $rowPlatillos["descripcion"] ?> </h3>
          <?php 
           $ruta = "SistemaVentas/vistas/img/productos/".$rowPlatillos["codigo"];
           //Se comprueba que realmente sea la ruta de un directorio
            if(is_dir($ruta)) {
              //// Abre un gestor de directorios para la ruta indicada
              $gestor = opendir($ruta);
               // Recorre todos los archivos del directorio
              while (($archivo = readdir($gestor)) != false) {
                // Solo buscamos archivos sin entrar en subdirectorios
                if (is_file($ruta."/".$archivo)) {
                  echo "<img src='".$ruta."/".$archivo."' class='img-responsive' alt=''>";
                }
              }
              // Cierra el gestor de directorios
              closedir($gestor);
            } else {
              echo "No es una ruta de directorio valida <br>";
            }
          ?>
          <p> Precio del platillo: $<?php echo $rowPlatillos["precio_venta"]; ?> </p>
        </div>
      </div>
      <?php
          } // end while platillos
        } else {
          echo '<h3 style="color:#FF0000"">Disfrute de Nuestros Productos</h3>';
          echo '<br>';
        }
      ?>
    </div>
    <div class="section-title">
      <h2> Polo blanco  A  s/.33 </h2>
      <div class="gallery-item"> <img src="img/gallery/2.JPEG" width="600px" class="img-responsive" alt=""></div>
      <br>
        <?php 
            $consulta = "SELECT categorias.categoria, productos.descripcion, productos.codigo  FROM productos INNER JOIN categorias WHERE productos.id_categoria = categorias.id";
            $extraer = mysqli_query($conn,$consulta);
            if(mysqli_num_rows($extraer) > 0){
        ?>

                <h5>NOTA: Cada platillo corresponde al tipo de banquete que se muestra en la siguiente tabla y el precio de banquete varea de acuerdo a los platillos que se muestran arriba</h5>
                </div>
                <div class="row">
                  <style>
                      table {
                        width:100%;
                      }
                      table, th, td {
                        border: 1px solid black;
                        border-collapse: collapse;
                      }
                      th, td {
                        padding: 15px;
                        text-align: left;
                      }
                      #t01 tr:nth-child(even) {
                        background-color: #eee;
                      }
                      #t01 tr:nth-child(odd) {
                       background-color: #fff;
                      }
                      #t01 th {
                        background-color: black;
                        color: white;
                      }
                  </style>
                  <table id="t01">
                  <tr>
                    <th>Tipo de Banquete</th>
                    <th>Descripción</th>
                    <th>Código</th>
                  </tr>

        <?php
                while ($nuevo=mysqli_fetch_array($extraer)) {
        ?>
                <tr>
                  <td> <?php echo $nuevo["categoria"] ?> </td>
                  <td> <?php echo $nuevo["descripcion"] ?> </td>
                  <td> <?php echo $nuevo["codigo"] ?> </td>
                </tr>
      <?php 
                } 
            } else {
                echo '<h2 style="color:#FF0000">Disfrute de Nuestros Productos</h2>';
            }
      ?>
      </table>
    </div>
  </div>
</div>

<!-- Gallery Section -->
<div id="gallery">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-6 col-md-3">
        <div class="gallery-item"> <img src="img/gallery/3.JPEG" class="img-responsive" alt=""></div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="gallery-item"> <img src="img/gallery/4.JPEG" class="img-responsive" alt=""></div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="gallery-item"> <img src="img/gallery/5.JPEG" class="img-responsive" alt=""></div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="gallery-item"> <img src="img/gallery/6.JPEG" class="img-responsive" alt=""></div>
      </div>
    </div>
  </div>
</div>
<!-- Team Section -->
<div id="team">
  <div class="container">
    <div id="row">
      <div class="col-md-6">
        <div class="col-md-10 col-md-offset-1">
          <div class="section-title">
            <h2>CONOCENOS</h2>
          </div>
          <p><b>Mision:</b> Ofrecer a nuestros exigentes clientes una gama de regalos para cada ocasión, encontrando el producto de calidad que usted desea para su personal o proveedor, con los mejores precios del mercado y en el tiempo que usted lo requiera. Suñay regalos con amor personalizamos nuestros productos con tus deseos y lo hacemos inolvidables</p>
          <p><b> Visión:</b>  Ser la opción preferida de nuestros clientes, superando sus expectativas de calidad y servicio; y de nuestros empleados, brindando un lugar de trabajo que inspira a dar lo mejor de cada uno, entre todos. </p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="team-img"><img src="img/gallery/logo.JPEG" alt="..."></div>
      </div>
    </div>
  </div>
</div>
<!-- Contact Section -->
<div id="contact" class="text-center">
  <div class="container text-center">
    <div class="col-md-4">
      <h3>Reservaciones</h3>
      <div class="contact-item">
        <p>Por favor contactanos</p>
        <p>972 702 174</p>
      </div>
    </div>
    <div class="col-md-4">
      <h3>Nuestra dirección</h3>
      <div class="contact-item">
        <p>Urubamba ,</p>
        <p>AV. Mariscal Castilla</p>
      </div>
    </div>
    <div class="col-md-4">
      <h3>Horario de apertura</h3>
      <div class="contact-item">
        <p>Lunes-Viernes: 10:00 AM - 6:00 PM</p>
        <p>Sabado-Domingo: 11:00 AM - 02:00 PM</p>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="section-title text-center">
      <h3>¡Si quieres recibir nuestras promociones, suscribete!</h3>
    </div>
    <div class="col-md-8 col-md-offset-2">      
        <button type="submit" class="btn btn-custom btn-lg"><a href="form/contratos.php">Suscribirse</a></button>
    </div>
  </div>
</div>
<div id="footer">
  <div class="container text-center">
    <div class="col-md-6">
      <p> Suñay regalos con amor</p>
    </div>
    <div class="col-md-6">
      <div class="social">
        <ul>
          <li><a href="https://www.facebook.com/personalizadosydetalleshechosconamor/"><i class="fa fa-facebook"></i></a></li>
          <li><a href="https://www.youtube.com/"><i class="fa fa-youtube"></i></a></li>
          <li><a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
          <li><a href="https://shop.wati.io/bd22e455-97b0-4f80-a440-5737f705fe61"><i class="fa fa-whatsapp"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="js/contact_me.js"></script> 
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
