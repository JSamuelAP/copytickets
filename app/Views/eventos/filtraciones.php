<?php helper('formateador'); ?>
<section class="mt-5 mb-5">
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
