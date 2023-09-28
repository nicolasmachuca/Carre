		        		<!-- BEGIN CSS for this page -->
		<link href="../assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
<?php
require 'header.php';

if(isset($_SESSION['usuario']))
{



?>



<!-- Modal -->
<div class="modal fade" id="exampleModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar usuairo Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="frmusuario">
        <div class="row">
           
            <label>Nombre (*)</label>
            <input type="text" class="form-control" id="txtnombre" name="txtnombre">
            <label>Apellido (*)</label>
            <input type="text" class="form-control" id="txtapellido" name="txtapellido">
            <label>clave (*)</label>
            <input type="password" class="form-control" id="txtclave" name="txtclave">
            <label>tipo (*)</label>
            <input type="text" class="form-control" id="txttipo" name="txttipo">
            <label>estado (*)</label>
            <input type="number" class="form-control" id="txtestado" name="txtestado">
            <label>correo (*)</label>
            <input type="email" class="form-control" id="txtcorreo" name="txtcorreo">

           
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnregistrar">Guardar</button>
      </div>
    </div>
  </div>
</div>
    
    




<!-- Modal -->
<div class="modal fade" id="exampleModal2"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar usuario Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<div class="modal-body">
       <form id="frmusuarioe">
        <div class="row">
           
            <label>Nombre (*)</label>
            <input type="text" class="form-control" id="txtnombree" name="txtnombree">
            <label>Apellido (*)</label>
            <input type="text" class="form-control" id="txtapellidoe" name="txtapellidoe">
            <label>clave (*)</label>
            <input type="password" class="form-control" id="txtclavee" name="txtclavee">
            <label>tipo (*)</label>
            <input type="text" class="form-control" id="txttipoe" name="txttipoe">
            <label>estado (*)</label>
            <input type="number" class="form-control" id="txtestadoe" name="txtestadoe">
            <label>correo (*)</label>
            <input type="email" class="form-control" id="txtcorreoe" name="txtcorreoe">

            
            </form>
        </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btneditar" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
    
      

    <div class="content-page">
	
    <!-- Start content -->
    <div class="content">
        
        <div class="container-fluid">
                
                    <div class="row">
                                <div class="col-xl-12">
                                        <div class="breadcrumb-holder">
                                                <h1 class="main-title float-left">Usuario Admin</h1>
                                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                 Registrar
                                                </button>
                                                <div class="clearfix">
                                                								   
									
                                                </div>
                                        </div>
                                </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                       <!-- Button trigger modal -->
                       
                        <div class="col-lg-12">
                        <table  id="myTable" class="table">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Nombre</td>
                                    <td>Apellido</td>
                                    <td>Clave</td>
                                    <td>Tipo</td>
                                    <td>Estado</td>
                                    <td>Correo</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                        </div>
                        
                    </div>



        </div>
        <!-- END container-fluid -->

    </div>
    <!-- END content -->

</div>
<!-- END content-page -->



<?php
require 'footer.php';
}
else {
	header("location:../index.php");  
}

?>


