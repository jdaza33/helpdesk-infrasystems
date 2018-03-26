<?php
 $_SESSION['usuario'] = '';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login - Helpdesk</title>

    <?php
    include("util.php");
    echo $head;
    ?>
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>HELPDESK</b> | Cliente</a>
            <small>Dejanos el soporte a nosotros</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" >
                    <div class="msg">Inicia Sesión</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" required autofocus maxlength='20'>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="clave" id="clave" placeholder="Contraseña" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Recordar</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" onclick="iniciarSesion(); return false;" type="submit">ENTRAR</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="registrarCliente.php">Registrar</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="restaurarClave.php">Olvide mi clave</a>
                        </div>
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
    <script src='js/pages/examples/sign-in.js'></script>
    <!-- #JS -->
</body>

</html>