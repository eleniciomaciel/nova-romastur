<div class="modal fade" id="ocorrenciasModalLista" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ocorrências cadastradas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- ===================   table  ============================= -->
        <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#addOcorrencias">
          <i class="material-icons">add</i> Criar
        </button>

        <div class="table-responsive">
        <table class="table table-striped table-dark" id="ocorrencias_get_all" style="width: 100%;">
          <thead>
            <tr>
              <th scope="col">Nome da ocorrência</th>
              <th scope="col">Opções</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
        </div>

        <!-- ===================   fim table  ============================= -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>



<!-- Adiciona ocorrencias  -->

<div class="modal fade" id="addOcorrencias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Criar ocorrências</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- ===================   card  ============================= -->
        <div class="card">
          <div class="card-header card-header-icon card-header-rose">
            <div class="card-icon">
              <i class="material-icons">build</i>
            </div>
          </div>
          <div class="card-body">

            <form id="form_add_ocorencias">
            <?php
              $csrf = array(
                  'name' => $this->security->get_csrf_token_name(),
                  'hash' => $this->security->get_csrf_hash()
              );
            ?>
            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-pencil"></i>
                  </span>
                </div>
                <input type="text" class="form-control"  name="add_correncia_input" id="add_correncia_input" placeholder="Ex.: Danificado">
              </div>

              <button class="bt_add_ocorrencia btn btn-rose btn-round" id="addOcorrencia">
                <i class="material-icons">save</i> Salvar
              </button>

            </form>
            <br>
            <div class="alert alert-danger print-error-msgAddOcorrencias" style="display:none"></div>
          </div>
        </div>
        <!-- ===================   card  ============================= -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>


<!-- visualizar ocorrencias  -->

<div class="modal fade" id="verOcorrenciasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Visualizar ocorrências</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- ===================   card  ============================= -->
        <div class="card">
          <div class="card-header card-header-icon card-header-success">
            <div class="card-icon">
              <i class="material-icons">build</i>
            </div>
          </div>
          <div class="card-body">

            <form id="form_altera_ocorencias">
            <?php
              $csrf = array(
                  'name' => $this->security->get_csrf_token_name(),
                  'hash' => $this->security->get_csrf_hash()
              );
            ?>
            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-pencil"></i>
                  </span>
                </div>
                <input type="text" class="form-control"  name="dados_correncia" id="dados_correncia" placeholder="Ex.: Danificado" required>
              </div>

              <input type="hidden" name="id_oc_vw" id="id_oc_vw">
              
              <button class="bt_altera_ocorrencia btn btn-success btn-round" id="aalterarOcorrencia">
                <i class="material-icons">save</i> Alterar
              </button>

            </form>
            <br>
            <div class="alert alert-danger print-error-msgAlteraOcorrencias" style="display:none"></div>
          </div>
        </div>
        <!-- ===================   card  ============================= -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>