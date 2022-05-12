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
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dados da Propriedade</h3>
              </div>
              <form id="formCadastroPropriedade" novalidate="novalidate" enctype="multipart/form-data">
                <input type="hidden" id="codigo_pro" name="codigo_pro" value="0">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
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
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="nome_pro">Nome da Propriedade</label>
                        <input type="text" class="form-control" id="nome_pro" name="nome_pro" placeholder="Nome da Propriedade">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="qtdequinos_pro">Quantidade de Equinos</label>
                        <input type="tel" class="form-control" id="qtdequinos_pro" name="qtdequinos_pro" placeholder="Quantidade de Equinos">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="cep_pro">CEP da Propriedade (Se Existir)</label>
                        <input type="text" class="form-control" id="cep_pro" name="cep_pro" placeholder="CEP da Propriedade">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="logradouro_pro">Logradouro</label>
                        <input type="text" class="form-control" id="logradouro_pro" name="logradouro_pro" placeholder="Logradouro da Propriedade"  data-toggle="tooltip" data-placement="top" title='Dica: Se localizado em rodovia, colocar nome da rodovia e qual KM se localiza, por exemplo: "Rod. Julio Budisk, KM 34"'>
                      </div>
                    </div>
                    <div class="col-md-1">
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
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="latitude_pro">Latitude</label>
                        <input type="text" class="form-control" id="latitude_pro" name="latitude_pro" placeholder="Latitude">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="longitude_pro">Longitude</label>
                        <input type="text" class="form-control" id="longitude_pro" name="longitude_pro" placeholder="Longitude">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="observacao_pro">Observações</label>
                        <textarea class="form-control" name="observacao_pro" placeholder="Observações sobre a propriedade" rows="6" maxlength="1000"></textarea>
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
    </section>
  </div>