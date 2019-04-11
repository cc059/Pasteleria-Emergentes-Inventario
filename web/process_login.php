<?php

session_start();
include 'db.php';

if(isset($_POST['btn_entrar']))
{
    $user=$_POST['usuario'];
    $password=$_POST['contraseña']; 
    $admin='Administrador';
    $vendedor='Vendedor';

    $query_admin = $mysqli->query("SELECT * FROM empleado WHERE usuario='$user' 
              AND contra='$password' AND cargo='$admin'") or die($mysqli->error());
    

    $query_ven = $mysqli->query("SELECT * FROM empleado WHERE usuario='$user' 
              AND contra='$password' AND cargo='$vendedor'") or die($mysqli->error());

    if(mysqli_num_rows($query_admin)==1)
    {
        $row = $query_admin->fetch_array();
        $_SESSION['user_id'] = $row['id_empleado'];
        header("location: index.php");
    }
    else if(mysqli_num_rows($query_ven)==1)
    {
        header("location: index_empleados.php");
    }
    else
    {
        echo "<script>alert('Usuario o contraseña son incorrectos')</script>";
        header("location: login.php");
    }
}