<?php
    class camposInventarioProd{
        public $id_producto=0;
        public $producto='';
        public $precio=0;
        public $cantidad=0;
        public $id_categoria=0;
        public $activo='';

        function asignarValor($id_producto, $producto, $precio, $cantidad, $id_categoria, $activo){
            $this->id_producto=$id_producto;
            $this->producto=$producto;
            $this->precio=$precio;
            $this->cantidad=$cantidad;
            $this->id_categoria=$id_categoria;
            $this->activo=$activo;
        }
        function _get($atributo){
            if(isset($this->$atributo)){
                return $this->$atributo;
            }
        }
        function guardar(){
            if($this->id_producto>0){
                $sql="UPDATE inventario_producto SET producto='{$this->producto}',precio={$this->precio}, cantidad={$this->cantidad}, id_categoria={$this->id_categoria}, activo='{$this->activo}' WHERE id_producto={$this->id_producto};";
                mysqli_query(conexion::obtenerInstancia(), $sql);
                }
                else{
                $sql="INSERT INTO inventario_producto(producto,precio,cantidad,id_categoria,activo) VALUES('{$this->producto}',{$this->precio},{$this->cantidad},{$this->id_categoria},'{$this->activo}');";
                mysqli_query(conexion::obtenerInstancia(),$sql);
                }
        }
        static function listarInventarioProd(){
            $productos=array();
            $result=0;
            $sql="SELECT * FROM inventario_producto";
            $rs=mysqli_query(conexion::obtenerInstancia(),$sql);
            if(mysqli_num_rows($rs)>0){
                while($fila = mysqli_fetch_assoc($rs)){
                    $productos[]=$fila;
                }
            }
            return $productos;
        }
        function eliminar($id_producto){
            $sql="DELETE FROM inventario_producto WHERE id_producto=($id_producto)";
            mysqli_query(conexion::obtenerInstancia(),$sql);
        }
        function modificar($id_producto){
            $sql="SELECT * FROM inventario_producto WHERE  id_producto= ($id_producto)";
            $rs=mysqli_query(conexion::obtenerInstancia(), $sql);
            if(mysqli_num_rows($rs)>0){
                $fila=mysqli_fetch_assoc($rs);
                $this->id_producto=$fila{'id_producto'};
                $this->producto=$fila{'producto'};
                $this->precio=$fila{'precio'};
                $this->cantidad=$fila{'cantidad'};
                $this->id_categoria=$fila{'id_categoria'};
                $this->activo=$fila{'activo'};

            }
        }
    }
?>