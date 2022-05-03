  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Laboratórios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
            <div class="col-md-12">
              <table id="tabela-laboratorios" style="width: 100%">
                <thead>
                  <th>#</th>
                  <th>Nome</th>
                  <th>E-Mail</th>
                  <th>Telefone</th>
                  <th>Portaria de Credenciamento</th>
                  <th>Endereço</th>
                  <th>Cidade/Estado</th>
                </thead>
                <tbody>
                  <?php
                  $contador = 0;
                  foreach ($laboratorios as $lab){ 
                  $contador++
                  ?>
                  <tr>
                    <td><?= $contador ?></td>
                    <td><?=$lab->nome_lab?></td>
                    <td><?=$lab->email_lab?></td>
                    <td><?=$lab->telefone_lab?></td>
                    <td><?=$lab->portariacredenciamento_lab?></td>
                    <td><?=$lab->rua_lab . ', ' . $lab->numero_lab?></td>
                    <td><?=$lab->cidade_lab . ' - ' . $lab->estadouf_lab?></td>
                  </tr>
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