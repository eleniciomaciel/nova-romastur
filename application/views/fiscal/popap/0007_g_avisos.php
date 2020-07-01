<div class="modal fade" id="avisosSendModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><span class="material-icons"> record_voice_over </span> Enviar avisos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   relatorio  ============================= -->
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title"><span class="material-icons"> drafts </span> Mensagem</h4>
                        <p class="card-category">Formulário de mensagens</p>
                    </div>
                    <div class="card-body">
                        <form id="form_avisos">

                            <?php
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );
                            ?>
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="">De:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">face</i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="fiscal_nome_users" disabled>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="">Para:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">account_circle</i>
                                            </span>
                                        </div>
                                        <select class="form-control" name="select_users_fiscal" id="select_users_fiscal">
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Assunto:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">email</i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="msg_assunto" id="msg_assunto" maxlength="20" placeholder="Ex.: Me liga." title="Assunto">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><span class="material-icons"> create </span>&nbsp;Mensagem:</label>
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating"> Seu aviso aqui...</label>
                                            <textarea class="form-control" name="msg_mensagem" id="msg_mensagem" maxlength="500" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id_avs" id="id_avs">
                            <button type="submit" class="bt_add_avisos btn btn-primary pull-right" id="addAvisosSend">
                                <i class="material-icons">save</i> Enviar
                            </button>
                            <div class="clearfix"></div>
                        </form>
                        <br>
                        <div class="alert alert-danger print-error-msgAddAvisos" style="display:none"></div>

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


<!-- ===================   lendo a mensagem  ============================= -->
<div class="modal fade" id="lendoMensagemModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><span class="material-icons"> drafts </span> Novas mensagens</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   relatorio  ============================= -->
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title"><span class="material-icons"> drafts </span> Mensagem</h4>
                        <p class="card-category">Mensagens recebidas</p>
                    </div>
                    <div class="card-body">
                        <form id="form_muda_status_da_visibilidade_avisos">

                            <?php
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );
                            ?>
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                            <div class="row">

                                <div class="col-md-12">
                                    <label for="">Mensagem de:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">face</i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="ready_destinatario" disabled>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Assunto:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">email</i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="ready_titulo" id="ready_titulo" maxlength="33" placeholder="Ex.: Me liga." title="Assunto">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><span class="material-icons"> create </span>&nbsp;Mensagem:</label>
                                        <div class="form-group bmd-form-group">
                                            <textarea class="form-control" name="ready_descricao" id="ready_descricao" maxlength="500" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id_ready_msg" id="id_ready_msg">

                            <button type="submit" class="bt_visible btn btn-danger" id="sts_visible">
                                <i class="material-icons">thumb_up</i> Marcar como lido
                            </button>
                            <div class="clearfix"></div>
                        </form>
                        <br>
                        <div class="alert alert-danger print-error-msg_stf_lido" style="display:none"></div>

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