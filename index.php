<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


    <link rel="stylesheet" href="css/estilos.css">
   

    <title>CRUD con PHP, PDO, Ajax y DataTables.js </title>
  </head>
  <body>
  <div class="container fondo">
		<h1 class="text-center">CRUD con PHP, PDO, Ajax y Datatables.js</h1>
		
		</a>
		<div class="row">
			<div class="col-2 offset-10">
				<div class="text-center">
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalUsuario" id="botonCrear">
						<i class="bi bi-plus-circle-fill"></i> Crear
					</button>
				</div>
			</div>
		</div>
		<br /><br />
		<div class="table-responsive">
			<table id="datos_usuario" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Teléfono</th>
						<th>Email</th>
						<th>Imagen</th>
						<th>Fecha de Creación</th>
						<th>Editar</th>
						<th>Borrar</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>

<!-- Modal -->
	<!-- Button trigger modal -->
	<div class="modal fade" id="modalUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">
						Ingresar Nuevo Usuario al Registro
					</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<!-- Formulario para que el usuario ingrese los datos -->
				<!-- 'multipart/form-data': Sirve para permitir la subida de archivo imagen -->
				<form method="POST" id="formulario" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-body">
							<label for="nombre">Ingrese el Nombre</label>
							<input type="text" name="nombre" id="nombre" class="form-control">
							<br />
							<label for="apellidos">Ingrese los Apellidos</label>
							<input type="text" name="apellidos" id="apellidos" class="form-control">
							<br />
							<label for="telefono">Ingrese el Telefono</label>
							<input type="number" min="3000000000" name="telefono" id="telefono" class="form-control">
							<br />
							<label for="email">Ingrese el E-mail</label>
							<input type="email" name="email" id="email" class="form-control">
							<br />
							<label for="imagen_usuario">Seleccione una imagen</label>
							<input type="file" name="imagen_usuario" id="imagen_usuario" class="form-control">
							<span id="imagen_subida"></span>
							<br />
						</div>
						<!-- Modal - Footer -->
						<div class="modal-footer">
							<input type="hidden" name="id_usuario" id="id_usuario">
							<input type="hidden" name="operacion" id="operacion">
							<input type="submit" name="action" id="action" class="btn btn-success" value="Crear">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>













 <!-- SCRIPTS -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" integrity="sha256-/xUj+30JU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="></script>

   <script type="text/javascript">
    $(document).ready(function(){
        var dataTable = $('#datos_usuario').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
                url:"obtener_todos_registros.php",
                type: "POST"
            },
            "columnsDefs":[{
                "targets": [0,3,4],
                "orderable":false,
            }
            ]
        });
    });
   </script>


  </body>
</html>