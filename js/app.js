function notificacion(text, tipo) {
    var allowDismiss = true;
    var aux = "";
    if (tipo == 1) {
        aux = "alert-danger";
    } else if (tipo == 2) {
        aux = "alert-success";
    } else if (tipo == 3) {
        aux = "alert-warning";
    } else if (tipo == 4) {
        aux = "alert-info";
    }

    $.notify({
        message: text
    }, {
        type: aux,
        allow_dismiss: allowDismiss,
        newest_on_top: true,
        timer: 800,
        placement: {
            from: "bottom",
            align: "left"
        },
        animate: {
            enter: "",
            exit: ""
        },
        template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "p-r-35" : "") + '" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
    });
}
var d = new Date();
var fecha_actual = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();
$(document).ready(function() {

    datos = {
        id: 1
    };

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "php/agenda.php?op=2",
        data: datos,
        beforeSend: function() {},
        success: function(response) {

            $('#calendar').fullCalendar({
                //themeSystem: "jquery-ui.hot-sneaks",
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listWeek'
                },
                defaultDate: fecha_actual,
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                eventRender: function(eventObj, $el) {
                    $el.popover({
                        title: eventObj.title,
                        content: eventObj.description,
                        trigger: 'hover',
                        placement: 'top',
                        container: 'body'
                    });
                },

                events: response,
                timeFormat: 'h:mm'
            });


        }
    });


});

function activarMenu(idMenu) {

    $("#" + idMenu).attr("class", "active");

}

function activarSubMenu(idSubMenu) {

    $("#" + idSubMenu).attr("class", "active");

}

function validarClave() {
    var clave = $("#clave").val();
    var confirmarClave = $("#confirmarClave").val();
}

function enviarCorreo(email, mensaje) {
    datos = {
        email: email,
        mensaje: mensaje
    };

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "php/enviar_correo.php",
        data: datos,
        beforeSend: function() {},
        success: function(response) {
            swal("LISTO", "Su clave nueva fue enviada a su correo", "success");
            //notificacion("LISTO: Su clave nueva fue enviada a su correo", 2);
        }
    });
}

var doc = new jsPDF();

var specialElementHandlers = {
    '#editor': function(element, renderer) {
        return true;
    }
};

function construirFactura(cliente, orden) {

    var cargarFactura = $("#facturaPdf").html(
        `<div class='invoice-box' style='max-width: 800px;margin: auto;padding: 30px;border: 1px solid #eee;box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);font-size: 16px;line-height: 24px;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;color: #555'>
    <table cellpadding='0' cellspacing='0' style='width: 100%;line-height: inherit;text-align: left'>
        <tr class='top'>
            <td colspan='2' style='padding: 5px;vertical-align: top'>
                <table style='width: 100%;line-height: inherit;text-align: left'>
                    <tr>
                        <td class='title' style='padding: 5px;vertical-align: top;padding-bottom: 20px;font-size: 45px;line-height: 45px;color: #333'>
                            <img src='images/logo1.png' style='width:100%; max-width:300px;' />
                        </td>
    
                        <td style='padding: 5px;vertical-align: top;padding-bottom: 20px'>
                            Factura #: 123<br/> Fecha: January 1, 2015
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    
        <tr class='information'>
            <td colspan='2' style='padding: 5px;vertical-align: top'>
                <table style='width: 100%;line-height: inherit;text-align: left'>
                    <tr>
                        <td style='padding: 5px;vertical-align: top;padding-bottom: 40px'>
                            Sparksuite, Inc.<br/> 12345 Sunny Road<br/> Sunnyville, CA 12345
                        </td>
    
                        <td style='padding: 5px;vertical-align: top;padding-bottom: 40px'>
                            Acme Corp.<br/> John Doe<br/> john@example.com
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    
        <tr class='heading'>
            <td style='padding: 5px;vertical-align: top;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold'>
                Payment Method
            </td>
    
            <td style='padding: 5px;vertical-align: top;text-align: right;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold'>
                Check #
            </td>
        </tr>
    
        <tr class='details'>
            <td style='padding: 5px;vertical-align: top;padding-bottom: 20px'>
                Check
            </td>
    
            <td style='padding: 5px;vertical-align: top;text-align: right;padding-bottom: 20px'>
                1000
            </td>
        </tr>
    
        <tr class='heading'>
            <td style='padding: 5px;vertical-align: top;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold'>
                Item
            </td>
    
            <td style='padding: 5px;vertical-align: top;text-align: right;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold'>
                Price
            </td>
        </tr>
    
        <tr class='item'>
            <td style='padding: 5px;vertical-align: top;border-bottom: 1px solid #eee'>
                Website design
            </td>
    
            <td style='padding: 5px;vertical-align: top;text-align: right;border-bottom: 1px solid #eee'>
                $300.00
            </td>
        </tr>
    
        <tr class='item'>
            <td style='padding: 5px;vertical-align: top;border-bottom: 1px solid #eee'>
                Hosting (3 months)
            </td>
    
            <td style='padding: 5px;vertical-align: top;text-align: right;border-bottom: 1px solid #eee'>
                $75.00
            </td>
        </tr>
    
        <tr class='item last'>
            <td style='padding: 5px;vertical-align: top;border-bottom: none'>
                Domain name (1 year)
            </td>
    
            <td style='padding: 5px;vertical-align: top;text-align: right;border-bottom: none'>
                $10.00
            </td>
        </tr>
    
        <tr class='total'>
            <td style='padding: 5px;vertical-align: top' />
    
            <td style='padding: 5px;vertical-align: top;text-align: right;border-top: 2px solid #eee;font-weight: bold'>
                Total: $385.00
            </td>
        </tr>
    </table>
    </div>`
    );
    $(cargarFactura).insertAfter(
        swal("Cargando", "En breve comenzara la descarga...", "success")
    );

    setTimeout(function() {
        doc.fromHTML($('#facturaPdf').html(), 15, 15, {
            'width': 170,
            'elementHandlers': specialElementHandlers
        });
        doc.save('factura.pdf')
    }, 5000);

}

function construirCotizacion(usuario, solicitud) {

    var cargarFactura = $("#facturaPdf").load(
        "php/templateCotizacion.php?solicitud=" + solicitud + "&usuario=" + usuario
    );
    $(cargarFactura).insertAfter(
        swal("Cargando", "En breve comenzara la descarga...", "success")
    );

    setTimeout(function() {
        doc.fromHTML($('#facturaPdf').html(), 15, 15, {
            'width': 170,
            'elementHandlers': specialElementHandlers
        });
        doc.save('factura.pdf')
    }, 5000);

}