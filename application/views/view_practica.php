<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practicas</title>
</head>

<body>
    <h1 class="text-center">Operaciones de numeros</h1>
    <div class="container">
        <div class="row">
            <br>
            <div class="col-6 text-center limpiar">
                <div class="alert alert-success">
                    <strong id="resultado">Hola ☹ Que operacion desea realizar...</strong>
                </div>
            </div>
            <br>
            <form action="" id="myform">
                <div class="col-md-3 col-sm-3 col-3">
                    <div class="radio">
                        <label><input type="radio" id="suma" name="operacion" value="Sum">Suma</label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-3">
                    <div class="radio">
                        <label><input type="radio" id="resta" name="operacion" value="Res">Resta</label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-3">
                    <div class="radio">
                        <label><input type="radio" id="multiplicacion" name="operacion" value="Multi">Multiplicación</label>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-3">
                    <div class="radio">
                        <label><input type="radio" id="divicion" name="operacion" value="Div">Divición</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="one">Numero 1:</label>
                    <input type="number" class="form-control" id="one" name="one">
                </div>
                <div class="form-group">
                    <label for="two">Numero 2:</label>
                    <input type="number" class="form-control" id="two" name="two">
                </div>
                <button type="submit" class="btn btn-primary" id="save"> Calcular</button>
            </form>
        </div>
    </div>

</body>

</html>
<script type='text/javascript'>
    $(document).ready(function() {
        //alert('Hola');
        $('#save').click(function(e) {
            // evitar lo que pasaría por default
            e.preventDefault();

            var one = document.getElementById('one').value;
            var two = document.getElementById('two').value;

            var opc = $('input:radio[name=operacion]:checked').val();
            if (opc == "Sum" && one != '' && two != '') {
                var suma = parseInt(one) + parseInt(two);
                document.getElementById("resultado").innerHTML = "El resultado es: " + suma;
                setTimeout(function() {
                    $(".limpiar").css({
                        'visibility': 'hidden'
                    });
                    document.getElementById('myform').reset();
                }, 1000);
                $(".limpiar").css({
                    'visibility': 'visible'
                });
            } else if (opc == "Res" && one != '' && two != '') {
                var resta = parseInt(one) - parseInt(two);
                document.getElementById("resultado").innerHTML = "El resultado es: " + resta;
                setTimeout(function() {
                    $(".limpiar").css({
                        'visibility': 'hidden'
                    });
                    document.getElementById('myform').reset();
                }, 1000);
                $(".limpiar").css({
                    'visibility': 'visible'
                });
            } else if (opc == "Multi" && one != '' && two != '') {
                var multiplicacion = parseInt(one) * parseInt(two);
                document.getElementById("resultado").innerHTML = "El resultado es: " + multiplicacion;
                setTimeout(function() {
                    $(".limpiar").css({
                        'visibility': 'hidden'
                    });
                    document.getElementById('myform').reset();
                }, 1000);
                $(".limpiar").css({
                    'visibility': 'visible'
                });
            } else if (opc == "Div" && one != '' && two != '') {
                var dividir = parseInt(one) / parseInt(two);
                document.getElementById("resultado").innerHTML = "El resultado es: " + dividir;
                setTimeout(function() {
                    $(".limpiar").css({
                        'visibility': 'hidden'
                    });
                    document.getElementById('myform').reset();

                }, 1000);
                $(".limpiar").css({
                    'visibility': 'visible'
                });
            } else if (one == '' || two == '') {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: 'Por favor ingrese los datos'
                })
            } else if(opc != 'Sum' && opc != 'Res' && opc != 'Multi' && opc != 'Div'){
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: 'Seleccione una opcion a realizar'
                })
            }else{
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: 'Ocurrio un error, por favor tenga paciencia'
                })
            }

        });
    });

    function reset() {
        document.getSelection("limpiar").reset();
        document.getElementById("resultado").reset();
    }
</script>