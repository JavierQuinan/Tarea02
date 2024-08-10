<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}

require_once('../models/productos.model.php');
error_reporting(0);
$productos = new Productos;

switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $productos->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $idProducto = $_POST["idProducto"];
        $datos = array();
        $datos = $productos->uno($idProducto);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar':
        $codigoBarras = $_POST["codigoBarras"];
        $nombreProducto = $_POST["nombreProducto"];
        $grabaIVA = $_POST["grabaIVA"];

        $datos = array();
        $datos = $productos->insertar($codigoBarras, $nombreProducto, $grabaIVA);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $idProducto = $_POST["idProducto"];
        $codigoBarras = $_POST["codigoBarras"];
        $nombreProducto = $_POST["nombreProducto"];
        $grabaIVA = $_POST["grabaIVA"];

        $datos = array();
        $datos = $productos->actualizar($idProducto, $codigoBarras, $nombreProducto, $grabaIVA);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $idProducto = $_POST["idProducto"];
        $datos = array();
        $datos = $productos->eliminar($idProducto);
        echo json_encode($datos);
        break;
}
?>
