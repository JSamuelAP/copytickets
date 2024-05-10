<?= $this->extend('layout/base.php') ?>

<?= $this->section('contenido') ?>
<form action="" method="post" enctype="multipart/form-data">
    <section class="mt-5">
        <h1 class="text-center">Detalles del evento</h1>
        <div class="row row-gap-3 mt-4">
            <div class="col-12 col-lg-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <label for="imagen" class="form-label">Imágen</label>
                <input type="file" class="form-control" name="imagen" id="imagen" accept="image/*">
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select name="categoria" class="form-select" id="categoria">
                    <option value="musica" selected>Conciertos y festivales</option>
                    <option value="teatro">Teatro, comedia y cultura</option>
                    <option value="conferencia">Conferencias y talleres</option>
                    <option value="otro">Otros</option>
                </select>
            </div>
            <div class="col-12">
                <label for="descripcion" class="form-label">Descripcion</label>
                <textarea name="descripcion" rows="2" class="form-control" id="descripcion">
                </textarea>
            </div>
            <div class="col-6 col-lg-2">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" name="fecha" id="fecha" required>
            </div>
            <div class="col-6 col-lg-2">
                <label for="hora" class="form-label">Hora</label>
                <input type="time" class="form-control" name="hora" id="hora" required>
            </div>
            <div class="col-12 col-sm-6 col-lg-5">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <input type="text"
                       class="form-control"
                       name="ubicacion"
                       placeholder="Lugar donde se lleva a cabo"
                       id="ubicacion"
                       required>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <label for="capacidad" class="form-label">Capacidad máxima</label>
                <input type="number"
                       class="form-control"
                       min="0"
                       step="100"
                       name="capacidad"
                       value="0"
                       id="capacidad"
                       required>
            </div>
        </div>
    </section>
    <section class="mt-5">
        <h2 class="text-center">Escáner</h2>
        <div class="row mt-4">
            <div class="col-12 col-sm-6 col-md-4 offset-md-2">
                <p>Crea las credenciales que usaran los usuarios encargados de escanear los boletos desde la App
                    móvil.</p>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="mb-3">
                    <input type="text" class="form-control" name="usuario_escaner" placeholder="Nombre de usuario"
                           required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password_escaner" placeholder="Contraseña"
                           required>
                </div>
            </div>
        </div>
    </section>
    <div class="text-center my-5">
        <input type="submit" value="Crear evento" class="btn btn-lg btn-primary">
    </div>
</form>
<?= $this->endSection() ?>