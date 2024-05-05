<?= $this->extend('layout/base.php') ?>

<?= $this->section('contenido') ?>
    <section class="mt-3 mb-4">
        <img
                src="<?= base_url('public/uploads/pxndx.jpg') ?>"
                alt="Banner de pxndx"
                class="img-fluid rounded-4 w-100 object-fit-cover"
                style="max-height: 400px;"
        >
    </section>
    <div class="row gap-4 mb-5">
        <section class="col">
            <h1>PXNDX en León</h1>
            <a href="<?= base_url('public/organizador/perfil') ?>" class="fs-5 link-primary">PXNDX</a>
            <p class="mb-2 mt-5 fs-5"><i class="bi bi-geo-alt-fill"></i> Foro del Lago, León Gto</p>
            <p class="mb-4 fs-5"><i class="bi bi-calendar-check-fill"></i> Sábado 30 septiembre, 12:00</p>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid delectus deserunt incidunt ipsum
                maiores quas tempora. Dolores ex impedit labore libero nobis officiis perferendis sint. Esse ipsam nulla
                qui voluptate. Debitis ducimus eligendi, fugiat fugit id illum nihil perferendis quibusdam rem saepe vel
                voluptate voluptatibus! Assumenda eum, id incidunt maxime, minima, modi nulla officiis porro provident
                quam reprehenderit sint temporibus.Ad aliquam aliquid asperiores commodi cupiditate deleniti doloribus
                exercitationem, ipsa nesciunt numquam perspiciatis quae quod quos reiciendis repudiandae sed soluta
                tenetur veniam, veritatis vitae? Corporis culpa modi optio perferendis tempore!Accusamus ad aliquam amet
                aspernatur culpa debitis delectus dicta dolorem eaque excepturi exercitationem explicabo hic illo ipsa,
                ipsam maxime minus mollitia nam nisi nulla numquam quam recusandae, rem repellendus vitae?Alias ducimus
                incidunt omnis quia vero? Assumenda eaque earum illum magnam nobis omnis repellat sed sint suscipit
                velit? Atque cum debitis est minus quasi ullam vel veniam? A, accusantium quae.
            </p>
        </section>
        <aside class="col-12 col-sm-4 col-lg-3">
            <p class="text-center fs-4">$600.00 MXN</p>
            <form action="" class="mb-5">
                <div class="row align-items-center mb-3">
                    <div class="col-auto">
                        <label for="num-boletos" class="col-form-label">Boletos:</label>
                    </div>
                    <div class="col">
                        <input type="number" id="num-boletos" name="numBoletos" value="1" min="1"
                               class="form-control">
                    </div>
                </div>
                <div class="d-grid">
                    <input type="submit" class="btn btn-lg btn-primary" value="Comprar">
                </div>
            </form>
            <p class="fs-5 mb-0">Capacidad: </p>
            <p>2100 asistentes</p>
            <section>
                <p class="text-center mb-4"><a href="" class="link-primary">Ver estadisticas</a></p>
                <p class="fs-5 mb-0">Usuario escáner: </p>
                <div class="mb-2">
                    <label class="form-label mb-0 fw-light">Nombre de usuario</label>
                    <input type="text" value="escaner1" class="form-control form-control-sm" disabled readonly>
                </div>
                <div>
                    <label class="form-label mb-0 fw-light">Contraseña</label>
                    <input type="text" value="$ecretP4ssw0rd*" class="form-control form-control-sm" disabled readonly>
                </div>
            </section>
        </aside>
    </div>
<?= $this->endSection() ?>