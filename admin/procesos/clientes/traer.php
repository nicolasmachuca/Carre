<?php
require_once '../../clases/clientes.php';
require_once '../../clases/Conexion.php';
$id = $_GET['id_cliente'];
$obj = new Usuario();
echo json_encode($obj->traer($id));
?>