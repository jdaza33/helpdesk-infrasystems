<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Registrar Cliente - Helpdesk</title>
    
    <?php
    include("util.php");
    echo $head;
    ?>
</head>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>HELPDESK</b> | Cliente</a>
            <small>Registrate y disfruta de los servicios</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST">
                    <div class="msg">Registrar cliente</div>
                    <div class="form-group">
                        <input type="radio" name="tipoCliente" value="1" id="personal" class="with-gap">
                        <label for="personal">Personal</label>

                        <input type="radio" name="tipoCliente" value="2" id="dependiente" class="with-gap">
                        <label for="dependiente" class="m-l-20">Dependiente</label>

                        <input type="radio" name="tipoCliente" value="3" id="empresa" class="with-gap">
                        <label for="empresa" class="m-l-20">Empresa</label>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">face</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" id="nit" placeholder="Cedula o RIF" required maxlength='20'>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre" required maxlength='30'>
                            <input type="text" class="form-control" id="apellido" placeholder="Apellido" required maxlength='30'>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" id="email" placeholder="Correo Electronico" maxlength='50'>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">account_box</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" id="usuario" placeholder="Usuario" required maxlength='30'>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="clave" minlength="6" placeholder="Contraseña" required maxlength='50'>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="confirmarClave" minlength="6" placeholder="Confirmar Contraseña" required maxlength='50'>
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>-->

                    <button class="btn btn-block btn-lg bg-pink waves-effect" onclick="registrarCliente(); return false;" type="submit">REGISTRAR</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="index.php">Ya tengo una cuenta</a>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    <!-- #JS -->
    <?php
    include("util.php");
    echo $finalBody;
    ?>
    <script src="js/pages/examples/sign-up.js"></script>
    <script src="js/pages/forms/form-validation.js"></script>
    <!-- #JS -->
    
</body>

</html>