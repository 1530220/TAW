<?php  
    //instanciar el controlador
    $controller = new MvcController();

    $premio = $controller->getPremioIdController($_GET['id']);
    //si se detecta un post el cual es activado con el formulario
    if($_POST){
        //se realizar la siguiente funcion 
        $controller->editarPremioController($_GET['id']);
    }
?>


<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center">
            <h1 class="page-header-title">Editar Premio</h1>
            <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="la la-gift"></i></a></li>
                    <li class="breadcrumb-item active">Premios</li>
                    <li class="breadcrumb-item active">editar premio</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="widget has-shadow">
            <div class="widget-header bordered no-actions d-flex align-items-center">
                <h4>Completa el siguiente formulario para actualizar un premio</h4>
            </div>
            <div class="widget-body">
                <br>
                <form class="form-horizontal" method="post">
                    <div class="form-group row d-flex align-items-center mb-4">
                        <label class="col-lg-3 form-control-label">Nombre:</label>
                        <div class="col-lg-9">
                            <input type="text" placeholder="Ingresar nombre" class="form-control" name="nombre" value="<?php echo $premio['nombre'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-4">
                        <label class="col-lg-3 form-control-label">Descripcion:</label>
                        <div class="col-lg-9">
                            <input type="text" placeholder="Ingresar descripcion" class="form-control" name="descripcion" value="<?php echo $premio['descripcion'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-4">
                        <label class="col-lg-3 form-control-label">Puntos:</label>
                        <div class="col-lg-9">
                            <input type="number" placeholder="Ingresar puntos requeridos" class="form-control" name="puntos" min="0" value="<?php echo $premio['puntos'] ?>" required>
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

