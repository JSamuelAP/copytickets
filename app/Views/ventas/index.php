<?= $this->extend('layout/base.php') ?>

<?php helper('formateador'); ?>
<?= $this->section('contenido') ?>
<h1 class="text-center mt-5">Historial de compras</h1>
<div class="vstack gap-3 my-5">
    <article class="card shadow-sm border-0">
        <a href="boletos/1" class="text-decoration-none">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?= base_url('public/uploads/pxndx.jpg') ?>"
                         class="img-fluid rounded-start w-100 object-fit-cover"
                         alt="Banner de PNXNDX"
                         style="max-height: 150px">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title fs-3 text-body">
                                    PXNDX en León
                                </h5>
                                <p class="card-text text-body-secondary">
                                    <i class="bi bi-calendar-check-fill"></i>
                                    Comprado el <?=
                                  fechaHoraCorta(
                                    '2024-04-24',
                                    '17:45:21'
                                  ) ?>
                                </p>
                            </div>
                            <div class="col-auto">
                                <p class="text-center fs-5 text-body">
                                    <?= fechaCorta('2024-09-30') ?>
                                </p>
                            </div>
                        </div>
                        <p class="text-end mt-2 mb-0 text-primary fs-5 fw-medium">
                            (1) $600.00 MXN
                        </p>
                    </div>
                </div>
            </div>
        </a>
    </article>
</div>
<?= $this->endSection() ?>
