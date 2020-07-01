<div class="modal fade" id="relatoriosModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Consulta atividades</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- ===================   relatorio  ============================= -->
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Consultar</h4>
            <p class="card-category">Consulta de relatorios de atividades fiscal</p>
          </div>
          <div class="card-body">
            
            <?php echo form_open('consulta-relatorios', array('target'=>'_blank'));?>
              <div class="row">

                <div class="col-md-12">
                  <label for="user_fiscal_cosult">Fiscal:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">account_circle</i>
                      </span>
                    </div>
                    <select class="form-control" name="id_uss_relat" id="id_uss_relat" required>
                      <?php
                        $query = $this->db->get_where('usuarios', array('user_nivel' => 'fiscal'));
                        foreach ($query->result() as $row)
                        {
                          ?>
                            <option value="<?php echo $row->id; ?>"><?php echo $row->user_nome; ?></option>
                          <?php
                        }
                      ?>
                    </select>
                  </div>

                </div>

                <div class="col-md-8">
                  <label for="linha_consulta">Linha de consulta:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">airport_shuttle</i>
                      </span>
                    </div>
                    <select name="select_linhas_reatorios_get_all" id="select_linhas_reatorios_get_all" class="form-control" required></select>
                  </div>
                </div>

                <div class="col-md-4">
                  <label for="nome_data">Data de consulta</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">event_note</i>
                      </span>
                    </div>
                    <input type="date" class="form-control" name="data_consulta" max="<?php echo date("Y-m-d");?>" required>
                  </div>
                </div>

              </div>
              <button type="submit" class="btn btn-primary pull-right"><i class="material-icons">cached</i>&nbsp;Consultar</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
        <!-- ===================   relatorio  ============================= -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>