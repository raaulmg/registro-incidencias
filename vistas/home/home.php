<?php
if(!isset($_SESSION["username"])){header("location: index.php?action=cerrarSesion");}
?>

<div class="menuPerfil" id="menuPerfil">
    <div id="menuPerfilMain">
        <div class="menuPerfilCerrar" onclick="accionPerfil()"><i class="fa fa-times"></i></div>
        <br>
        <h3 class="text-center">Bienvenido <?php echo $_SESSION["username"];?></h3>
        <div class="text-center">Tipo de usuario:
            <?php
                if($_SESSION["tipoRol"] == "administrador"){
                    echo "<strong>$_SESSION[tipoRol]</strong>";
                    echo "
                    <br><br>
                    <button class='btn btn-rojo' onclick='mostrarAdmnistrarIncidencias()'>Administrar incidencias</button>
                    <br><br>
                    <button class='btn btn-rojo' onclick='mostrarAdmnistrarUsuarios()'>Administrar usuarios</button>
                    <br><br>
                    </div>
                    <a href='index.php?action=cerrarSesion'><div class='menuPerfilCerrarSesion'>Cerrar sesión</div></a>
                    ";
                    
                }
                else{
                    echo "
                    <strong>$_SESSION[tipoRol]</strong>
                    </div>
                    <a href='index.php?action=cerrarSesion'><div class='menuPerfilCerrarSesion'>Cerrar sesión</div></a>";
                }
            ?>
        </div>

        <?php
            if($_SESSION["tipoRol"]  == "administrador"){
                echo "
                <div style='display:none' id='administrarIncidencias'>
                    <i class='fa fa-arrow-left' style='font-size: 2.5rem; cursor:pointer;' onclick='mostrarAdmnistrarIncidencias()'></i>
                    <br><br>
                    <h3>Busqueda incidencia:</h3>
                    <form action='index.php'>
                        <div class='input-group'>
                            <input type='text' class='form-control' name='busquedaIncidencia'>
                            <div class='input-group-append'>
                                <button class='btn btn-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Buscar</button>
                                    <div class='dropdown-menu'>
                                        <button type='submit' class='dropdown-item' name='action' value='buscarIncidenciaId'>Id Incidencia</button>
                                        <button type='submit' class='dropdown-item' name='action' value='buscarIncidenciaUsuario'>Usuario</button>
                                        <button type='submit' class='dropdown-item' name='action' value='buscarIncidenciaDescripcion'>Descripcion</button>
                                        <button type='submit' class='dropdown-item' name='action' value='buscarIncidenciaObservacion'>Observaciones</button>
                                        <button type='submit' class='dropdown-item' name='action' value='buscarIncidenciaEstado'>Estado</button>
                                        <button type='submit' class='dropdown-item' name='action' value='buscarIncidenciaFecha'>Fecha</button>
                                        <button type='submit' class='dropdown-item' name='action' value='buscarIncidenciaLugar'>Lugar</button>
                                        <button type='submit' class='dropdown-item' name='action' value='buscarIncidenciaEquipo'>Equipo Afectado</button>
                                    </div>
                            </div>
                        </div>
                        <br>
                        <button class='btn btn-primary' style='width: 100%; text-align:center;' name='action' value='mostrarListadoIncidencias'>Listado de todas las incidencias</button>
                    </form>
                </div>
                ";
                echo "
                <div style='display:none' id='administrarUsuarios'>
                <i class='fa fa-arrow-left' style='font-size: 2.5rem; cursor:pointer;' onclick='mostrarAdmnistrarUsuarios()'></i>
                <br><br>
                <h3>Busqueda Usuarios:</h3>
                <form action='index.php'>
                    <div class='input-group'>
                            <input type='text' class='form-control' name='busquedaUsuario'>
                            <div class='input-group-append'>
                                <button class='btn btn-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Buscar</button>
                                    <div class='dropdown-menu'>
                                        <button type='submit' class='dropdown-item' name='action' value='buscarUsuarioId'>Id Usuario</button>
                                        <button type='submit' class='dropdown-item' name='action' value='buscarUsuarioNombre'>Nombre</button>
                                        <button type='submit' class='dropdown-item' name='action' value='buscarUsuarioEmail'>Email</button>
                                        <button type='submit' class='dropdown-item' name='action' value='buscarUsuarioRol'>Rol</button>
                                    </div>
                            </div>
                    </div>
                    <br>
                    <button class='btn btn-primary' style='width: 100%; text-align:center;' name='action' value='mostrarListadoUsuarios'>Listado de todos los usuarios</button>
                    <br><br><br>
                    <h4>Crear usuario:</h4>
                    Nombre: <input type='text' name='nombre'>
                    <br><br>
                    Email: <input type='email' name='email'>
                    <br><br>
                    Contraseña: <input type='password' name='pass'>
                    <br>
                    <br>
                    <button type='submit' class='btn btn-success' style='width:100%;' name='action' value='crearUsuario'>Crear</button>
                    </form>
                </div>
                ";
            }
        ?>

