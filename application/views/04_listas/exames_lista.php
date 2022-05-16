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
        <?php if ($this->session->userdata('usuario')['tipo_user'] == 1) { ?>
          <div class="row">
            <div class="ml-auto mb-3">
              <a href="<?= base_url('exame/cadastrar_exame') ?>" class="btn btn-info"><i class="fa-solid fa-plus mr-2"></i>Adicionar</a>
            </div>
          </div>
        <?php } ?>
        <div class="row">
          <div class="col-md-12">
            <table id="tabela-exames" style="width: 100%">
              <thead>
                <th>#</th>
                <th>Número do Exame</th>
                <th>Veterinário</th>
                <th>Proprietário</th>
                <th>Nome do Animal</th>
                <th>Registro do Animal</th>
                <th>Status</th>
                <th>Ações</th>
                <th>Data Inicio Exame</th>
                <th>Data Fim Exame</th>
              </thead>
              <tbody>

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


<!-- MODAL DETALHES DO EXAME -->
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
</div>
<!-- /.modal -->



<!-- MODAL FINALIZA O EXAME -->
<div class="modal fade" id="modal-finaliza-exame">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title">Finalizar Exame</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formModalFinalizarExame" novalidate="novalidate" enctype="multipart/form-data">
          <input type="hidden" id="codigo_exa_finaliza" name="codigo_exa" value="0">
          <input type="hidden" id="tipo_exame" name="tipo_exame" value="0">
          <div class="card-body">
            <div class="accordion" id="accordionProprietario">
              <div class="row">
                <div class="col-md-12">
                  <h5 class="collapsed" data-toggle="collapse" data-target="#collapseProprietario" aria-expanded="false" aria-controls="collapseProprietario">PROPRIETÁRIO</h5>
                </div>
              </div>
              <div id="collapseProprietario" class="collapse" aria-labelledby="headingOne" data-parent="#accordionProprietario">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="nome_proprietario">Nome do Proprietário:</label>
                      <input type="text" class="form-control" id="nome_proprietario" name="nome_proprietario" placeholder="Tipo do Exame" disabled>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="documento_proprietario">CPF/CNPJ:</label>
                      <input type="text" class="form-control" id="documento_proprietario" name="documento_proprietario" placeholder="Tipo do Exame" disabled>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="endereco_proprietario">Endereço:</label>
                      <input type="text" class="form-control" id="endereco_proprietario" name="endereco_proprietario" placeholder="Tipo do Exame" disabled>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="cidadeuf_proprietario">Cidade / UF:</label>
                      <input type="text" class="form-control" id="cidadeuf_proprietario" name="cidadeuf_proprietario" placeholder="Tipo do Exame" disabled>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="telefone_proprietario">Telefone:</label>
                      <input type="text" class="form-control" id="telefone_proprietario" name="telefone_proprietario" placeholder="Tipo do Exame" disabled>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion" id="accordionVeterinario">
              <div class="row">
                <div class="col-md-12">
                  <hr>
                  <h5 class="collapsed" data-toggle="collapse" data-target="#collapseVeterinario" aria-expanded="false" aria-controls="collapseVeterinario">VETERINÁRIO REQUISITANTE</h5>
                </div>
              </div>
              <div id="collapseVeterinario" class="collapse" aria-labelledby="headingOne" data-parent="#accordionVeterinario">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="nome_veterinario">Nome do Veterinário:</label>
                      <input type="text" class="form-control" id="nome_veterinario" name="nome_veterinario" placeholder="Tipo do Exame" disabled>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="documento_vet">CPF/CNPJ:</label>
                      <input type="text" class="form-control" id="documento_vet" name="documento_vet" placeholder="Tipo do Exame" disabled>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="crmv_vet">CRMV Nº/UF:</label>
                      <input type="text" class="form-control" id="crmv_vet" name="crmv_vet" placeholder="Tipo do Exame" disabled>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="portariacredenciamento_vet">Portaria de Habilitação:</label>
                      <input type="text" class="form-control" id="portariacredenciamento_vet" name="portariacredenciamento_vet" placeholder="Tipo do Exame" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="email_veterinario">E-Mail:</label>
                      <input type="text" class="form-control" id="email_veterinario" name="email_veterinario" placeholder="Tipo do Exame" disabled>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="endereco_veterinario">Endereço:</label>
                      <input type="text" class="form-control" id="endereco_veterinario" name="endereco_veterinario" placeholder="Tipo do Exame" disabled>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="cidadeuf_veterinario">Cidade / UF:</label>
                      <input type="text" class="form-control" id="cidadeuf_veterinario" name="cidadeuf_veterinario" placeholder="Tipo do Exame" disabled>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="telefone_veterinario">Telefone:</label>
                      <input type="text" class="form-control" id="telefone_veterinario" name="telefone_veterinario" placeholder="Tipo do Exame" disabled>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion" id="accordionAnimal">
              <div class="row">
                <div class="col-md-12">
                  <hr>
                  <h5 class="collapsed" data-toggle="collapse" data-target="#collapseAnimal" aria-expanded="false" aria-controls="collapseAnimal">ANIMAL</h5>
                </div>
              </div>
              <div id="collapseAnimal" class="collapse" aria-labelledby="headingOne" data-parent="#accordionAnimal">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="nome_animal">Nome:</label>
                      <input type="text" class="form-control" id="nome_animal" name="nome_animal" placeholder="Tipo do Exame" disabled>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="especie_animal">Espécie:</label>
                      <input type="text" class="form-control" id="especie_animal" name="especie_animal" placeholder="Tipo do Exame" disabled>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="raca_animal">Raça</label>
                      <input type="text" class="form-control" id="raca_animal" name="raca_animal" placeholder="Tipo do Exame" disabled>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="pelagem_animal">Pelagem:</label>
                      <input type="text" class="form-control" id="pelagem_animal" name="pelagem_animal" placeholder="Tipo do Exame" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="sexo_animal">Sexo:</label>
                      <input type="text" class="form-control" id="sexo_animal" name="sexo_animal" placeholder="Tipo do Exame" disabled>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="estadogestacional_animal">Estado Gestacional:</label>
                      <input type="text" class="form-control" id="estadogestacional_animal" name="estadogestacional_animal" placeholder="Tipo do Exame" disabled>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="idade_animal">Idade:</label>
                      <input type="text" class="form-control" id="idade_animal" name="idade_animal" placeholder="Tipo do Exame" disabled>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="registro_animal">Registro / Nº / Marca:</label>
                      <input type="text" class="form-control" id="registro_animal" name="registro_animal" placeholder="Tipo do Exame" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="nome_propriedade">Nome da Propriedade:</label>
                      <input type="text" class="form-control" id="nome_propriedade" name="nome_propriedade" placeholder="Nome da Propriedade" disabled>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="logradouro_propriedade">Logradouro:</label>
                      <input type="text" class="form-control" id="logradouro_propriedade" name="logradouro_propriedade" placeholder="Logradouro" disabled>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="bairro_propriedade">Bairro:</label>
                      <input type="text" class="form-control" id="bairro_propriedade" name="bairro_propriedade" placeholder="Bairro" disabled>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="cidadeuf_propriedade">Cidade / Estado:</label>
                      <input type="text" class="form-control" id="cidadeuf_propriedade" name="cidadeuf_propriedade" placeholder="Cidade / Estado" disabled>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <hr>
                <h5>AMOSTRA</h5>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="tipoexame_exa">Tipo do Exame:</label>
                  <input type="text" class="form-control" id="tipoexame_exa" name="tipoexame_exa" placeholder="Tipo do Exame" disabled>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="matriz_res">Matriz</label>
                  <input type="text" class="form-control" id="matriz_res" name="matriz_res" placeholder="Matriz">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label for="numlacre_res">Nº Lacre</label>
                  <input type="text" class="form-control" id="numlacre_res" name="numlacre_res" placeholder="Número do Lacre">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="datacoleta_exa">Data da Coleta</label>
                  <input type="date" class="form-control" id="datacoleta_exa" name="datacoleta_exa" placeholder="Data da Coleta">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="datarecepcao_exa">Data da Recepção do Laboratório</label>
                  <input type="date" class="form-control" id="datarecepcao_exa" name="datarecepcao_exa" placeholder="Data da Recepção">
                </div>
              </div>
            </div>
            <!-- DADOS MORMO -->
            <div class="row divMORMO">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="datainicial_mormo">Data Inicial</label>
                  <input type="date" class="form-control" id="datainicial_mormo" name="datainicial_mormo" placeholder="DD/MM/YYYY">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="datafinal_mormo">Data Final</label>
                  <input type="date" class="form-control" id="datafinal_mormo" name="datafinal_mormo" placeholder="DD/MM/YYYY">
                </div>
              </div>
            </div>
            <div class="row divAIE">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="datainicial_aie">Data Inicial</label>
                  <input type="date" class="form-control" id="datainicial_aie" name="datainicial_aie" placeholder="DD/MM/YYYY">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="datafinal_aie">Data Final</label>
                  <input type="date" class="form-control" id="datafinal_aie" name="datafinal_aie" placeholder="DD/MM/YYYY">
                </div>
              </div>
            </div>
            <div class="row divMORMO">
              <div class="col-md-12">
                <hr>
                <h5>KIT ELISA MORMO</h5>
              </div>
            </div>
            <div class="row divMORMO">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="nomecomercial_mormo">Nome Comercial: </label>
                  <input type="text" class="form-control" id="nomecomercial_mormo" name="nomecomercial_mormo" placeholder="Nome Comercial">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="fabricante_mormo">Fabricante: </label>
                  <input type="text" class="form-control" id="fabricante_mormo" name="fabricante_mormo" placeholder="Fabricante">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="partidalote_mormo">Partida/Lote: </label>
                  <input type="text" class="form-control" id="partidalote_mormo" name="partidalote_mormo" placeholder="Partida/Lote">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="kitvalidade_mormo">Validade: </label>
                  <input type="date" class="form-control" id="kitvalidade_mormo" name="kitvalidade_mormo" placeholder="DD/MM/YYYY">
                </div>
              </div>
            </div>
            <div class="row divAIE" style="display: none;">
              <div class="col-md-12">
                <hr>
                <h5>KIT IDGA AIE</h5>
              </div>
            </div>
            <div class="row divAIE" style="display: none;">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="nomecomercial_aie">Nome Comercial: </label>
                  <input type="text" class="form-control" id="nomecomercial_aie" name="nomecomercial_aie" placeholder="Nome Comercial">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="fabricante_aie">Fabricante: </label>
                  <input type="text" class="form-control" id="fabricante_aie" name="fabricante_aie" placeholder="Fabricante">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="partidalote_aie">Partida/Lote: </label>
                  <input type="text" class="form-control" id="partidalote_aie" name="partidalote_aie" placeholder="Partida/Lote">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="kitvalidade_aie">Validade: </label>
                  <input type="date" class="form-control" id="kitvalidade_aie" name="kitvalidade_aie" placeholder="DD/MM/YYYY">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <hr>
                <h5>RESULTADO</h5>
              </div>
            </div>
            <div class="row divMORMO">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="tipoexame_exa_resultado_mormo">Exame: </label>
                  <input type="text" class="form-control" id="tipoexame_exa_resultado_mormo" name="tipoexame_exa_resultado_mormo" placeholder="Exame">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="resultado_mormo">Resultado: </label>
                  <select name="resultado_mormo" class="form-control" id="resultado_mormo">
                    <option value="0" selected>Selecione o Resultado</option>
                    <option value="1">Negativo</option>
                    <option value="2">Positivo</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="datavalidade_mormo">Validade do Exame: </label>
                  <input type="date" class="form-control" id="datavalidade_mormo" name="datavalidade_mormo" placeholder="DD/MM/YYYY">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="observacao">Observação: </label>
                  <input type="text" class="form-control" id="observacao" name="observacao" placeholder="Observacao">
                </div>
              </div>
            </div>
            <div class="row divAIE" style="display: none;">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="tipoexame_exa_resultado_aie">Exame: </label>
                  <input type="text" class="form-control" id="tipoexame_exa_resultado_aie" name="tipoexame_exa_resultado_aie" placeholder="Exame">
                </div>
              </div>
              <div class="col-md-3 divAIE">
                <div class="form-group">
                  <label for="resultado_aie">Resultado: </label>
                  <select name="resultado_aie" class="form-control" id="resultado_aie">
                    <option value="0" selected>Selecione o Resultado</option>
                    <option value="1">Negativo</option>
                    <option value="2">Positivo</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="datavalidade_aie">Validade do Exame: </label>
                  <input type="date" class="form-control" id="datavalidade_aie" name="datavalidade_aie" placeholder="DD/MM/YYYY">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="observacao_res">Observação: </label>
                  <input type="text" class="form-control" id="observacao_res" name="observacao_res" placeholder="Observacao">
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
</div>
</div>

<!-- /.modal -->