<?php
include("php/datos.php");

$menu='';
$usuario='';
$foto='';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $usuario=$_SESSION['usuario'];
    $foto=$rutaBajada.$usuario."/".$_SESSION['foto'];
}


$head = "<!-- Favicon-->
        <link rel='icon' href='favicon.ico' type='image/x-icon'>

        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet' type='text/css'>

        <!-- Bootstrap Core Css -->
        <link href='plugins/bootstrap/css/bootstrap.css' rel='stylesheet'>

        <!-- Waves Effect Css -->
        <link href='plugins/node-waves/waves.css' rel='stylesheet' />

        <!-- Animation Css -->
        <link href='plugins/animate-css/animate.css' rel='stylesheet' />

        <!-- Bootstrap Material Datetime Picker Css -->
        <link href='plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css' rel='stylesheet' />

        <!-- Bootstrap Colorpicker Js -->
        <script src='plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js'></script>

        <!-- Sweet Alert Css -->
        <link href='plugins/sweetalert/sweetalert.css' rel='stylesheet' />

        <!-- Multi Select Css -->
        <link href='plugins/multi-select/css/multi-select.css' rel='stylesheet'>

        <!-- Bootstrap Select Css -->
        <link href='plugins/bootstrap-select/css/bootstrap-select.css' rel='stylesheet' />

        <link href='plugins/dropzone/dropzone.css' rel='stylesheet'>

        <!-- JQuery DataTable Css -->
        <link href='plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css' rel='stylesheet'>

        <!-- Morris Chart Css-->
        <link href='plugins/morrisjs/morris.css' rel='stylesheet' />

        <!-- Custom Css -->
        <link href='css/style.css' rel='stylesheet'>

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href='css/themes/all-themes.css' rel='stylesheet' />

        <link href='css/app.css' rel='stylesheet'>
        <script src='js/jquery.min.js'></script>
        
        <script src='js/jspdf.min.js'></script>

        <script src='js/app.js'></script>
        <script src='js/model.js'></script>";

$head2 = "<!-- Favicon-->
        <link rel='icon' href='favicon.ico' type='image/x-icon'>

        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet' type='text/css'>

        <!-- Bootstrap Core Css -->
        <link href='plugins/bootstrap/css/bootstrap.css' rel='stylesheet'>

        <!-- Waves Effect Css -->
        <link href='plugins/node-waves/waves.css' rel='stylesheet' />

        <!-- Animation Css -->
        <link href='plugins/animate-css/animate.css' rel='stylesheet' />

        <!-- Sweet Alert Css -->
        <link href='plugins/sweetalert/sweetalert.css' rel='stylesheet' />

        <!-- Bootstrap Colorpicker Js -->
        <script src='plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js'></script>

        <link href='plugins/dropzone/dropzone.css' rel='stylesheet'>

        <!-- JQuery DataTable Css -->
        <link href='plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css' rel='stylesheet'>

        <!-- Morris Chart Css-->
        <link href='plugins/morrisjs/morris.css' rel='stylesheet' />

        <!-- Custom Css -->
        <link href='css/style.css' rel='stylesheet'>

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href='css/themes/all-themes.css' rel='stylesheet' />

        <!--CALENDAR-->
        <link href='css/fullcalendar.min.css' rel='stylesheet' />
        <link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
        <script src='js/moment.min.js'></script>
        <script src='plugins/jquery/jquery.min.js'></script>
        <script src='js/fullcalendar.min.js'></script>

        <link href='css/app.css' rel='stylesheet'>
        <!--<script src='js/jquery.min.js'></script>-->
        <script src='js/app.js'></script>
        <script src='js/model.js'></script>";

$loader = "<!-- Page Loader -->
            <div class='page-loader-wrapper'>
                <div class='loader'>
                    <div class='preloader'>
                        <div class='spinner-layer pl-red'>
                            <div class='circle-clipper left'>
                                <div class='circle'></div>
                            </div>
                            <div class='circle-clipper right'>
                                <div class='circle'></div>
                            </div>
                        </div>
                    </div>
                    <p>Cargando..</p>
                </div>
            </div>
            <!-- #END# Page Loader -->";

