<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('public') ?>">
            <img src="<?= base_url('public/images/logo.png') ?>" alt="Logo"
                 width="48">
            CopyTickets
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <?php if (isset($_SESSION['datos']['rol']) && $_SESSION['datos']['rol'] == 1) { ?>
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link" href="<?= base_url('public') ?>">Eventos</a>
                  </li>
              </ul>
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a href="#" class="nav-link">Dashboard</a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url('public/DestruirSesion') ?>"
                         class="nav-link">Cerrar Sesion</a>
                  </li>
              </ul>
          <?php } else if (isset($_SESSION['datos']['rol']) && $_SESSION['datos']['rol'] == 2) { ?>
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link" href="<?= base_url('public') ?>">Eventos</a>
                  </li>
              </ul>
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a href="<?= base_url('public/organizador/perfil/' . $_SESSION['datos']['id']) ?>"
                         class="nav-link">Dashboard</a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url('public/DestruirSesion') ?>"
                         class="nav-link">Cerrar Sesion</a>
                  </li>
              </ul>
          <?php } else { ?>
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link" href="<?= base_url('public') ?>">Eventos</a>
                  </li>
              </ul>
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a href="<?= base_url('public/login') ?>"
                         class="nav-link">Login</a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url('public/signup') ?>"
                         class="nav-link">Signup</a>
                  </li>
              </ul>
          <?php } ?>

        </div>
    </div>
</nav>