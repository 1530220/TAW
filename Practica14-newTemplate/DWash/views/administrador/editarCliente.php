<?php  
    //instanciar el controlador
    $controller = new MvcController();

    $cliente = $controller->getClienteIdController($_GET['id']);
    //si se detecta un post el cual es activado con el formulario
    if($_POST){
        //se realizar la siguiente funcion 
        $controller->editarClienteController($_GET['id']);
    }
?>

<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center">
            <h1 class="page-header-title">Editar Cliente</h1>
            <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="la la-user"></i></a></li>
                    <li class="breadcrumb-item active">Clientes</li>
                    <li class="breadcrumb-item active">Editar Cliente</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="widget has-shadow">
            <div class="widget-header bordered no-actions d-flex align-items-center">
                <h4>Completa el siguiente formulario para actualizar un cliente</h4>
            </div>
            <div class="widget-body">
                <br>
                <form class="form-horizontal" method="post">
                    <div class="form-group row d-flex align-items-center mb-4">
                        <label class="col-lg-3 form-control-label">Nombre(s):</label>
                        <div class="col-lg-9">
                            <input type="text" placeholder="Ingresar nombre" class="form-control" name="nombre" value="<?php echo $cliente['nombre'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-4">
                        <label class="col-lg-3 form-control-label">Apellido Paterno:</label>
                        <div class="col-lg-9">
                            <input type="text" placeholder="Ingresar apellido paterno" class="form-control" name="paterno" value="<?php echo $cliente['paterno'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-4">
                        <label class="col-lg-3 form-control-label">Apellido Materno:</label>
                        <div class="col-lg-9">
                            <input type="text" placeholder="Ingresar apellido materno" class="form-control" name="materno" value="<?php echo $cliente['materno'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-4">
                        <label class="col-lg-3 form-control-label">E-mail:</label>
                        <div class="col-lg-9">
                            <input type="email" placeholder="Ingresar e-mail" class="form-control" name="email" value="<?php echo $cliente['email'] ?>" required>
                        </div>
                    </div><br>
                    <div class="form-group row d-flex align-items-center mb-4">
                        <label class="col-lg-3 form-control-label">Nickname:</label>
                        <div class="col-lg-9">
                            <input type="text" placeholder="Ingresar nickname" class="form-control" name="usuario" value="<?php echo $cliente['nickname'] ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-4">
                        <label class="col-lg-3 form-control-label">Contraseña:</label>
                        <div class="col-lg-9">
                            <input type="password" placeholder="Ingresar contraseña" class="form-control" name="contraseña" value="<?php echo $cliente['password'] ?>" required>
                        </div>
                    </div><br>
                    <div class="form-group row d-flex align-items-center mb-4">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-6">
                            <input type="submit" class="btn btn-primary col-lg-9" value="Actualizar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

