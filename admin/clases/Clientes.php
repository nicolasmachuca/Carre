<?php
class Usuario{
            public function save($datos)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$nombre = $c->test_input($datos[0]);  
            $apellido = $c->test_input($datos[1]);
            $correo = $c->test_input($datos[2]);
            $telefono = $c->test_input($datos[3]);
            $direccion = $c->test_input($datos[4]);
            $localidad = $c->test_input($datos[5]);
            $estado = $c->test_input($datos[6]);
            $clave = $c->test_input($datos[7]);
			$sql = "INSERT INTO clientes (nombre,apellido,correo,telefono,direccion,localidad,estado,clave) values('$nombre','$apellido','$correo','$telefono','$direccion','$localidad','$estado','$clave')";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
                public function edit($datos)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
            $id = $datos[0];
			$nombre = $c->test_input($datos[1]);
            $apellido = $c->test_input($datos[2]);
            $correo = $c->test_input($datos[3]);
            $telefono = $c->test_input($datos[4]);
            $direccion = $c->test_input($datos[5]);
            $localidad = $c->test_input($datos[6]);
            $estado = $c->test_input($datos[7]);
            $clave= $c->test_input(md5($datos[8]));
			$sql = "update clientes set nombre = '$nombre', apellido = '$apellido', correo = '$correo',
            telefono = '$telefono', direccion = '$direccion', localidad = '$localidad', estado = '$estado', clave = '$clave' where id_cliente=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
                public function delete($id)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "update clientes set estado = '2' where id_cliente=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
    public function mostrar()
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "SELECT id_cliente,nombre,apellido,correo,telefono,direccion,localidad,estado,clave FROM clientes where estado = 1";

			$result = mysqli_query($conexion,$sql);
            return $result; 
    }
    public function traer($id)
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "select * from clientes where id_cliente=$id";
			$result = mysqli_query($conexion,$sql);
            $ver = mysqli_fetch_row($result);
            $datos = array(
               "id_cliente" =>html_entity_decode($ver[0]),
               "nombre" =>html_entity_decode($ver[1]),
               "apellido" =>html_entity_decode($ver[2]),
               "correo" =>html_entity_decode($ver[3]),
               "telefono" =>html_entity_decode($ver[4]),
               "direccion" =>html_entity_decode($ver[5]),
               "localidad" =>html_entity_decode($ver[6]),
               "estado" =>html_entity_decode($ver[7]),
               "clave" =>html_entity_decode($ver[8]),
             );
            return $datos;
    }
    
    
    
}
