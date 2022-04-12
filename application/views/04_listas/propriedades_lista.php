  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Propriedades</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Cadastros</a></li>
              <li class="breadcrumb-item"><a href="#">Propriedades</a></li>
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
              <a href="<?=base_url('propriedade/cadastro_propriedade')?>" class="btn btn-info"><i class="fa-solid fa-plus mr-2"></i>Adicionar</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <table id="tabela-propriedades" style="width: 100%">
                <thead>
                  <th>#</th>
                  <th>Nome da Propriedade</th>
                  <th>Proprietário</th>
                  <th>Equinos na Propriedade</th>
                  <th>Endereço</th>
                  <th>Cidade/Estado</th>
                </thead>
                <tbody>
                  <?php
                  $contador = 0;
                  foreach ($propriedades as $pro){ 
                  $contador++
                  ?>
                    <td><?= $contador ?></td>
                    <td><?=$pro->nome_pro?></td>
                    <td><?=$pro->nome_prop?></td>
                    <td><?=$pro->qtdequinos_pro?></td>
                    <td><?=$pro->logradouro_pro . ', ' . $pro->numero_pro?></td>
                    <td><?=$pro->cidade_pro . ' - ' . $pro->estadouf_pro?></td>
                  <?php } ?>
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