<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Animais</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Cadastros</a></li>
              <li class="breadcrumb-item"><a href="#">Animais</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="ml-auto mb-3">
              <a href="<?=base_url('exame/cadastrar_animal')?>" class="btn btn-info"><i class="fa-solid fa-plus mr-2"></i>Adicionar</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <table id="tabela-animais" style="width: 100%">
                <thead>
                  <th>#</th>
                  <th>Nome</th>
                  <th>Registro</th>
                  <th>Espécie</th>
                  <th>Raça</th>
                  <th>Sexo</th>
                  <th>Resenha</th>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>