<?php  
	$controller = new MvcController();//Obtener la instacia del controlador

	//Obtener premios, visitas y promociones, para despues usar la function count para cantidad de cada uno
	$premios = $controller->getAllController("premios");
	$promociones = $controller->getAllController("promociones");

	$visitas = $controller->getVisitasController($_SESSION['id']);

    if(isset($_GET['cambio'])){
        echo "<script>alert('Se ha actualizado tu contraseña exitosamente')</script>";
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
        <a href="?action=visitas">
        <div class="widget widget-23 bg-primary d-flex justify-content-center align-items-center">
            <div class="widget-body text-center">
                <i class="ion ion-navicon-round"></i>
                <div class="title">Mis visitas</div>
                <div class="h1" style="color:white;"><?php echo count($visitas) ?></div>
            </div>
        </div>
        </a>
    </div>

    <div class="col-xl-6">
        <a href="?action=premios">
        <div class="widget widget-23 bg-info d-flex justify-content-center align-items-center">
            <div class="widget-body text-center">
                <i class="ti ti-gift"></i>
                <div class="title">Premios Disponibles</div>
                <div class="h1" style="color:white;"><?php echo count($premios) ?></div>
            </div>
        </div>
        </a>
    </div>

    <div class="col-xl-6">
        <a href="?action=clima">
        <div class="widget widget-23 bg-warning d-flex justify-content-center align-items-center">
            <div class="widget-body text-center">
                <i class="ion ion-cloud"></i>
                <div class="title"><br></div>
                <div class="h1" style="color:white;"><?php echo "Ver clima" ?></div>
            </div>
        </div>
        </a>
    </div>

    <div class="col-xl-6">
        <a href="?action=promociones">
        <div class="widget widget-23 bg-danger d-flex justify-content-center align-items-center">
            <div class="widget-body text-center">
                <i class="la la-diamond"></i>
                <div class="title">Promociones Disponibles</div>
                <div class="h1" style="color:white;"><?php echo count($promociones) ?></div>
            </div>
        </div>
        </a>
    </div>

</div>