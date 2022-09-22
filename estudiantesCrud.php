<?php
     
     if( !empty($_POST) ){
        $id_estudiante = utf8_decode($_POST["id_estudiante"]);
        $carnet = utf8_decode($_POST["carnet"]);
        $nombres = utf8_decode($_POST["nombres"]);
        $apellidos = utf8_decode($_POST["apellidos"]);
        $direccion = utf8_decode($_POST["direccion"]);
        $telefono = utf8_decode($_POST["telefono"]);
        $drop_genero = utf8_decode($_POST["drop_genero"]);
        $email = utf8_decode($_POST["email"]);
        $fecha_nacimiento = utf8_decode($_POST["fecha_nacimiento"]);
      include("datos_conexion.php");
        $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
        $sql ="";
        if(isset($_POST['btn_agregar'])  ){
          $sql = "INSERT INTO estudiantes(carnet,nombres,apellidos,direccion,telefono,genero,email,fecha_nacimiento) VALUES ('". $carnet ."','". $nombres ."','". $apellidos ."','". $direccion ."','". $telefono ."','". $drop_genero ."','". $email ."',". $fecha_nacimiento .");";
        }
        if( isset($_POST['btn_modificar'])  ){
          $sql = "update estudiantes set carnet='". $carnet ."',nombres='". $nombres ."',apellidos='". $apellidos ."',direccion='". $direccion ."',telefono='". $telefono ."',genero='". $drop_genero ."',email='". $email ."',fecha_nacimiento=". $fecha_nacimiento ." where id_estudiante = ". $id_estudiante.";";
        }
        if( isset($_POST['btn_eliminar'])  ){
          $sql = "delete from estudiantes  where id_estudiante = ". $id_estudiante.";";
        }
         
          if ($db_conexion->query($sql)===true){
            $db_conexion->close();
           
            header('Location: /segundo_php');
          }else{
            $db_conexion->close();
          
          }

      }
?>