<?= $this->extend('layout/base.php') ?>

<?= $this->section('contenido') ?>
<section class="row row-gap-2 mt-5">
    <div class="col-12 col-md-3">
        <img
                src="<?= base_url('public/uploads/pxndx.jpg') ?>"
                alt="Banner de PXNDX"
                class="img-fluid rounded"
        >
    </div>
    <div class="col-12 col-md-9"><h1>Estadísticas de PXNDX En León</h1>
        <p class="fs-3">Costo del boleto: $600 MXN</p>
    </div>
</section>
<section class="row row-gap-4 mt-4 mb-5">
    <div class="col-12 col-md-6">
        <article class="card border-0 shadow">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between">
                    <h2 class="h4 text-body-secondary">Total entradas vendidas</h2>
                    <i class="bi bi-ticket fs-4 text-warning"></i>
                </div>
                <span class="fw-bold fs-1 d-block mt-4">1200</span>
            </div>
        </article>
    </div>
    <div class="col-12 col-md-6">
        <article class="card border-0 shadow">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between">
                    <h2 class="h4 text-body-secondary">Entradas restantes</h2>
                    <i class="bi bi-ticket fs-4 text-warning"></i>
                </div>
                <span class="fw-bold fs-1 d-block mt-4">900</span>
            </div>
        </article>
    </div>
    <div class="col-12 col-md-6">
        <article class="card border-0 shadow">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between">
                    <h2 class="h4 text-body-secondary">Porcentaje de ventas</h2>
                    <i class="bi bi-cash-stack fs-4 text-success"></i>
                </div>
                <span class="fw-bold fs-1 d-block mt-4">80%</span>
            </div>
        </article>
    </div>
    <div class="col-12 col-md-6">
        <article class="card border-0 shadow">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between">
                    <h2 class="h4 text-body-secondary">Ganancias</h2>
                    <i class="bi bi-cash-stack fs-4 text-success"></i>
                </div>
                <span class="fw-bold fs-1 d-block mt-4">$720,000</span>
            </div>
        </article>
    </div>
</section>
<?= $this->endSection() ?>
