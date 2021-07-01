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
		<div class="card-header">CrearUsuario</div>
		<div class="card-body">
		
		 <?php 
		 $nombres="";
		 $apellidos="";
		 $codigo="";
		 $direccion="";
		 $documento="";
		 $correoElectronico="";
		 $celular="";
        if(array_key_exists("msgkO", $data)){
            $mensaje=$data['msgkO'];
            $nombres=$data['usuario']['nombres'];
            $apellidos=$data['usuario']['apellidos'];
            $codigo=$data['usuario']['codigo'];
            $direccion=$data['usuario']['direccion'];
            $documento=$data['usuario']['documento'];
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

			<form action="crear" method="post">
			<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Documento</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="documento" value="<?php echo $documento ?>"
							 placeholder="Documento">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Nombres</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nombres" value="<?php echo $nombres ?>"
							 placeholder="Nombres">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Apellidos</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="apellidos" value="<?php echo $apellidos ?>"
							 placeholder="Apellidos">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Correo Electronico</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="correoElectronico" value="<?php echo $correoElectronico ?>"
						 placeholder="Correo Electronico">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Celular</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="celular" value="<?php echo $celular ?>"
							 placeholder="Celular">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="tipo">Example select</label>
					<div class="col-sm-10">
						<select class="form-control" name="tipo"  id="tipo">
						<option>Administrador</option>
						<option>Contenido</option>
						<option>Normal</option>
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
