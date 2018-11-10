<?php  
    //se instancia el controlador a utilizar
    $controller = new MvcController();

    $horario = $controller->getAllController("horario");
?>

<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center">
            <h1 class="page-header-title">Horario</h1>
            <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="la la-calendar"></i></a></li>
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
                <h4>Informacion sobre el horario</h4>
            </div>
            <div class="widget-body">
                <h4>El horario establecido del autolavado DWash es el siguiente:</h4><br>
                <p><?php echo $horario[0]['descripcion'] ?></p>
            </div>
        </div>
    </div>
</div>