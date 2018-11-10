<?php  
    //instancia del controlador a utilizar
    $controller = new MvcController();

    //guardar los clientes que existen registrados
    $clientes = $controller->getClientesController();
    //guardar los premios que existen registrados
    $premios = $controller->getAllController("premios");
    //guardar las promociones que existen registrados
    $promociones = $controller->getAllController("promociones");
    //guardar las visitas que existen registrados
    $visitas = $controller->getAllController("visitas");

    //condicion para cuando se actualiza el horario
    if(isset($_GET['cambio'])){
        echo "<script>alert('Se ha actualizado el horario exitosamente')</script>";
    }
?>
<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center">
             <h1 class="page-header-title">Inicio</h1>
             <div>
	            <ul class="breadcrumb">
	                <li class="breadcrumb-item"><a href="#"><i class="ti ti-home"></i></a></li>
	                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
	            </ul>
	        </div>            
        </div>
    </div>
</div>
<br>
<div class="row flex-row">
	<div class="col-xl-6">
        <a href="?action=verClientes">
        <div class="widget widget-23 bg-primary d-flex justify-content-center align-items-center">
            <div class="widget-body text-center">
                <i class="ion ion-person-stalker"></i>
                <div class="title">Clientes</div>
                <div class="h1" style="color:white;"><?php echo count($clientes) ?></div>
            </div>
        </div>
        </a>
    </div>

    <div class="col-xl-6">
        <a href="?action=verPremios">
        <div class="widget widget-23 bg-info d-flex justify-content-center align-items-center">
            <div class="widget-body text-center">
                <i class="ti ti-gift"></i>
                <div class="title">Premios</div>
                <div class="h1" style="color:white;"><?php echo count($premios) ?></div>
            </div>
        </div>
        </a>
    </div>

    <div class="col-xl-6">
        <a href="?action=verPromociones">
        <div class="widget widget-23 bg-danger d-flex justify-content-center align-items-center">
            <div class="widget-body text-center">
                <i class="la la-diamond"></i>
                <div class="title">Promociones</div>
                <div class="h1" style="color:white;"><?php echo count($promociones) ?></div>
            </div>
        </div>
        </a>
    </div>

    <div class="col-xl-6">
        <a href="?action=verVisitas">
        <div class="widget widget-23 bg-warning d-flex justify-content-center align-items-center">
            <div class="widget-body text-center">
                <i class="ion ion-model-s"></i>
                <div class="title">Visitas</div>
                <div class="h1" style="color:white;"><?php echo count($visitas) ?></div>
            </div>
        </div>
        </a>
    </div>
</div>