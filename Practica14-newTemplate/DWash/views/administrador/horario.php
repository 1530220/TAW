<?php  
    //instanciar el controlador
    $controller = new MvcController();

    $id = 1;
    $horario = $controller->getHorarioIdController($id);
    //si se detecta un post el cual es activado con el formulario
    if($_POST){
        //se realizar la siguiente funcion 
        $controller->editarHorarioController($id);
    }
?>


<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center">
            <h1 class="page-header-title">Horario</h1>
            <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="ion ion-calendar"></i></a></li>
                    <li class="breadcrumb-item active">Horario</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="widget has-shadow">
            <div class="widget-header bordered no-actions d-flex align-items-center">
                <h4>Ingresar el horario que visualizará el cliente</h4>
            </div>
            <div class="widget-body">
                <br>
                <form class="form-horizontal" method="post">
                    <div class="form-group row d-flex align-items-center mb-4">
                        <label class="col-lg-3 form-control-label">Horario:</label>
                        <div class="col-lg-9">
                            <input type="text" name="horario" class="form-control" value="<?php echo $horario['descripcion'] ?>" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row d-flex align-items-center mb-4">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-6">
                            <input type="submit" class="btn btn-primary col-lg-9" value="Guardar Horario">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

