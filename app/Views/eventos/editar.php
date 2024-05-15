<?= $this->extend('layout/base.php') ?>

<?= $this->section('contenido') ?>
<form action="" method="post" enctype="multipart/form-data">
    <section class="mt-5">
        <h1 class="text-center">Editar evento</h1>
        <div class="row row-gap-3 mt-4">
            <div class="col-12 col-sm-6 col-lg-4">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre"
                       value="Nombre del evento" disabled>
            </div>
            <div class="col-12 col-sm-6 col-lg-2">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio"
                       value="600" disabled>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <label for="imagen" class="form-label">Imágen</label>
                <input type="file" class="form-control" name="imagen"
                       id="imagen" accept="image/*">
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select class="form-select" id="categoria" disabled>
                    <option value="musica" selected>Conciertos y festivales
                    </option>
                    <option value="teatro">Teatro, comedia y cultura</option>
                    <option value="conferencia">Conferencias y talleres</option>
                    <option value="otro">Otros</option>
                </select>
            </div>
            <div class="col-12">
                <label for="descripcion" class="form-label">Descripcion</label>
                <textarea name="descripcion" rows="2" class="form-control"
                          id="descripcion">Descripción actual</textarea>
            </div>
            <div class="col-6 col-lg-2">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha"
                       value="2024-05-14" disabled>
            </div>
            <div class="col-6 col-lg-2">
                <label for="hora" class="form-label">Hora</label>
                <input type="time" class="form-control" id="hora"
                       value="11:45:00" disabled>
            </div>
            <div class="col-12 col-sm-6 col-lg-5">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <input type="text"
                       class="form-control"
                       id="ubicacion"
                       value="Ubicación actual"
                       disabled
                >
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <label for="capacidad" class="form-label">Capacidad
                    máxima</label>
                <input type="number"
                       class="form-control"
                       min="0"
                       step="100"
                       value="1000"
                       id="capacidad"
                       disabled
                >
            </div>
        </div>
    </section>
    <div class="text-center my-5">
        <input type="submit" value="Actualizar evento"
               class="btn btn-lg btn-primary">
    </div>
</form>
<?= $this->endSection() ?>
