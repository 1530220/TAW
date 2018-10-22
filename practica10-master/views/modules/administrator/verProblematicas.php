<?php 
	
	#------------------------------------
  #VER LOS DATOS DE LAS DIFERENTES PROBLEMATICAS -50%-
    #------------------------------------


	// Se declara un objeto del tipo MvcController
	$obj = new MvcController();

	// Se manda llamar al método para obtener todos los datos de los tutores
	// y se guardan en un array los registros encontrados
	$problems = $obj->getAllController("problematica");


 ?>


<section class="content-header">
  <br>
  <h1>
    Lista de problematicas registradas
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-exclamation-circle"></i>Problematicas</a></li>
    <li class="active">Ver problematicas</li>
  </ol>
  <br><br>
  	
  
<div class="box">
	
	<div class="box-body">
	  <table id="example1" class="table table-bordered table-striped">
	    <thead>
	    <tr>
	      <th> Tipo</th>
 			<th> Descripcion </th>
 			<th> Editar</th>
	    </tr>
	    </thead>
	    <tbody>
			<?php 
 				// Comienza el foreach
 				foreach($problems as $problem):
 					echo "<tr>"; // comienza un registro
 					echo "<td>" . $problem["nombre"] . "</td>";
 					echo "<td>" . $problem["descripcion"] . "</td>";
 			 ?>
 			 <!-- BOTÓN PARA EDITAR LOS DATOS DE LOS TUTORES-->
 			 <td><center><a href="index.php?enlace=editarProblematica&id=<?php echo($problem['id']) ?>"><i class="fa fa-pencil"></i></a></center></td>
 			</tr> <!-- Termina un registro -->
 		<!--TERMINA foreach-->
 		<?php endforeach; ?>
	    </tbody>
	    <tfoot>
	    <tr>
	      <tr>
	      <th> Tipo</th>
 			<th> Descripcion </th>
 			<th> Editar</th>
	    </tr>
	    </tr>
	    </tfoot>
	  </table>
	</div>	
</div>
          
</section>
