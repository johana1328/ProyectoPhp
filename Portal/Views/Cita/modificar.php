<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="Mario Mendez Martinez">
<link href="../../public/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
.RbtnMargin {
	margin-left: 5px;
}
</style>
</head>

<body>

	<div class="card">
		<div class="card-header">Modificar cita</div>
		<div class="card-body">
		<?php
		   $mensaje="";
		   $id=$data['cita']['id'];
		   $especialista=$data['cita']['especialista'];
           $fecha=$data['cita']['fecha'];
           $hora=$data['cita']['hora'];
           $usuario=$data['cita']['usuario'];

		if(array_key_exists("msgkO", $data)){
		    $mensaje=$data['msgkO'];
		    echo <<<EOT
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error! </strong> $mensaje
                            <button type="button" class="close" data-dismiss="alert"aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                 EOT;
		}
		?>
		

			<form action="modificar" method="post">
			<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="tipo">Especialista</label>
					<div class="col-sm-10">
						<select class="form-control" name="especialista"  id="espcialista">
						<?php 
						 foreach ($data['especialistas'] as $especialista) {
							 echo '<option value="'.$especialista['documento'].'">'.$especialista['especialidad'].' '.$especialista['nombre'].'</option>';
						 }
						?>
					</select>
					</div>
				</div>
			<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Fecha</label>
					<div class="col-sm-10">
						<input type="date" class="form-control" name="fecha" value="<?php echo $fecha ?>"
							>
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Hora</label>
					<div class="col-sm-10">
						<input type="time" class="form-control" name="hora" value="<?php echo $hora ?>">
					</div>
				</div>
				<?php
					session_start();
					$documentoUsuario= $_SESSION['documento'];
				?>
				<input type="hidden" name="usuario" value="<?php echo $documentoUsuario ?>">
				<input type="hidden" name="id" value="<?php echo $id ?>">
				
				<div class="clearfix">
					<a class="btn btn-primary float-left" href="listar" role="button">Cancelar</a>
					<button type="submit" class="btn btn-primary float-right">Guardar</button>
				</div>
			</form>
		</div>
	</div>




	<script src="../../public/js/jquery-3.2.1.slim.min.js"></script>
	<script src="../../public/js/jquery-slim.min.js"></script>
	<script src="../../public/js/popper.min.js"></script>
	<script src="../../public/js/bootstrap.min.js"></script>
</body>
</html>
