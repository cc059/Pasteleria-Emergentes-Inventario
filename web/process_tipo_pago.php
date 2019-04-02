<?php

session_start();

//Incluimos la conexion para podernos conectar a la base de datos
include 'db.php';

$id = 0;
$update = false;
$tipo_pago = '';

//Si el boton btnSave ha sido presionado
if(isset($_POST['btnSave'])){
    //Guarda en una variable el contenido del campo que se puso
    $tipo_pago = $_POST['txtTipoPago'];
    
    //Ejecuta una consulta INSERT para poder insertar el dato pasando la variable
    $mysqli->query("INSERT INTO tipos_pago (tipo) VALUES('$tipo_pago')") or
        die($mysqli->error);

    //Creamos una sesion para mostrar un mensaje de exito al guardar un registro
    $_SESSION['message'] = "Se ha guardado el tipo de pago!";
    $_SESSION['msg_type'] = "success";

    //Hacemos que al presionar el boton con la accion regrese a la pagina principal de la tabla
    header("location: tipos_pago.php");
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM tipos_pago WHERE id_pago=$id") or die($mysqli->error());

    $_SESSION['message'] = "Se ha eliminado el tipo de pago!";
    $_SESSION['msg_type'] = "danger";

    
    header("location: tipos_pago.php");
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM tipos_pago WHERE id_pago=$id") or die($mysqli->error());
    //Verificar si existe es registro
    if (count($result)==1){
        $row = $result->fetch_array();
        $tipo_pago = $row['tipo'];
    }
}

//Para el boton actualizar en la variable $id le colocamos el id del registro que lo colocamos en un input tipo hidden
//Y le pasamos el valor del campo txt
if (isset($_POST['btnUpdate'])){
        $id = $_POST['id_pago'];
        $tipo_pago = $_POST['txtTipoPago'];

        $mysqli->query("UPDATE tipos_pago SET tipo='$tipo_pago' WHERE id_pago=$id") or
            die($mysqli->error);

        $_SESSION['message'] = "El registro ha sido actualizado!";
        $_SESSION['msg_type'] = "warning";

        header('location: tipos_pago.php');
}