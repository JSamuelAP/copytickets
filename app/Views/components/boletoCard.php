<div class="card" style="width: 20rem;">
    <img
            src="<?= base_url('public/uploads/qr.png') ?>"
            class="card-img-top"
            alt="Código QR"
    >
    <div class="card-body position-relative">
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
        <h5 class="card-title text-center mb-3">PXNDX en León</h5>
        <p class="mb-0">
            <i class="bi bi-geo-alt-fill me-1"></i>
            Foro del lago, León Gto</p>
        <p class="mb-4">
            <i class="bi bi-calendar-check-fill me-1"></i>
          <?= fechaHoraLarga('2024-09-30', '22:00:00') ?>
        </p>
        <p class="mb-5">
            Manrique Galván Omar Manuel<br>
            Cantidad de entradas: <span class="fw-bold">3</span><br>
            Precio: <span class="fw-bold">$1,800 MXN</span>
        </p>
        <p class="text-center text-body-tertiary">
            CopyTickets &copy; 2024
        </p>
    </div>
</div>
