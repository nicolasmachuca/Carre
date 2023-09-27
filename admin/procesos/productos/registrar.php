<?php
require_once '../../clases/Producto.php';
require_once '../../clases/Conexion.php';
$nombre = $_POST['txtnombre'];
$descripcion = $_POST['txtdescripcion']
$txtprecioc = $_POST['txtprecioc'];
$txtpreciov = $_POST['txtpreciov'];
$txtstock = $_POST['txtstock'];
$txtimagen = $_POST['txtimagen'];
$txtcategoria = $_POST['txtcategoria'];
$datos = array($nombre,$descripcion,$txtprecioc,$txtpreciov,$txtstock,$txtimagen,$txtcategoria);
$obj = new Producto();
echo $obj->save($datos);
?>