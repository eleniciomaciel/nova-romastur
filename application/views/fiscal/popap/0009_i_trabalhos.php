<!-- registro saídas -->
<div class="modal fade" id="registroChegadasModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><span class="material-icons"> commute </span> Registrar chegada</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- ===================   card chegada  ============================= -->
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title">Registro</h4>
                        <p class="card-category">Registro de atividades fiscal</p>
                    </div>
                    <div class="card-body">
                        <form id="form_registro_chegada_carro">
                            <?php
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );
                            ?>
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="bmd-label-floating">Tipo do registro:</label>
                                    <div class="form-group bmd-form-group">
                                        <input type="text" class="form-control" id="ln_tbl_chegada" disabled="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="bmd-label-floating">Linha:</label>
                                    <div class="form-group bmd-form-group">
                                        <input type="text" class="form-control" id="ln_tbl_linhas" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="bmd-label-floating"><span class="material-icons"> directions_bus </span> Carro:</label>
                                    <div class="form-group bmd-form-group">
                                        <select class="form-control" name="ln_tbl_carros" id="ln_tbl_carros"></select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="bmd-label-floating"><span class="material-icons"> build </span> Ocorrência:</label>
                                    <div class="form-group bmd-form-group">
                                        <select class="form-control" name="ln_tbl_ocorrencias" id="ln_tbl_ocorrencias"></select>
                                    </div>
                                </div>

                            </div>
                            <input type="hidden" name="ln_tbl_linhas_id" id="ln_tbl_linhas_id">
                            <input type="hidden" name="ln_tbl_chegada_tipo" id="ln_tbl_chegada_tipo">
                            <input type="hidden" name="ln_tbl_chegada_id" id="ln_tbl_chegada_id">
                            <input type="hidden" name="user_fiscal_id" id="user_fiscal_id" value="<?php echo $this->session->userdata('user')['id']; ?>">

                            <button type="submit" class="bt_add_registro_chegada btn btn-info pull-right" id="addRegistroChega">
                                <span class="material-icons"> done_outline </span> registrar
                            </button>
                            <div class="clearfix"></div>
                        </form>
                        <br>
                        <div class="alert alert-danger print-error-msgAddrEGIST_chegada" style="display:none"></div>
                    </div>
                </div>
                <!-- ===================   card chegada  ============================= -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>



<!-- ===================   registrar saidas  ============================= -->
<!-- registro saídas -->
<div class="modal fade" id="registroSaidasModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><span class="material-icons"> commute </span> Registrar saída</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- ===================   card chegada  ============================= -->
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title">Registro</h4>
                        <p class="card-category">Registro de atividades fiscal</p>
                    </div>
                    <div class="card-body">
                        <form id="form_registra_saidas_do_carro">
                            <?php
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );
                            ?>
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="bmd-label-floating">Tipo do registro:</label>
                                    <div class="form-group bmd-form-group">
                                        <input type="text" class="form-control" value="Chegada" disabled="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="bmd-label-floating">Linha:</label>
                                    <div class="form-group bmd-form-group">
                                        <input type="text" class="form-control" id="ln_tbl_sai_linhas" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="bmd-label-floating"><span class="material-icons"> directions_bus </span> Carro:</label>
                                    <div class="form-group bmd-form-group">
                                        <select class="form-control" name="ln_tbl_sai_carros" id="ln_tbl_sai_carros"></select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="bmd-label-floating"><span class="material-icons"> build </span> Ocorrência:</label>
                                    <div class="form-group bmd-form-group">
                                        <select class="form-control" name="ln_tbl_ocorrencias" id="ln_tbl_ocorrencias"></select>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="ln_tbl_linhas_sai_id" id="ln_tbl_linhas_sai_id">

                            <button type="submit" class="bt_register_saida_car btn btn-warning pull-right" id="regist_saida_carro">
                                <span class="material-icons"> done_outline </span> registrar
                            </button>
                            <div class="clearfix"></div>
                        </form>
                        <br>
                        <div class="alert alert-danger print-error-msgAddrEGIST_saida_car" style="display:none"></div>
                    </div>
                </div>
                <!-- ===================   card chegada  ============================= -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- ===================   acompnhamentos usuarios linha  ============================= -->

<div class="modal fade" id="acompanhamentoVerModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Visualização da atividade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   card  ============================= -->
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Atividade</h4>
                        <p class="card-category">Registro de atividades da linha</p>
                    </div>
                    <div class="card-body">
                        <form id="form_altera_atividades_linha">
                        <?php
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );
                            ?>
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                            <div class="row">
                                <div class="col-md-5">
                                    <label class="bmd-label-floating">Linha:</label>
                                    <div class="form-group bmd-form-group">
                                        <input type="text" class="form-control" disabled="" id="acomp_linha">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="bmd-label-floating">Carro:</label>
                                    <div class="form-group bmd-form-group">
                                        <input type="text" class="form-control" id="acomp_carro" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="bmd-label-floating">Ocorrência:</label>
                                    <div class="form-group bmd-form-group">
                                        <input type="email" class="form-control" id="acomp_ocore" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="bmd-label-floating"><span class="material-icons"> access_time </span> Hora de chegada:</label>
                                    <div class="form-group bmd-form-group">
                                        <input type="time" class="form-control" name="acomp_h_cheg" id="acomp_h_cheg">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="bmd-label-floating"><span class="material-icons"> access_time </span> Hora de saída:</label>
                                    <div class="form-group bmd-form-group">
                                        <input type="time" class="form-control" name="acomp_h_saida" id="acomp_h_saida">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="id_tbl_acomp" id="id_tbl_acomp">
                            <button type="submit" class="bt_register_altera_hours btn btn-primary pull-right" id="regist_altera_hours">
                                <span class="material-icons"> save </span> alterar
                            </button>
                            <div class="clearfix"></div>
                        </form>
                        <br>
                        <div class="alert alert-danger print-error-msgAltera_hours" style="display:none"></div>
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