$menu1 = "<section>
        <!-- Left Sidebar -->
        <aside id='leftsidebar' class='sidebar'>
            <!-- User Info -->
            <div class='user-info'>
                <div class='image'>
                    <img src='$foto' width='48' height='48' alt='User' />
                </div>
                <div class='info-container'>
                    <div class='name' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><h4>".$usuario."</h4></div>
                    <div class='btn-group user-helper-dropdown'>
                        <i class='material-icons' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>keyboard_arrow_down</i>
                        <ul class='dropdown-menu pull-right'>
                            <li><a href='' data-toggle='modal' data-target='#modalPerfilUsuario'><i class='material-icons'>person</i>Perfil</a></li>
                            <li role='seperator' class='divider'></li>
                            <li><a href='php/sesion.php?op=2'><i class='material-icons'>input</i>Salir</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class='menu'>
                <ul class='list'>
                    <li class='header'>MENU</li>
                    

                    <li id='menuAgenda'>
                        <a href='agenda.php'>
                            <i class='material-icons'>date_range</i>
                            <span>Agenda</span>
                        </a>
                    </li>

                    <li id='menuUsuario'>
                        <a href='usuario.php'>
                            <i class='material-icons'>account_circle</i>
                            <span>Usuarios</span>
                        </a>
                    </li>

                    <li id='menuSoporte'>
                        <a href='javascript:void(0);' class='menu-toggle'>
                            <i class='material-icons'>camera_enhance</i>
                            <span>Soporte</span>
                        </a>
                        <ul class='ml-menu'>
                            <li id='subMenuSoporteLista'>
                                <a href='soporte.php'>Lista de Soporte</a>
                            </li>
                            <li id='subMenuSoporteNuevo'>
                                <a href='nuevoSoporte.php'>Nuevo Soporte</a>
                            </li>
                        </ul>
                    </li>

                    <li id='menuFacturacion'>
                        <a href='facturacion.php'>
                            <i class='material-icons'>credit_card</i>
                            <span>Facturación</span>
                        </a>
                    </li>

                    <li id='menuCotizacion'>
                        <a href='cotizacion.php'>
                            <i class='material-icons'>attach_money</i>
                            <span>Cotización</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class='legal'>
                <div class='copyright'>
                    &copy; 2018 <a href='javascript:void(0);'>INFRASYTEM</a>.
                </div>
                <div class='version'>
                    <b>Version: </b> 1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        </section>";

$menu2 = "<section>
        <!-- Left Sidebar -->
        <aside id='leftsidebar' class='sidebar'>
            <!-- User Info -->
            <div class='user-info'>
                <div class='image'>
                    <img src='$foto' width='48' height='48' alt='User' />
                </div>
                <div class='info-container'>
                    <div class='name' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><h4>".$usuario."</h4></div>
                    <div class='btn-group user-helper-dropdown'>
                        <i class='material-icons' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>keyboard_arrow_down</i>
                        <ul class='dropdown-menu pull-right'>
                            <li><a href='' data-toggle='modal' data-target='#modalPerfilUsuario'><i class='material-icons'>person</i>Perfil</a></li>
                            <li role='seperator' class='divider'></li>
                            <li><a href='php/sesion.php?op=2'><i class='material-icons'>input</i>Salir</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class='menu'>
                <ul class='list'>
                    <li class='header'>MENU</li>
                    

                    <li class='active'>
                        <a href='agenda.php'>
                            <i class='material-icons'>date_range</i>
                            <span>Agenda</span>
                        </a>
                    </li>

                    <li>
                        <a href='usuario.php'>
                            <i class='material-icons'>account_circle</i>
                            <span>Usuarios</span>
                        </a>
                    </li>

                    <li id='menuSoporte'>
                        <a href='javascript:void(0);' class='menu-toggle'>
                            <i class='material-icons'>camera_enhance</i>
                            <span>Soporte</span>
                        </a>
                        <ul class='ml-menu'>
                            <li id='subMenuSoporteLista'>
                                <a href='soporte.php'>Lista de Soporte</a>
                            </li>
                            <li id='subMenuSoporteNuevo'>
                                <a href='nuevoSoporte.php'>Nuevo Soporte</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class='legal'>
                <div class='copyright'>
                    &copy; 2018 <a href='javascript:void(0);'>INFRASYTEM</a>.
                </div>
                <div class='version'>
                    <b>Version: </b> 1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        </section>";

