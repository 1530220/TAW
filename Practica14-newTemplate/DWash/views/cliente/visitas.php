<?php  
    //instancia del controlador a utilizar
	$controller = new MvcController();
    //obtener todas las visitas que tiene un cliente
	$visitas = $controller->getVisitasController($_SESSION['id']);
    //variable para contar visitas
    $i=1;
?>

<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center">
            <h1 class="page-header-title">Mis Visitas</h1>
            <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="ion ion-model-s"></i></a></li>
                    <li class="breadcrumb-item active">Mis Visitas</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
<div class="col-xl-12">
<div class="widget has-shadow">
    <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Lista de visitas realizadas</h4>
    </div>
    <div class="widget-body">
        <div class="table-responsive">
            <table id="sorting-table" class="table mb-0">
                <thead>
                    <tr>
                        <th>Visita</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach ($visitas as $visita) {?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $visita['fecha'] ?></td>
                        <td><?php echo $visita['hora'] ?></td>
                    </tr>
                    <?php $i++;} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
