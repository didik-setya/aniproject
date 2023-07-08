<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
  <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
  <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js"></script>
  <script src="<?= base_url('assets/jquery.min.js') ?>"></script>

  <title><?= $title ?></title>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top mb-5" style="box-shadow: 0px 4px 0px #f26e2c;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav text-center ms-auto" style="align-items: center">
        <a class="nav-link" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="#">Features</a>
        <a class="nav-link" href="#">Pricing</a>
        <a class="nav-link" href="#">Disabled</a>
      </div>
    </div>
  </div>
</nav>

<?php $this->load->view($view) ?>

<footer class="bg-white pt-3" style="border-top: 4px solid #f26e2c">
  <div class="container">
  <div class="row">
    <div class="col-12">
      <p class="text-center"><b>Copyright &copy 2023 Aniproject</b></p> 
    </div>
  </div>
  </div>
</footer>
</body>
</html>