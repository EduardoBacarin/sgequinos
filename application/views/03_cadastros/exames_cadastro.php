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
                    <label for="nome_ani">Nome do Animal</label>
                    <input type="text" class="form-control" id="nome_ani" name="nome_ani" placeholder="Nome do Animal">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="registro_ani">Registro / Nº / Marca</label>
                    <input type="text" class="form-control" id="registro_ani" name="registro_ani" placeholder="Registro">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="especie_ani">Espécie</label>
                    <input type="text" class="form-control" id="especie_ani" name="especie_ani" placeholder="Espécie">
                  </div>
                </div>
                <div class="col-md-3">
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
                    <input type="text" class="form-control" id="sexo_ani" name="sexo_ani" placeholder="Sexo">
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
                    <label for="propriedade_ani">Propriedade</label>
                    <input type="text" class="form-control" id="propriedade_ani" name="propriedade_ani" placeholder="Propriedade">
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="form-group">
                    <label for="cidade_ani">Cidade</label>
                    <input type="text" class="form-control" id="cidade_ani" name="cidade_ani" placeholder="Cidade">
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>