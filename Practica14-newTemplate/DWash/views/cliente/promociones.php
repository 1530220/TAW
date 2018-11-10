<?php  
    //instancia del controlador a usar
	$controller = new MvcController();
    //guardar los registros de promociones
	$promociones = $controller->getAllController("promociones");
?>

<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center">
            <h1 class="page-header-title">Promociones</h1>
            <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="la la-diamond"></i></a></li>
                    <li class="breadcrumb-item active">Promociones</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
<div class="col-xl-12">
<div class="widget has-shadow">
    <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Lista de promociones que posee el autolavado</h4>
    </div>
    <div class="widget-body">
        <div class="table-responsive">
            <table id="sorting-table" class="table mb-0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach ($promociones as $promocion) {?>
                    <tr>
                        <td><?php echo $promocion['nombre'] ?></td>
                        <td><?php echo $promocion['descripcion'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>