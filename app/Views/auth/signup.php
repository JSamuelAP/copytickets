<?= $this->extend('layout/base.php') ?>

<?= $this->section('contenido') ?>
<div class="container">
    <div class="row align-items-center">
        <div class="col-12 col-md-6">
            <img src="images/logo.png" alt="Logo" class="img-fluid">
        </div>
        <div class="col-12 col-md-6">
            <h1 class="mb-5">Registrate</h1>
            <form method="post" action="signup">
                <div class="row g-3 mb-3">
                    <div class="col-12">
                        <input type="text" class="form-control" placeholder="Nombre*" name="nombre" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="email" class="form-control" placeholder="Email*" name="email" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="password" class="form-control" placeholder="Contraseña*" name="password" required>
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
                                <input class="form-check-input" type="radio" name="tipo-cuenta" id="flexRadioDefault1"
                                       checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Cliente
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo-cuenta" id="flexRadioDefault2"
                                >
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Organizador
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-none" id="description">
                    <textarea class="form-control" rows="3"
                              placeholder="Descripción. Cuentanos más acerca de ti" name="descripcion"></textarea>
                    </div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Crear cuenta</button>
                </div>
                <p class="text-center mt-2">¿Ya tienes una cuenta? <a href="login">Inicia sesión</a></p>
            </form>
        </div>
    </div>
</div>
<script src="js/signup.js"></script>
<?= $this->endSection() ?>
