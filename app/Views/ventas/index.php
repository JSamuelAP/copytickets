<?= $this->extend('layout/base.php') ?>

<?php helper('formateador'); ?>
<?= $this->section('contenido') ?>
<h1 class="text-center mt-5">Historial de compras</h1>
<div class="vstack gap-3 my-5">
  <?php foreach ($cartel as $carteles): ?>
      <article class="card shadow-sm border-0">
          <a href="<?= base_url('public/boletos/' . $carteles['id']) ?>"
             class="text-decoration-none">
              <div class="row g-0">
                  <div class="col-md-4">
                      <img src="<?= base_url('public/images/'.($carteles['imagen'] ? $carteles['imagen'] : 'logo.png'))?>"
                           class="img-fluid rounded-start w-100 object-fit-cover"
                           alt="Banner de PNXNDX"
                           style="max-height: 150px">
                  </div>
                  <div class="col-md-8">
                      <div class="card-body">
                          <div class="row">
                              <div class="col">
                                  <h5 class="card-title fs-3 text-body">
                                    <?= $carteles['nombre'] ?>
                                  </h5>
                                  <p class="card-text text-body-secondary">
                                      <i class="bi bi-calendar-check-fill"></i>
                                      <!-- TODO: aqui va la fecha y hora de la compra, no del evento -->
                                      Comprado el <?=
                                    fechaHoraCorta(
                                      $carteles['fecha'],
                                      $carteles['hora']
                                    ) ?>
                                  </p>
                              </div>
                              <div class="col-auto">
                                  <p class="text-center fs-5 text-body">
                                    <?= fechaCorta($carteles['fecha']) ?>
                                  </p>
                              </div>
                          </div>
                          <p class="text-end mt-2 mb-0 text-primary fs-5 fw-medium">
                              (<?= $carteles['cantidad'] ?>)
                              $<?= $carteles['total'] ?> MXN</p>
                      </div>
                  </div>
              </div>
          </a>
      </article>
  <?php endforeach; ?>

</div>
<?= $this->endSection() ?>