$menu3 = "<section>
        <!-- Left Sidebar -->
        <aside id='leftsidebar' class='sidebar'>
            <!-- User Info -->
            <div class='user-info'>
                <div class='image'>
                    <img src='$foto' width='48' height='48' alt='User' />
                </div>
                <div class='info-container'>
                    <div class='name' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><h4>".$usuario."</h4></div>
                    <div class='btn-group user-helper-dropdown'>
                        <i class='material-icons' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>keyboard_arrow_down</i>
                        <ul class='dropdown-menu pull-right'>
                            <li><a href='' data-toggle='modal' data-target='#modalPerfilUsuario'><i class='material-icons'>person</i>Perfil</a></li>
                            <li role='seperator' class='divider'></li>
                            <li><a href='php/sesion.php?op=2'><i class='material-icons'>input</i>Salir</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class='menu'>
                <ul class='list'>
                    <li class='header'>MENU</li>
                    

                    <li class='active'>
                        <a href='agenda.php'>
                            <i class='material-icons'>date_range</i>
                            <span>Agenda</span>
                        </a>
                    </li>

                    <li id='menuSoporte'>
                        <a href='javascript:void(0);' class='menu-toggle'>
                            <i class='material-icons'>camera_enhance</i>
                            <span>Soporte</span>
                        </a>
                        <ul class='ml-menu'>
                            <li id='subMenuSoporteLista'>
                                <a href='soporte.php'>Lista de Soporte</a>
                            </li>
                            <li id='subMenuSoporteNuevo'>
                                <a href='nuevoSoporte.php'>Nuevo Soporte</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class='legal'>
                <div class='copyright'>
                    &copy; 2018 <a href='javascript:void(0);'>INFRASYTEM</a>.
                </div>
                <div class='version'>
                    <b>Version: </b> 1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        </section>";

$menu4 = "<section>
        <!-- Left Sidebar -->
        <aside id='leftsidebar' class='sidebar'>
            <!-- User Info -->
            <div class='user-info'>
                <div class='image'>
                    <img src='$foto' width='48' height='48' alt='User' />
                </div>
                <div class='info-container'>
                    <div class='name' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><h4>".$usuario."</h4></div>
                    <div class='btn-group user-helper-dropdown'>
                        <i class='material-icons' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true'>keyboard_arrow_down</i>
                        <ul class='dropdown-menu pull-right'>
                            <li><a href='' data-toggle='modal' data-target='#modalPerfilUsuario'><i class='material-icons'>person</i>Perfil</a></li>
                            <li role='seperator' class='divider'></li>
                            <li><a href='php/sesion.php?op=2'><i class='material-icons'>input</i>Salir</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class='menu'>
                <ul class='list'>
                    <li class='header'>MENU</li>
                    

                    <li id='menuAgenda'>
                        <a href='agenda.php'>
                            <i class='material-icons'>date_range</i>
                            <span>Agenda</span>
                        </a>
                    </li>

                    <li id='menuSoporte'>
                        <a href='javascript:void(0);' class='menu-toggle'>
                            <i class='material-icons'>camera_enhance</i>
                            <span>Soporte</span>
                        </a>
                        <ul class='ml-menu'>
                            <li id='subMenuSoporteLista'>
                                <a href='soporte.php'>Lista de Soporte</a>
                            </li>
                            <li id='subMenuSoporteNuevo'>
                                <a href='nuevoSoporte.php'>Nuevo Soporte</a>
                            </li>
                        </ul>
                    </li>

                    <li id='menuFacturacion'>
                        <a href='facturacion.php'>
                            <i class='material-icons'>credit_card</i>
                            <span>Facturación</span>
                        </a>
                    </li>

                    <li id='menuCotizacion'>
                        <a href='cotizacion.php'>
                            <i class='material-icons'>attach_money</i>
                            <span>Cotización</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class='legal'>
                <div class='copyright'>
                    &copy; 2018 <a href='javascript:void(0);'>INFRASYTEM</a>.
                </div>
                <div class='version'>
                    <b>Version: </b> 1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        </section>";



