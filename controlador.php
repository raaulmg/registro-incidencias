<?php
    include_once("vista.php");
    include_once("modelos/user.php");
    include_once("modelos/incident.php");

    class Controlador{

        private $vista, $user;

        public function __construct(){
            $this->vista = new Vista();
            $this->user = new User();
            $this->incident = new Incident();
        }
        
        public function mostrarMain(){
            $this->vista->mostrar("main");
        }

        public function mostrarLogin(){
            $this->vista->mostrar("usuario/login");
        }

        public function procesarLogin(){
            $userOmail = $_REQUEST["userOemail"];
            $pass = $_REQUEST["pass"];
            $result = $this->user->comprobarUserPass($userOmail, $pass);

            if($result){
                    $this->mostrarHome();
            }
            else{
                $data["msjError"] = "Usuario/Email o contraseña incorrectos";
                $this->vista->mostrar("usuario/login", $data);
            }
        }

        public function mostrarHome(){
            $data["listaIncidencias"] = $this->incident->getAll();
            $this->vista->mostrar("home/home", $data);
        }

        public function mostrarListadoIncidencias(){
            $data["listaIncidencias"] = $this->incident->getAllAdmin();
            $this->vista->mostrar("home/home", $data);
        }

        public function cerrarSesion(){
            session_destroy();
            $data["msjInfo"] = "Sesion cerrada correctamente";
            $this->vista->mostrar("usuario/login", $data);
        }

        public function anadirIncidencia(){
            $equipo_afectado = $_REQUEST["equipo_afectado"];
            $lugar = $_REQUEST["lugar"];
            $descripcion = $_REQUEST["descripcion"];
            $observaciones = $_REQUEST["observaciones"];
            if(isset($_REQUEST["usuario"])){
                $usuario = $_REQUEST["usuario"];
                $this->incident->insert($equipo_afectado, $lugar, $descripcion, $observaciones, $usuario);
            }
            else{
                $this->incident->insert($equipo_afectado, $lugar, $descripcion, $observaciones);
            }
            $this->mostrarHome();
        }

        public function modificarEstado(){
            $id_incidencia = $_REQUEST["id_incidencia"];
            $estado = $_REQUEST["estado"];
            $this->incident->updateEstado($id_incidencia, $estado);
            echo "<script>
            window.onload = function(){
                window.history.back();
            }
            </script>";
        }

        public function buscarIncidenciaId(){
            $busqueda = $_REQUEST["busquedaIncidencia"];
            $tipo = "buscarId";
            $data["listaIncidencias"] = $this->incident->search($busqueda, $tipo);
            $this->vista->mostrar("home/home", $data);
        }

        public function buscarIncidenciaUsuario(){
            $busqueda = $_REQUEST["busquedaIncidencia"];
            $tipo = "buscarUsuario";
            $data["listaIncidencias"] = $this->incident->search($busqueda, $tipo);
            $this->vista->mostrar("home/home", $data);
        }

        public function buscarIncidenciaDescripcion(){
            $busqueda = $_REQUEST["busquedaIncidencia"];
            $tipo = "buscarDescripcion";
            $data["listaIncidencias"] = $this->incident->search($busqueda, $tipo);
            $this->vista->mostrar("home/home", $data);
        }

        public function buscarIncidenciaObservacion(){
            $busqueda = $_REQUEST["busquedaIncidencia"];
            $tipo = "buscarObservacion";
            $data["listaIncidencias"] = $this->incident->search($busqueda, $tipo);
            $this->vista->mostrar("home/home", $data);
        }

        public function buscarIncidenciaEstado(){
            $busqueda = $_REQUEST["busquedaIncidencia"];
            $tipo = "buscarEstado";
            $data["listaIncidencias"] = $this->incident->search($busqueda, $tipo);
            $this->vista->mostrar("home/home", $data);
        }

        public function buscarIncidenciaFecha(){
            $busqueda = $_REQUEST["busquedaIncidencia"];
            $tipo = "buscarFecha";
            $data["listaIncidencias"] = $this->incident->search($busqueda, $tipo);
            $this->vista->mostrar("home/home", $data);
        }

        public function buscarIncidenciaLugar(){
            $busqueda = $_REQUEST["busquedaIncidencia"];
            $tipo = "buscarLugar";
            $data["listaIncidencias"] = $this->incident->search($busqueda, $tipo);
            $this->vista->mostrar("home/home", $data);
        }

        public function buscarIncidenciaEquipo(){
            $busqueda = $_REQUEST["busquedaIncidencia"];
            $tipo = "buscarEquipo";
            $data["listaIncidencias"] = $this->incident->search($busqueda, $tipo);
            $this->vista->mostrar("home/home", $data);
        }

        public function borrarIncidencia(){
            $id_incidencia = $_REQUEST["id_incidencia"];
            $this->incident->delete($id_incidencia);
            echo "<script>
            window.onload = function(){
                window.history.back();
            }
            </script>";
        }

        public function modificarIncidencia(){
            $id_incidencia_original = $_REQUEST["id_incidencia_original"];
            $id_incidencia = $_REQUEST["incidencia_id"];
            $fecha_registro = $_REQUEST["fecha_registro"];
            $equipo_afectado = $_REQUEST["equipo_afectado"];
            $lugar = $_REQUEST["lugar"];
            $descripcion = $_REQUEST["descripcion"];
            $usuario_incidencia = $_REQUEST["usuario_incidencia"];
            $observaciones = $_REQUEST["observaciones"];
            $this->incident->update($id_incidencia_original, $id_incidencia, $fecha_registro, $equipo_afectado, $lugar, $descripcion, $usuario_incidencia, $observaciones);
            echo "<script>
            window.onload = function(){
                window.history.back();
            }
            </script>";
        }

        public function buscarUsuarioId(){
            $busqueda = $_REQUEST["busquedaUsuario"];
            $tipo = "buscarId";
            $data["listaUsuarios"] = $this->user->search($busqueda, $tipo);
            $this->vista->mostrar("home/home", $data);
        }

        public function buscarUsuarioNombre(){
            $busqueda = $_REQUEST["busquedaUsuario"];
            $tipo = "buscarNombre";
            $data["listaUsuarios"] = $this->user->search($busqueda, $tipo);
            $this->vista->mostrar("home/home", $data);
        }

        public function buscarUsuarioEmail(){
            $busqueda = $_REQUEST["busquedaUsuario"];
            $tipo = "buscarEmail";
            $data["listaUsuarios"] = $this->user->search($busqueda, $tipo);
            $this->vista->mostrar("home/home", $data);
        }

        public function buscarUsuarioRol(){
            $busqueda = $_REQUEST["busquedaUsuario"];
            $tipo = "buscarRol";
            $data["listaUsuarios"] = $this->user->search($busqueda, $tipo);
            $this->vista->mostrar("home/home", $data);
        }

        public function mostrarListadoUsuarios(){
            $data["listaUsuarios"] = $this->user->getAll();
            $this->vista->mostrar("home/home", $data); 
        }

        public function borrarUsuario(){
            $id_usuario = $_REQUEST["usuarioBorrar"];
            $this->user->delete($id_usuario);
            echo "<script>
            window.onload = function(){
                window.history.back();
            }
            </script>";
        }

        public function modificarUsuario(){
            $usuario_id_original = $_REQUEST["usuario_id_original"];
            $usuario_id = $_REQUEST["usuario_id"];
            $username = $_REQUEST["username"];
            $email = $_REQUEST["email"];
            $password = $_REQUEST["password"];
            $this->user->update($usuario_id_original, $usuario_id, $username, $email, $password);
            echo "<script>
            window.onload = function(){
                window.history.back();
            }
            </script>";
        }

        public function modificarUsuarioRol(){
            $usuario_id = $_REQUEST["usuario_id"];
            $rol = $_REQUEST["rol"];
            $this->user->updateRol($usuario_id, $rol);
            echo "<script>
            window.onload = function(){
                window.history.back();
            }
            </script>";
        }

        public function crearUsuario(){
            $nombre = $_REQUEST["nombre"];
            $email = $_REQUEST["email"];
            $pass = $_REQUEST["pass"];
            $this->user->insert($nombre, $email, $pass);
            echo "<script>
            window.onload = function(){
                window.history.back();
            }
            </script>";
        }

        public function modificarIncidenciaPrioridad(){
            $id_incidencia = $_REQUEST["idIncidenciaModPrioridad"];
            $prioridad = $_REQUEST["prioridad"];
            $this->incident->updatePrioridad($id_incidencia, $prioridad);
            echo "<script>
            window.onload = function(){
                window.history.back();
            }
            </script>";
        }

    }