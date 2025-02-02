<?php
    require_once $_SERVER["DOCUMENT_ROOT"].'includes/database.php';
    session_start();
	error_reporting(0);
	$varsesion = $_SESSION['email'];
	if (isset($varsesion)){
?>
<!DOCTYPE html>
<html lang="mx">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="/css/estilo.css" />
    <link rel="stylesheet" href="/vendor/components/bootstrap/css/bootstrap.min.css" />
    <script src="/vendor/components/jquery/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/js/alert.js"></script>
    <title>Cañones</title>
   </head>
  <body>
    <?php
        Include_once $_SERVER["DOCUMENT_ROOT"].'modulos/shared/navbar.php';
    ?>
    <section class="wrapper">
      <?php
         Include_once $_SERVER["DOCUMENT_ROOT"].'modulos/shared/sidebar.php';
      ?>
      <div class="contenedor-principal">
        <div class="header">
          <h3>Cañones</h3>
          <div class="boton-nuevo" onClick="newAlert()">
            <a href="#"><i class="fas fa-eye fa-lg" title="Añadir nuevo cañon"></i></a>
          </div>
          <div class="boton-cancelar" onClick="cancelAlert()">
            <a href="#"><i class="fas fa-times fa-lg" title="Cancelar"></i></a>
          </div>
        </div>
        <div class="info">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Status</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
                        $canones = $db->select("canones","*"); 
                        if($canones)
                        { 
                            foreach ($canones as $canon) 
                            { 
              ?>
              <tr>
                <th scope="row"><?php echo $canon['id_can']; ?></th>
                <td><?php echo utf8_encode($canon['nombre_can']); ?></td>
                <td><?php echo $canon['status_can']; ?></td>
                <td>
                  <a href="#"><i class="fas fa-edit" title="Editar"></i></a> 
                  <a href="#"><i class="fas fa-trash-alt" title="Eliminar"></i></a>
                </td>
                <?php
                            }
                        }else{
                            echo "<script>errorAlert()</script>";
                        }
                ?>
              </tr>
            </tbody>
          </table>
          <!-- FORMULARIO -->
          <div class="form">
            <form action="" class="form-register">
              <input type="text" placeholder="Nombre" />
              <input type="text" placeholder="Status" />
              <button>Registrar cañon <i class="fas fa-eye fa-sm"></i></button>
            </form>
          </div>
          <!-- FIN FORMULARIO -->
        </div>
      </div>
    </section>
    <footer>
      <p><i class="fas fa-user-lock"></i> Sistema desarrollado por La Logia Corp.</p>
    </footer>
    <script src="/vendor/fortawesome/font-awesome/js/all.js" data-auto-replace-svg="nest"></script>
    <script src="/vendor/components/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
	}else{
        header('Location: /modulos/login/index.php/');
    }
?>
