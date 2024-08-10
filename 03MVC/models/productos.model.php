<?php
// TODO: Clase de Productos
require_once('../config/config.php');

class Productos
{
    // TODO: Implementar los métodos de la clase

    public function todos() // select * from productos
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `productos`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($idProducto) // select * from productos where id = $id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `productos` WHERE `idProducto`=$idProducto";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($codigoBarras, $nombreProducto, $grabaIVA) // insert into productos (codigoBarras, nombreProducto, grabaIVA) values ($codigoBarras, $nombreProducto, $grabaIVA)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `productos` (`codigoBarras`, `nombreProducto`, `grabaIVA`) 
                       VALUES ('$codigoBarras', '$nombreProducto', '$grabaIVA')";
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function actualizar($idProducto, $codigoBarras, $nombreProducto, $grabaIVA) // update productos set codigoBarras = $codigoBarras, nombreProducto = $nombreProducto, grabaIVA = $grabaIVA where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `productos` 
                       SET `codigoBarras`='$codigoBarras', `nombreProducto`='$nombreProducto', `grabaIVA`='$grabaIVA' 
                       WHERE `idProducto` = $idProducto";
            if (mysqli_query($con, $cadena)) {
                return $idProducto;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function eliminar($idProducto) // delete from productos where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `productos` WHERE `idProducto`= $idProducto";
            if (mysqli_query($con, $cadena)) {
                return 1;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}
?>

