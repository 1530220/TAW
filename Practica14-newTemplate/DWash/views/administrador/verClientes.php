<?php  
    //instancia del controlador
    $controller = new MvcController();
    //obtener los clientes y se guardan en $clientes
    $clientes = $controller->getClientesController();

    if(isset($_GET['cambio'])){
        echo "<script>alert('Se han actualizado los datos del cliente')</script>";
    }
?>


<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center">
            <h1 class="page-header-title">Clientes</h1>
            <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="la la-user"></i></a></li>
                    <li class="breadcrumb-item active">Clientes</li>
                    <li class="breadcrumb-item active">Lista de clientes</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
<div class="col-xl-12">
<div class="widget has-shadow">
    <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Lista de clientes registrados en el sistema</h4>
    </div>
    <div class="widget-body">
        <div class="table-responsive">
            <table id="export-table" class="table mb-0">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>E-mail</th>
                        <th>Puntos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $cliente) {?>
                    <tr>
                        <td><?php echo $cliente['nickname'] ?></td>
                        <td><?php echo $cliente['email'] ?></td>
                        <td><?php echo $cliente['puntos'] ?></td>
                        <td class="td-actions">
                            <a href="?action=editarCliente&id=<?php echo $cliente['id'] ?>"><i class="la la-edit edit"></i></a>
                            <a href="?action=borrarCliente&id=<?php echo $cliente['id'] ?>"><i class="la la-close delete"></i></a>
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