<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="Mario Mendez Martinez">
<link href="../../public/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

	<div class="card">
		<div class="card-header">Especialistas</div>
		<div class="card-body">
        <?php 
        if(array_key_exists("msgOk", $data)){
            $mensaje=$data['msgOk'];
            echo <<<EOT
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <strong>OK! </strong> $mensaje
                            <button type="button" class="close" data-dismiss="alert"aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>     
                 EOT;
          }
          
          
        ?>


			

			<div class="float-right pb-2">
				<a href="redirecionar?vista=crear" class="btn btn-primary">Crear Especialista</a>
			</div>
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Documento</th>
						<th scope="col">Nombre</th>
						<th scope="col">Especialidad</th>
						<th scope="col">Licencia</th>
						<th scope="col">Ente Salud</th>
            <th scope="col">Tipo</th>
						<th scope="col">Acciones</th>
					</tr>
				</thead>
				<tbody>
 <?php
   session_start();
   $enteS= $_SESSION['ente'];
foreach ($data['especialistas'] as $especialista) {
  if($enteS == 'NA' ||  $enteS == $especialista['ente']){ 
    echo "<tr>";
    echo "<th scope='row'>" . $especialista['documento'] . "</th>";
    echo "<td>" . $especialista['nombre'] . "</td>";
    echo "<td>" . $especialista['especialidad'] . "</td>";
    echo "<td>" . $especialista['licencia'] . "</td>";
    echo "<td>" . $especialista['razonsocial'] . "</td>";
    echo "<td>" . $especialista['tipo'] . "</td>";
    echo '<td>
          <a href="eliminar?documento=' . $especialista['documento'] . '" >
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
         </svg>
         </a>
         <a href="redirecionar?vista=modificar&documento=' . $especialista['documento'] . '" >
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
           </svg>
         </a>
         </td>';
  }
}
?>
  </tbody>
			</table>
		</div>
	</div>




	<script src="../../public/js/jquery-3.2.1.slim.min.js"></script>
	<script src="../../public/js/jquery-slim.min.js"></script>
	<script src="../../public/js/popper.min.js"></script>
	<script src="../../public/js/bootstrap.min.js"></script>
</body>
</html>
