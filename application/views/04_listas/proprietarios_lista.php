<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Proprietarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Cadastros</a></li>
              <li class="breadcrumb-item"><a href="#">Proprietarios</a></li>
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
              <a href="<?= base_url('proprietario/cadastro_proprietario') ?>" class="btn btn-info"><i class="fa-solid fa-plus mr-2"></i>Adicionar</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <table id="tabela-proprietarios" style="width: 100%">
                <thead>
                  <th>#</th>
                  <th>Nome</th>
                  <th>E-Mail</th>
                  <th>Documento</th>
                  <th>Telefone</th>
                  <th>Endereço</th>
                  <th>Cidade/Estado</th>
                  <th>Ação</th>
                </thead>
                <tbody>
                  <?php
                  $contador = 0;
                  if (!empty($proprietarios)){
                    foreach ($proprietarios as $prop){ 
                      $contador++
                  ?>
                  <tr>
                    <td><?= $contador ?></td>
                    <td><?=$prop->nome_prop?></td>
                    <td><?=$prop->email_prop?></td>
                    <td><?=$prop->documento_prop?></td>
                    <td><?=$prop->telefone_prop?></td>
                    <td><?=$prop->endereco_prop . ', ' . $prop->numero_prop?></td>
                    <td><?=$prop->cidade_prop . ' - ' . $prop->estadouf_prop?></td>
                    <td>Ação</td>
                  </tr>
                  <?php } }else{ ?>
                    <td colspan="7" style="text-align: center">Sem Proprietários Cadastrados</td>
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