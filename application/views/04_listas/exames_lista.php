<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Exames</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Cadastros</a></li>
            <li class="breadcrumb-item"><a href="#">Exames</a></li>
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
            <a href="<?= base_url('exame/cadastrar_exame') ?>" class="btn btn-info"><i class="fa-solid fa-plus mr-2"></i>Adicionar</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <table id="tabela-exames" style="width: 100%">
              <thead>
                <th>#</th>
                <th>Número do Exame</th>
                <th>Proprietário</th>
                <th>Nome do Animal</th>
                <th>Registro do Animal</th>
                <th>Status</th>
                <th>Ações</th>
              </thead>
              <tbody>
                <?php
                $contador = 0;
                foreach ($exames as $exa) {
                  $contador++;
                  $status = '';
                  if ($exa->status_exa == 1) {
                    $status = '<i class="fa-solid fa-clock" style="color: orange;"></i> Aguardando';
                  } else if ($exa->status_exa == 2) {
                    $status = ' <i class="fa-solid fa-microscope" style="color: orange;"></i> Em Análise';
                  } else if ($exa->status_exa == 3) {
                    $status = ' <i class="fa-solid fa-circle-check" style="color: green;"></i> Aprovado';
                  } else if ($exa->status_exa == 4) {
                    $status = '<i class="fa-solid fa-ban" style="color: red;"></i> Reprovado';
                  }
                ?>
                  <tr>
                    <td><?= $contador ?></td>
                    <td align="right"><?= $exa->numeroexame_exa ?></td>
                    <td><?= $exa->nome_prop ?></td>
                    <td><?= $exa->nome_ani ?></td>
                    <td align="right"><?= $exa->registroanimal_exa ?></td>
                    <td align="center"><?= $status ?></td>
                    <td align="center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">Ações </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item item-ver-detalhes" data-codigo="<?= $exa->codigo_exa ?>"> <i class="fa-solid fa-magnifying-glass text-primary"></i> Ver Detalhes</a>
                          <?php if ($this->session->userdata('usuario')['tipo_user'] == 2) { ?>
                            <a class="dropdown-item item-aprovar-exame"> <i class="fa-solid fa-circle-check text-success"></i> Aprovar</a>
                            <a class="dropdown-item item-reprovar-exame"> <i class="fa-solid fa-ban text-danger"></i> Reprovar</a>
                          <?php }; ?>
                          <?php if ($this->session->userdata('usuario')['tipo_user'] == 1) { ?>
                            <a class="dropdown-item item-excluir-exame"> <i class="fa-solid fa-trash-can"></i> Excluir</a>
                          <?php }; ?>
                        </div>
                      </div>
                    </td>
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


<!-- MODAL CADASTRO DE PROPRIEDADE -->
<div class="modal fade" id="modal-detalhe-exame">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title">Detalhes do Exame</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formModalDetalhesExame" novalidate="novalidate" enctype="multipart/form-data">
          <input type="hidden" id="codigo_exa" name="codigo_exa" value="0">
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="nome_prop">Proprietário</label>
                  <input type="text" class="form-control" id="nome_prop" name="nome_prop" placeholder="Nome do Proprietário" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="documento_prop">Documento do Proprietário</label>
                  <input type="text" class="form-control" id="documento_prop" name="documento_prop" placeholder="Documento do Proprietário" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="telefone_prop">Telefone</label>
                  <input type="tel" class="form-control" id="telefone_prop" name="telefone_prop" placeholder="Telefone do Proprietário" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="nome_lab">Laboratório</label>
                  <input type="text" class="form-control" id="nome_lab" name="nome_lab" placeholder="Nome do Laboratório" readonly>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="telefone_lab">Telefone</label>
                  <input type="tel" class="form-control" id="telefone_lab" name="telefone_lab" placeholder="Telefone do Laboratório" readonly>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="portariacredenciamento_lab">Portaria de Cred.</label>
                  <input type="text" class="form-control" id="portariacredenciamento_lab" name="portariacredenciamento_lab" placeholder="Portaria de Credenciamento" readonly>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="cidadeestado_lab">Cidade / Estado</label>
                  <input type="text" class="form-control" id="cidadeestado_lab" name="cidadeestado_lab" placeholder="Cidade / Estado" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="comentarios_exa">Comentários</label>
                  <textarea class="form-control" name="comentarios_exa" id="comentarios_exa" placeholder="Comentários" rows="6" maxlength="1000" readonly></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <hr>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="nome_ani">Nome do Animal</label>
                  <input type="text" class="form-control" id="nome_ani" name="nome_ani" placeholder="Nome do Animal" readonly>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="registro_ani">Registro/Nº/Marca</label>
                  <input type="tel" class="form-control" id="registro_ani" name="registro_ani" placeholder="Registro do Animal" readonly>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="especie_ani">Espécie</label>
                  <input type="text" class="form-control" id="especie_ani" name="especie_ani" placeholder="Espécie" readonly>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="raca_ani">Raça</label>
                  <input type="text" class="form-control" id="raca_ani" name="raca_ani" placeholder="Raça" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <div class="form-group">
                  <label for="sexo_ani">Sexo</label>
                  <input type="text" class="form-control" id="sexo_ani" name="sexo_ani" placeholder="Sexo" readonly>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label for="idade_ani">Idade</label>
                  <input type="tel" class="form-control" id="idade_ani" name="idade_ani" placeholder="Idade" readonly>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="nome_pro">Propriedade</label>
                  <input type="text" class="form-control" id="nome_pro" name="nome_pro" placeholder="Propriedade em que se encontra" readonly>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="cidadeuf_pro">Cidade / Estado</label>
                  <input type="text" class="form-control" id="cidadeuf_pro" name="cidadeuf_pro" placeholder="Cidade / Estado" readonly>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label for="classificacao_ani">Classificação</label>
                  <input type="text" class="form-control" id="classificacao_ani" name="classificacao_ani" placeholder="Classificação" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 d-flex justify-content-center">
                <img alt="Imagem da Resenha do Animal" id="imagem_resenha" style="width: 100%">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 d-flex justify-content-center">
                <img alt="Exame Aprovado" id="imagem_status" style="width: 30%; display: none">
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary btn-modal-nova-propriedade">Salvar</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->