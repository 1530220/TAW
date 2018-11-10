<?php  
    //instancia del controlador a usar
	$controller = new MvcController();
    //guardar los registros de premios
	$premios = $controller->getAllController("premios");
    //obtener los campos de un cliente que se busca gracias al id guardado en la sesion creada
    $cliente = $controller->getClienteIdController($_SESSION['id']);
    //guardar el campo puntos en una variable
    $puntos_cliente = $cliente['puntos'];
?>

<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center">
            <h1 class="page-header-title">Premios Disponibles</h1>
            <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="la la-gift"></i></a></li>
                    <li class="breadcrumb-item active">Premios Disponibles</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
<div class="col-xl-12">
<div class="widget has-shadow">
    <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>A continuación se listan los premios disponibles asi como los puntos que se requieren</h4>
    </div>
    <div class="widget-body">
        <div class="table-responsive">
            <h2>Mis puntos: <strong><?php echo $puntos_cliente ?></strong></h2><br>
            <table id="sorting-table" class="table mb-0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Puntos Requeridos</th>
                        <th>Visitas faltantes</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach ($premios as $premio) {?>
                    <tr>
                        <td><?php echo $premio['nombre'] ?></td>
                        <td><?php echo $premio['descripcion'] ?></td>
                        <td><?php echo $premio['puntos'] ?></td>
                        <td><?php 
                                if($puntos_cliente>=$premio['puntos']){
                                    echo "Puedes obtener este premio";
                                }else{
                                    $faltantes = $premio['puntos']-$puntos_cliente;
                                    if($faltantes%10==0){
                                        echo "Necesitas ".($faltantes/10)." visitas más";
                                    }else{
                                        echo "Necesitas ".(($faltantes/10)+1)." visitas más";
                                    }
                                }
                            ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>