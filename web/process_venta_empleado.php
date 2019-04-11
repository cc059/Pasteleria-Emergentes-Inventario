<?php

session_start();

//Incluimos la conexion para podernos conectar a la base de datos
include 'db.php';

$id = 0;
$update = false;
$cantidad_venta = '';
$precio_venta = '';
$descuento_venta = '';

date_default_timezone_set('America/El_Salvador'); 
$date = date("d-m-Y");
$time = date("H:i:s"); 

//Si el boton btnSave ha sido presionado
if(isset($_POST['btnSave'])){
    //Guarda en una variable el contenido del campo que se puso
    $selected_cli = $_POST['cb_clientes'];
    $selected_emp = $_POST['cb_empleados'];
    $selected_pago = $_POST['cb_tipospago'];
    $selected_producto = $_POST['cb_producto'];
    $cantidad_venta = $_POST['txtCantidad'];
    $precio_venta = $_POST['txtPrecio'];
    $descuento_venta = $_POST['txtDescuento'];

    
    //Ejecuta una consulta INSERT para poder insertar el dato pasando la variable
    $mysqli->query("INSERT INTO venta (id_cliente, id_empleado, fecha_venta, id_pago, hora) 
                    VALUES($selected_cli, $selected_emp, '$date', $selected_pago, '$time')") or die($mysqli->error);

    //Ejecuta una consulta INSERT para poder insertar el dato pasando la variable
    $mysqli->query("INSERT INTO detalle_venta (id_venta, id_producto, cantidad, precio_uni, descuento) 
                    VALUES((SELECT MAX(id_venta) FROM venta), $selected_producto,
                    $cantidad_venta, $precio_venta, $descuento_venta)") or die($mysqli->error);

    //Ejecuta una consulta INSERT para poder insertar el dato pasando la variable
    $mysqli->query("UPDATE inventario_producto SET cantidad = cantidad - $cantidad_venta 
                    WHERE id_producto = $selected_producto") or die($mysqli->error);


    //Creamos una sesion para mostrar un mensaje de exito al guardar un registro
    $_SESSION['message'] = "Se ha registrado la venta!";
    $_SESSION['msg_type'] = "success";

    //Hacemos que al presionar el boton con la accion regrese a la pagina principal de la tabla
    header("location: ventas_empleados.php");
}

//En caso que le de click al boton eliminar
if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM tipos_pago WHERE id_pago=$id") or die($mysqli->error());

    $_SESSION['message'] = "Se ha eliminado el tipo de pago!";
    $_SESSION['msg_type'] = "danger";

    
    header("location: tipos_pago.php");
}

//En caso que le de click al boton editar
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