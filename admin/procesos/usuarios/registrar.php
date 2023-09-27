<?php
require_once '../../clases/Usuario1.php';
require_once '../../clases/Conexion.php';
$nombre = $_POST['txtnombre'];
$txtapellido = $_POST['txtapellido'];
$txtclave = $_POST['txtclave'];
$txttipo = $_POST['txttipo'];
$txtestado = $_POST['txtestado'];
$txtcorreo = $_POST['txtcorreo'];
$datos = array($nombre,$txtapellido,$txtclave,$txttipo,$txtestado,$txtcorreo);
$obj = new Usuario();
echo $obj->save($datos);
?>