<script>
$(document).ready(function(){
    /*$('#txtproveedor').select2({
        dropdownParent: $("#exampleModal .modal-content")
    });
    $('#txtcategoria').select2({
        dropdownParent: $("#exampleModal .modal-content")
    });
    $('#txtproveedore').select2({
        dropdownParent: $("#exampleModal2 .modal-content")
    });
    $('#txtcategoriae').select2({
        dropdownParent: $("#exampleModal2 .modal-content")
    });*/
    
    var table = $('#myTable').DataTable({
        "ajax":{
            "url":"../procesos/usuarios/mostrar.php",
            "type":"GET"
            //"crossDomain": "true",
            //"dataType": "json",
            //"dataSrc":""
        },
        "columns":[
            {
                "data":"id_usuario"
            },
            {
                "data":"nombre"
            },
            {
                
                "data":"apellido"
            },
            {
                
                "data":"clave",
                "render": function (data) {
                // Muestra ***** en lugar de la contraseña real
                return '*****';
            }
                  
            },
            {
                
                "data":"tipo"
            },
            {
                
                "data":"estado"
            },
            {
                
                "data":"correo"
            },
            {
                sTitle: "Eliminar",
                mDataProp: "id_usuario",
                sWidth: '7%',
                orderable: false,
                render: function(data) {
                    acciones = `<button id="` + data + `" value="Eliminar"  type="button" class="fa fa-times btn btn-danger accionesTabla" >
                                    
                                </button>`;
                    return acciones
                }
            },
            {
                sTitle: "Editar",
                mDataProp: "id_usuario",
                sWidth: '7%',
                orderable: false,
                render: function(data) {
                    acciones = `<button id="` + data + `" value="Traer" class="fa fa-pencil-square-o btn btn-primary accionesTabla" data-toggle="modal" data-target="#exampleModal2" type="button"  >
                                    
                                </button>`;
                    return acciones
                }
            },
            /*{
                sTitle: "Añadir",
                mDataProp: "id_usuario",
                sWidth: '7%',
                orderable: false,
                render: function(data) {
                    acciones = `<button id="` + data + `" value="Añadir" class="fa fa-plus-circle btn btn-success accionesTabla" data-toggle="modal" data-target="#exampleModal3" type="button"  >
                                    
                                </button>`;
                    return acciones
                }
            }*/
        ],
        responsive:true,
                "ordering": false


    });
    
$(document).on('click', '.accionesTabla', function() {
    var id = this.id;
    var val = this.value;

    switch (val) {
        case "Traer":
                    $.ajax({
                        method : "GET",
                        url : "../procesos/usuarios/traer.php",
                        data:'id_usuario='+id
                    }).done(function(msg) {
                        var dato=JSON.parse(msg);
                        
				        $('#txtnombree').val(dato['nombre']);
                        $('#txtapellidoe').val(dato['apellido']);
                        $('#txtclavee').val(dato['clave']);
                        $('#txttipoe').val(dato['tipo']);
                        $('#txtestadoe').val(dato['estado']);
                        $('#txtcorreoe').val(dato['correo']);
                        
                        
                        
                        $('#btneditar').unbind().click(function(){
                            vacios = validarFormVacio('frmusuarioe');
                            
                            
                            if(vacios <= 0)
                                {
                            nom = $("#txtnombree").val();
                            ape = $("#txtapellidoe").val();
                            cla = $("#txtclavee").val();
                            tip = $("#txttipoe").val();
                            est = $("#txtestadoe").val();
                            corr = $("#txtcorreoe").val();
                             oka = {
						                "txtnombree" : nom , "id_usuario" : id,
                                        "txtapellidoe" : ape, "txtclavee" : cla,
                                        "txttipoe" : tip, "txtestadoe" : est,
                                        "txtcorreoe" : corr,
                                };
                            //alert(oka);
                            //alert(JSON.stringify(oka));
                            $.ajax({
                                method : "POST",
                                //contentType: 'application/json; charset=utf-8',
                                url : "../procesos/usuarios/editar.php",
                                data : oka
                                }).done(function(msg) {
                                alertify.success("Usuario Editado Correctamente!");
                                table.ajax.reload();
                                });                               
                                    
                                }
                            else{
                                alertify.error("Complete los datos");
                            }

                        });
                    });
            break;
        case "Eliminar":
            
            alertify.confirm('Usuario', '¿Esta seguro que desea eliminar este Usuario?', function()
                {
                        $.ajax({
                                type:"POST",
                                url : "../procesos/usuarios/eliminar.php",
                                data : "id="+id
                            }).done(function(msg) {
                                alertify.success("Usuario Eliminado Correctamente");
                                table.ajax.reload();
                            });
                }
                , function(){
                
                });



        
                    break;
        case "Añadir":
                        $('#btnañadir').unbind().click(function(){
                            vacios = validarFormVacio('frmusuaroa');
                            
                            
                            if(vacios <= 0)
                                {
                            noma = $("#txtstocka").val();
                             oka = {
						                "txtstock" : noma , "id_usuario" : id
                                };
                            //alert(oka);
                            //alert(JSON.stringify(oka));
                            $.ajax({
                                method : "POST",
                                //contentType: 'application/json; charset=utf-8',
                                url : "../procesos/usaurios/stock.php",
                                data : oka
                                }).done(function(msg) {
                                if(msg == 1)
                                    {
                                alertify.success("Stock Agregado Correctamente!");
                                table.ajax.reload();  
                                    }
                                else if(msg == "n")
                                    {
                                alertify.error("Ingrese un numero valido");                                        
                                    }
                                else{
                                     alertify.error("No se pudo añadir");
                                }

                                });                               
                                    
                                }
                            else{
                                alertify.error("Complete los datos");
                            }

                        });
            break;
        default:
            alert("No existe el valor");
            break;
    }
    });    
    
    
    
    $('#btnregistrar').click(function(){
        vacios = validarFormVacio('frmusuario');
        if(vacios <= 0 )
            {
            datos=$('#frmusuario').serialize();
            $.ajax({
               type:'post',
                url:'../procesos/usuarios/registrar.php',
                data:datos,
                success:function(r)
                {
                    
                    if(r==1)
                        {
                            alertify.success("Usuario Registrado Correcamente");
                            table.ajax.reload();
                        }
                    else if(r==0)
                        {
                            alertify.error("No se pudo registrar");
                        }
                    else
                        {
                            alert(r);
                        }
                }
            });
            }
        else{
            alertify.error("Complete los datos");
        }
    });
});
</script>


