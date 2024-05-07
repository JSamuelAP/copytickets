<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= esc($titulo) ?></title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>


    <!-- Bootstrap CSS -->
    <link href="<?= base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">

    <style>
    /* TODO: Personalizar el color primario como rosa */
    /*https://getbootstrap.com/docs/5.3/components/buttons/#variables*/
    :root,
    [data-bs-theme=light] {
        --bs-primary: #dd0dfd;
        --bs-primary-rgb: 221, 13, 253;
    }

    .btn.btn-primary {
        background-color: var(--bs-primary);
    }
    </style>
</head>

<body>
    <header>
        <?php include(APPPATH . './Views/partials/navbar.php'); ?>
    </header>
    <main class="container">
        <?= $this->renderSection('contenido') ?>
    </main>
    <?php include(APPPATH . 'Views/partials/footer.php'); ?>
    <script src="<?= base_url('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>