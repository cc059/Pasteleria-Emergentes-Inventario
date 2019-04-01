<?php
    class camposProveedor{
        public $id_proveedor=0;
        public $nombre_proveedor='';
        public $direccion='';
        public $telefono='';
        public $fax='';
        public $NIT='';
        public $num_registro='';
        public $servicio='';
        public $email='';


    
        function asignarValor($id_proveedor, $nombre_proveedor,$direccion,$telefono,$fax,$NIT,$num_registro,$servicio,$email){
            $this->id_proveedor=$id_proveedor;
            $this->nombre_proveedor=$nombre_proveedor;
            $this->direccion=$direccion;
            $this->telefono=$telefono;
            $this->fax=$fax;
            $this->NIT=$NIT;
            $this->num_registro=$num_registro;
            $this->servicio=$servicio;
            $this->email=$email;


        }

        function _get($atributo){
            if(isset($this->$atributo)){
                return $this->$atributo;
            }
        }
        function guardar(){
            if($this->id_proveedor>0){
            $sql="UPDATE proveedor SET nombre_proveedor='{$this->nombre_proveedor}',direccion='{$this->direccion}',telefono='{$this->telefono}',fax='{$this->fax}',NIT='{$this->NIT}',num_registro='{$this->num_registro}',servicio='{$this->servicio}',email='{$this->email}' WHERE id_proveedor={$this->id_proveedor};";
            mysqli_query(conexion::obtenerInstancia(), $sql);

            }
            else{
            $sql="INSERT INTO proveedor (nombre_proveedor,direccion,telefono,fax,NIT,num_registro,servicio,email) VALUES ('{$this->nombre_proveedor}','{$this->direccion}','{$this->telefono}','{$this->fax}','{$this->NIT}','{$this->num_registro}','{$this->servicio}','{$this->email}');";
            mysqli_query(conexion::obtenerInstancia(), $sql);
            }
        }
        static function listarProveedores(){
            $proveedores=array();
            $result=0;
            $sql="SELECT * FROM proveedor;";
            $rs=mysqli_query(conexion::obtenerInstancia(), $sql);
            if(mysqli_num_rows($rs)>0) {
                while ($fila = mysqli_fetch_assoc($rs)){
                    $proveedores[] = $fila;
                }
            }
            return $proveedores;
        }
        function eliminar($id_proveedor){
            $sql="DELETE FROM proveedor WHERE id_proveedor=($id_proveedor)";
            mysqli_query(conexion::obtenerInstancia(),$sql);
        }
        function modificar($id_proveedor){
            $sql="SELECT * FROM proveedor WHERE  id_proveedor= ($id_proveedor)";
            $rs=mysqli_query(conexion::obtenerInstancia(), $sql);
            if(mysqli_num_rows($rs)>0){
                $fila=mysqli_fetch_assoc($rs);
                $this->id_proveedor=$fila{'id_proveedor'};
                $this->nombre_proveedor=$fila{'nombre_proveedor'};
                $this->direccion=$fila{'direccion'};
                $this->telefono=$fila{'telefono'};
                $this->fax=$fila{'fax'};
                $this->NIT=$fila{'NIT'};
                $this->num_registro=$fila{'num_registro'};
                $this->servicio=$fila{'servicio'};
                $this->email=$fila{'email'};

            }
        }

    }
?>