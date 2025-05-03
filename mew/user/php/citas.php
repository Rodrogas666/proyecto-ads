<?php
include_once('../../../config/bd.php');

// Hace la conexión a la base de datos
$conexionBD = BD::crearInstancia();

// Variables iniciales
$asunto = isset($_POST['asunto']) ? trim($_POST['asunto']) : '';
$mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';
$fecha_hora = isset($_POST['fecha']) ? trim($_POST['fecha']) : '';
$estado = "Not taken";
$id_cliente = $_SESSION['usuario'];
$mascota = isset($_POST['mascota']) ? intval($_POST['mascota']) : 0;
$accion = isset($_POST['accion']) ? trim($_POST['accion']) : '';

// Procesar acciones
if ($accion != '') {
    switch ($accion) {
        case 'agregar':
            // Validar que la fecha no sea anterior a la actual
            $fecha_actual = new DateTime();
            $fecha_ingresada = new DateTime($fecha_hora);

            if ($fecha_ingresada < $fecha_actual) {
                echo "<script>
                alert('La fecha no puede ser anterior a la fecha actual.');
                window.location.href = 'vista_citas_usuario.php';
                </script>";
                exit();
            }

            // Inserta una nueva cita
            $sql = "INSERT INTO citas (id_cita, asunto, fecha, estado, id_cliente, id_mascota) 
                    VALUES (NULL, :asunto, :fecha, :estado, :id_cliente, :id_mascota)";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':asunto', $asunto);
            $consulta->bindParam(':fecha', $fecha_hora);
            $consulta->bindParam(':estado', $estado);
            $consulta->bindParam(':id_cliente', $id_cliente);
            $consulta->bindParam(':id_mascota', $mascota);
            $consulta->execute();

            echo "<script>
            alert('Cita agendada :)');
            window.location.href = 'vista_citas_usuario.php';
            </script>";
            break;

        case 'editar':
            // Actualiza una cita existente
            $sql = "UPDATE citas SET asunto=:asunto, fecha=:fecha, estado=:estado 
                    WHERE id_cita=:id_cita AND id_cliente=:id_cliente";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id_cita', $id_cita);
            $consulta->bindParam(':asunto', $asunto);
            $consulta->bindParam(':fecha', $fecha_hora);
            $consulta->bindParam(':estado', $estado);
            $consulta->bindParam(':id_cliente', $id_cliente);
            $consulta->execute();

            echo "<script>
            alert('Cita actualizada :)');
            window.location.href = 'vista_citas_usuario.php';
            </script>";
            break;

        case 'borrar':
            // Elimina una cita
            $sql = "DELETE FROM citas WHERE id_cita=:id_cita AND id_cliente=:id_cliente";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id_cita', $id_cita);
            $consulta->bindParam(':id_cliente', $id_cliente);
            $consulta->execute();

            echo "<script>
            alert('Cita eliminada :)');
            window.location.href = 'vista_citas_usuario.php';
            </script>";
            break;

        default:
            echo "<script>
            alert('Acción no válida.');
            window.location.href = 'vista_citas_usuario.php';
            </script>";
            break;
    }
}

// Consultar mascotas del cliente
$sql1 = "SELECT * FROM `clientemascotas` 
         INNER JOIN mascota ON clientemascotas.id_mascota = mascota.id 
         WHERE id_cliente = :id_cliente";
$consulta1 = $conexionBD->prepare($sql1);
$consulta1->bindParam(':id_cliente', $id_cliente);
$consulta1->execute();
$clientemascotas = $consulta1->fetchAll(PDO::FETCH_ASSOC);

// Consultar citas del cliente
$sql2 = "SELECT * FROM `clientemascotas` 
         INNER JOIN citas ON clientemascotas.id_mascota = citas.id_mascota 
         INNER JOIN mascota ON mascota.id = citas.id_mascota 
         WHERE citas.id_cliente = :id_cliente";
$consulta2 = $conexionBD->prepare($sql2);
$consulta2->bindParam(':id_cliente', $id_cliente);
$consulta2->execute();
$clienteCitas = $consulta2->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
/*
<?php

include_once('../../../config/bd.php');
//Hace la conexión a la base de datos
$conexionBD = BD::crearInstancia();

$asunto = isset($_POST['asunto']) ? $_POST['asunto'] : '';
$mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : '';
$fecha_hora = isset($_POST['fecha']) ? $_POST['fecha'] : '';
$estado = "Not taken";
$id_cliente = $_SESSION['usuario'];
$mascota = isset($_POST['mascota']) ? $_POST['mascota'] : '';
$mascota = intval($mascota);

$accion = isset($_POST['accion']) ? $_POST['accion'] : '';

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
            break;
    }
}

$sql1 = "SELECT * FROM `clientemascotas` INNER JOIN mascota ON clientemascotas.id_mascota = mascota.id WHERE id_cliente = $id_cliente";
$listaClienteMascotas = $conexionBD->query($sql1);
$clientemascotas = $listaClienteMascotas->fetchAll();

$sql2 = "SELECT * FROM `clientemascotas` INNER JOIN citas ON clientemascotas.id_mascota = citas.id_mascota INNER JOIN mascota ON mascota.id = citas.id_mascota WHERE citas.id_cliente = $id_cliente";
$consulta = $conexionBD->prepare($sql2);
$consulta->execute();
$clienteCitas = $consulta->fetchAll(PDO::FETCH_ASSOC);

?>
*/