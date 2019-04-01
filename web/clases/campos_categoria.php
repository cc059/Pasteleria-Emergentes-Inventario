<?php
    class camposCategoria{
        private $id_categoria=0;
        private $nombre_categoria='';
    
        function asignarValor($id_categoria, $nombre_categoria){
            $this->id_categoria=$id_categoria;
            $this->nombre_categoria=$nombre_categoria;
        }

        function _get($atributo){
            if(isset($this->$atributo)){
                return $this->$atributo;
            }
        }
        function guardar(){
            if($this->id_categoria>0){
            $sql="UPDATE categoria SET nombre_categoria='{$this->nombre_categoria}' WHERE id_categoria={$this->id_categoria};";
            mysqli_query(conexion::obtenerInstancia(), $sql);

            }
            else{
            $sql="INSERT INTO categoria (nombre_categoria) VALUES ('{$this->nombre_categoria}');";
            mysqli_query(conexion::obtenerInstancia(), $sql);
            }
        }
        static function listarCategorias(){
            $categorias=array();
            $result=0;
            $sql="SELECT * FROM categoria;";
            $rs=mysqli_query(conexion::obtenerInstancia(), $sql);
            if(mysqli_num_rows($rs)>0) {
                while ($fila = mysqli_fetch_assoc($rs)){
                    $categorias[] = $fila;
                }
            }
            return $categorias;
        }
        function eliminar($id_categoria){
            $sql="DELETE FROM categoria WHERE id_categoria=($id_categoria)";
            mysqli_query(conexion::obtenerInstancia(),$sql);
        }
        function modificar($id_categoria){
            $sql="SELECT * FROM categoria WHERE  id_categoria= ($id_categoria)";
            $rs=mysqli_query(conexion::obtenerInstancia(), $sql);
            if(mysqli_num_rows($rs)>0){
                $fila=mysqli_fetch_assoc($rs);
                $this->id_categoria=$fila{'id_categoria'};
                $this->nombre_categoria=$fila{'nombre_categoria'};
            }
        }

    }
?>