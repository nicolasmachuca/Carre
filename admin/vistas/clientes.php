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
        <h5 class="modal-title" id="exampleModalLabel">Registrar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="frmcliente">
        <div class="row">
           
            <label>Nombre (*)</label>
            <input type="text" class="form-control" id="txtnombre" name="txtnombre">
            <label>Apellido (*)</label>
            <input type="text" class="form-control" id="txtapellido" name="txtapellido">
            <label>correo (*)</label>
            <input type="email" class="form-control" id="txtcorreo" name="txtcorreo">
            <label>telefono (*)</label>
            <input type="text" class="form-control" id="txttelefono" name="txttelefono">
            <label>direccion (*)</label>
            <input type="text" class="form-control" id="txtdireccion" name="txtdireccion">
            <label>localidad (*)</label>
            <input type="text" class="form-control" id="txtlocalidad" name="txtlocalidad">
            <label>estado (*)</label>
            <input type="number" class="form-control" id="txtestado" name="txtestado">
            <label>clave (*)</label>
            <input type="password" class="form-control" id="txtclave" name="txtclave">
            
            

           
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
        <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<div class="modal-body">
       <form id="frmclientee">
        <div class="row">
           
            <label>Nombre (*)</label>
            <input type="text" class="form-control" id="txtnombree" name="txtnombre">
            <label>Apellido (*)</label>
            <input type="text" class="form-control" id="txtapellidoe" name="txtapellido">
            <label>correo (*)</label>
            <input type="email" class="form-control" id="txtcorreoe" name="txtcorreo">
            <label>telefono (*)</label>
            <input type="text" class="form-control" id="txttelefonoe" name="txttelefono">
            <label>direccion (*)</label>
            <input type="text" class="form-control" id="txtdireccione" name="txtdireccion">
            <label>localidad (*)</label>
            <input type="text" class="form-control" id="txtlocalidade" name="txtlocalidad">
            <label>estado (*)</label>
            <input type="number" class="form-control" id="txtestadoe" name="txtestado">
            <label>clave (*)</label>
            <input type="password" class="form-control" id="txtclavee" name="txtclave">

            
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
                                                <h1 class="main-title float-left">Cliente</h1>
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
                                    <td>Correo</td>
                                    <td>Telefono</td>
                                    <td>Direccion</td>
                                    <td>Localidad</td>
                                    <td>Estado</td>
                                    <td>Clave</td>
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
            "url":"../procesos/clientes/mostrar.php",
            "type":"GET"
            //"crossDomain": "true",
            //"dataType": "json",
            //"dataSrc":""
        },
        "columns":[
            {
                "data":"id_cliente"
            },
            {
                "data":"nombre"
            },
            {
                
                "data":"apellido"
            },
            {
                
                "data":"correo"
            },
            {
                "data":"telefono"
            },
            {
                
                "data":"direccion"
            },
           {
                
                "data":"localidad"
            },
            {
                
                "data":"estado"
            },
            {
                
                "data":"clave",
                "render": function (data) {
                // Muestra ***** en lugar de la contraseña real
                return '*****';
                 }
                  
            },
            {
                sTitle: "Eliminar",
                mDataProp: "id_cliente",
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
                mDataProp: "id_cliente",
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
                        url : "../procesos/clientes/traer.php",
                        data:'id_cliente='+id
                    }).done(function(msg) {
                        var dato=JSON.parse(msg);
                        
				        $('#txtnombree').val(dato['nombre']);
                        $('#txtapellidoe').val(dato['apellido']);
                        $('#txtcorreoe').val(dato['correo']);
                        $('#txttelefonoe').val(dato['telefono']);
                        $('#txtdireccione').val(dato['direccion']);
                        $('#txtlocalidade').val(dato['localidad']);
                        $('#txtestadoe').val(dato['estado']);
                        $('#txtclavee').val(dato['clave']);
                        
                        
                        
                        $('#btneditar').unbind().click(function(){
                            vacios = validarFormVacio('frmclientee');
                            
                            
                            if(vacios <= 0)
                                {
                            nom = $("#txtnombree").val();
                            ape = $("#txtapellidoe").val();
                            corr = $("#txtcorreoe").val();
                            tel = $("#txttelefonoe").val();
                            dir = $("#txtdireccione").val();
                            loc = $("#txtlocalidade").val();
                            est = $("#txtestadoe").val();
                            cla = $("#txtclavee").val();
                             oka = {
                                        "id_cliente" : id,"txtnombree" : nom , 
                                        "txtapellidoe" : ape, "txtcorreoe" : corr,
                                        "txttelefonoe" : tel, "txtdireccione" : dir,
                                        "txtlocalidade" : loc,"txtestadoe" : est,
                                        "txtclavee" : cla,
                                };
                            //alert(oka);
                            //alert(JSON.stringify(oka));
                            $.ajax({
                                method : "POST",
                                //contentType: 'application/json; charset=utf-8',
                                url : "../procesos/clientes/editar.php",
                                data : oka
                                }).done(function(msg) {
                                alertify.success("Cliente Editado Correctamente!");
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
            
            alertify.confirm('Cliente', '¿Esta seguro que desea eliminar este Cliente?', function()
                {
                        $.ajax({
                                type:"POST",
                                url : "../procesos/Clientes/eliminar.php",
                                data : "id="+id
                            }).done(function(msg) {
                                alertify.success("Cliente Eliminado Correctamente");
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
						                "txtstock" : noma , "id_cliente" : id
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
        vacios = validarFormVacio('frmcliente');
        if(vacios <= 0 )
            {
            datos=$('#frmcliente').serialize();
            $.ajax({
               type:'post',
                url:'../procesos/clientes/registrar.php',
                data:datos,
                success:function(r)
                {
                    
                    if(r==1)
                        {
                            alertify.success("Cliente Registrado Correcamente");
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


