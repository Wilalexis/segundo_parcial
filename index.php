<!doctype html>
<html lang="en">

<head>
<link rel="icon" href="Imagenes/escribir.png">
  <title>Estudiantes</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body>
  <main>
    

    <div class="container">
    <h1>Formulario estudiantes</h1>
        <form class="d-flex" action="estudiantesCrud.php" method="post">
            <div class="col">
            <div class="mb-3">
                    <label for="" class="lbl_id">Id</label>
                    <input type="text" name="id_estudiante" id="id_estudiante" class="form-control" value="0" readonly>                    
                </div>
                <div class="mb-3">
                    <label for="" class="carnet">Carnet</label>
                    <input type="text" name="carnet" id="carnet" class="form-control" placeholder="Carnet: E001" required>                    
                </div>
                <div class="mb-3">
                    <label for="" class="lbl_nombre">Nombre</label>
                    <input type="text" name="nombres" id="nombres" class="form-control" placeholder="" required>                    
                </div>
                <div class="mb-3">
                    <label for="" class="lbl_apellido">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="" required>                    
                </div>
                <div class="mb-3">
                    <label for="" class="lbl_direccion">Direccion</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="" required>                    
                </div>
                <div class="mb-3">
                    <label for="" class="lbl_telefono">Telefono</label>
                    <input type="number" name="telefono" id="telefono" class="form-control" placeholder="" required>                    
                </div>
                <div class="mb-3">
                <label for="exampleDataList" class="form-label">Genero</label>
                <select class="form-control" id="drop_genero"  name="drop_genero">
                    <option>---Elija su genero---</option>
                    <option value=1>Hombre</option>
                    <option value=0>Mujer</option>
                </select>
                <div class="form-group">
                    <label for="correo_electronico">Correo electronico:</label>
                    <input type="text" class="form-control" id="email" placeholder="Ingrese correo electronico" name="email">
                </div>
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento"  name="fecha_nacimiento">
                </div>
                <br><br>
                <div class="mb-3">                
                    <input type="submit" name="btn_agregar" id="btn_agregar" class="btn btn-primary" value="Agregar">                    
                    <input type="submit" name="btn_modificar" id="btn_modificar" class="btn btn-success" value="Modificar">
                    <input type="submit" name="btn_eliminar" id="btn_eliminar" class="btn btn-danger" value="Eliminar">
                </div>
            </div>
        </form>

        <br><br>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-light">
                    <caption>Tabla Estudiantes</caption>
                    <tr>
                        <th>Carnet</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Genero</th>
                        <th>Email</th>
                        <th>fecha de nacimiento</th>
                    </tr>
                    </thead>
                    <tbody id="tbl_empleados">
                    <?php 
                        include("datos_conexion.php");
                        $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
                        $db_conexion -> real_query ("select  e.id_estudiante as id,e.carnet,e.nombres,e.apellidos,e.direccion,e.telefono, e.genero, e.email, e.fecha_nacimiento from estudiantes as e;");
                        $resultado = $db_conexion -> use_result();
                        while ($fila = $resultado ->fetch_assoc()){
                            echo "<tr data-id=". $fila['id'].">";
                            echo "<td>". $fila['carnet']."</td>";
                            echo "<td>". $fila['nombres']."</td>";
                            echo "<td>". $fila['apellidos']."</td>";
                            echo "<td>". $fila['direccion']."</td>";
                            echo "<td>". $fila['telefono']."</td>";
                            echo "<td>". $fila['genero']."</td>";
                            echo "<td>". $fila['email']."</td>";
                            echo "<td>". $fila['fecha_nacimiento']."</td>";
                            echo "</tr>";
                        }
                        $db_conexion ->close();
                    ?>
                    </tbody>
                    
            </table>
        </div>
        


    </div>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>
  <script>
    function limpiar(){
        $("#id").val(0);
        $("#carnet").val('');
        $("#nombres").val('');
        $("#apellidos").val('');
        $("#direccion").val('');
        $("#telefono").val('');
        $("#drop_genero").val('');
        $("#email").val('');
        $("#fecha_nacimiento").val('');
        
        
    }
    $('#tbl_empleados').on('click','tr td',function(evt){
        var target,id_estudiante,carnet,nombres,apellidos,direccion,telefono,drop_genero,email,fecha_nacimiento
    target = $(event.target)
    id_estudiante = target.parent().data('id');
    carnet = target.parents("tr").find("td").eq(0).html()
    nombres = target.parents("tr").find("td").eq(1).html()
    apellidos = target.parents("tr").find("td").eq(2).html()
    direccion = target.parents("tr").find("td").eq(3).html()
    telefono = target.parents("tr").find("td").eq(4).html()
    drop_genero = target.parents("tr").find("td").eq(5).html()
    email = target.parents("tr").find("td").eq(6).html()
    fecha_nacimiento = target.parents("tr").find("td").eq(7).html()
    
    $("#id_estudiante").val(id_estudiante)
    $("#carnet").val(carnet)
    $("#nombres").val(nombres)
    $("#apellidos").val(apellidos)
    $("#direccion").val(direccion)
    $("#telefono").val(telefono)
    $("#email").val(email)
    $("#drop_genero").val(drop_genero)
    $("#fecha_nacimiento").val(fecha_nacimiento)
  })
  </script>
</body>

</html>