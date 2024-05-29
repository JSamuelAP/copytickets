<?= $this->extend('layout/base.php') ?>

<?= $this->section('contenido') ?>
    <section class="mt-3 mb-4">
        <img src="<?= base_url('public/images/'.($cartelera['imagen'] ?: 'logo.png'))?>" alt="Banner de pxndx"
             class="img-fluid rounded-4 w-100 object-fit-cover"
             style="max-height: 400px;">
    </section>
    <div class="row gap-4 mb-5">
        <section class="col">
            <div class="d-flex justify-content-between align-items-center">
                <h1><?= $cartelera['nombre'] ?></h1>
              <?php if (
                isset($_SESSION['datos']['rol']) &&
                $_SESSION['datos']['rol'] == 2 &&
                $_SESSION['datos']['id'] == $cartelera['organizador_id']
              ) : ?>
                  <a href="<?= $cartelera['id'] ?>/editar"
                     class="btn btn-primary btn-small">
                      <i class="bi bi-pen-fill"></i>
                      Editar
                  </a>
              <?php endif; ?>
            </div>
            <!-- TODO: Aquí va el nombre del organizador -->
            <a href="<?= base_url('public/organizador/perfil/' . $cartelera['organizador_id']) ?>"
               class="fs-5"><?= $cartelera['nombre'] ?></a>
            <p class="mb-2 mt-5 fs-5">
                <i class="bi bi-geo-alt-fill"></i>
              <?= $cartelera['ubicacion'] ?>
            </p>
            <p class="mb-4 fs-5">
                <i class="bi bi-calendar-check-fill"></i>
              <?php
              helper('formateador');
              echo fechaHoraLarga($cartelera['fecha'], $cartelera['hora']);
              ?>
            </p>
            <p><?= $cartelera['descripcion'] ?></p>
        </section>
        <aside class="col-12 col-sm-4 col-lg-3">
            <p class="text-center fs-4">$<?= $cartelera['precio'] ?> MXN</p>
          <?php if ($cartelera['fecha'] > date('Y-m-d')) : ?>
              <div class="d-grid">
            <?php if (
              isset($_SESSION['datos']['rol']) &&
              $_SESSION['datos']['rol'] <= 1
            ) : ?>
                  <button type="button" data-bs-toggle="modal"
                          data-bs-target="#exampleModal"
                          class="btn btn-lg btn-primary">
                      <i class="bi bi-cart"></i>
                      Comprar
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1"
                       aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h1 class="modal-title fs-5"
                                      id="exampleModalLabel">Confirmar
                                      Compra</h1>
                                  <button type="button" class="btn-close"
                                          data-bs-dismiss="modal"
                                          aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <form id="pagarEvento"
                                        action="<?= base_url('public/pagar/boleto') ?>"
                                        method="post" class="mb-5">
                                        <input type="hidden" name="id" id="id">
                                      <div class="form-group">
                                          <label for="nombreEvento">Nombre del
                                              evento:</label>
                                          <input type="text"
                                                 class="form-control"
                                                 id="nombreEvento"
                                                 value="<?= $cartelera['nombre'] ?>"
                                                 disabled>
                                      </div>
                                      <div class="form-group">
                                          <label for="ubicacion">Ubicación:</label>
                                          <input type="text"
                                                 class="form-control"
                                                 id="ubicacion"
                                                 value="<?= $cartelera['ubicacion'] ?>"
                                                 disabled>
                                      </div>
                                      <div class="form-group">
                                          <label for="fecha">Fecha:</label>
                                          <input type="date"
                                                 class="form-control" id="fecha"
                                                 name="fecha"
                                                 value="<?= $cartelera['fecha'] ?>"
                                                 disabled>
                                      </div>
                                      <div class="form-group">
                                          <label for="hora">Hora:</label>
                                          <input type="time"
                                                 class="form-control" id="hora"
                                                 name="hora"
                                                 value="<?= $cartelera['hora'] ?>"
                                                 disabled>
                                      </div>
                                      <div class="form-group">
                                          <label for="nombreComprador">Nombre
                                              del Comprador:</label>
                                          <input type="text"
                                                 class="form-control"
                                                 id="nombreComprador"
                                                 value="<?= $_SESSION['datos']['nombre'] ?>"
                                                 disabled>
                                      </div>
                                      <div class="form-group">
                                          <label for="numBoletos">Cantidad de
                                              boletos:</label>
                                          <input type="number"
                                                 class="form-control"
                                                 id="numBoletos"
                                                 name="numBoletos" value="1"
                                                 min="1">
                                      </div>
                                      <div class="form-group">
                                          <label for="total">Total:</label>
                                          <input type="text"
                                                 class="form-control" id="total"
                                                 value="<?= $cartelera['precio'] ?>"
                                                 disabled>
                                      </div>
                                      <input type="hidden" id="totalHidden"
                                             name="total"
                                             value="<?= $cartelera['precio'] ?>">
                                      <input type="hidden" name="precio"
                                             value="<?= $cartelera['precio'] ?>">
                                      <input type="hidden" name="usuario_id"
                                             value="<?= $_SESSION['datos']['id'] ?>">
                                      <input type="hidden" name="evento_id"
                                             value="<?= $cartelera['id'] ?>">
                                      <input type="hidden" name="fecha"
                                             value="<?= $cartelera['fecha'] ?>">
                                      <input type="hidden" name="hora"
                                             value="<?= $cartelera['hora'] ?>">

                                  </form>
                              </div>
                              <div class="modal-footer">
                                  <button type="button"
                                          class="btn btn-secondary"
                                          data-bs-dismiss="modal">Cerrar
                                  </button>
                                  <button type="submit" form="pagarEvento"
                                          class="btn btn-primary">Confirmar
                                      Compra
                                  </button>
                              </div>
                          </div>
                      </div>
                  </div>
                  </div>
            <?php endif; ?>
          <?php endif; ?>
            <br>
            <p class="fs-5 mb-0">Capacidad: </p>
            <p><?= $cartelera['capacidad'] ?> asistentes</p>
            <section>
              <?php if (isset($_SESSION['datos']['rol']) && $_SESSION['datos']['rol'] == 2 && $_SESSION['datos']['id'] == $cartelera['organizador_id']) : ?>
                  <p class="text-center mb-4">
                      <a href="<?= $cartelera['id'] ?>/estadisticas">
                          <i class="bi bi-clipboard2-data-fill"></i>
                          Ver estadisticas
                      </a>
                  </p>
                  <p class="fs-5 mb-0">Usuario escáner: </p>
                  <div class="mb-2">
                      <label class="form-label mb-0 fw-light">Nombre de
                          usuario</label>
                      <input type="text"
                             value="<?= $escaner_usuario['usuario'] ?>"
                             class="form-control form-control-sm" disabled
                             readonly>
                  </div>
                  <div>
                      <label class="form-label mb-0 fw-light">Contraseña</label>
                      <input type="text"
                             value="<?= $escaner_usuario['password'] ?>"
                             class="form-control form-control-sm" disabled
                             readonly>
                  </div>
              <?php endif; ?>
            </section>
        </aside>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let inputBoletos = document.getElementById('numBoletos');
            let totalElemento = document.getElementById('total');
            let totalHidden = document.getElementById('totalHidden');

            inputBoletos.addEventListener('input', function () {
                let cantidad = parseInt(inputBoletos.value);
                let precioUnitario = <?= $cartelera['precio'] ?>;
                let total = cantidad * precioUnitario;
                totalElemento.value = "$"+total + " MXN"; // Establece el valor del total en el input visible
                totalHidden.value = total; // Establece el valor del total en el campo oculto
            });
        });

