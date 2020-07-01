<div class="modal fade" id="listaCarros" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Frota de ônibus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   tabela frota  ============================= -->
                <button class="btn btn-danger" data-toggle="modal" data-target="#addCarroModal">
                    <i class="fa fa-plus"></i> Add Carro
                </button>
                <div class="table-responsive">
                <table class="table" id="list_gt_all_carros" style="width: 100%;">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">PLACA</th>
                            <th scope="col">NUMERAÇÃO</th>
                            <th scope="col">AÇÃO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <!-- ===================   tabela frota  ============================= -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<!-- ===================   cadastro do carro  ============================= -->

<div class="modal fade" id="addCarroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cadastrar carro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   form  ============================= -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon card-header-primary">
                            <div class="card-icon">
                                <i class="material-icons">directions_bus</i>
                            </div>
                        </div>
                        <div class="card-body">

                            <!-- ===================   cadastro  ============================= -->
                            <form id="form_add_carro">
                            <?php
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );
                            ?>
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                                <label for="">Numeração do carro:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">dvr</i>
                                        </span>
                                    </div>
                                    <input type="text" name="numero_carro" class="form-control" placeholder="Ex.: 1010-0">
                                </div>

                                <label for="">Placa do carro:</label>
                                <div class="input-group">
                                    
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">airport_shuttle</i>
                                        </span>
                                    </div>
                                    <input type="text" name="placa_carro" class="form-control" placeholder="Ex.: BRA-0000">
                                </div>

                                <button class="bt_add_carro btn btn-primary btn-round" id="addCarro">
                                    <i class="material-icons">save</i> Salvar
                                </button>
                            </form>
                            <!-- ===================   cadastro  ============================= -->
                            <br>
                        <div class="alert alert-danger print-error-msgFromAddCarro" style="display:none"></div>
                        </div>
                    </div>
                </div>
                <!-- ===================   form  ============================= -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- ===================   visualiza carro  ============================= -->

<div class="modal fade" id="viewCarroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Dados do carro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   form  ============================= -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon card-header-warning">
                            <div class="card-icon">
                                <i class="material-icons">directions_bus</i>
                            </div>
                        </div>
                        <div class="card-body">

                            <!-- ===================   cadastro  ============================= -->
                            <form id="form_altera_carro">
                            <?php
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );
                            ?>
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                                <label for="">Numeração do carro:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">dvr</i>
                                        </span>
                                    </div>
                                    <input type="text" name="ft_car_numero" id="ft_car_numero" class="form-control" placeholder="Ex.: 1010-0">
                                </div>

                                <label for="">Placa do carro:</label>
                                <div class="input-group">
                                    
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">airport_shuttle</i>
                                        </span>
                                    </div>
                                    <input type="text" name="ft_car_placa" id="ft_car_placa" class="form-control" placeholder="Ex.: BRA-0000">
                                </div>

                                <input type="hidden" name="id_vw_car" id="id_vw_car">
                                <button class="bt_altera_carro btn btn-warning btn-round" id="alteraCarro">
                                    <i class="material-icons">save</i> Alterar
                                </button>
                            </form>
                            <!-- ===================   cadastro  ============================= -->
                            <br>
                        <div class="alert alert-danger print-error-msgFromAlteraCarro" style="display:none"></div>
                        </div>
                    </div>
                </div>
                <!-- ===================   form  ============================= -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>