<?php

include_once('../../../config/bd.php');
//Hace la conexión a la base de datos
$conexionBD = BD::crearInstancia();


// session_start();
$id_cliente = $_SESSION['usuario'];


$consulta = $conexionBD->prepare("SELECT * FROM `clientemascotas` INNER JOIN mascota ON clientemascotas.id_mascota = mascota.id WHERE id_cliente = $id_cliente");
$consulta->execute();
$listaMascotas = $consulta->fetchAll();




if ($_POST) {

    $accion = isset($_POST['accion']) ? $_POST['accion'] : '';

    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $raza = isset($_POST['raza']) ? $_POST['raza'] : '';
    $especie = isset($_POST['especie']) ? $_POST['especie'] : '';
    $edad = isset($_POST['edad']) ? $_POST['edad'] : '';
    $genero = isset($_POST['genero']) ? $_POST['genero'] : '';
    
    $id_mascota = isset($_POST['id_mascota']) ? $_POST['id_mascota'] : '';
 
    if ($accion) {
        switch ($accion) {
            case 'agregar':
                if ($_POST['nombre']!= '' || $_POST['raza']!= ''|| $_POST['edad']!= '' || $_POST['genero']!= '' || $_POST['especie']!= '') {
        
                    $sql = "INSERT INTO mascota (id, nombre, especie, raza, edad, genero) VALUES (NULL, :nombre, :especie, :raza, :edad, :genero)";
                    $consulta = $conexionBD->prepare($sql);
                    $consulta->bindParam(':nombre', $nombre);
                    $consulta->bindParam(':especie', $especie);
                    $consulta->bindParam(':raza', $raza);
                    $consulta->bindParam(':edad', $edad);
                    $consulta->bindParam(':genero', $genero);
                    $consulta->execute();
        
                    $ultimo_id_mascota = $conexionBD->lastInsertId();
        
                    $sql2 = "INSERT INTO clientemascotas (id, id_mascota, id_cliente) VALUES(NULL, :id_mascota, :id_cliente)";
                    $consulta2 = $conexionBD->prepare($sql2);
                    $consulta2->bindParam(':id_mascota', $ultimo_id_mascota);
                    $consulta2->bindParam(':id_cliente', $id_cliente);
                    $consulta2->execute();

                    echo "<script>
                    alert('Mascota agregada :)')
                    window.location.href = 'mascota_vista.php'
                    </script>";
        
                    // header("Location: mascota_vista.php");
            } else {
                echo "Llena todo";
            }
                break;


            case 'editar':

                $sql = "UPDATE mascota SET nombre=:nombre, especie=:especie, raza=:raza, edad=:edad, genero=:genero  WHERE id =:id_mascota";
                $consulta=$conexionBD->prepare($sql);
                $consulta->bindParam(':id_mascota', $id_mascota);
                $consulta->bindParam(':nombre', $nombre);
                $consulta->bindParam(':especie', $especie);
                $consulta->bindParam(':raza', $raza);
                $consulta->bindParam(':edad', $edad);
                $consulta->bindParam(':genero', $genero);
                $consulta->execute();

                echo "<script>
                    alert('Datos de mascota editados :)')
                    window.location.href = 'mascota_vista.php'
                    </script>";

                // header("Location: mascota_vista.php");
                // echo $sql;
                break;

            case 'eliminar':
                $sql = "DELETE FROM mascota WHERE id=:id_mascota";
                $consulta=$conexionBD->prepare($sql);
                $consulta->bindParam(':id_mascota', $id_mascota);
                $consulta->execute();

                echo "<script>
                    alert('Mascota eliminada :)')
                    window.location.href = 'mascota_vista.php'
                    </script>";

                // header("Location: mascota_vista.php");

                break;

            // case 'seleccionar':
            //     $sql = "SELECT * FROM clientemascotas WHERE id_cliente=:id_cliente";
            //     $consulta = $conexionBD->prepare($sql);
            //     $consulta->bindParam(':id_cliente', $id_cliente);
            //     $consulta->execute();
            //     $mascota=$consulta->fetch(PDO::FETCH_ASSOC);
    
            //     $nombre_alumno=$alumno['nombre'];
            //     $apellidos_alumno=$alumno['apellidos'];
    
            //     $sql = "SELECT cursos.id FROM alumnos_cursos INNER JOIN cursos ON cursos.id = alumnos_cursos.id_curso WHERE alumnos_cursos.id_alumno=:id_alumno";
            //     $consulta=$conexionBD->prepare($sql);
            //     $consulta->bindParam(':id_alumno', $id);
            //     $consulta->execute();
            //     $cursosAlumno=$consulta->fetchAll(PDO::FETCH_ASSOC);
    
            //     print_r($cursosAlumno);
    
            //     foreach ($cursosAlumno as $curso) {
            //         $arregloCursos[]=$curso['id'];
            //     }
    
            //     break;
        }
    }

    
}

// $consulta = $conexionBD->prepare("SELECT * FROM clientemascotas");
// $consulta->execute();
// $listaMascotas = $consulta->fetchAll();



//ver registro médico
//lleva a otra págiana y ahí te salen los datos de las mascotas

?>
