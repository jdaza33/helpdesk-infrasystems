<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Restaurar Contraseña - Helpdesk</title>
    
    <?php
    include("util.php");
    echo $head;
    ?>
</head>

<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>HELPDESK</b> | Cliente</a>
            <small>Restaura tu contraseña via email</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" method="POST">
                    <div class="msg">
                        Le llegara un correo a su email con su nueva contraseña.
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" id="email" placeholder="Email" required autofocus>
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit" onclick="recordarClave(); return false;">RESTAURAR CONTRASEÑA</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="index.php">Iniciar Sesión</a>
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
    <script src="js/pages/examples/forgot-password.js"></script>
    <!-- #JS -->
    
</body>

</html>