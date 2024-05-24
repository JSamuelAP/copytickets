<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Descargame | CopyTickets</title>
    <!-- Bootstrap CSS -->
    <link
            href="<?= base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css') ?>"
            rel="stylesheet"
    >
</head>
<body>
<?php helper('formateador_helper'); ?>
<div style="width: 20rem;">
    <img
            src="<?= base_url('public/images/' . $cartel['qr_img_url']) ?>"
            class="mb-4"
            alt="Código QR"
    >
    <div class="position-relative">
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
        <p class="text-center mb-3 fw-bold" style="font-size: 20px;">
          <?= $cartel['nombre'] ?>
        </p>
        <p class="mb-0">
            <img src="<?= base_url("public/images/geo-alt-fill.svg") ?>"
                 alt="Ubicación: ">
          <?= $cartel['ubicacion'] ?></p>
        <p class="mb-4">
            <img src="<?= base_url("public/images/calendar-check-fill.svg") ?>"
                 alt="Fecha y hora: ">
          <?= fechaHoraLarga($cartel['fecha'], $cartel['hora']) ?>
        </p>
        <p class="mb-5">
          <?= $_SESSION['datos']['nombre'] ?><br>
            Cantidad de entradas: <span
                    class="fw-bold"><?= $cartel['cantidad'] ?></span><br>
            Precio: <span class="fw-bold">$<?= $cartel['total'] ?> MXN</span>
        </p>
        <p class="text-center text-body-tertiary">
            CopyTickets &copy; 2024
        </p>
    </div>
</div>
</body>
</html>
