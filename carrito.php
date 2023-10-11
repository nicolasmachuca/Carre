<?php
                        // Conecta base
                        $db = mysqli_connect('localhost', 'root', '', 'carre5_db');

                        // Query database
                        $result = mysqli_query($db, 'SELECT * FROM pedido_detalle');

                    // Tabla
                    while ($row = mysqli_fetch_array($result)) {
                       
                       echo '<tr>';
                       echo '<td>' .'<img src = "data:ima/.png;base64,' . base64_encode($row['imagen']) . '" width = "50px" height = "50px"/>'. '</td>';

                    // echo '<td>' . $row ['img src="img/product-1.jpg"']. '</td>';
                       echo '<td>' . $row['id_detalle'] . '</td>';
                       echo '<td>' . $row['id_pedido'] . '</td>';
                       echo '<td>' . $row['id_producto'] . '</td>';
                       echo '<td> <input type="number" id="carrito-item-cantidad" name="carrito-item-cantidad" value="1" min="1" max="'.$row['stock'].'"></td>';
                       echo '<td>' . $row['subtotal'] .  '</td>' ;
                      // echo '<td>' . $row['cantidad'] . '</td>';

                       
                       //echo '<td class="align-middle"><button onclick="eliminarDelCarrito(' . $row['ID'] . ')" class="btn-eliminar btn-sm btn-danger"><i class="fa fa-times"></i></button></td>';
                       
                       // problema desde aca
                        // if (isset($_POST["cant"])) {
                        // $cant = $_POST["cant"];
                        // $total = $cant * $row['precio'];
                        // echo '<td>' . $total . '</td>';
                        // }
                     
                        // echo '<td>' . $row['precio'] * 2 . '</td>';
                        echo '<td class="align-middle"><button onclick="eliminarDelCarrito(' . $row['id_producto'] . ')" class="btn-eliminar btn-sm btn-danger"><i class="fa fa-times"></i></button></td>';
                        //echo '<td class="align-middle"><button onclick="eliminarItemCarrito()" class="btn-eliminar btn-sm btn-danger"><i class="fa fa-times" onclick="eliminarItemCarrito()" )> </i></button></td>';
 
                        echo '</tr>';  
                    }
                        echo '</table>';
                        mysqli_close($db);
                        
                    

                        // Función para obtener la lista de productos desde la base de datos
                    function obtenerListaProductos($conn)
                   {
                   $sql = "SELECT * FROM carrito";
                      $result = $conn->query($sql);

                     return $result->fetch_all(MYSQLI_ASSOC);
                    }
                     // Función para eliminar un producto del carrito de compras
                     function eliminarDelCarrito($productoId)
                     {
                 // Verificar si el carrito de compras existe en la sesión
                 if (isset($_SESSION["carrito"]) && is_array($_SESSION["carrito"])) {
                 
                 // Verificar si el producto está en el carrito
                 if (isset($_SESSION["carrito"][$productoId])) {
                 // Eliminar el producto del carrito
                 unset($_SESSION["carrito"][$productoId]);
                 echo "El producto se ha eliminado del carrito de compras.";
                 } else {
                     echo "El producto no está en el carrito de compras.";
                 }
                     } else {
                 echo "El carrito de compras está vacío.";
                 }
                 }
                    // Verificar si se ha recibido el ID del producto
                    if (isset($_POST['id_produc'])) {
                        $productID = $_POST['id_produc'];
                                    
                        // Obtener la información del producto seleccionado
                        $query = "SELECT * FROM carrito WHERE id_produc = $id_produc";
                        $resultado = mysqli_query($conexion, $query);
                    
                        // Verificar si el producto existe y está disponible
                        if ($row = mysqli_fetch_assoc($resultado)) {
                            $nombreProducto = $row['detalle'];
                            $precioProducto = $row['precio'];
                            $contenidoProducto = $row['contenido'];
                            $stockProducto = $row['stock'];
                    
                            if ($stockProducto > 0) {
                                // El producto está disponible, agregarlo al carrito
                                session_start();
                                if (!isset($_SESSION['carrito'])) {
                                    $_SESSION['carrito'] = [];
                                }
                                $_SESSION['carrito'][] = array(
                                    'id_produc' => $productID,
                                    'detalle' => $nombreProducto,
                                    'contenido' => $contenidoProducto,
                                    'precio' => $precioProducto
                                );
                    
                                // Actualizar el stock en la base de datos
                                $nuevoStock = $stockProducto - 1;
                                $actualizarQuery = "UPDATE carrito SET stock = $nuevoStock WHERE id_produc = $productID";
                                mysqli_query($conexion, $actualizarQuery);
                    
                                // Redireccionar al usuario de vuelta a la página de la tienda o a la del carrito de compras
                                header("Location: shop.php");
                                exit();
                            } else {
                                // El producto no está disponible
                                echo "El producto '$nombreProducto' no está disponible en stock.";
                            }
                            } else {
                                // El producto no existe
                                echo "El producto con ID '$productID' no existe.";
                            }
                            $sql = "UPDATE * from carrito WHERE id_produc = $id_produc ";
                            $conn->query($sql);
                  
                        // Cerrar la conexión a la base de datos
                        mysqli_close($conexion);
                     }
                  
                        // Función para restar el stock de productos
                        function restarStock($conn, $id_produc, $cantidad)
                        {
                           // Obtener el stock actual del producto
                          $sql = "SELECT stock FROM carrito WHERE id_produc = $id_produc";
                         $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                         $row = $result->fetch_assoc();
                          $stockActual = $row["stock"];

                          // Verificar si hay suficiente stock disponible
                         if ($stockActual >= $cantidad) {
                            $stockRestante = $stockActual - $cantidad;

                         // Actualizar el stock en la base de datos
                            $sql = "UPDATE carrito SET stock = $stockRestante WHERE id_produc = $id_produc";
                             $conn->query($sql);

                         return true; // Se restó el stock exitosamente
                         } else {
                           return false; // No hay suficiente stock disponible
                            }
                             }

                           return false; // No se encontró el producto en la base de datos
                      }