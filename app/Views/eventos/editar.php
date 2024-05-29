<?= $this->extend('layout/base.php') ?>

<?= $this->section('contenido') ?>
<form id="ActualizarBtn" action="<?= base_url('public/Actualizar/'.$editCartel['id'].'/evento') ?>" method="post" enctype="multipart/form-data">
    <section class="mt-5">
        <h1 class="text-center">Editar evento</h1>
        <div class="row row-gap-3 mt-4">
            <div class="col-12 col-sm-6 col-lg-4">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre"
                       value="<?= $editCartel['nombre']?>" disabled>
            </div>
            <div class="col-12 col-sm-6 col-lg-2">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio"
                       value="<?= $editCartel['precio']?>" disabled>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <label for="imagen" class="form-label">Imágen</label>
                <input type="file" class="form-control" name="imagen"
                       id="imagen" accept="image/*" value="<?= base_url($editCartel['imagen'])?>">
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
                          id="descripcion"><?= $editCartel['descripcion']?></textarea>
            </div>
            <div class="col-6 col-lg-2">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha"
                       value="<?= $editCartel['fecha']?>" disabled>
            </div>
            <div class="col-6 col-lg-2">
                <label for="hora" class="form-label">Hora</label>
                <input type="time" class="form-control" id="hora"
                       value="<?= $editCartel['hora']?>" disabled>
            </div>
            <div class="col-12 col-sm-6 col-lg-5">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <input type="text"
                       class="form-control"
                       id="ubicacion"
                       value="<?= $editCartel['ubicacion']?>"
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
                       value="<?= $editCartel['capacidad']?>"
                       id="capacidad"
                       disabled
                >
            </div>
        </div>
    </section>
    <div class="text-center my-5">
        <a
                href="<?= base_url('public/eventos/18') ?>"
                class="btn btn-lg btn-secondary me-1"
        >Cancelar</a>
        <input type="submit" value="Actualizar evento"
               class="btn btn-lg btn-primary">
    </div>
</form>
<script>
$(document).ready(function() {
    $("#ActualizarBtn").submit(function(e) {
        e.preventDefault();  
        let metodo = $(this).attr('method');
        let action = $(this).attr('action');
        let formData = new FormData(this);

        $.ajax({
            url: action,
            method: metodo,
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                if (!response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No se detectó ningún cambio, favor de realizar un cambio o salir del evento.'
                    });
                } else {
                    Swal.fire({
                        title: 'El evento se ha actualizado correctamente!',
                        text: 'Click para continuar!',
                        icon: 'success',
                    }).then(() => {
                        window.location.href = '<?= base_url('public/eventos/'.$editCartel['id'])?>';
                    })
                }
            },
            error: function(xhr, status, error) {
                console.log("Error en la solicitud AJAX:");
                console.log("Estado: " + status);
                console.log("Error: " + error);
            }
        });
    });
});

</script>
<?= $this->endSection() ?>