<?php
require_once '../../clases/Clientes.php';
require_once '../../clases/Conexion.php';
$id = $_POST['id'];
$obj = new Usuario();
echo $obj->delete($id);
?>