$(document).ready(function () {
    $("#pagarEvento").submit(function (e) {
        e.preventDefault();

        let metodo = $(this).attr('method');
        let accion = $(this).attr('action');
        let datos = $(this).serializeArray();

        $.ajax({
            url: accion,
            method: metodo,
            data: datos,
            success: function(response) {
                if (!response || !response.boleto_id) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Datos no insertados.'
                    });
                } else {
                    GenerarApi(response.boleto_id, datos);
                }
            },
            error: function(xhr, status, error) {
                console.log("Error en la solicitud AJAX:");
                console.log("Estado: " + status);
                console.log("Error: " + error);
            }
        });
    });
});

function GenerarApi(boleto_id, datos) {
    const qrData = {
        data: JSON.stringify({ boleto_id }),
        width: 300,
        height: 300,
        image: "https://rapidapi-prod-apis.s3.amazonaws.com/a9151bc9-7822-4401-83d5-204f100056d3.jpg",
        dotsOptions: {
            color: "#521D3B",
            type: "square"
        },
        cornersSquareOptions: {
            color: "#A46383",
            type: "square"
        },
        cornersDotOptions: {
            color: "#521D3B",
            type: "square"
        },
        backgroundOptions: {
            color: "#ffffff"
        },
        imageOptions: {
            hideBackgroundDots: false,
            imageSize: 0,
            margin: 0
        },
        downloadOptions: {
            extension: "png"
        }
    };

    const qrSettings = {
        async: true,
        crossDomain: true,
        url: 'https://qr-code-generator152.p.rapidapi.com/api/createQrCode',
        method: 'POST',
        headers: {
            'content-type': 'application/json',
            'X-RapidAPI-Key': '69b1934308mshc03fe5f85c8934bp171fefjsn13b1e1d83905',
            'X-RapidAPI-Host': 'qr-code-generator152.p.rapidapi.com'
        },
        processData: false,
        data: JSON.stringify(qrData),
        xhrFields: {
            responseType: 'blob' // Solicitar la respuesta como un Blob
        }
    };

    $.ajax(qrSettings).done(function (response) {
        const reader = new FileReader();
        reader.onloadend = function () {
            const qrDataUrl = reader.result;

            // Crear un objeto FormData y agregar los datos del formulario y la URL del QR
            let formData = new FormData();
            formData.append('codigoQR', qrDataUrl);
            datos.forEach(item => {
                formData.append(item.name, item.value);
            });

            console.log(formData);

            // Enviar el formulario junto con el código QR al servidor
            $.ajax({
                url: '<?= base_url('public/GenerarBoleto/') ?>' + boleto_id,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    if (!response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Ha ocurrido un error en el servidor, favor de intentar más tarde.'
                        });
                    } else {
                        Swal.fire({
                            title: '¡La compra se hizo correctamente!',
                            text: 'Click para continuar.',
                            icon: 'success',
                        }).then(() => {
                            window.location.href = '<?= base_url('public/') ?>';
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.log("Error en la solicitud AJAX:");
                    console.log("Estado: " + status);
                    console.log("Error: " + error);
                }
            });
        };
        reader.readAsDataURL(response); // Convertir Blob a una URL de datos base64
    }).fail(function (xhr, status, error) {
        console.log("Error en la generación del código QR:");
        console.log("Estado: " + status);
        console.log("Error: " + error);
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No se pudo generar el código QR, favor de intentar más tarde.'
        });
    });
}



    </script>

<?= $this->endSection() ?>


