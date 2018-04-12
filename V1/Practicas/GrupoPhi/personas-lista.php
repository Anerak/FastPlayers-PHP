<?php 
// *****************************************************************************
// Nombre: personas-lista.php
// Descripción: 
// Autor: 
// Fecha de creación: 
// Fecha de modificacion: 99/99/9999 Autor: xxx  Modificación: xxxxxxxx
//******************************************************************************

include("top.php");
?>

<body>

    <div id="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-1">
                    <h1>Listado de personas</h1>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary"  onClick="nueva()"><span class="glyphicon glyphicon-plus" aria-hidden="true"> Agregar persona</button>
                </div>
                
                
            </div>
			<br /><br />
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                             <table class="table table-striped table-bordered table-hover" id="dataTables-addControls">
                                    <thead>
                                        <tr>
                                        	<th>Acciones</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Telefono</th>
                                            <th>Email</th>
                                            <th>Ciudad</th>
                                            <th>Fecha Alta</th>
                                            <th>Ultimo Acceso</th>
                                            <th>Estado</th>
                                            <th>Borrar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$sql = "SELECT personas.id, personas.nombre, personas.apellido, personas.telefono, personas.email,
			personas.activo, personas.fechaAlta, personas.idCiudad, personas.ultimoAcceso, ciudades.ciudad
		FROM personas INNER JOIN ciudades ON personas.idCiudad = ciudades.idCiudad
		WHERE 1=1 
		ORDER BY apellido, nombre ";

$rs = mysqli_query($db, $sql);
if ( $rs ) {
	while ($r = mysqli_fetch_array($rs) ) {
?>
                                        <tr>
											<td><button type="button" class="btn btn-warning"  onClick="editar(<?php echo $r["id"] ?>)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></button></td>
                                            <td><?php  echo $r["nombre"]; ?></td>
                                            <td><?php  echo $r["apellido"]; ?></td>
                                            <td><?php  echo $r["telefono"]; ?></td>
                                            <td><?php  echo $r["email"]; ?></td>
                                            <td><?php  echo $r["ciudad"]; ?></td>
                                            <td><?php  echo mostrarFechaHora($r["fechaAlta"]); ?>
                                            <td><?php  if ($r["ultimoAcceso"]!="") { echo mostrarFechaHora($r["ultimoAcceso"]); } ?>
											<td><?php  if ($r["activo"]==1) { ?>
                                            				<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> 
												<?php  } else { ?>
                                            				<span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span> 
 												<?php  } ?></td>
                                            <td>
                                            	<button type="button" class="btn btn-danger" onClick="borrar(<?php echo $r["id"] ?>)">Borrar</button>
                                            </td>
										</tr>
<?php 
	}
}
?>
                                    </tbody>
                                </table>
                </div>
            </div>
    </div>





    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>



    <script>
    $(document).ready(function() {
        $('#dataTables-addControls').dataTable();
    });

	function borrar(id) {
		location.href = "personas-borrar.php?id=" + id;
	}

	function editar(id) {
		location.href = "personas-editar.php?id=" + id;
	}

	function nueva(id) {
		location.href = "personas-nueva.php";
	}
	
    </script>


</body>

</html>
