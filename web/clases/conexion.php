<?php
class conexion{
    private static $objetoConexion=null;
    private static $instancia=null;

    public static function obtenerInstancia(){
        if(self::$objetoConexion==null){
            self::$instancia==new conexion();
            self::$objetoConexion=mysqli_connect(BD_HOST, BD_USER, BD_PASS,BD_NAME);

        }
        return self::$objetoConexion;
    }
}
