<?php
session_start();
require 'config/db.php';
include 'includes/header.php';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

  $correo = $_POST["correo"];
  $password = $_POST["password"];

  //var_dump($correo, $password);
  $stmt = $pdo->prepare("SELECT * FROM usuarios where usuario = ?");
  $stmt->execute([$correo]);
  $usuario = $stmt->fetch(PDO:: FETCH_ASSOC);

  if($usuario && $password == $usuario['password']){

    $_SESSION ['id_usuario'] = $usuario['id_usuario'];
    $_SESSION['nombre'] = $usuario['nombre'];
    $_SESSION['rol'] = $usuario['rol'];

    echo"
    <script>
  Swal.fire({
          title: 'inicio de sesion exitoso🚀',
          text: 'as clip para continuar',
          icon: 'success'
        }).then(()=>window.location='index.php');
    </script> 
    ";


    echo "BIEN.!!!! Ingresaste con exito😌";
  }else{

    echo "
    <script>
  Swal.fire({
          title: 'Error al iniciar secion',
          text: 'error.....:v',
          icon: 'error'
        });
    </script>
    ";
    //echo "Usuario o contraseña incorrecta. 😒";
  }
}
?>

<h2>LOGIN🚀</h2>
<form method="POST">
  <div class="mb-3">
    <label for="correo" class="form-label">Correo</label>
    <input type="text" class="form-control" id="correo" name="correo">
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Contraseña</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>


  <button type="guardar" class="btn btn-primary">Ingresar</button>
</form>

<?php
include 'Includes/footer.php'
?>