<style>

</style>
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
              <a href="<?=base_url('animal/cadastrar_animal')?>" class="btn btn-info"><i class="fa-solid fa-plus mr-2"></i>Adicionar</a>
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
                  <th>Ações</th>
                </thead>
                <tbody>
                  <?php
                  if (!empty($animais)){
                    $contador = 0;
                    foreach ($animais as $ani){ 
                    $contador++
                  ?>
                  <tr>
                      <td><?= $contador ?></td>
                      <td><?=$ani->nome_ani?></td>
                      <td><?=$ani->registro_ani?></td>
                      <td><?=$ani->especie_ani?></td>
                      <td><?=$ani->raca_ani?></td>
                      <td><?=$ani->sexo_ani?></td>
                      <td><a href="<?=base_url() . $ani->resenha_ani?>" target="_blank">Abrir Resenha</a></td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">Ações </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item item-ver-detalhes" data-codigo="<?=$ani->codigo_ani?>"> <i class="fa-solid fa-magnifying-glass text-primary"></i> Ver Detalhes</a>
                            <a class="dropdown-item item-editar" data-codigo="<?=$ani->codigo_ani?>"><i class="fa-solid fa-pen"></i> Editar</a>
                            <a class="dropdown-item item-excluir" data-codigo="<?=$ani->codigo_ani?>"> <i class="fa-solid fa-trash-can"></i> Excluir</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php }}else{?>
                    <td colspan="8" style="text-align: center">Nenhum animal encontrado!</td>
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
<div class="modal fade" id="modal-detalhe-animal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title">Detalhes do Animal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input type="hidden" id="codigo_ani" name="codigo_ani" value="0">
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
            <button type="button" class="btn btn-info" id="btn-imprimir">Imprimir</button>
          </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->