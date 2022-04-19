<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SGEquinos</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- <link rel="stylesheet" href="<?= base_url('assets')?>/plugins/fontawesome-free/css/all.min.css"> -->
  <script src="https://kit.fontawesome.com/f89139718b.js" crossorigin="anonymous"></script>
  <script type='text/javascript' src='http://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.4.0/fabric.min.js'></script>
  <link rel="stylesheet" href="<?= base_url('assets')?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- <link rel="stylesheet" href="<?= base_url('assets')?>/plugins/formValidation/formValidation.min.css"> -->
  <link rel="stylesheet" href="<?= base_url('assets')?>/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="<?= base_url('assets')?>/css/adminlte.min.css">
  <?php

    if (!empty($css_link)) {
        foreach ($css_link as $cada) {
            echo '<link href="' . $cada . '" rel="stylesheet"></script>';
        }
    }

    if (!empty($css)) {
        foreach ($css as $cada) {
            echo '<link href="' . base_url($cada) . '" rel="stylesheet">';
        }
    }

    ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<input type="hidden" id="base_url" value="<?=base_url()?>">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=base_url('dashboard')?>" class="nav-link">Dashboard</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('login/sair')?>" role="button">
          <i class="fa-solid fa-right-from-bracket"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url('dashboard')?>" class="brand-link">
      <img src="<?=base_url('assets')?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SG<strong>Equinos</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><?= $this->session->userdata('usuario')['nome_user']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Cadastros
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
          <?php if ($this->session->userdata('usuario')['tipo_user'] == 1){ ?>
            <li class="nav-item">
                <a href="<?=base_url('laboratorio')?>" class="nav-link">
                  <i class="fa-solid fa-microscope mr-2 ml-4"></i>
                  <p>Laboratórios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('proprietario')?>" class="nav-link">
                <i class="fa-solid fa-user mr-2 ml-4"></i>
                  <p>Proprietários</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('propriedade')?>" class="nav-link">
                <i class="fa-solid fa-location-dot mr-2 ml-4"></i>
                  <p>Propriedades</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('animal')?>" class="nav-link">
                <i class="fa-solid fa-horse mr-2 ml-4"></i>
                  <p>Animais</p>
                </a>
              </li>
            <?php } ?>
              <li class="nav-item">
                <a href="<?=base_url('exame')?>" class="nav-link">
                <i class="fa-solid fa-flask-vial mr-2 ml-4"></i>
                  <p>Exames</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>