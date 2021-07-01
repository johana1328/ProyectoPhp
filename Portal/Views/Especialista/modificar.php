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
		<div class="card-header">Modificar Usuario</div>
		<div class="card-body">
		<?php
		  $mensaje="";
		  $documento=$data['especialista']['documento'];
		  $especialidad=$data['especialista']['especialidad'];
		  $ciudad=$data['especialista']['ciudad'];
		  $licencia=$data['especialista']['licencia'];
		  $fechaExpedicion=$data['especialista']['fechaExpedicion'];
		  $tipo=$data['especialista']['tipo'];
		  $nombre=$data['especialista']['nombre'];
		  $correo=$data['especialista']['correo'];
		  $celular=$data['especialista']['celular'];

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
					<label for="staticEmail" class="col-sm-2 col-form-label">Documento</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="documento" value="<?php echo $documento ?>"
							 placeholder="Documento" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nombre" value="<?php echo $nombre ?>"
							 placeholder="Nombre">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Especialidad</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="especialidad" value="<?php echo $especialidad ?>"
							 placeholder="Especialidad">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Ciudad</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="ciudad" value="<?php echo $ciudad ?>"
							 placeholder="Ciudad">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Licencia</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="licencia" value="<?php echo $licencia ?>"
							 placeholder="Licencia">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">FechaExpedicion</label>
					<div class="col-sm-10">
						<input type="date" pattern="yyyy/mm/dd" class="form-control" name="fechaExpedicion" value="<?php echo $fechaExpedicion ?>"
							 placeholder="FechaExpedicion">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Correo Electronico</label>
					<div class="col-sm-10">
						<input type="mail" class="form-control" name="correo" value="<?php echo $correo ?>"
							 placeholder="Correo Electronico">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Celular</label>
					<div class="col-sm-10">
						<input type="mail" class="form-control" name="celular" value="<?php echo $celular ?>"
							 placeholder="Celular">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="tipo">Tipo</label>
					<div class="col-sm-10">
						<select class="form-control" name="tipo"  id="tipo">
						<option value="ENFERMERA">Enfermera</option>
						<option  value="MEDICO">Medico</option>
					</select>
					</div>
				</div>
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
