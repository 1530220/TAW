<?php  
    //instancia del controlador
    $controller = new MvcController();
    //obtener los clientes y se guardan en $clientes
    $clientes = $controller->getClientesController();
?>


<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center">
            <h1 class="page-header-title">Lista de Clientes</h1>
            <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="la la-user"></i></a></li>
                    <li class="breadcrumb-item active">Visitas</li>
                    <li class="breadcrumb-item active">Marcar Asistencia</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
<div class="col-xl-12">
<div class="widget has-shadow">
    <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Selecciona el cliente que asistio hoy al autolavado</h4>
    </div>
    <div class="widget-body">
        <div class="table-responsive">
            <table id="export-table" class="table mb-0">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>E-mail</th>
                        <th>Marcar Asistencia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $cliente) {?>
                    <tr>
                        <td><?php echo $cliente['nickname'] ?></td>
                        <td><?php echo $cliente['email'] ?></td>
                        <td>
                            <a href="?action=aumentarPuntos&cliente=<?php echo $cliente['id'] ?>&point=<?php echo $cliente['puntos'] ?>" class="btn btn-success"><i class="la la-check-circle-o"></i></a>
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