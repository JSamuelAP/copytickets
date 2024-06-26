<?= $this->extend('layout/base.php') ?>

<?php helper('formateador'); ?>
<?= $this->section('contenido') ?>
<section class="mt-4">
    <h2>Categorías</h2>
    <div class="row">
        <div class="col-6 col-lg-3 text-center">
            <button class="btn" value="<?=$categorias[0]?>">
                <img src="<?= base_url('public/images/icono-categoria-musica.svg') ?>"
                     alt="Nota musical icono" width="64"
                     height="64"><br>
                <span>Conciertos y festivales</span>
            </button>
        </div>
        <div class="col-6 col-lg-3 text-center">
            <button class="btn" value="<?=$categorias[1]?>">
                <img src="<?= base_url('public/images/icono-categoria-teatro.svg') ?>"
                     alt="teatro icono" width="64"
                     height="64"><br>
                <span>Teatro, Comedia y Cultura</span>
            </button>
        </div>
        <div class="col-6 col-lg-3 text-center">
            <button class="btn">
                <img src="<?= base_url('public/images/icono-categoria-conferencia.svg') ?>"
                     alt="Hombre dando conferencia icono" width="64"
                     height="64"><br>
                <span>Conferencias y talleres</span>
            </button>
        </div>
        <div class="col-6 col-lg-3 text-center">
            <button class="btn">
                <img src="<?= base_url('public/images/icono-categoria-otros.svg') ?>"
                     alt="ticket icono"
                     width="64"
                     height="64"><br>
                <span>Otros</span>
            </button>
        </div>
    </div>
</section>
<section class="mt-5 mb-5">
    <h1>Proximos eventos</h1>
    <div class="vstack gap-3" id="eventos">
      <?php $fecha_Actual = date('Y-m-d'); ?>
      <?php foreach ($eventos_model as $ev): ?>
        <?php if ($ev['fecha'] >= $fecha_Actual): ?>
              <article class="card shadow-sm border-0">
                  <a
                          href="<?= base_url('public/eventos/' . $ev['id']) ?>"
                          class="text-decoration-none"
                  >
                      <div class="row g-0">
                          <div class="col-md-4">
                              <img
                                      src="<?= base_url('public/images/'.($ev['imagen'] ? $ev['imagen'] : 'logo.png'))?>"
                                      class="img-fluid rounded-start w-100 object-fit-cover"
                                      alt="Banner de PNXNDX"
                                      style="max-height: 150px">
                          </div>
                          <div class="col-md-8">
                              <div class="card-body">
                                  <div class="row">
                                      <div class="col">
                                          <h5 class="card-title fs-3 text-body">
                                            <?= $ev['nombre'] ?>
                                          </h5>
                                          <p class="card-text text-body-secondary">
                                              <i class="bi bi-geo-alt-fill"></i>
                                            <?= $ev['ubicacion'] ?>
                                          </p>
                                      </div>
                                      <div class="col-auto">
                                          <p class="text-center fs-5 text-body">
                                            <?= fechaCorta($ev['fecha']) ?>
                                          </p>
                                      </div>
                                  </div>
                                  <p class="text-end mt-2 mb-0 text-primary fs-5 fw-medium">
                                      $<?= $ev['precio'] ?>MXN</p>
                              </div>
                          </div>
                      </div>
                  </a>
              </article>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
</section>
<script>
    $(document).ready(function () {
    // Utiliza .off() para desvincular eventos previamente asignados, luego asigna el evento clic una vez
    $('.btn').on('click', function (e) {
        e.preventDefault();
        var categoria = $(this).val();
        if(categoria == ''){
            return null
        }
        $.ajax({
            url: '<?= base_url('public/filtrar') ?>/' + categoria,
            type: 'get',
            success: function (data) {
                $('#eventos').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('Error: ' + textStatus + ' - ' + errorThrown);
            }
        });
    });
});
</script>
<?= $this->endSection() ?>
