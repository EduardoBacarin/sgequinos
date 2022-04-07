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
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dados do Proprietário</h3>
              </div>
              <form id="formCadastroProprietario" novalidate="novalidate" enctype="multipart/form-data">
                <input type="hidden" id="codigo_prop" name="codigo_prop" value="0">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="nome_prop">Nome Completo</label>
                        <input type="text" class="form-control" id="nome_prop" name="nome_prop" placeholder="Nome Completo do Proprietário">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="datanascimento_prop">Data de Nascimento</label>
                        <input type="date" class="form-control" id="datanascimento_prop" name="datanascimento_prop" placeholder="Data de Nascimento">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="email_prop">E-Mail</label>
                        <input type="text" class="form-control" id="email_prop" name="email_prop" placeholder="E-Mail">
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="telefone_prop">Telefone</label>
                        <input type="text" class="form-control" id="telefone_prop" name="telefone_prop" placeholder="Telefone do Proprietário">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="documento_prop">CPF/CNPJ</label>
                        <input type="text" class="form-control" id="documento_prop" name="documento_prop" placeholder="CPF ou CNPJ">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="cep_prop">CEP</label>
                        <input type="text" class="form-control" id="cep_prop" name="cep_prop" placeholder="CEP do Proprietário">
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="endereco_prop">Endereço</label>
                        <input type="text" class="form-control" id="endereco_prop" name="endereco_prop" placeholder="Endereço do Proprietário">
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                        <label for="numero_prop">Número</label>
                        <input type="tel" class="form-control" id="numero_prop" name="numero_prop" placeholder="Número do Proprietário">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="numero_prop">Bairro</label>
                        <input type="text" class="form-control" id="bairro_prop" name="bairro_prop" placeholder="Bairro do Proprietário">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="cidade_prop">Cidade</label>
                        <input type="text" class="form-control" id="cidade_prop" name="cidade_prop" placeholder="Cidade do Proprietário">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label for="estadouf_prop">Estado(UF)</label>
                        <input type="text" class="form-control" id="estadouf_prop" name="estadouf_prop" placeholder="Estado (UF) do Proprietário">
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