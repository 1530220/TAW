<?php  
    //instancia del controlador a usar
	$controller = new MvcController();
    //guardar los registros de premios
	$premios = $controller->getAllController("premios");
    if(isset($_GET['cambio'])){
        echo "<script>alert('Se han actualizado los datos del premio')</script>";
    }
?>

<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center">
            <h1 class="page-header-title">Premios</h1>
            <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="la la-gift"></i></a></li>
                    <li class="breadcrumb-item active">Premios</li>
                    <li class="breadcrumb-item active">Lista de premios</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
<div class="col-xl-12">
<div class="widget has-shadow">
    <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Lista de premios que da el autolavado</h4>
    </div>
    <div class="widget-body">
        <div class="table-responsive">
            <table id="export-table" class="table mb-0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Puntos Requeridos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                	<?php foreach ($premios as $premio) {?>
                    <tr>
                        <td><?php echo $premio['nombre'] ?></td>
                        <td><?php echo $premio['descripcion'] ?></td>
                        <td><?php echo $premio['puntos'] ?></td>
                        <td class="td-actions">
                            <a href="?action=editarPremio&id=<?php echo $premio['id'] ?>"><i class="la la-edit edit"></i></a>
                            <a href="?action=borrarPremio&id=<?php echo $premio['id'] ?>"><i class="la la-close delete"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>