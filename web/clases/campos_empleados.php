<?php
    class camposEmpleado{
        public $id_empleado=0;
        public $nombre_empleado='';
        public $direccion='';
        public $email='';
        public $telefono='';
        public $sexo='';
        public $DUI='';
        public $NIT='';
        public $sueldo='';
        public $usuario='';
        public $contra='';
        public $cargo='';
        public $activo='';

    
        function asignarValor($id_empleado, $nombre_empleado,$direccion,$email,$telefono,$sexo,$DUI,$NIT,$sueldo,$usuario,$contra,$cargo,$activo){
            $this->id_empleado=$id_empleado;
            $this->nombre_empleado=$nombre_empleado;
            $this->direccion=$direccion;
            $this->email=$email;
            $this->telefono=$telefono;
            $this->sexo=$sexo;
            $this->DUI=$DUI;
            $this->NIT=$NIT;
            $this->sueldo=$sueldo;
            $this->usuario=$usuario;
            $this->contra=$contra;
            $this->cargo=$cargo;
            $this->activo=$activo;


        }

        function _get($atributo){
            if(isset($this->$atributo)){
                return $this->$atributo;
            }
        }
        function guardar(){
            if($this->id_empleado>0){
            $sql="UPDATE empleado SET nombre_empleado='{$this->nombre_empleado}',direccion='{$this->direccion}',email='{$this->email}',telefono='{$this->telefono}',sexo='{$this->sexo}',DUI='{$this->DUI}',NIT='{$this->NIT}', sueldo='{$this->sueldo}', usuario='{$this->usuario}', contra='{$this->contra}', cargo='{$this->cargo}', activo='{$this->activo}'  WHERE id_empleado={$this->id_empleado};";
            mysqli_query(conexion::obtenerInstancia(), $sql);

            }
            else{
            $sql="INSERT INTO empleado (nombre_empleado,direccion,email,telefono,sexo,DUI,NIT,sueldo,usuario,contra,cargo,activo) VALUES ('{$this->nombre_empleado}','{$this->direccion}','{$this->email}','{$this->telefono}','{$this->sexo}','{$this->DUI}','{$this->NIT}','{$this->sueldo}','{$this->usuario}','{$this->contra}','{$this->cargo}','{$this->activo}');";
            mysqli_query(conexion::obtenerInstancia(), $sql);
            }
        }
        static function listarEmpleados(){
            $empleados=array();
            $result=0;
            $sql="SELECT * FROM empleado;";
            $rs=mysqli_query(conexion::obtenerInstancia(), $sql);
            if(mysqli_num_rows($rs)>0) {
                while ($fila = mysqli_fetch_assoc($rs)){
                    $empleados[] = $fila;
                }
            }
            return $empleados;
        }
        function eliminar($id_empleado){
            $sql="DELETE FROM empleado WHERE id_empleado=($id_empleado)";
            mysqli_query(conexion::obtenerInstancia(),$sql);
        }
        function modificar($id_empleado){
            $sql="SELECT * FROM empleado WHERE  id_empleado= ($id_empleado)";
            $rs=mysqli_query(conexion::obtenerInstancia(), $sql);
            if(mysqli_num_rows($rs)>0){
                $fila=mysqli_fetch_assoc($rs);
                $this->id_empleado=$fila{'id_empleado'};
                $this->nombre_empleado=$fila{'nombre_empleado'};
                $this->direccion=$fila{'direccion'};
                $this->email=$fila{'email'};
                $this->telefono=$fila{'telefono'};
                $this->sexo=$fila{'sexo'};
                $this->DUI=$fila{'DUI'};
                $this->NIT=$fila{'NIT'};
                $this->sueldo=$fila{'sueldo'};
                $this->usuario=$fila{'usuario'};
                $this->contra=$fila{'contra'};
                $this->cargo=$fila{'cargo'};
                $this->activo=$fila{'activo'};


            }
        }

    }
?>