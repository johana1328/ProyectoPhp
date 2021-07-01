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
		 $nit="";
		 $razonsocial="";
		 $representanteLegal="";
		 $correoElectronico="";
		 $telefono="";
		 $web="";
		 $ciudad="";
		 $capacidad="";
        if(array_key_exists("msgkO", $data)){
            $mensaje=$data['msgkO'];
            $nit=$data['usuario']['nit'];
            $razonsocial=$data['usuario']['razonsocial'];
            $representanteLegal=$data['usuario']['representanteLegal'];
            $correoElectronico=$data['usuario']['correoElectronico'];
            $telefono=$data['usuario']['telefono'];
			$web=$data['usuario']['web'];
			$ciudad=$data['usuario']['ciudad'];
			$capacidad=$data['usuario']['capacidad'];
			
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
					<label for="staticEmail" class="col-sm-2 col-form-label">Nit</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nit" value="<?php echo $nit ?>"
							 placeholder="Nit">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Razon social</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="razonsocial" value="<?php echo $razonsocial ?>"
							 placeholder="Razon social">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Reprecentante Legal</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="representanteLegal" value="<?php echo $representanteLegal ?>"
							 placeholder="Reprecentante Legal">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Correo Electronico</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="correoElectronico" value="<?php echo $correoElectronico ?>"
							 placeholder="Correo Electronico">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Telefono</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="telefono" value="<?php echo $telefono ?>"
							 placeholder="Telefono">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Pagina Web</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="web" value="<?php echo $web ?>"
							 placeholder="Pagina Web">
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
					<label for="staticEmail" class="col-sm-2 col-form-label">Capacidad</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="capacidad" value="<?php echo $capacidad ?>"
							 placeholder="Capacidad">
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
