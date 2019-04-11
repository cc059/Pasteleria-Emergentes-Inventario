<?php
//Se conectara a la base de datos y si ocurre un error mostrara el error
$mysqli = new mysqli('localhost', 'root', '', 'pasteleria_bd') or die(mysqli_error($mysqli));