$finalBody ="<!-- Jquery Core Js -->
            <script src='plugins/jquery/jquery.min.js'></script>

            <!-- Bootstrap Core Js -->
            <script src='plugins/bootstrap/js/bootstrap.js'></script>

            <!-- Select Plugin Js -->
            <script src='plugins/bootstrap-select/js/bootstrap-select.js'></script>

            <!-- Slimscroll Plugin Js -->
            <script src='plugins/jquery-slimscroll/jquery.slimscroll.js'></script>

            <!-- Jquery Validation Plugin Css -->
            <script src='plugins/jquery-validation/jquery.validate.js'></script>

            <!-- Bootstrap Notify Plugin Js -->
            <script src='plugins/bootstrap-notify/bootstrap-notify.js'></script>

            <!-- JQuery Steps Plugin Js -->
            <script src='plugins/jquery-steps/jquery.steps.js'></script>

            <script src='plugins/dropzone/dropzone.js'></script>

            <!-- Autosize Plugin Js -->
            <script src='plugins/autosize/autosize.js'></script>

            <!-- Sweet Alert Plugin Js -->
            <script src='plugins/sweetalert/sweetalert.min.js'></script>

            <!-- Waves Effect Plugin Js -->
            <script src='plugins/node-waves/waves.js'></script>

            <!-- Jquery DataTable Plugin Js -->
            <script src='plugins/jquery-datatable/jquery.dataTables.js'></script>
            <script src='plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js'></script>
            <script src='plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js'></script>
            <script src='plugins/jquery-datatable/extensions/export/buttons.flash.min.js'></script>
            <script src='plugins/jquery-datatable/extensions/export/jszip.min.js'></script>
            <script src='plugins/jquery-datatable/extensions/export/pdfmake.min.js'></script>
            <script src='plugins/jquery-datatable/extensions/export/vfs_fonts.js'></script>
            <script src='plugins/jquery-datatable/extensions/export/buttons.html5.min.js'></script>
            <script src='plugins/jquery-datatable/extensions/export/buttons.print.min.js'></script>

            <!-- Jquery CountTo Plugin Js -->
            <script src='plugins/jquery-countto/jquery.countTo.js'></script>

            <!-- Morris Plugin Js -->
            <script src='plugins/raphael/raphael.min.js'></script>
            <script src='plugins/morrisjs/morris.js'></script>

            <!-- ChartJs -->
            <script src='plugins/chartjs/Chart.bundle.js'></script>

            <!-- Flot Charts Plugin Js -->
            <script src='plugins/flot-charts/jquery.flot.js'></script>
            <script src='plugins/flot-charts/jquery.flot.resize.js'></script>
            <script src='plugins/flot-charts/jquery.flot.pie.js'></script>
            <script src='plugins/flot-charts/jquery.flot.categories.js'></script>
            <script src='plugins/flot-charts/jquery.flot.time.js'></script>

            <!-- Sparkline Chart Plugin Js -->
            <script src='plugins/jquery-sparkline/jquery.sparkline.js'></script>

            <!-- Custom Js -->
            <script src='js/admin.js'></script>

            <!-- Demo Js -->
            <script src='js/demo.js'></script>
            <script src='js/jquery.mask.js'></script>

            <!--<script src='js/jquery.min.js'></script>
            <script src='js/vue.min.js'></script>
            <script src='js/vue.js'></script>-->";

