<?php
require_once '../../clases/Clientes.php';
require_once '../../clases/Conexion.php';
$id = $_POST['id_cliente'];
$nombre = $_POST['txtnombree'];
$txtapellido = $_POST['txtapellidoe'];
$txtcorreo = $_POST['txtcorreoe'];
$txttelefono = $_POST['txttelefonoe'];
$txtdireccion = $_POST['txtdireccione'];
$txtlocalidad = $_POST['txtlocalidade'];
$txtestado = $_POST['txtestadoe'];
$txtclave = $_POST['txtclavee'];
$datos = array($id,$nombre,$txtapellido,$txtcorreo,$txttelefono,$txtdireccion,$txtlocalidad,$txtestado,$txtclave);
$obj = new Usuario();
echo $obj->edit($datos);
?>