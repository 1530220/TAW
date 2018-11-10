<?php  
    //instanciar el controlador
    $controller = new MvcController();
    //guardar todos los registros de clientes de la base de datos
    $clientes = $controller->getClientesController();
    //guardar todos los premios
    $premios = $controller->getAllController("premios");

    //si se detecta un post el cual es activado con el formulario
    if($_POST){
        //se realizar la siguiente funcion 
        $controller->verificarPremioController();
    }
?>
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center">
            <h1 class="page-header-title">Adquirir Premio</h1>
            <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="la la-gift"></i></a></li>
                    <li class="breadcrumb-item active">Visitas</li>
                    <li class="breadcrumb-item active">Adquirir premio</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="widget has-shadow">
            <div class="widget-header bordered no-actions d-flex align-items-center">
                <h4>Selecciona el cliente y lo que desea para ver si es posible adquirir el premio</h4>
            </div>
            <div class="widget-body">
                <br>
                <form class="form-horizontal" method="post">
                    <div class="form-group row d-flex align-items-center mb-4">
                        <label class="col-lg-3 form-control-label">Cliente:</label>
                        <div class="col-lg-9">
                            <select name="cliente" class="custom-select form-control">
                                <?php foreach ($clientes as $cliente) {?>
                                <option value="<?php echo $cliente['id']  ?>"><?php echo $cliente['nickname'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-4">
                        <label class="col-lg-3 form-control-label">Premio:</label>
                        <div class="col-lg-9">
                            <select name="premio" class="custom-select form-control">
                                <?php foreach ($premios as $premio) {?>
                                <option value="<?php echo $premio['id']  ?>"><?php echo $premio['nombre'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row d-flex align-items-center mb-4">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-6">
                            <input type="submit" class="btn btn-primary col-lg-9" value="Adquirir Premio">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