$finalBody2 ="<!-- Jquery Core Js -->
            

            <!-- Bootstrap Core Js -->
            <script src='plugins/bootstrap/js/bootstrap.js'></script>

            <!-- Select Plugin Js -->
            <script src='plugins/bootstrap-select/js/bootstrap-select.js'></script>

            <!-- Slimscroll Plugin Js -->
            <script src='plugins/jquery-slimscroll/jquery.slimscroll.js'></script>

            <!-- Bootstrap Notify Plugin Js -->
            <script src='plugins/bootstrap-notify/bootstrap-notify.js'></script>

            <script src='plugins/dropzone/dropzone.js'></script>

            <!-- Waves Effect Plugin Js -->
            <script src='plugins/node-waves/waves.js'></script>

            <script src='plugins/sweetalert/sweetalert.min.js'></script>

            <!-- Jquery DataTable Plugin Js -->
            <script src='plugins/jquery-datatable/jquery.dataTables.js'></script>
            <script src='plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js'></script>
            <script src='plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js'></script>
            <script src='plugins/jquery-datatable/extensions/export/buttons.flash.min.js'></script>
            <script src='plugins/jquery-datatable/extensions/export/jszip.min.js'></script>
            <script src='plugins/jquery-datatable/extensions/export/pdfmake.min.js'></script>
            <script src='plugins/jquery-datatable/extensions/export/vfs_fonts.js'></script>
            <script src='plugins/jquery-datatable/extensions/export/buttons.html5.min.js'></script>
            <script src='plugins/jquery-datatable/extensions/export/buttons.print.min.js'></script>

            <!-- Validation Plugin Js -->
            <script src='plugins/jquery-validation/jquery.validate.js'></script>

            <!-- Jquery CountTo Plugin Js -->
            <script src='plugins/jquery-countto/jquery.countTo.js'></script>

            <!-- Morris Plugin Js -->
            <script src='plugins/raphael/raphael.min.js'></script>
            <script src='plugins/morrisjs/morris.js'></script>

            <!-- ChartJs -->
            <script src='plugins/chartjs/Chart.bundle.js'></script>

            <!-- Flot Charts Plugin Js -->
            <script src='plugins/flot-charts/jquery.flot.js'></script>
            <script src='plugins/flot-charts/jquery.flot.resize.js'></script>
            <script src='plugins/flot-charts/jquery.flot.pie.js'></script>
            <script src='plugins/flot-charts/jquery.flot.categories.js'></script>
            <script src='plugins/flot-charts/jquery.flot.time.js'></script>

            <!-- Sparkline Chart Plugin Js -->
            <script src='plugins/jquery-sparkline/jquery.sparkline.js'></script>

            <!-- Custom Js -->
            <script src='js/admin.js'></script>

            <!-- Demo Js -->
            <script src='js/demo.js'></script>
            <script src='js/jquery.mask.js'></script>

            <!--<script src='js/jquery.min.js'></script>
            <script src='js/vue.min.js'></script>
            <script src='js/vue.js'></script>-->";

$nav = "<nav class='navbar'>
        <div class='container-fluid'>
            <div class='navbar-header'>
                <a href='javascript:void(0);' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar-collapse' aria-expanded='false'></a>
                <a href='javascript:void(0);' class='bars'></a>
                <a class='navbar-brand' href=''>Helpdesk</a>
            </div>
            <div class='collapse navbar-collapse' id='navbar-collapse'>
                <ul class='nav navbar-nav navbar-right'>
                    <!-- Call Search -->
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <!--<li class='dropdown'>
                        <a href='javascript:void(0);' class='dropdown-toggle' data-toggle='dropdown' role='button'>
                            <i class='material-icons'>notifications</i>
                            <span class='label-count'>2</span>
                        </a>
                        <ul class='dropdown-menu'>
                            <li class='header'>NOTIFICACIONES</li>
                            <li class='body'>
                                <ul class='menu'>
                                    <li>
                                        <a href='javascript:void(0);'>
                                            <div class='icon-circle bg-light-green'>
                                                <i class='material-icons'>person_add</i>
                                            </div>
                                            <div class='menu-info'>
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class='material-icons'>access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href='javascript:void(0);'>
                                            <div class='icon-circle bg-cyan'>
                                                <i class='material-icons'>add_shopping_cart</i>
                                            </div>
                                            <div class='menu-info'>
                                                <h4>4 sales made</h4>
                                                <p>
                                                    <i class='material-icons'>access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class='footer'>
                                <a href='javascript:void(0);'>Ver todas las notificaciones</a>
                            </li>
                        </ul>
                    </li>-->
                    <!-- #END# Notifications -->

                </ul>
            </div>
        </div>
        </nav>";