</div>


<?php
    echo "
    <div class='container' style='position:absolute; top: 100px;'>
        <main style='width:100%;' class='anadirIncidencias'>
        <div class='row'>
            <div class='col-11' onclick='formularioAnadirIncidencias()'>
                <i class='fa fa-plus' style='font-size:2rem; margin-right:10px;'></i><span class='h2'>Añadir</span>
            </div>
            <div class='col-1'>
            <i class='fa fa-paint-brush' style='font-size: 2.2rem; cursor:pointer' onclick='changeColorIncidencias()'></i>
            </div>
        </div>
        <div class='row' style='display:none; margin-top: 15px;' id='anadirIncidencias'>
        <form action='index.php' style='width:100%'>
        <table style='width:100%;'>
        <tr>
            <td colspan='2'><strong>Equipo afectado: </strong><input type='text' style='border:none; border-bottom:solid 1px;' name='equipo_afectado'>";
            if($_SESSION["tipoRol"] == "administrador"){
                echo "<input type='text' style='border:none; border-bottom:solid 1px; float:right;' name='usuario'><strong style='float:right;'>Usuario: </strong>";
            }

        echo " 
        </td>
        </tr>
        <tr>
            <td colspan='2'><strong>Lugar:</strong> <input type='text' style='border:none; border-bottom:solid 1px;' name='lugar'></td>
        </tr>
        <tr>
            <td colspan='2'>
            <strong>Descripción:</strong>
            <br>
            <textarea rows='5' style='width: 100%;' name='descripcion'></textarea>
            </td>
        </tr>
        <tr>
            <td colspan='2' style='display:flex; align-items:center;'><strong>Observaciones:</strong><textarea rows='2' style='width: 100%;' name='observaciones'></textarea></td>
        </tr>
        <tr><th colspan='2' style='text-align:center; height:65px;'><input type='submit' class='btn btn-danger'><th></tr>
        <input type='hidden' name='action' value='anadirIncidencia'>
    </table>
    </form>
        </div>
        </main>
    
    ";
    if(isset($data["listaIncidencias"]) && count($data["listaIncidencias"]) > 0){
        $countIncidencias = 0;
        foreach($data["listaIncidencias"] as $incidencia){
            $id_incidencia = $incidencia->id;
            $fecha_registro = $incidencia->fecha_registro;
            $equipo_afectado = $incidencia->equipo_afectado;
            $usuario_incidencia = $incidencia->usuario_incidencia;
            $lugar = $incidencia->lugar;
            $descripcion = $incidencia->descripcion;
            $observaciones = $incidencia->observaciones;
            $prioridad = $incidencia->prioridad;

            $color = "";
            if($prioridad == "baja"){
                $color = "#FFEB3B"; /*Amarillo*/
            }
            elseif($prioridad == "media"){
                $color = "#ff5722"; /*Naranja*/
            }
            elseif($prioridad == "maxima"){
                $color = "#F44336"; /*Rojo*/
            }
            elseif($prioridad == "cerrada"){
                $color = "#9ae443"; /*Verde*/
            }

        echo "
        <div class='row'>
            <div class='col-12'>
                <main style='width:100%;"; echo "background:" . $color."' class='todosMain'>"; 
                
                echo "
                <form action='index.php' style='display:inline;'>
                <h2 style='margin-bottom: 33px;'>Incidencia:</h2>
                <table style='width:100%;'>
                    <tr>
                        <td><strong>id incidencia:</strong> "; if($_SESSION["tipoRol"] == "administrador"){echo "<input type='number' style='border:none;' name='incidencia_id' value='$id_incidencia'><input type='hidden' name='id_incidencia_original' value='$id_incidencia'>";}else{echo $id_incidencia;} echo "</td>
                        <td colspan='2' style='text-align:right'><strong>Fecha:</strong> "; if($_SESSION["tipoRol"] == "administrador"){echo "<input type='date' style='border:none;' name='fecha_registro' value='$fecha_registro'>";}else{echo $fecha_registro;} echo "</td>
                    </tr>
                    <tr>
                        <td><strong>Equipo afectado:</strong> "; if($_SESSION["tipoRol"] == "administrador"){echo "<input type='text' style='border:none;' name='equipo_afectado' value='$equipo_afectado'>";}else{echo $equipo_afectado;} echo "</td>
                        <td style='text-align:right'><strong>Usuario:</strong> "; if($_SESSION["tipoRol"] == "administrador"){echo "<input type='text' style='border:none; width: 150px;' name='usuario_incidencia' value='$usuario_incidencia'>";}else{echo $usuario_incidencia;} echo "</td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                        <strong>Lugar:</strong> "; if($_SESSION["tipoRol"] == "administrador"){echo "<input type='text' style='border:none;' name='lugar' value='$lugar'>";}else{echo $lugar;}
                        echo "
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                        <strong>Descripción:</strong>
                        <br>";
                        if($_SESSION["tipoRol"] == "administrador"){
                        echo "
                        <input type='text' style='border:none;' name='descripcion' value='$descripcion'>";
                        }
                        else{echo $descripcion;}
                        echo "
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Observaciones:</strong> "; if($_SESSION["tipoRol"] == "administrador"){echo "<input type='text' style='border:none;' name='observaciones' value='$observaciones'></td>";}else{echo $observaciones;}
                        
                        $estado = $incidencia->estado;

                        if($_SESSION["tipoRol"] == "administrador"){
                            echo '<form action="index.php">
                            <td style="text-align:right"><strong>Estado: </strong>'.$estado.'
                                <select style="height:35px; border-radius:3px;" name="estado" onclick="mostrarGuardarEstado('.$countIncidencias.')">
                                    <option value="abierta">abierta</option>
                                    <option value="en espera">en espera</option>
                                    <option value="cerrada">cerrada</option>
                                </select>
                                <input type="hidden" name="id_incidencia" value='.$id_incidencia.'>
                                <input type="hidden" name="action" value="modificarEstado">
                                <input type="submit" value="Guardar" id="guardarEstado'.$countIncidencias.'" style="display:none;" class="btn btn-success">';
                                echo "
                                <br>
                                <br>
                                <form action='index.php'>
                                    <strong>Prioridad: </strong> $prioridad
                                    <select style='height:35px; border-radius:3px;' name='prioridad' onclick='mostrarGuardarPrioridad($countIncidencias)'>
                                        <option value='maxima'>Maxima</option>
                                        <option value='media'>Media</option>
                                        <option value='baja'>Baja</option>
                                    </select>
                                    <input type='hidden' name='idIncidenciaModPrioridad' value='$id_incidencia'>
                                    <button type='submit' name='action' value='modificarIncidenciaPrioridad' id='guardarPrioridad$countIncidencias' style='display:none' class='btn btn-success'>Guardar</button>
                                </form>";
                                echo '
                                </form>
                            </td>'; 
                        }
                        elseif( $estado == "abierta" || $estado == "en espera"){
                        echo '
                        <form action="index.php">
                        <td style="text-align:right"><strong>Estado: </strong>
                            <select style="height:35px; border-radius:3px;" name="estado" onclick="mostrarGuardarEstado('.$countIncidencias.')">
                                <option value='.$estado.'>'.$estado.'</option>
                                <option value="cerrada">cerrada</option>
                            </select>
                            <input type="hidden" name="id_incidencia" value='.$id_incidencia.'>
                            <input type="hidden" name="action" value="modificarEstado">
                            <input type="submit" value="Guardar" id="guardarEstado'.$countIncidencias.'" style="display:none;" class="btn btn-success">
                        </form>
                        </td>';
                    }
                    else{
                        echo '<td style="text-align:right"><strong>Estado: </strong>'.$estado.'<td>';
                    }
                    echo "
                    </tr>
                </table>
                <br>";
                if($_SESSION["tipoRol"] == "administrador"){
                echo "
                <a class='btn btn-danger' onclick='mostrarBorrarIncidencia(".$countIncidencias.")'>Borrar</a>
                    <button type='submit' name='action' value='modificarIncidencia' class='btn btn-success'>Modificar</button>
                    <span style='display:none' id='incidenciaBorrar$countIncidencias'>¿Estas segur@ que deseas borrarlo?
                    <button type='submit' class='btn btn-danger' name='action' value='borrarIncidencia'>Si</button>
                    </span>
                ";
    }
    echo "
    </div>
    </div>
    </form>
  </main>";
      $countIncidencias++;
    }
    echo "</div>";
    }
    if(isset($data["listaUsuarios"]) && count($data["listaUsuarios"]) > 0 && $_SESSION["tipoRol"] == "administrador"){
        $countListadoUsuarios = 0;
        foreach($data["listaUsuarios"] as $usuario){
            $usuario_id = $usuario->id;
            echo "
            <div class='row'>
                <div class='col-12'>
                    <main style='width:100%;'>
                    <form action='index.php' style='display:inline;'>
                    <h2 style='margin-bottom: 33px;'>Usuario:</h2>
                    <table style='width:100%; border-collapse: separate;border-spacing: 0 1.7em;'>
                    <tr>
                    <td><strong>Id usuario: </strong>
                    <input type='text' style='border:none; border-bottom:solid 1px;' name='usuario_id' value='$usuario_id'>
                    <input type='hidden' name='usuario_id_original' value='$usuario_id'>
                    </td>
                    <td><strong>Nombre: </strong> <input type='text' style='border:none; border-bottom:solid 1px;' name='username' value='$usuario->username'></td>
                    <td><strong>Email: </strong> <input type='text' style='border:none; border-bottom:solid 1px;' name='email' value='$usuario->email'></td>
                    <td><strong>Contraseña: </strong> <input type='text' style='border:none; border-bottom:solid 1px;' name='password' value='$usuario->password'></td>
                    </tr>
                    <tr>
                    <td colspan='3'>
                        <form action='index.php'>
                            <a class='btn btn-danger' onclick='mostrarBorrarUsuario(".$countListadoUsuarios.")'>Borrar</a>
                            <button type='submit' name='action' value='modificarUsuario' class='btn btn-success'>Modificar</button>
                            <span style='display:none' id='usuarioBorrar$countListadoUsuarios'>¿Estas segur@ que deseas borrarlo?
                            <button type='submit' class='btn btn-danger' name='action' value='borrarUsuario'>Si</button>
                            </span>
                            <input type='hidden' name='usuarioBorrar' value='$usuario_id'>
                        </form>
                    </td>
                    <td>
                        <form action='index.php'>
                            <strong>Rol: </strong>$usuario->tipo
                            <br>
                            <select style='height: 35px; border-radius: 3px;' name='rol' onclick='mostrarGuardarRol($countListadoUsuarios)'>
                            <option value='usuario'>Usuario</option>
                            <option value='administrador'>Administrador</option>
                            </select>
                            <button type='submit' name='action' value='modificarUsuarioRol' style='display:none' class='btn btn-success' id='guardarRol$countListadoUsuarios'>Guardar</button>
                            <input type='hidden' name='usuario_id' value='$usuario_id'>
                        </form>
                    </td>
                    </tr>
                    </table>
                    </main>
                </div>
            </div>";
            $countListadoUsuarios++;
        }        
    }
?>