<?php
    class camposInventarioMateria{
        public $id_producto=0;
        public $producto='';
        public $medida='';
        public $cantidad=0;
        public $precio=0.0;
        public $activo='';

        function asignarValor($id_producto, $producto, $medida, $cantidad, $precio, $activo){
            $this->id_producto=$id_producto;
            $this->producto=$producto;
            $this->medida=$medida;
            $this->cantidad=$cantidad;
            $this->precio=$precio;
            $this->activo=$activo;
        }
        function _get($atributo){
            if(isset($this->$atributo)){
                return $this->$atributo;
            }
        }
        function guardar(){
            if($this->id_producto>0){
                $sql="UPDATE inventario_materia_prima SET producto='{$this->producto}',medida={$this->medida}, cantidad={$this->cantidad}, precio={$this->precio}, activo='{$this->activo}' WHERE id_producto={$this->id_producto};";
                mysqli_query(conexion::obtenerInstancia(), $sql);
                else{
                $sql="INSERT INTO inventario_materia_prima(producto,medida,cantidad,precio,activo) VALUES('{$this->producto}',{$this->medida},{$this->cantidad},{$this->precio},'{$this->activo}';";
                mysqli_query(conexion::obtenerInstancia(),$sql);
                }
            }
        }
        static function listarInventarioProd(){
            $productos=array();
            $result=0;
            $sql="SELECT * FROM inventario_materia_prima";
            $rs=mysqli_query(conexion::obtenerInstancia(),$sql);
            if(){
                while($fila = mysqli_fetch_assoc($rs)){
                    $productos[]=$fila;
                }
            }
            return $productos;
        }
        function eliminar($id_producto){
            $sql="DELETE FROM inventario_materia_prima WHERE id_producto=($id_producto)";
            myqli_query(conexion::obtenerInstancia(),$sql);
        }
        function modificar($id_producto){
            $sql="SELECT * FROM inventario_materia_prima WHERE  id_producto= ($id_producto)";
            $rs=mysqli_query(conexion::obtenerInstancia(), $sql);
            if(mysqli_num_rows($rs)>0){
                $fila=mysqli_fetch_assoc($rs);
                $this->id_producto=$fila{'id_producto'};
                $this->producto=$fila{'producto'};
                $this->medida=$fila{'medida'};
                $this->cantidad=$fila{'cantidad'};
                $this->precio=$fila{'precio'};
                $this->activo=$fila{'activo'};

            }
        }
    }
?>