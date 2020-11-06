<?php
    class User{
        private $db;

        public function __construct(){
            $this->db = new mysqli("localhost","root","", "registro_incidencias_informaticas");
        }

        public function getAll(){
            $arrayResult = array();
            if($result = $this->db->query("SELECT * FROM usuarios INNER JOIN roles ON usuarios.id = roles.id")){
                while($fila = $result->fetch_object()){
                    $arrayResult[] = $fila;
                }
            }
            else{
                $arrayResult = null;
            }
            return $arrayResult;
        }

        public function insert($username, $email, $password){
            $result = ($this->db->query("SELECT MAX(id) FROM usuarios"));
            while ($fila = $result->fetch_array()) {
                $maxId = $fila[0] + 1;
                }

            $this->db->query("INSERT INTO usuarios
            VALUES ('$maxId','$username','$email', '$password')");

            $this->db->query("INSERT INTO roles
            VALUES ('usuario', $maxId)"); 
        }

        public function comprobarUserPass($userOemail, $password){
            $devolverResult = false;
            if($result = $this->db->query("SELECT * FROM usuarios
            INNER JOIN roles
            ON usuarios.id = roles.id
            WHERE username = '$userOemail' AND password = '$password'")){
                if($result->num_rows == 1){
                    $user = $result->fetch_object();
                    $_SESSION["idUser"] = $user->id;
                    $_SESSION["username"] = $user->username;
                    $_SESSION["tipoRol"] = $user->tipo;
                    $devolverResult = true;
                }
                else{
                    $devolverResult = false;
                }
            }
            if($devolverResult == false){
                if($result = $this->db->query("SELECT * FROM usuarios
                INNER JOIN roles
                ON usuarios.id = roles.id
                WHERE email = '$userOemail' AND password = '$password'")){
                    if($result->num_rows == 1){
                        $user = $result->fetch_object();
                        $_SESSION["idUser"] = $user->id;
                        $_SESSION["username"] = $user->username;
                        $_SESSION["tipoRol"] = $user->tipo;
                        $devolverResult = true;
                    }
                    else{
                        $devolverResult = false;
                    }
                }
            }
            return $devolverResult;
        }

        public function search($busqueda, $tipo){
            $arrayResult = array();
            if($tipo == "buscarId"){
                if($result = $this->db->query("SELECT * FROM usuarios INNER JOIN roles ON usuarios.id = roles.id WHERE usuarios.id = '$busqueda'")){
                    while($fila = $result->fetch_object()){
                        $arrayResult[] = $fila;
                    }
                }
                else{
                    $arrayResult = null;
                }
        }
        elseif($tipo == "buscarNombre"){
            if($result = $this->db->query("SELECT * FROM usuarios INNER JOIN roles ON usuarios.id = roles.id WHERE username = '$busqueda' ORDER BY username DESC")){
                while($fila = $result->fetch_object()){
                    $arrayResult[] = $fila;
                }
            }
            else{
                $arrayResult = null;
            }
        }
        elseif($tipo == "buscarEmail"){
            if($result = $this->db->query("SELECT * FROM usuarios INNER JOIN roles ON usuarios.id = roles.id WHERE email = '$busqueda' ORDER BY email DESC")){
                while($fila = $result->fetch_object()){
                    $arrayResult[] = $fila;
                }
            }
            else{
                $arrayResult = null;
            }
        }
        elseif($tipo == "buscarRol"){
            if($result = $this->db->query("SELECT * FROM roles
            INNER JOIN usuarios
            ON usuarios.id = roles.id WHERE tipo = '$busqueda'")){
                while($fila = $result->fetch_object()){
                    $arrayResult[] = $fila;
                }
            }
            else{
                $arrayResult = null;
            }
        }

        return $arrayResult;
    }

    public function delete($id){
        $this->db->query("DELETE FROM usuarios WHERE id = '$id'");
        $this->db->query("DELETE FROM roles WHERE id = '$id'");
    }

    public function update($usuario_id_original, $usuario_id, $username, $email, $password){
        $result = ($this->db->query("UPDATE usuarios
        SET id = '$usuario_id',
        username = '$username',
        email = '$email',
        password = '$password'
        WHERE id = '$usuario_id_original'"));
    }

    public function updateRol($id_usuario, $rol){
        $result = ($this->db->query("UPDATE roles SET tipo = '$rol' WHERE id = '$id_usuario'"));
    }

}