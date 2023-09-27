<?php
require_once '../../clases/Usuario1.php';
require_once '../../clases/Conexion.php';
$id = $_POST['id_usuario'];
$nombre = $_POST['txtnombree'];
$txtapellido = $_POST['txtapellidoe'];
$txtclave = $_POST['txtclavee'];
$txttipo = $_POST['txttipoe'];
$txtestado = $_POST['txtestadoe'];
$txtcorreo = $_POST['txtcorreoe'];
$datos = array($id,$nombre,$txtapellido,$txtclave,$txttipo,$txtestado,$txtcorreo);
$obj = new Usuario();
echo $obj->edit($datos);
?>