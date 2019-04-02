<?php
    class camposCliente{
        public $id_cliente=0;
        public $nombre_cliente='';
        public $direccion='';
        public $telefono='';
        public $DUI='';
        public $sexo='';
        public $email='';

    
        function asignarValor($id_cliente, $nombre_cliente,$direccion,$telefono,$DUI,$sexo,$email){
            $this->id_cliente=$id_cliente;
            $this->nombre_cliente=$nombre_cliente;
            $this->direccion=$direccion;
            $this->telefono=$telefono;
            $this->DUI=$DUI;
            $this->sexo=$sexo;
            $this->email=$email;

        }

        function _get($atributo){
            if(isset($this->$atributo)){
                return $this->$atributo;
            }
        }
        function guardar(){
            if($this->id_cliente>0){
            $sql="UPDATE cliente SET nombre_cliente='{$this->nombre_cliente}',direccion='{$this->direccion}',telefono='{$this->telefono}',DUI='{$this->DUI}',sexo='{$this->sexo}',email='{$this->email}' WHERE id_cliente={$this->id_cliente};";
            mysqli_query(conexion::obtenerInstancia(), $sql);

            }
            else{
            $sql="INSERT INTO cliente (nombre_cliente,direccion,telefono,DUI,sexo,email) VALUES ('{$this->nombre_cliente}','{$this->direccion}','{$this->telefono}','{$this->DUI}','{$this->sexo}','{$this->email}');";
            mysqli_query(conexion::obtenerInstancia(), $sql);
            }
        }
        static function listarClientes(){
            $clientes=array();
            $result=0;
            $sql="SELECT * FROM cliente;";
            $rs=mysqli_query(conexion::obtenerInstancia(), $sql);
            if(mysqli_num_rows($rs)>0) {
                while ($fila = mysqli_fetch_assoc($rs)){
                    $clientes[] = $fila;
                }
            }
            return $clientes;
        }
        function eliminar($id_cliente){
            $sql="DELETE FROM cliente WHERE id_cliente=($id_cliente)";
            mysqli_query(conexion::obtenerInstancia(),$sql);
        }
        function modificar($id_cliente){
            $sql="SELECT * FROM cliente WHERE  id_cliente= ($id_cliente)";
            $rs=mysqli_query(conexion::obtenerInstancia(), $sql);
            if(mysqli_num_rows($rs)>0){
                $fila=mysqli_fetch_assoc($rs);
                $this->id_cliente=$fila{'id_cliente'};
                $this->nombre_cliente=$fila{'nombre_cliente'};
                $this->direccion=$fila{'direccion'};
                $this->telefono=$fila{'telefono'};
                $this->DUI=$fila{'DUI'};
                $this->sexo=$fila{'sexo'};
                $this->email=$fila{'email'};

            }
        }

    }
?>