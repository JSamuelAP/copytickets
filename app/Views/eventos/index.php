<?= $this->extend('layout/base.php') ?>

<?= $this->section('contenido') ?>
<section class="mt-4">
    <h2>Categorías</h2>
    <div class="d-flex justify-content-center gap-5">
        <button class="btn">
            <img src="images/icono-categoria-musica.svg" alt="" width="64" height="64"><br>
            <span>Conciertos y festivales</span>
        </button>
        <button class="btn">
            <img src="images/icono-categoria-teatro.svg" alt="" width="64" height="64"><br>
            <span>Teatro, Comedia y Cultura</span>
        </button>
        <button class="btn">
            <img src="images/icono-categoria-conferencia.svg" alt="" width="64" height="64"><br>
            <span>Conferencias y talleres</span>
        </button>
        <button class="btn">
            <img src="images/icono-categoria-otros.svg" alt="" width="64" height="64"><br>
            <span>Otros</span>
        </button>
    </div>
</section>
<section class="mt-5 mb-5">
    <h1>Proximos eventos</h1>
    <div class="vstack gap-3">
        <article class="card shadow-sm border-0">
            <a href="eventos/1" class="text-decoration-none">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="uploads/pxndx.jpg" class="img-fluid rounded-start w-100 object-fit-cover"
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
<?= $this->endSection() ?>
