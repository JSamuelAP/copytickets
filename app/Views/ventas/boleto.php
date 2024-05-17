<?= $this->extend('layout/base.php') ?>

<?= $this->section('contenido') ?>
<h1 class="text-center mt-5">¡Gracias por tu compra!</h1>
<div class="d-flex flex-column align-items-center mt-3 mb-5">
    <div class="card" style="width: 20rem;">
        <img
                id="qrCodeImage"
                src="<?= $cartel['qr_img_url'] ?>"
                class="card-img-top"
                alt="Código QR"
        >
        <div
                class="card-body position-relative"
        >
            <div
                    style="
                            width: 18rem;
                            height: 18rem;
                            background-image: url('<?= base_url("public/images/logo.png") ?>');
                            background-size: cover;
                            opacity: 0.15;
                            position: absolute;
                            ">
            </div>
            <h5 class="card-title text-center mb-3"><?= $cartel['nombre']?> </h5>
            <p class="mb-0">
                <i class="bi bi-geo-alt-fill me-1"></i>
                <?= $cartel['ubicacion']?></p>
            <p class="mb-4">
                <i class="bi bi-calendar-check-fill me-1"></i>
                <?= $cartel['fecha']?>, <?= $cartel['hora']?></p>
            <p class="mb-5">
            <?= $_SESSION['datos']['nombre']?><br>
                Cantidad de entradas: <span class="fw-bold"><?= $cartel['cantidad']?></span><br>
                Precio: <span class="fw-bold">$<?= $cartel['total']?> MXN</span>
            </p>
            <p class="text-center text-body-tertiary">CopyTickets &copy;
                2024</p>
        </div>
    </div>
    <button class="btn btn-lg btn-primary mt-3">
        <i class="bi bi-download"></i>
        Descargar
    </button>
</div>
<?= $this->endSection() ?>
