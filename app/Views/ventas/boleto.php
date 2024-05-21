<?= $this->extend('layout/base.php') ?>

<?php helper('formateador'); ?>
<?= $this->section('contenido') ?>
<h1 class="text-center mt-5">¡Gracias por tu compra!</h1>
<div class="d-flex flex-column align-items-center mt-3 mb-5">
  <?php include(APPPATH . './Views/components/boletoCard.php'); ?>
<a href="<?= base_url('public/descargar/' . $cartel['id'] .'/boletos')?>">
      <button class="btn btn-lg btn-primary mt-3">
          <i class="bi bi-download"></i>
          Descargar
      </button>
</a>
</div>
<?= $this->endSection() ?>
