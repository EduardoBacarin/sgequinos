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
            <li class="breadcrumb-item">Cadastrar Animal</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Dados do Animal</h3>
            </div>
            <form id="formCadastroAnimal" novalidate="novalidate" enctype="multipart/form-data">
              <input type="hidden" id="codigo_ani" value="<?=!empty($animal) ? $animal->nome_ani : 0?>" name="codigo_ani">
              <input type="hidden" id="codigo_propriedade" value="<?=!empty($animal) ? $animal->codigo_pro : 0?>" name="codigo_propriedade">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="select_proprietarios">Proprietário</label>
                      <select class="form-control" id="select_proprietarios" name="select_proprietarios">
                        <option value="0" selected>Selecione o Proprietário</option>
                        <?php foreach ($proprietarios as $prop) { ?>
                          <option value="<?= $prop->codigo_prop ?>" <?=!empty($animal) && $animal->codigo_prop == $prop->codigo_prop ? 'selected' : ''?>><?= $prop->nome_prop ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="select_propriedade">Selecione a Propriedade</label>
                      <select class="form-control" id="select_propriedade" name="select_propriedade" disabled>
                        <option value="0" selected>Selecione o proprietário primeiro</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#modal-cadastro-propriedade">
                        <i class="fa-solid fa-plus" data-toggle="tooltip" data-placement="top" title='Cadastre aqui uma propriedade.'></i>
                      </button>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="cidade_ani">Cidade</label>
                      <input type="text" class="form-control" id="cidade_ani" name="cidade_ani" placeholder="Cidade" readonly>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="estado_ani">Estado</label>
                      <input type="text" class="form-control" id="estado_ani" name="estado_ani" placeholder="Estado" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="nome_ani">Nome do Animal</label>
                      <input type="text" class="form-control" id="nome_ani" name="nome_ani" placeholder="Nome do Animal" value="<?=!empty($animal) ? $animal->nome_ani : ''?>">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="registro_ani">Registro / Nº / Marca</label>
                      <input type="text" class="form-control" id="registro_ani" name="registro_ani" placeholder="Registro" value="<?=!empty($animal) ? $animal->registro_ani : ''?>">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="especie_ani">Espécie</label>
                      <input type="text" class="form-control" id="especie_ani" name="especie_ani" placeholder="Espécie" value="<?=!empty($animal) ? $animal->especie_ani : ''?>">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="raca_ani">Raça</label>
                      <input type="text" class="form-control" id="raca_ani" name="raca_ani" placeholder="Raça" value="<?=!empty($animal) ? $animal->raca_ani : ''?>">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="select_classificacao">Classificação</label>
                      <select class="form-control" id="select_classificacao" name="select_classificacao">
                        <option value="0" selected>Selecione a Classificação</option>
                        <option value="1" <?=!empty($animal) && $animal->classificacao_ani == 1 ? 'selected' : ''?>>JC (Jockey Club)</option>
                        <option value="2" <?=!empty($animal) && $animal->classificacao_ani == 2 ? 'selected' : ''?>>SH</option>
                        <option value="3" <?=!empty($animal) && $animal->classificacao_ani == 3 ? 'selected' : ''?>>H</option>
                        <option value="4" <?=!empty($animal) && $animal->classificacao_ani == 4 ? 'selected' : ''?>>FC</option>
                        <option value="5" <?=!empty($animal) && $animal->classificacao_ani == 5 ? 'selected' : ''?>>UM</option>
                        <option value="6" <?=!empty($animal) && $animal->classificacao_ani == 6 ? 'selected' : ''?>>Outro</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="pelagem_ani">Pelagem</label>
                      <input type="text" class="form-control" id="pelagem_ani" name="pelagem_ani" placeholder="Pelagem" value="<?=!empty($animal) ? $animal->pelagem_ani : ''?>">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="estgestacional_ani">Estado Gestacional</label>
                      <select class="form-control" id="estgestacional_ani" name="estgestacional_ani">
                        <option value="1" value="<?=!empty($animal) && $animal->estgestacional_ani == 1 ? 'selected' : ''?>">NÃO</option>
                        <option value="2" value="<?=!empty($animal) && $animal->estgestacional_ani == 2 ? 'selected' : ''?>">SIM</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <label for="sexo_ani">Sexo</label>
                      <select class="form-control" id="sexo_ani" name="sexo_ani">
                        <option value="M" selected>M</option>
                        <option value="F">F</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="idade_ani">Idade</label>
                      <input type="text" class="form-control" id="idade_ani" name="idade_ani" placeholder="Idade"  value="<?=!empty($animal) ? $animal->idade_ani : ''?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group" id="divOutraClassificacao" style="display: none;">
                      <label for="outraclassificacao_ani">Outro</label>
                      <input type="text" class="form-control" id="outraclassificacao_ani" name="outraclassificacao_ani" placeholder="Descreva a outra classificação"  value="<?=!empty($animal) ? $animal->outraclassificacao_ani : ''?>">
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Resenha</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-10" id="divDesenho">
                  <input type="hidden" id="imagem_resenha" value="<?=!empty($animal) ? $animal->resenha_ani : ''?>">
                  <canvas id="resenha" width="1080" height="550" style="border:1px solid;"></canvas>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="comentarios_exa">Comentários</label>
                    <textarea class="form-control" id="comentarios_exa" name="comentarios_exa" placeholder="Observações" maxlength="400"></textarea>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary" id="btn-salvar-exame">Salvar</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>