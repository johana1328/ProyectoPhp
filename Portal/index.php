<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="Mario Mendez Martinez">
<title>RVS</title>
<link href="public/css/bootstrap.min.css" rel="stylesheet">
<link href="public/css/dashboard.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Red vallecaucana de salud</a>
      
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Salir</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Menu</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" onclick="redirect('Views/usuario/listar');return false;" href="#">
                  <span data-feather="file-text"></span>
                  Usuarios
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" onclick="redirect('Views/ente/listar');return false;" href="#">
                  <span data-feather="file-text"></span>
                  Entes de salud
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" onclick="redirect('Views/especialista/listar');return false;" href="#">
                  <span data-feather="file-text"></span>
                  Especialistas
                </a>
              </li>
            </ul>
          </div>
        </nav>

	< <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
		<form action="" id="redirect" target="iframaAction"></form>
		<div class="embed-responsive embed-responsive-21by9">
			<iframe id="iframaAction" name="iframaAction"
				class="embed-responsive-item" style="max-height: 100vh;"
				allowfullscreen></iframe>
		</div>

	</main>
	<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
	<script src="public/js/jquery-3.2.1.slim.min.js"></script>
	<script src="public/js/jquery-slim.min.js"></script>
	<script src="public/js/popper.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
	<script src="public/js/mains.js"></script>

</body>
</html>
