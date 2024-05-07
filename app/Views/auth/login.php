<?= $this->extend('layout/base.php') ?>

<?= $this->section('contenido') ?>
<div class="container">
    <div class="row align-items-center">
        <div class="col-12 col-md-6">
            <img src="images/logo.png" alt="Logo" class="img-fluid">
        </div>
        <div class="col-12 col-md-6">
            <h1 class="mb-5">Inicia sesión</h1>
            <form id="LoginUsuario" method="post" action="<?= base_url('public/Crud_User/ValidandoDatos') ?>">
                <div class="mb-3">
                    <input type="email" class="form-control form-control-lg" placeholder="Email" name="email" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control form-control-lg" placeholder="Contraseña" name="password"
                        required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Iniciar sesión</button>
                </div>
                <p class="text-center mt-2">¿Aún no tienes una cuenta? <a href="signup">Registrate</a></p>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $("#LoginUsuario").submit(function(e) {
        e.preventDefault(); //evita que se envíen datos sin procesar
        let metodo = $(this).attr('method');
        let action = $(this).attr('action');
        let datos = $(this).serializeArray();
        $.ajax({
            url: action,
            method: metodo,
            data: datos,
            success: function(response) {
                console.log(response);
                if (!response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Favor De Llenar los datos solicitados'
                    });
                } else {
                    Swal.fire({
                        title: 'El usuario inicio sesion correctamente!',
                        text: 'Click para continuar!',
                        icon: 'success',
                    }).then(() => {
                        window.location.href = 'http://localhost/copytickets/public/';
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
</script>

<?= $this->endSection() ?>