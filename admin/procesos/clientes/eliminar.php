<?php
require_once '../../clases/Usuario1.php';
require_once '../../clases/Conexion.php';
$id = $_POST['id'];
$obj = new Usuario();
echo $obj->delete($id);
?>