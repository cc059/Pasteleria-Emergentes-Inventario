<?php
    class camposInventarioProd{
        public $id_producto=0;
        public $producto='';
        public $precio=0.0;
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
            $sql="UPDATE inventario_producto SET producto='{$this->producto}',precio='{$this->precio}', cantidad='{$this->cantidad}, id_categoria='{$this->id_categoria}', activo='{$this->activo}' WHERE id_producto='{$this->id_producto}';";
            }
        }
    }
?>