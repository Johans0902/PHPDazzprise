<?php 
    class usuario{
        private $id;
        private $nombre;
        private $email;
        private $telefono;
        private $contraseña;
       
        public function getId(){
            return $this->id ;
        }
        public function setId($id){
            $this->id = $id;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function getTelefono(){
            return $this->telefono;
        }
        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }
        public function getPassword(){
            return $this->contraseña;
        }
        public function setPassword($contraseña){
            $this->contraseña = $contraseña;
        }

        public function getusuario(){
            $array = array(
                "id" => $this->id,
                "nombre" => $this->nombre,
                "email" => $this->email,
                "telefono" => $this->telefono,
                "contraseña" => $this->contraseña,
            );

            return $array;
        }
        public function find($email){
            require "../controller/config/conexion.php";
            $query= mysqli_query($conexion,"SELECT * FROM clientes where email = '{$email}'");
            $result = mysqli_num_rows($query);
            if ($result > 0  && $result <= 1 ) {
                while ($data = mysqli_fetch_assoc($query)) {
                    $this->id = $data['id'];
                    $this->email = $data['email'];
                    $this->nombre = $data['nombre'];
                    $this->telefono = $data['telefono'];
                    $this->contraseña = $data['contraseña'];
                    break;
                }
                return true;
            }
            return false;
        }
        public function update($id){
            require "../controller/config/conexion.php";
            $this->contraseña = md5($this->contraseña);
            $sql= mysqli_query($conexion,"UPDATE clientes SET nombre = '{$this->nombre}', email ='{$this->email}', telefono ='{$this->telefono}', contraseña ='{$this->contraseña}' WHERE id = '{$id}'");
            $sql= mysqli_query($conexion,"UPDATE usuarios SET usuario = '{$this->email}', nombre = '{$this->nombre}',  clave = '{$this->contraseña}' WHERE usuario = '{$id}'");
            return $sql;
        }
        public function save(){
            require "../controller/config/conexion.php";
            $this->contraseña = md5($this->contraseña);
            $sql= mysqli_query($conexion,"INSERT INTO clientes values(NULL,'{$this->nombre}', '{$this->email}','{$this->telefono}', '{$this->contraseña}')");
            $sql= mysqli_query($conexion,"INSERT INTO usuarios values(NULL,'{$this->email}', '{$this->nombre}', '{$this->contraseña}')");
            return $sql;
        }
        
        public function sendEmail(){
            $para      = $this->email;
            $titulo    = 'Registro existoso';
            $mensaje   = 'Su registro en la plataforma dazzprize ha sido exitoso';
            $from = "From: pepitohola53@gmail.com";

            return mail($para, $titulo, $mensaje, $from);
        }
    }
?>