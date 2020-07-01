<div class="modal fade" id="montarLinhaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Montar linha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   add linha  ============================= -->
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <i class="material-icons">emoji_transportation</i>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- ===================   form  ============================= -->
                        <form id="form_add_linha_montagem">

                        <?php
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );
                            ?>
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Carro</label>
                                    <select name="select_carro_montagem" id="select_carro_montagem" class="form-control"></select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Linha</label>
                                    <select name="select_linhas_montagem" id="select_linhas_montagem" class="form-control"> </select>
                                </div>
                            </div>

                            <input type="hidden" name="meu_user" id="meu_user" value="<?php echo $this->session->userdata('user')['id']?>">

                            <button type="submit" class="bt_add_linha_montagem btn btn-primary" id="addlinhaMontagem">
                                <span class="material-icons"> save </span>&nbsp;Salvar
                            </button>
                        </form>
                        <br>
                        <div class="alert alert-danger print-error-msgAddLinhaCarro" style="display:none"></div>
                        <!-- ===================   fim form  ============================= -->

                    </div>
                </div>
                <!-- ===================   add linha  ============================= -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>