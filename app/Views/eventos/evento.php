<?= $this->extend('layout/base.php') ?>

<?= $this->section('contenido') ?>
    <section class="mt-3 mb-4">
        <img
                src="<?= base_url($cartelera['imagen']) ?>"
                alt="Banner de pxndx"
                class="img-fluid rounded-4 w-100 object-fit-cover"
                style="max-height: 400px;"
        >
    </section>
    <div class="row gap-4 mb-5">
        <section class="col">
            <div class="d-flex justify-content-between align-items-center">
                <h1><?= $cartelera['nombre'] ?></h1>
              <?php if (
                isset($_SESSION['datos']['rol']) && $_SESSION['datos']['rol'] == 2 &&
                $_SESSION['datos']['id'] == $cartelera['organizador_id']
              ): ?>
                  <a
                          href="<?= $cartelera['id'] ?>/editar"
                          class="btn btn-primary btn-small"
                  >
                      <i class="bi bi-pen-fill"></i>
                      Editar
                  </a>
              <?php endif; ?>
            </div>
            <a href="<?= base_url(
              'public/organizador/perfil/' . $cartelera['organizador_id']
            ) ?>"
               class="fs-5"><?= $cartelera['nombre'] ?></a>
            <p class="mb-2 mt-5 fs-5">
                <i class="bi bi-geo-alt-fill"></i>
              <?= $cartelera['ubicacion'] ?>
            </p>
            <p class="mb-4 fs-5">
                <i class="bi bi-calendar-check-fill"></i>
              <?= $cartelera['fecha'] ?>, <?= $cartelera['hora'] ?>
            </p>
            <p>
              <?= $cartelera['descripcion'] ?>
            </p>
        </section>
        <aside class="col-12 col-sm-4 col-lg-3">
            <p class="text-center fs-4">$<?= $cartelera['precio'] ?> MXN</p>
            <form action="" class="mb-5">
                <div class="row align-items-center mb-3">
                    <div class="col-auto">
                        <label for="num-boletos"
                               class="col-form-label">Boletos:</label>
                    </div>
                    <div class="col">
                        <input type="number" id="num-boletos" name="numBoletos"
                               value="1" min="1"
                               class="form-control">
                    </div>
                </div>
                <?php if($cartelera['fecha'] > date('Y-m-d')):?>
                <div class="d-grid">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <i class="bi bi-cart"></i>
                        Comprar
                    </button>
                </div>
                <?php endif;?>

            </form>
            <p class="fs-5 mb-0">Capacidad: </p>
            <p><?= $cartelera['capacidad'] ?> asistentes</p>
            <section>
              <?php if (
                isset($_SESSION['datos']['rol']) && $_SESSION['datos']['rol'] == 2 &&
                $_SESSION['datos']['id'] == $cartelera['organizador_id']
              ): ?>
                  <p class="text-center mb-4">
                      <a href="<?= $_SESSION['datos']['id'] ?>/estadisticas"
                         class="link-primary">Ver estadisticas</a>
                  </p>
                  <p class="fs-5 mb-0">Usuario escáner: </p>
                  <div class="mb-2">
                      <label class="form-label mb-0 fw-light">Nombre de
                          usuario</label>
                      <input type="text" value="escaner1"
                             class="form-control form-control-sm" disabled
                             readonly>
                  </div>
                  <div>
                      <label class="form-label mb-0 fw-light">Contraseña</label>
                      <input type="text" value="$ecretP4ssw0rd*"
                             class="form-control form-control-sm" disabled
                             readonly>
                  </div>
              <?php endif; ?>
            </section>
        </aside>
    </div>
<?= $this->endSection() ?>