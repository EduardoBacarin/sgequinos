<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Usuário</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Usuário</a></li>
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
              <h3 class="card-title">Dados do Usuário</h3>
            </div>
            <form id="formAlterarUsuario" novalidate="novalidate" enctype="multipart/form-data">
              <input type="hidden" id="codigo_usu" name="codigo_usu" value="0">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="nome">Nome</label>
                      <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?=$nome?>">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="documento">Documento</label>
                      <input type="text" class="form-control cpfcnpj" id="documento" name="documento" placeholder="Documento" value="<?=$documento?>">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="telefone">Telefone</label>
                      <input type="text" class="form-control celular" id="telefone" name="telefone" placeholder="Telefone" value="<?=$telefone?>" maxlength="15">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="email">E-Mail</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?=$email?>" maxlength="50" data-toggle="tooltip" data-placement="top" title="Este e-mail é o seu login, alterar ele vai alterar o seu acesso.">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="senha">Senha</label>
                      <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" maxlength="20" data-toggle="tooltip" data-placement="top" title="Deixe em branco para não alterar a senha">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="cep">CEP</label>
                      <input type="text" class="form-control cep" id="cep" name="cep" placeholder="CEP" value="<?=$cep?>" maxlength="9">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="logradouro">Logradouro</label>
                      <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Logradouro" value="<?=$logradouro?>" maxlength="140">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="numero">Número</label>
                      <input type="tel" class="form-control" id="numero" name="numero" placeholder="Número" value="<?=$numero?>" max="99999">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="bairro">Bairro</label>
                      <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" value="<?=$bairro?>" maxlength="50">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="Cidade">Cidade</label>
                      <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" value="<?=$cidade?>" maxlength="50">
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                      <label for="Estado">Estado</label>
                      <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" value="<?=$estadouf?>" maxlength="2">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <img src="<?= base_url('assets/imagens/avatar.png') ?>" class="rounded-circle mx-auto d-block" alt="Avatar" style="width: 15%;">
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