<?php

session_start();

//Incluimos la conexion para podernos conectar a la base de datos
include 'db.php';

$id = 0;
$update = false;
$cantidad_compra = '';
$precio_compra = '';
$descuento_compra = '';

date_default_timezone_set('America/El_Salvador'); 
$date = date("d-m-Y");
$time = date("H:i:s"); 

//Si el boton btnSave ha sido presionado
if(isset($_POST['btnSave'])){
    //Guarda en una variable el contenido del campo que se puso
    $selected_prov = $_POST['cb_proveedores'];
    $selected_emp = $_POST['cb_empleados'];
    $selected_pago = $_POST['cb_tipospago'];
    $selected_materia_prima = $_POST['cb_materia_prima'];
    $cantidad_compra = $_POST['txtCantidad'];
    $precio_compra = $_POST['txtPrecio'];
    $descuento_compra = $_POST['txtDescuento'];

    
    //Ejecuta una consulta INSERT para poder insertar el dato pasando la variable
    $mysqli->query("INSERT INTO compra (id_proveedor, id_empleado, fecha_compra, hora, id_pago) 
                    VALUES($selected_prov, $selected_emp, '$date', '$time', $selected_pago)") or die($mysqli->error);

    //Ejecuta una consulta INSERT para poder insertar el dato pasando la variable
    $mysqli->query("INSERT INTO detalle_compra (id_compra, id_producto, cantidad, precio_uni, descuento) 
                    VALUES((SELECT MAX(id_compra) FROM compra), $selected_materia_prima,
                    $cantidad_compra, $precio_compra, $descuento_compra)") or die($mysqli->error);

    //Ejecuta una consulta INSERT para poder insertar el dato pasando la variable
    $mysqli->query("UPDATE inventario_materia_prima SET cantidad = cantidad + $cantidad_compra 
                    WHERE id_producto = $selected_materia_prima") or die($mysqli->error);


    //Creamos una sesion para mostrar un mensaje de exito al guardar un registro
    $_SESSION['message'] = "Se ha registrado la compra!";
    $_SESSION['msg_type'] = "success";

    //Hacemos que al presionar el boton con la accion regrese a la pagina principal de la tabla
    header("location: compras.php");
}

//En caso que le de click al boton eliminar
if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM compra WHERE id_compra=$id") or die($mysqli->error());

    $_SESSION['message'] = "Se ha eliminado la compra!";
    $_SESSION['msg_type'] = "danger";

    
    header("location: compras.php");
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