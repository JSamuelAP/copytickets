<?= $this->extend('layout/base.php') ?>

<?= $this->section('contenido') ?>
<section class="mt-4">
    <div class="row">
        <div class="col-12 col-md-5 col-lg-4">
            <h1 class="mb-4"><?= $organizador['nombre'] ?></h1>
            <p class="mb-1 fs-5">
                <i class="bi bi-envelope-fill"></i>
              <?= $organizador['email']?>
            </p>
            <p class="mb-1 fs-5">
                <i class="bi bi-telephone-fill"></i>
              <?= $organizador['telefono']?>
            </p>
            <p class="mb-2 fs-5">
                <i class="bi bi-geo-alt-fill"></i>
              <?= $organizador['ubicacion']?>
            </p>
        </div>
        <div class="col-12 col-md-7 col-lg-8">
            <p class="fs-5">
                <?= $organizador['descripcion'];?>
            </p>
        </div>
    </div>
</section>
<section class="mt-5 mb-5">
    <div class="d-flex justify-content-between mb-2">
        <h2>Proximos eventos</h2>
        <?php if(isset($_SESSION['datos']['rol']) && $_SESSION['datos']['rol'] == 2): ?>
        <a
                href="<?=base_url('public/eventos/crear')?>"
                class="btn btn-primary btn-lg"
        >
            <i class="bi bi-plus"></i>
            Crear evento
        </a>
        <?php endif;?>
    </div>
    <div class="vstack gap-3">
        <article class="card shadow-sm border-0">
            <a href="<?= base_url('public/eventos/'.$cartelera[0]['id']) ?>" class="text-decoration-none">
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
                                    <h5 class="card-title fs-3 text-body">PXNDX en León</h5>
                                    <p class="card-text text-body-secondary">
                                        <i class="bi bi-geo-alt-fill"></i> Foro del lago
                                    </p>
                                </div>
                                <div class="col-auto">
                                    <p class="text-center fs-5 text-body">
                                        30<br>
                                        SEP
                                    </p>
                                </div>
                            </div>
                            <p class="text-end mt-2 mb-0 text-primary fs-5 fw-medium">$600.00 MXN</p>
                        </div>
                    </div>
                </div>
            </a>
        </article>
    </div>
</section>
<section class="mt-5 mb-5">
    <h2>Eventos pasados</h2>
    <div class="vstack gap-3">
        <article class="card shadow-sm border-0">
            <a href="<?= base_url('public/eventos/'.$cartelera[0]['id']) ?>" class="text-decoration-none">
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
                                    <h5 class="card-title fs-3 text-body">PXNDX en Guadalajara</h5>
                                    <p class="card-text text-body-secondary">
                                        <i class="bi bi-geo-alt-fill"></i> Foro del lago
                                    </p>
                                </div>
                                <div class="col-auto">
                                    <p class="text-center fs-5 text-body">
                                        17<br>
                                        FEB
                                    </p>
                                </div>
                            </div>
                            <p class="text-end mt-2 mb-0 text-primary fs-5 fw-medium">$800.00 MXN</p>
                        </div>
                    </div>
                </div>
            </a>
        </article>
    </div>
</section>
<?= $this->endSection() ?>
