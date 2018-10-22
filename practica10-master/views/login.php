<body class="hold-transition skin-blue login-page">
  <div class="login-box">
    <div class="login-logo">
      Iniciar Sesion
    </div>
    <div class="login-box-body">
        <center><img src="views/media/images/user2.png" height="180" width="180"></center>
            <br>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Correo electronico" name="email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" name="contraseña" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <center><input type="submit" value="Ingresar" class="btn btn-primary btn-flat btn-block"></center>
    </form>
  
    </div>
  </div>
</body>


<?php  
  // Se crea un objeto del tipo MvcController
  $login = new MvcController();


    // Si se dio clic en el botón de "ingresar" y el campo de email no es vacío
    if(isset($_POST['email'])){
      // Se manda llamar al método login del objeto MvcController
      $login->login();
    }

?>