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
            <li class="breadcrumb-item">Cadastrar Exames</a></li>
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
              <h3 class="card-title">Número do Exame</h3>
            </div>
            <form id="formCadastroExame" novalidate="novalidate" enctype="multipart/form-data">
              <input type="hidden" id="codigo_exame" value="0">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="numeroexame_exa">Número do Exame</label>
                      <input type="text" class="form-control" id="numeroexame_exa" name="numeroexame_exa" placeholder="Número do Exame">
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
              <h3 class="card-title">Dados do Laboratório</h3>
            </div>
            <input type="hidden" id="codigo_exa" name="codigo_exa" value="0">
            <input type="hidden" id="codigo_lab" name="codigo_lab" value="0">
            <input type="hidden" id="codigo_prop" name="codigo_prop" value="0">
            <input type="hidden" id="codigo_propriedade" name="codigo_propriedade" value="0">
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="select_laboratorio">Laboratório</label>
                    <select class="form-control" id="select_laboratorio" name="select_laboratorio">
                      <option value="0" selected>Selecione o Laboratório</option>
                      <?php foreach ($laboratorios as $lab) { ?>
                        <option value="<?= $lab->codigo_lab ?>"><?= $lab->nome_lab ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="nome_lab">Nome do Laboratório</label>
                    <input type="text" class="form-control" id="nome_lab" name="nome_lab" placeholder="Nome do Laboratório" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="portariacredenciamento_lab">Portaria de Credenciamento</label>
                    <input type="text" class="form-control" id="portariacredenciamento_lab" name="portariacredenciamento_lab" placeholder="Portaria de Credenciamento" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="email_lab">E-Mail</label>
                    <input type="text" class="form-control" id="email_lab" name="email_lab" placeholder="E-Mail" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="cep_lab">CEP</label>
                    <input type="text" class="form-control" id="cep_lab" name="cep_lab" placeholder="CEP" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="rua_lab">Endereço</label>
                    <input type="text" class="form-control" id="rua_lab" name="rua_lab" placeholder="Endereço" readonly>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-group">
                    <label for="numero_lab">Número</label>
                    <input type="tel" class="form-control" id="numero_lab" name="numero_lab" placeholder="Número" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="bairro_lab">Bairro</label>
                    <input type="text" class="form-control" id="bairro_lab" name="bairro_lab" placeholder="Bairro" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="cidade_lab">Cidade</label>
                    <input type="text" class="form-control" id="cidade_lab" name="cidade_lab" placeholder="Cidade" readonly>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-group">
                    <label for="estadouf_lab">Estado(UF)</label>
                    <input type="text" class="form-control" id="estadouf_lab" name="estadouf_lab" placeholder="Estado (UF)" readonly>
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
              <h3 class="card-title">Dados do Proprietário</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="select_proprietarios">Proprietário</label>
                    <select class="form-control" id="select_proprietarios" name="select_proprietarios">
                      <option value="0" selected>Selecione o Proprietário</option>
                      <?php foreach ($proprietarios as $prop) { ?>
                        <option value="<?= $prop->codigo_prop ?>"><?= $prop->nome_prop ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="nome_prop">Nome Completo</label>
                    <input type="text" class="form-control" id="nome_prop" name="nome_prop" placeholder="Nome do Proprietário" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="documento_prop">Documento</label>
                    <input type="text" class="form-control" id="documento_prop" name="documento_prop" placeholder="Documento" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="email_prop">E-Mail</label>
                    <input type="text" class="form-control" id="email_prop" name="email_prop" placeholder="E-Mail" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="cep_prop">CEP</label>
                    <input type="text" class="form-control" id="cep_prop" name="cep_prop" placeholder="CEP" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="endereco_prop">Endereço</label>
                    <input type="text" class="form-control" id="endereco_prop" name="endereco_prop" placeholder="Endereço" readonly>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-group">
                    <label for="numero_prop">Número</label>
                    <input type="tel" class="form-control" id="numero_prop" name="numero_prop" placeholder="Número" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="bairro_prop">Bairro</label>
                    <input type="text" class="form-control" id="bairro_prop" name="bairro_prop" placeholder="Bairro" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="cidade_prop">Cidade</label>
                    <input type="text" class="form-control" id="cidade_prop" name="cidade_prop" placeholder="Cidade" readonly>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-group">
                    <label for="estadouf_prop">Estado(UF)</label>
                    <input type="text" class="form-control" id="estadouf_prop" name="estadouf_prop" placeholder="Estado (UF)" readonly>
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
              <h3 class="card-title">Dados do Animal</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="select_animal">Selecione o Animal</label>
                    <select class="form-control" id="select_animal" name="select_animal" data-toggle="tooltip" data-placement="top" title='Dica: Se o proprietário não tiver um animal cadastrado, deixe esse campo vazio e complete os dados do animal e ele será cadastrado automaticamente.'>
                      <option value="0" selected>Selecione o proprietário primeiro</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="nome_ani">Nome do Animal</label>
                    <input type="text" class="form-control" id="nome_ani" name="nome_ani" placeholder="Nome do Animal">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="registro_ani">Registro / Nº / Marca</label>
                    <input type="text" class="form-control" id="registro_ani" name="registro_ani" placeholder="Registro">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="especie_ani">Espécie</label>
                    <input type="text" class="form-control" id="especie_ani" name="especie_ani" placeholder="Espécie">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="raca_ani">Raça</label>
                    <input type="text" class="form-control" id="raca_ani" name="raca_ani" placeholder="Raça">
                  </div>
                </div>
              </div>
              <div class="row">
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
                    <input type="text" class="form-control" id="idade_ani" name="idade_ani" placeholder="Idade">
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
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="cidade_ani">Cidade</label>
                    <input type="text" class="form-control" id="cidade_ani" name="cidade_ani" placeholder="Cidade" readonly>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-group">
                    <label for="estado_ani">Estado</label>
                    <input type="text" class="form-control" id="estado_ani" name="estado_ani" placeholder="Estado" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="select_classificacao">Classificação</label>
                    <select class="form-control" id="select_classificacao" name="select_classificacao">
                      <option value="0" selected>Selecione a Classificação</option>
                      <option value="1">JC (Jockey Club)</option>
                      <option value="2">SH</option>
                      <option value="3">H</option>
                      <option value="4">FC</option>
                      <option value="5">UM</option>
                      <option value="6">Outro</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group" id="divOutraClassificacao" style="display: none;">
                    <label for="outraclassificacao_ani">Outro</label>
                    <input type="text" class="form-control" id="outraclassificacao_ani" name="outraclassificacao_ani" placeholder="Descreva a outra classificação">
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
                <button type="submit" class="btn btn-primary">Salvar</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="modal-cadastro-propriedade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title">Cadastro de Propriedade</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formModalCadastroPropriedade" novalidate="novalidate" enctype="multipart/form-data">
          <input type="hidden" id="codigo_pro" name="codigo_pro" value="0">
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="select_proprietarios">Proprietário</label>
                  <select class="form-control" id="select_proprietarios_modal" name="select_proprietarios">
                    <option value="0" selected>Selecione o Proprietário</option>
                    <?php foreach ($proprietarios as $prop) { ?>
                      <option value="<?= $prop->codigo_prop ?>"><?= $prop->nome_prop ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="nome_pro">Nome da Propriedade</label>
                  <input type="text" class="form-control" id="nome_pro" name="nome_pro" placeholder="Nome da Propriedade">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="qtdequinos_pro">Quantidade de Equinos</label>
                  <input type="tel" class="form-control" id="qtdequinos_pro" name="qtdequinos_pro" placeholder="Quantidade de Equinos">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="cep_pro">CEP (Se Existir)</label>
                  <input type="text" class="form-control" id="cep_pro" name="cep_pro" placeholder="CEP da Propriedade">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="logradouro_pro">Logradouro</label>
                  <input type="text" class="form-control" id="logradouro_pro" name="logradouro_pro" placeholder="Logradouro da Propriedade" data-toggle="tooltip" data-placement="top" title='Dica: Se localizado em rodovia, colocar nome da rodovia e qual KM se localiza, por exemplo: "Rod. Julio Budisk, KM 34"'>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label for="numero_pro">Número</label>
                  <input type="text" class="form-control" id="numero_pro" name="numero_pro" placeholder="Número">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label for="cidade_pro">Cidade</label>
                  <input type="text" class="form-control" id="cidade_pro" name="cidade_pro" placeholder="Cidade">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label for="estadouf_pro">Estado(UF)</label>
                  <input type="text" class="form-control" id="estadouf_pro" name="estadouf_pro" placeholder="Estado(UF)">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="observacao_pro">Observações</label>
                  <textarea class="form-control" name="observacao_pro" placeholder="Observações sobre a propriedade" rows="6" maxlength="1000"></textarea>
                </div>
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