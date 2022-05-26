<!-- MODAL CADASTRA ANTIGENO -->
<div class="modal fade" id="modal-cadastra-antigeno">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title">Cadastrar Antígeno</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formModalCadastrarAntigeno" novalidate="novalidate" enctype="multipart/form-data">
          <input type="hidden" id="codigo_ant" name="codigo_ant" value="0">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="nome_ant">Nome Comercial: </label>
                  <input type="text" class="form-control" id="nome_ant" name="nome_ant" placeholder="Nome Comercial">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="tipo_ant">Tipo: </label>
                  <select class="form-control" name="tipo_ant" id="tipo_ant">
                    <option value="1" selected>MORMO</option>
                    <option value="2">AIE</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="fabricante_ant">Fabricante: </label>
                  <input type="text" class="form-control" id="fabricante_ant" name="fabricante_ant" placeholder="Fabricante">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="lote_ant">Partida/Lote: </label>
                  <input type="text" class="form-control" id="lote_ant" name="lote_ant" placeholder="Partida/Lote">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="validade_ant">Validade: </label>
                  <input type="date" class="form-control" id="validade_ant" name="validade_ant" placeholder="DD/MM/YYYY">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>