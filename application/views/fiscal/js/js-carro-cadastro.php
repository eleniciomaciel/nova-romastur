<script>
    $(document).ready(function() {
        listaCarros();
        var dataTablecar = $('#list_gt_all_carros').DataTable({
            "language": { //Altera o idioma do DataTable para o português do Brasil
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
            },
            "order": [
                [0, "desc"]
            ],
            "ajax": {
                url: "<?= site_url('lista-carros-cadastrados') ?>",
                type: 'GET'
            },
        });

        $(document).on('submit', '#form_add_carro', function(event) {
            event.preventDefault();

            let str_form_add_carro = $("#form_add_carro").serialize();

            $('#addCarro').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Salvando, aguarde....<span class="sr-only">Loading...</span>').prop("disabled", true);
            $(".bt_add_carro").prop("disabled", true);

            $.ajax({
                url: "<?= site_url('adiciona-carro') ?>",
                type: 'POST',
                dataType: "json",
                data: str_form_add_carro,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msgFromAddCarro").css('display', 'none');
                        swal("OK!", data.success, "success");

                        $('#addCarro').html('<i class="fa fa-save"></i> Salvar');
                        $(".bt_add_carro").prop("disabled", false);
                        dataTablecar.ajax.reload();
                        listaCarros();
                    } else {
                        $(".print-error-msgFromAddCarro").css('display', 'block');
                        $(".print-error-msgFromAddCarro").html(data.error);

                        $('#addCarro').html('<i class="fa fa-save"></i> Salvar');
                        $(".bt_add_carro").prop("disabled", false);
                    }
                }
            });
        });

        /**visualiza carro um */
        $(document).on('click', '.viewCarroOne', function() {
            let id_vw_car = $(this).attr("id");
            $.ajax({
                url: "<?= site_url('visualiza-dados-Carro/') ?>" + id_vw_car,
                method: "GET",
                data: {
                    id_vw_car: id_vw_car
                },
                beforeSend: function() {
                    $(".loader").css('display', 'block');
                },
                complete: function() {
                    $(".loader").css('display', 'none');
                },
                dataType: "json",
                success: function(data) {
                    $('#viewCarroModal').modal('show');
                    $('#ft_car_numero').val(data.ft_car_numero);
                    $('#ft_car_placa').val(data.ft_car_placa);
                    $('#id_vw_car').val(id_vw_car);
                }
            })
        });

        /**altera carro */
        $(document).on('submit', '#form_altera_carro', function(event) {
            event.preventDefault();

            let id_pf = $("input[name='id_vw_car']").val();
            let str_form_altera_carro = $("#form_altera_carro").serialize();

            $('#alteraCarro').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Alterando, aguarde....<span class="sr-only">Loading...</span>').prop("disabled", true);
            $(".bt_altera_carro").prop("disabled", true);

            $.ajax({
                url: "<?= site_url('altera-dados-do-carro/') ?>" + id_pf,
                type: 'POST',
                dataType: "json",
                data: str_form_altera_carro,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msgFromPerfil").css('display', 'none');
                        swal("OK!", data.success, "success");

                        $('#alteraCarro').html('<i class="fa fa-save"></i> Alterar');
                        $(".bt_altera_carro").prop("disabled", false);
                        dataTablecar.ajax.reload();
                    } else {
                        $(".print-error-msgFromPerfil").css('display', 'block');
                        $(".print-error-msgFromPerfil").html(data.error);

                        $('#alteraCarro').html('<i class="fa fa-save"></i> Alterar');
                        $(".bt_altera_carro").prop("disabled", false);
                    }
                }
            });
        });

        function listaCarros() {
            $.ajax({
                url: "<?=site_url('lista-todos-carros')?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="select_carro_montagem"]').empty();
                    $('select[name="select_carro_montagem"]').append('<option selected disabled>Selecione aqui...</option>');
                    $.each(data, function(key, value) {
                        $('select[name="select_carro_montagem"]').append('<option value="' + value.id_cr + '">' + value.carro_codigo + '</option>');
                    });
                }
            });
        }
    });
</script>