$modalPerfil = "<div class='modal fade' id='modalPerfilUsuario' tabindex='-1' role='dialog'>
                    <div class='modal-dialog modal-lg' role='document'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h2 class='modal-title' id='smallModalLabel'>Perfil</h2>
                            </div>
                            <div class='modal-body' id='modalFormNuevaCotizacion'>

                                <h5 class='card-inside-title'>Datos Personales</h5>
                                <br>
                                <div class='row clearfix'>
                                    <div class='col-sm-3'>
                                        <div class='form-group'>
                                            <div class='form-line'>
                                                <p>Nro. de Identificación</p>
                                                <input id='nit' class='form-control' value='' disabled='true'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-sm-3'>
                                        <div class='form-group'>
                                            <div class='form-line'>
                                                <p>Nombre</p>
                                                <input id='nombre_perfil' class='form-control' value='' maxlength='20'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-sm-3'>
                                        <div class='form-group'>
                                            <div class='form-line'>
                                                <p>Apellido</p>
                                                <input id='apellido' class='form-control' value='' maxlength='20'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-sm-3'>
                                        <div class='form-group'>
                                            <div class='form-line'>
                                                <p>Email</p>
                                                <input id='email' class='form-control' value='' disabled='true'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-sm-3'>
                                        <div class='form-group'>
                                            <div class='form-line'>
                                                <p>Direccion Corta</p>
                                                <input id='direccion' class='form-control' value='' maxlength='20'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-sm-3'>
                                        <div class='form-group'>
                                            <div class='form-line'>
                                                <p>Telefono</p>
                                                <input id='telefono' class='form-control' value='' maxlength='20' data-mask='(000)-(0000000)'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-sm-3'>
                                        <div class='form-group'>
                                            <div class='form-line'>
                                                <p>Genero</p>
                                                <input id='sexo' class='form-control' value='' maxlength='2' data-mask='A'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-sm-3'>
                                        <div class='form-group'>
                                            <div class='form-line'>
                                                <p>Fecha de Nacimiento</p>
                                                <input id='nacimiento' class='form-control' value='' data-mask='0000-00-00'>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h5 class='card-inside-title'>Seguridad</h5>
                                <br>
                                <div class='row clearfix'>
                                    <div class='col-sm-3'>
                                        <div class='form-group'>
                                            <div class='form-line'>
                                                <p>Nueva Clave</p>
                                                <input type='password' id='clave' class='form-control' value='' maxlength='30'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-sm-3'>
                                        <div class='form-group'>
                                            <div class='form-line'>
                                                <p>Repetir Nueva Clave</p>
                                                <input id='repetirClave' type='password' class='form-control' value='' maxlength='30'>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h5 class='card-inside-title'>Foto</h5>
                                <br>
                                <div class='row clearfix'>
                                    <div class='col-sm-6'>
                                        <div class='form-group'>
                                            <div class='form-line'>
                                                <form action='php/subirPerfil.php' id='frmFileUpload' class='dropzone' method='post' enctype='multipart/form-data'>
                                                    <div class='dz-message'>
                                                        <div class='drag-icon-cph'>
                                                            <i class='material-icons'>touch_app</i>
                                                        </div>
                                                        <h3>Suba su Fotografia</h3>
                                                    </div>
                                                    <div class='fallback'>
                                                        <input name='file' id='img' type='file' multiple />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-sm-6'>
                                        <div class='image'>
                                            <img src='$foto' width='100' height='100' alt='User' />
                                            <p>Foto Actual</p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class='modal-footer'>
                                <button type='button' id='btnCerrarModalPerfil' class='btn btn-link waves-effect' data-dismiss='modal' >CERRAR</button>
                                <button type='button' id='btnEditarPerfil' class='btn btn-link waves-effect'>GUARDAR</button>
                            </div>
                        </div>
                    </div>
                    </div>";


if(isset($_SESSION['rol'])){
    $rol=$_SESSION['rol'];
    
    if($rol==1){
        $menu=$menu1;
    }elseif ($rol==2){
        $menu=$menu2;
    }elseif ($rol==3){
        $menu=$menu3;
    }elseif ($rol==4){
        $menu=$menu4;
    }
    
    
}

?>