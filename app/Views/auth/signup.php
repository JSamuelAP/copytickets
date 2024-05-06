<?= $this->extend('layout/base.php') ?>

<?= $this->section('contenido') ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container">
    <div class="row align-items-center">
        <div class="col-12 col-md-6">
            <img src="images/logo.png" alt="Logo" class="img-fluid">
        </div>
        <div class="col-12 col-md-6">
            <h1 class="mb-5">Registrate</h1>
            <form id="Registrar" method="post" action="<?= base_url('public/Crud_User/contInsert_User') ?>">
                <div class="row g-3 mb-3">
                    <div class="col-12">
                        <input type="text" class="form-control" placeholder="Nombre*" name="nombre" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="email" class="form-control" placeholder="Email*" name="email" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="password" class="form-control" placeholder="Contraseña*" name="password">
                    </div>
                    <div class="col-12 col-lg-6">
                        <input type="text" class="form-control" placeholder="Teléfono" name="telefono">
                    </div>
                    <div class="col-12 col-lg-6">
                        <input type="text" class="form-control" placeholder="Ciudad, estado y país" name="ubicacion">
                    </div>
                    <div class="col-12">
                        <p class="mb-0">Tipo de cuenta</p>
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="rol" id="flexRadioDefault1"
                                    checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Cliente
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rol" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Organizador
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-none" id="description">
                        <textarea class="form-control" rows="3" placeholder="Descripción. Cuentanos más acerca de ti"
                            name="descripcion"></textarea>
                    </div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg" id="Formulario">Crear cuenta</button>
                </div>
                <p class="text-center mt-2">¿Ya tienes una cuenta? <a href="login">Inicia sesión</a></p>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $("#Registrar").submit(function(e) {
        let tipoCuenta = $('input[name="tipo-cuenta"]:checked').val();

        let action = $(this).attr('action');

        /*
                if (tipoCuenta == 'Cliente') {
                    action = "base_url('Crud_User/contInsert_User')?>";
                } else if (tipoCuenta == 'Organizador') {
                    action = "base_url('Crud_Organization/contInsert_Organization')?>";
                }
        */
        let datos = $(this).serializeArray();

        e.preventDefault();
        $.ajax({
            url: action,
            method: "POST",
            data: datos,
            dataType: "json",
            success: function(response) {
                console.log(response);
                if (!response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Favor De Llenar los datos solicitados'
                    });
                    // Muestra los errores de validación en el formulario.
                } else {
                    // Si la respuesta es "ok", muestra un mensaje de éxito y redirige a otra página.
                    Swal.fire({
                        title: 'El usuario se creo correctamente!',
                        text: 'Click para continuar!',
                        icon: 'success',
                    }).then(() => {
                        window.location.href =
                            'http://localhost/copytickets/public/login';
                    })
                }
            },
            error: function(xhr, status, error) {
                console.log("Error en la solicitud AJAX:");
                console.log("Estado: " + status);
                console.log("Error: " + error);
            }
        })
    })
})

function showFormValidationErrors(arrErrors) {
    // Esta función muestra los errores de validación en el formulario.
    try {
        var a = 0;
        $.each(arrErrors, function(index, error) {
            var indx = index.replaceAll("[]", "");
            console.log(indx);
            if (error && error.length > 0) {
                a++;
                var $elem = $('[name="' + index + '"]');

                if ($elem.hasClass('selectpicker')) {
                    $elem.parent().addClass('is-invalid');
                } else {
                    $elem.addClass('is-invalid');
                }

                if ($elem.hasClass('selectpicker')) {
                    $elem.parent().parent().find('div.invalid-feedback').remove();
                    $elem.parent().parent().append('<small class="invalid-feedback">' + error + '</small>');
                } else if ($elem.hasClass('ss-select-mul')) {
                    $("#" + indx + "_Help").html(error);
                    $("#" + indx).siblings(".ss-main").children(".ss-multi-selected").addClass(
                        "border rounded border-danger");
                } else if (indx.substring(0, 3) === 'RAD') {
                    for (var i = 0; i < $elem.length; i++) {
                        $elem.parents(".centered_td").addClass("bg-danger");
                    }
                } else {
                    $elem.parent().find('div.invalid-feedback').remove();
                    $elem.parent().append('<small class="invalid-feedback">' + error + '</small>');
                }
            }
        });
        clearFormErrors();
    } catch (err) {
        console.log('error in showFormValidationErrors');
        console.log(err);
        return false;
    }
}

function clearFormErrors() {
    // Esta función elimina los errores de validación cuando el usuario interactúa con el formulario.
    $('.is-invalid').on('focusout', function(e) {
        if ($(this).val()) {
            var elemName = $(this).attr('name');
            var $elem = $('[name="' + elemName + '"]');
            $elem.removeClass('is-invalid');
            $elem.parent().find('small.invalid-feedback').remove();
        } else {
            $(this).removeClass('is-invalid');
            $(this).parent().find('.invalid-feedback').remove();
        }
    });
    // Elimina las clases de validación y mensajes de error al cerrar el modal
    $('#AbrirModal #cancelar').on('click', function() {
        $('.is-invalid').removeClass('is-invalid');
        $('small.invalid-feedback').remove();
    });

}
</script>
<script src="js/signup.js"></script>
<?= $this->endSection() ?>