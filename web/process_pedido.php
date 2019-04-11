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
$date = date("Y-m-d");
$time = date("H:i:s"); 

//Si el boton Pedir ha sido presionado
if(isset($_POST['Pedir'])){
    //Guarda en una variable el contenido del campo que se puso
    $selected_cli = $_POST['cb_pedido_clientes'];
    $selected_emp = $_POST['cb_pedido_empleado'];
    $selected_pago = $_POST['cb_tipospago'];
    $selected_producto = $_POST['cb_producto'];
    $fecha_pedido = $_POST['fecha_pedido'];
    $fecha_entrega = $_POST['fecha_entrega'];
    $cantidad_venta = $_POST['txtCantidad'];
    $precio_venta = $_POST['txtPrecio'];
    $descuento_venta = $_POST['txtDescuento'];
    
    
    //Ejecuta una consulta INSERT para poder insertar el dato pasando la variable
    $mysqli->query("INSERT INTO pedidos (id_cliente, id_empleado, fecha_pedido, fecha_entrega, entregado, id_pago) 
                    VALUES($selected_cli, $selected_emp, $fecha_pedido, $fecha_entrega, 'no', $selected_pago)") or die($mysqli->error);

    //Ejecuta una consulta INSERT para poder insertar el dato pasando la variable
    $mysqli->query("INSERT INTO detalle_pedido (id_pedido, id_producto, cantidad, precio_uni, descuento) 
                    VALUES((SELECT MAX(id_pedido) FROM pedidos), $selected_producto,
                    $cantidad_venta, $precio_venta, $descuento_venta)") or die($mysqli->error);


    //Creamos una sesion para mostrar un mensaje de exito al guardar un registro
    $_SESSION['message'] = "Se ha registrado la venta!";
    $_SESSION['msg_type'] = "success";

    //Hacemos que al presionar el boton con la accion regrese a la pagina principal de la tabla
    header("location: pedidos.php");
}

//En caso que le de click al boton entregado
if(isset($_GET['btn_entregado']))
{
        //Ejecuta una consulta INSERT para poder insertar el dato pasando la variable
        $mysqli->query("UPDATE inventario_producto SET cantidad = cantidad - $cantidad_venta 
        WHERE id_producto = $selected_producto") or die($mysqli->error);

}


//En caso que le de click al boton eliminar
if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM pedidos WHERE id_pedido=$id") or die($mysqli->error());

    $_SESSION['message'] = "Se ha eliminado el pedido!";
    $_SESSION['msg_type'] = "danger";

    
    header("location: pedidos.php");
}

//En caso que le de click al boton editar
if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM pedidos WHERE id_pedido=$id") or die($mysqli->error());
    //Verificar si existe es registro
    if (count($result)==1){
        $row = $result->fetch_array();
        $id = $row['id_pedido'];
    }
}

//Para el boton actualizar en la variable $id le colocamos el id del registro que lo colocamos en un input tipo hidden
//Y le pasamos el valor del campo txt
if (isset($_POST['btnUpdate'])){
        $id = $_POST['id_pedido'];
        $selected_cli = $_POST['cb_pedido_clientes'];
        $selected_emp = $_POST['cb_pedido_empleado'];
        $selected_pago = $_POST['cb_tipospago'];
        $selected_producto = $_POST['cb_producto'];
        $fecha_pedido = $_POST['fecha_pedido'];
        $fecha_entrega = $_POST['fecha_entrega'];
        $cantidad_venta = $_POST['txtCantidad'];
        $precio_venta = $_POST['txtPrecio'];
        $descuento_venta = $_POST['txtDescuento'];

        $mysqli->query("UPDATE pedidos SET id_cliente=$selected_cli,id_empleado=$selected_emp,fecha_pedido='$fecha_pedido',fecha_entrega='$fecha_entrega',entregado='No', id_pago=$selected_pago WHERE id_pedido=$id") or
            die($mysqli->error);

        $_SESSION['message'] = "El registro ha sido actualizado!";
        $_SESSION['msg_type'] = "warning";

        header('location: pedidos.php');
}