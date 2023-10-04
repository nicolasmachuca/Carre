<?php
require_once '../../clases/Clientes.php';
require_once '../../clases/Conexion.php';
$nombre = $_POST['txtnombre'];
$txtapellido = $_POST['txtapellido'];
$txtcorreo = $_POST['txtcorreo'];
$txttelefono= $_POST['txttelefono'];
$txtdireccion = $_POST['txtdireccion'];
$txtlocalidad = $_POST['txtlocalidad'];
$txtestado = $_POST['txtestado'];
$txtclave = $_POST['txtclave'];
$datos = array($nombre,$txtapellido,$txtcorreo,$txttelefono,$txtdireccion,$txtlocalidad,$txtestado,$txtclave);
$obj = new Usuario();
echo $obj->save($datos);
?>