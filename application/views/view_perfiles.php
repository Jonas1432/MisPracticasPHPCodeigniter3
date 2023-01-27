<div class="container">
    <div class="row">
        <div class="card card-cascade narrower border border-light">
            <div class="card-header" style="background-image: radial-gradient(circle at 50% -20.71%, #ade5ff 0, #7dcefb 25%, #3cb5f2 50%, #009ce9 75%, #0085e0 100%); color: #fff;">
                <div class="row">
                    <div class="col-6 col-md-11 col-sm-11">
                        <h1>&nbsp; Gestión de Perfiles</h1>
                    </div>
                    <div class="col-6 col-md-1 col-sm-1">
                        <br>
                        <button type="button" class="btn btn-primary" style="background-image: radial-gradient(circle at 50% -20.71%, #505467 0, #1f3259 50%, #00154b 100%); color: #fff;" data-toggle="modal" data-target="#myModal">+</button>
                    </div>
                </div>
            </div>
            <br>
            <div class="card-body">
                <div style="box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;">
                    <div class="table-wrapper">
                        <table class="table table-hover" id="myTable">
                            <thead style="color:#2380C4;">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Especialidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Trigger the modal with a button -->
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title text-center">Registro de Perfil</h2>
            </div>
            <div class="modal-body">
                <form action="">
                <input type="hidden" name="id_perfil" id="id_perfil" >
                    
                    <div class="form-group">
                        <label for="nombre_perfil">Nombre del Perfil:</label>
                        <input type="text" class="form-control" id="nombre_perfil" name="nombre_perfil">
                    </div>
                    <div class="form-group">
                        <label for="especialidad">Especialidad:</label>
                        <input type="text" class="form-control" id="especialidad" name="especialidad">
                    </div>
                    <input type="hidden" name="acction" id="acction" value="nuevo">
                    <br>
                    <button type="button" class="btn btn-success" id="save"> Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </form>
            </div>
            <div class="modal-footer text-center" style="background-image: radial-gradient(circle at 50% -20.71%, #ade5ff 0, #7dcefb 25%, #3cb5f2 50%, #009ce9 75%, #0085e0 100%); color: #fff;"">

            </div>
        </div>

    </div>
</div>

<script type='text/javascript'>
    $(document).ready(function() {
        //alert('Hola mundo')
        //console.log('Hola mindo desde una consola')


        $('#save').click(function(e) {
            // evitar lo que pasaría por default
            e.preventDefault();

            //alert($("form").serialize());
            Swal.fire({
                        title: 'Estas seguro de querer realizar esta acción?',
                        text: "",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                        url: "<?php echo base_url('Perfiles/registrar') ?>",
                        method: 'POST',
                        data: $("form").serialize(),
                        cache: false,
                        //contentType: false,
                        //processData: false,
                        dataType: 'json',
                        success: function(respuesta) {
                            // var data = JSON.parse(respuesta);
                            $('#myModal').modal('hide');
                            $("form")[0].reset();
                            //console.log(respuesta);
                            setTimeout(function(){
                            location.reload();
                            }, 1000);
                    
                        }
                    })
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Excelente',
                        showConfirmButton: false,
                        timer: 1000
                    })
                    }else{
                        $('#myModal').modal('hide');
                    }
            })

           

        });

        $('#myTable').DataTable({
           /* ajax: {
                url: '<?php echo base_url('Perfiles/listar') ?>',
                dataSrc: '',
                dataType: 'json',
            },
            columns: [
                {
                    data: 'id_perfil'
                },
                {
                    data: 'nombre_perfil'
                },
                {
                    data: 'especialidad'
                },
                {
                data: null,
                    render: function (data, type, row, meta) {
                    let fila = meta.row;
                    let botones = 
                            `<a class='btn btn-primary btn-circle'>
                                <i class="fa-solid fa-pen"></i> 
                            </a> 
                            <a class='btn btn-danger btn-circle'>
                                <i class="fa-solid fa-trash"></i>
                            </a>`;
                        return botones;
                    }
                },
            ],*/

            "ajax": {
                url: '<?php echo base_url('Perfiles/listar') ?>',
                type: 'POST',
                
            },
           
            "pageLength": 4,
            lengthMenu: [
                [4, 10, 25, 50],
                [4, 10, 25, 50]
            ],
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json",
            }
        });
    
        
    });
    /*$(document).on('click', '.update', function(){
            var idfront = $(this).attr('id_perfil');
            alert(id_perfil);
            $.ajax({
            url: "<?php echo base_url('Perfiles/actualizar') ?>",
            method: 'POST',
            data: {idback : idfront},
            dataType: 'json',
            success: function(respuesta) {
                //comprobamos la respuesta del back
                //console.log(respuesta)
                //en ocasiones es necesario parsear la respuesta 
                //var data = JSON.parse(respuesta);
                $('#myModal').modal('show');
                $('#id_perfil').val(respuesta.id_perfil);
                $('#nombre_perfil').val(respuesta.nombre_perfil);
                $('#especialidad').val(respuesta.especialidad);
                $('#acction').val('editar');

            }
        })
    }); */

    function updateData(id) {
        //alert(id)
        $.ajax({
            url: "<?php echo base_url('Perfiles/actualizar') ?>",
            method: 'POST',
            data: {idback : id},
            dataType: 'json',
            success: function(respuesta) {
                $('#myModal').modal('show');
                $('#id_perfil').val(respuesta.id_perfil);
                $('#nombre_perfil').val(respuesta.nombre_perfil);
                $('#especialidad').val(respuesta.especialidad);
                $('#acction').val('editar');
                  

            }
        })
    }
    function eliminar(id) {
        Swal.fire({
            title: 'Estas seguro de querer realizar esta acción?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Aceptar'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                    url: "<?php echo base_url('Perfiles/eliminar') ?>",
                    method: 'POST',
                    data: {idback : id},
                    dataType: 'json',
                    success: function(respuesta) {
                        
                    }
                })
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Eliminado exitoso',
                        showConfirmButton: false,
                        timer: 1000
                    })
                    
                    setTimeout(function(){
                        
                        location.reload();
                    }, 1000);
        }
})
        
    }
    
</script>