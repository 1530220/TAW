<?php  
	$controller = new MvcController();
	$visitas = $controller->getAllController("visitas");

	$clientes = $controller->getClientesController();
?>

<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center">
            <h1 class="page-header-title">Visitas</h1>
            <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="ion ion-model-s"></i></a></li>
                    <li class="breadcrumb-item active">Visitas</li>
                    <li class="breadcrumb-item active">Lista de Visitas</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
<div class="col-xl-12">
<div class="widget has-shadow">
    <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Lista de visitas realizadas por clientes al autolavado</h4>
    </div>
    <div class="widget-body">
        <div class="table-responsive">
            <table id="export-table" class="table mb-0">
                <thead>
                    <tr>
                        <th>Numero de visita</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach ($visitas as $visita) {

                	foreach ($clientes as $cliente){
                		if($visita['idUsuario']==$cliente['id']){
                			$nombreCliente = $cliente['nickname'];
                			break;
                		}
                	}
                		
                	?>
                    <tr>
                        <td><?php echo $visita['id'] ?></td>
                        <td><?php echo $nombreCliente ?></td>
                        <td><?php echo $visita['fecha'] ?></td>
                        <td><?php echo $visita['hora'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>