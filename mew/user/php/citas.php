<?php

include_once('../../../config/bd.php');
//Hace la conexión a la base de datos
$conexionBD = BD::crearInstancia();


// session_start();
$asunto = isset($_POST['asunto']) ? $_POST['asunto'] : '';
$mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : '';
$fecha_hora = isset($_POST['fecha']) ? $_POST['fecha'] : '';
$estado = "Not taken";
$id_cliente = $_SESSION['usuario'];
$mascota = isset($_POST['mascota']) ? $_POST['mascota'] : '';
$mascota = intval($mascota);




$accion = isset($_POST['accion']) ? $_POST['accion'] : '';



// $sql="SELECT * FROM alumnos WHERE id = :id_cliente";
// $consulta = $conexionBD->prepare($sql);
// $consulta->bindParam(':id_cliente', $id_cliente);
// $consulta=$conexionBD->prepare($sql);
// $consulta->execute();
// $clientes=$consulta->fetchAll(PDO::FETCH_ASSOC);


// $listaClientes=$conexionBD->query($sql);
// $clientes=$listaAlumnos->fetchAll();



if ($accion != '') {
    switch ($accion) {
        case 'agregar':
            $sql = "INSERT INTO citas (id_cita, asunto, fecha, estado, id_cliente, id_mascota) VALUES (NULL, :asunto, :fecha, :estado, :id_cliente, :id_mascota)";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':asunto', $asunto);
            $consulta->bindParam(':fecha', $fecha_hora);
            $consulta->bindParam(':estado', $estado);
            $consulta->bindParam(':id_cliente', $id_cliente);
            $consulta->bindParam(':id_mascota', $mascota);
            $consulta->execute();

            echo "<script>
            alert('Cita agendada :)')
            window.location.href = 'vista_citas_usuario.php'
            </script>";

            // header("Location: vista_citas_usuario.php");

            // print_r($sql);


            break;

        case 'editar':
            $sql = "UPDATE alumnos SET nombre=:nombre_alumno, apellidos=:apellidos_alumno  WHERE id=:id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->bindParam(':nombre_alumno', $nombre_alumno);
            $consulta->bindParam(':apellidos_alumno', $apellidos_alumno);
            $consulta->execute();
            echo $sql;

            if (isset($cursos)) {
                $sql = "DELETE FROM alumnos_cursos WHERE id_alumno = :id_alumno";
                $consulta = $conexionBD->prepare($sql);
                $consulta->bindParam(':id_alumno', $id);
                $consulta->execute();

                foreach ($cursos as $curso) {
                    $sql = "INSERT INTO alumnos_cursos (id, id_alumno, id_curso) VALUES (NULL, :id_alumno, :id_curso)";
                    $consulta = $conexionBD->prepare($sql);
                    $consulta->bindParam(':id_alumno', $id);
                    $consulta->bindParam(':id_curso', $curso);
                    $consulta->execute();
                }

                $arregloCursos = $cursos;
            }

            break;

        case 'borrar':
            $sql = "DELETE FROM alumnos WHERE id=:id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();

            break;

        case 'Seleccionar':
            $sql = "SELECT * FROM alumnos WHERE id=:id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $alumno = $consulta->fetch(PDO::FETCH_ASSOC);

            $nombre_alumno = $alumno['nombre'];
            $apellidos_alumno = $alumno['apellidos'];

            $sql = "SELECT cursos.id FROM alumnos_cursos INNER JOIN cursos ON cursos.id = alumnos_cursos.id_curso WHERE alumnos_cursos.id_alumno=:id_alumno";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id_alumno', $id);
            $consulta->execute();
            $cursosAlumno = $consulta->fetchAll(PDO::FETCH_ASSOC);

            print_r($cursosAlumno);

            foreach ($cursosAlumno as $curso) {
                $arregloCursos[] = $curso['id'];
            }


            break;


        default:
            # code...
            break;
    }
}


$sql1 = "SELECT * FROM `clientemascotas` INNER JOIN mascota ON clientemascotas.id_mascota = mascota.id WHERE id_cliente = $id_cliente";
$listaClienteMascotas = $conexionBD->query($sql1);
$clientemascotas = $listaClienteMascotas->fetchAll();

// print_r($clientemascotas);

// $sql2 = "SELECT * FROM `citas` WHERE id_cliente = $id_cliente";
// $consulta = $conexionBD->prepare($sql2);
// $consulta->execute();
// $clienteCitas = $consulta->fetchAll(PDO::FETCH_ASSOC);

// print_r($clienteCitas);
//SELECT * FROM `clientemascotas` INNER JOIN citas ON clientemascotas.id_mascota = citas.id_mascota WHERE citas.id_cliente = 1

$sql2 = "SELECT * FROM `clientemascotas` INNER JOIN citas ON clientemascotas.id_mascota = citas.id_mascota INNER JOIN mascota ON mascota.id = citas.id_mascota WHERE citas.id_cliente = $id_cliente";
$consulta = $conexionBD->prepare($sql2);
$consulta->execute();
$clienteCitas = $consulta->fetchAll(PDO::FETCH_ASSOC);


// print_r($clientemascotas);
// echo '<pre>';
// var_dump($clientemascotas);
// echo '</pre>';
// echo "<br>";


// $listaMascotas=$conexionBD->query($sql2);
// $mascotas=$listaMascotas->fetchAll();
// $sql2="SELECT * FROM mascota WHERE id = 1";
// $consulta = $conexionBD->prepare($sql2);
// $consulta->execute();
// $mascotas = $consulta->fetch(PDO::FETCH_ASSOC);

// print_r($mascotas);

?>