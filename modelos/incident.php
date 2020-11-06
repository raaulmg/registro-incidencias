<?php
    class Incident{
        private $db;

        public function __construct(){
            $this->db = new mysqli("localhost","root","", "registro_incidencias_informaticas");
        }
        
        public function getAll(){
            $arrayResult = array();
            if($result = $this->db->query("SELECT * FROM incidencias
            WHERE usuario_incidencia = '$_SESSION[username]' ORDER BY id DESC")){
                while($fila = $result->fetch_object()){
                    $arrayResult[] = $fila;
                }
            }
            else{
                $arrayResult = null;
            }
            return $arrayResult;
    }

    public function getAllAdmin(){
        $arrayResult = array();
        if($result = $this->db->query("SELECT * FROM incidencias ORDER BY id DESC")){
            while($fila = $result->fetch_object()){
                $arrayResult[] = $fila;
            }
        }
        else{
            $arrayResult = null;
        }
        return $arrayResult;
}

    public function insert($equipo_afectado, $lugar, $descripcion, $observaciones, $usuario = null){
        if(isset($usuario)){
            $result = ($this->db->query("SELECT MAX(id) FROM incidencias"));
            while ($fila = $result->fetch_array()) {
                $maxId = $fila[0] + 1;
                }
                $fecha = date("y") . "-" . date("m") . "-" . date("d");
            $this->db->query("INSERT INTO incidencias
            VALUES ('$maxId','$fecha','$equipo_afectado', '$lugar',
            '$descripcion', '$usuario', '$observaciones', 'abierta', DEFAULT)");
        }
        else{
            $result = ($this->db->query("SELECT MAX(id) FROM incidencias"));
            while ($fila = $result->fetch_array()) {
                $maxId = $fila[0] + 1;
                }
                $fecha = date("y") . "-" . date("m") . "-" . date("d");
            $this->db->query("INSERT INTO incidencias
            VALUES ('$maxId','$fecha','$equipo_afectado', '$lugar',
            '$descripcion', '$_SESSION[username]', '$observaciones', 'abierta', DEFAULT)");   
        }
    }

    public function search($busqueda, $tipo){
        $arrayResult = array();
        if($tipo == "buscarId"){
            if($result = $this->db->query("SELECT * FROM incidencias WHERE id = '$busqueda' ORDER BY id DESC")){
                while($fila = $result->fetch_object()){
                    $arrayResult[] = $fila;
                }
            }
            else{
                $arrayResult = null;
            }
    }
    elseif($tipo == "buscarUsuario"){
        if($result = $this->db->query("SELECT * FROM incidencias WHERE usuario_incidencia = '$busqueda' ORDER BY id DESC")){
            while($fila = $result->fetch_object()){
                $arrayResult[] = $fila;
            }
        }
        else{
            $arrayResult = null;
        }
    }
    elseif($tipo == "buscarDescripcion"){
        if($result = $this->db->query("SELECT * FROM incidencias WHERE descripcion = '$busqueda' ORDER BY id DESC")){
            while($fila = $result->fetch_object()){
                $arrayResult[] = $fila;
            }
        }
        else{
            $arrayResult = null;
        }
    }
    elseif($tipo == "buscarObservacion"){
        if($result = $this->db->query("SELECT * FROM incidencias WHERE observaciones = '$busqueda' ORDER BY id DESC")){
            while($fila = $result->fetch_object()){
                $arrayResult[] = $fila;
            }
        }
        else{
            $arrayResult = null;
        }
    }
    elseif($tipo == "buscarEstado"){
        if($result = $this->db->query("SELECT * FROM incidencias WHERE estado = '$busqueda' ORDER BY id DESC")){
            while($fila = $result->fetch_object()){
                $arrayResult[] = $fila;
            }
        }
        else{
            $arrayResult = null;
        }
    }
    elseif($tipo == "buscarFecha"){
        if($result = $this->db->query("SELECT * FROM incidencias WHERE fecha_registro = '$busqueda' ORDER BY id DESC")){
            while($fila = $result->fetch_object()){
                $arrayResult[] = $fila;
            }
        }
        else{
            $arrayResult = null;
        }        
    }

    elseif($tipo == "buscarLugar"){
        if($result = $this->db->query("SELECT * FROM incidencias WHERE lugar = '$busqueda' ORDER BY id DESC")){
            while($fila = $result->fetch_object()){
                $arrayResult[] = $fila;
            }
        }
        else{
            $arrayResult = null;
        }        
    }

    elseif($tipo == "buscarEquipo"){
        if($result = $this->db->query("SELECT * FROM incidencias WHERE equipo_afectado = '$busqueda' ORDER BY id DESC")){
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
        $this->db->query("DELETE FROM incidencias WHERE id = '$id'");
    }

    public function update($id_incidencia_original, $id_incidencia, $fecha_registro, $equipo_afectado, $lugar, $descripcion, $usuario_incidencia, $observaciones){
        $result = ($this->db->query("UPDATE incidencias
        SET id = '$id_incidencia',
        fecha_registro = '$fecha_registro',
        equipo_afectado = '$equipo_afectado',
        lugar = '$lugar',
        descripcion = '$descripcion',
        usuario_incidencia = '$usuario_incidencia',
        observaciones = '$observaciones'
        WHERE id = '$id_incidencia_original'"));
    }

    public function updateEstado($id_incidencia, $estado){
        $result = ($this->db->query("UPDATE incidencias SET estado = '$estado' WHERE id = '$id_incidencia'"));
    }
}