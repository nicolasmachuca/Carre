<?php
require_once '../../clases/Producto.php';
require_once '../../clases/Conexion.php';
$id = $_POST['id_producto'];
$nombre = $_POST['txtnombree'];
$descripcion = $_POST['txtdescripcione'];
$txtprecioc = $_POST['txtprecioce'];
$txtpreciov = $_POST['txtpreciove'];
$txtstock = $_POST['txtstocke'];
$txtimagen = $_POST['txtimagene'];
$txtcategoria = $_POST['txtcategoriae'];
$datos = array($id,$nombre,$descripcion, $txtprecioc,$txtpreciov,$txtstock,$txtimagen,$txtcategoria);
$obj = new Producto();
echo $obj->edit($datos);
?>