<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SVEquinos | Login</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?php echo base_url('assets')?>/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets')?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets')?>/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>SG</b>Equinos</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Cadastre-se para acessar nossos serviços</p>

      <form action="<?php echo base_url('login/entrar') ?>" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email_user" id="email_user">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="senha_user" id="senha_user">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="input-group mb-3">
            <div class="input-group-append col-md-12">
              <div class="form-check col-md-8">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="tipo_usuario" value="1" checked><strong>Veterinário</strong>
                </label>
              </div>
              <div class="form-check col-md-8">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="tipo_usuario" value="2"><strong>Laboratório</strong>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
          </div>
        </div>
      </form>
      <p class="mb-0">
        <a href="<?php echo base_url('login/registro') ?>" class="text-center">Cadastrar-se</a>
      </p>
    </div>
  </div>
</div>

<script src="<?php echo base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('assets') ?>/dist/js/adminlte.min.js"></script>
</body>
</html>
