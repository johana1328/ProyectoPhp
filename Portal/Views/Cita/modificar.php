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
		<div class="card-header">Modificar Enciclopedia Medica</div>
		<div class="card-body">
		<?php
		  $mensaje="";
		  $nombre=$data['enciclopedia']['nombre'];
            $descripcion=$data['enciclopedia']['descripcion'];
            $sintomas=$data['enciclopedia']['sintomas'];
            $recomendaciones=$data['enciclopedia']['recomendaciones'];
			$id=$data['enciclopedia']['id'];

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
					<label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="id" value="<?php echo $id ?>"
							 placeholder="Id" readonly>
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
					<label for="staticEmail" class="col-sm-2 col-form-label">Descripción</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" name="descripcion" value=""
							 placeholder="Descripción"><?php echo $descripcion ?></textarea>
					</div>
				</div>
				<div class="form-group">
    				<label for="exampleFormControlTextarea1">Sintomas</label>
    				<textarea class="form-control"name="sintomas" value=""rows="3"><?php echo $sintomas ?></textarea>
  				</div>
				  <div class="form-group">
    				<label for="exampleFormControlTextarea1">Recomendaciones</label>
    				<textarea class="form-control" name="recomendaciones" value="" rows="3"><?php echo $recomendaciones ?></textarea>
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
