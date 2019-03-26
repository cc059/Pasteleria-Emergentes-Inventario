<?php
    class camposCategoria{
        private $id_categoria=0;
        private $nombre_categoria='';
    
        function asignarValor($id_categoria, $nombre_categoria){
            $this->id_categoria=$id_categoria;
            $this->nombre_categoria=$nombre_categoria;
        }

        function _get($atributo){
            if($isset($this->$atributo)){
                return $this->$atributo;
            }
        }
        function guardar(){
            $sql="INSERT INTO categoria (nombre_categoria) VALUES ('{$this->nombre_categoria}');";
            mysqli_query(conexion::obtenerinstancia(), $sql);
        }
        static function listarCategorias(){
            $categorias=array();
            $result=0;
            $sql="SELECT * FROM categoria;";
            $rs=mysqli_query(conexion::obtenerinstancia(), $sql);
            if(mysqli_num_rows($rs)>0) {
                while ($fila = mysqli_fetch_assoc($rs)){
                    $categorias[] = $fila;
                }
            }
            return $categorias;
        }

    }