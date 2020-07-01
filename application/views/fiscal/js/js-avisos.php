<script>
    $(document).ready(function() {

        usuaruis_avisos_fiscal();
        ready_message();
        countMessagens_ok();

        $(document).on('click', '.meusAvisos', function() {
            let id_avs = $(this).attr("id");
            $.ajax({
                url: "<?= site_url('lista-dados-do-meu-perfil/') ?>" + id_avs,
                method: "GET",
                data: {
                    id_avs: id_avs
                },
                beforeSend: function() {
                    $(".loader").css('display', 'block');
                },
                complete: function() {
                    $(".loader").css('display', 'none');
                },
                dataType: "json",
                success: function(data) {
                    $('#avisosSendModalLong').modal('show');
                    $('#fiscal_nome_users').val(data.fiscal_nome);
                    $('#id_avs').val(id_avs);
                }
            })
        });

        /**envia avisos */
        $(document).on('submit', '#form_avisos', function(event) {
            event.preventDefault();

            var str_add_ocorrencia = $("#form_avisos").serialize();

            $('#addAvisosSend').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Enviando, aguarde....<span class="sr-only">Loading...</span>').prop("disabled", true);
            $(".bt_add_avisos").prop("disabled", true);

            $.ajax({
                url: "<?= site_url('sender-avisos') ?>",
                type: 'POST',
                dataType: "json",
                data: str_add_ocorrencia,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msgAddAvisos").css('display', 'none');
                        swal("OK!", data.success, "success");

                        $('#addAvisosSend').html('<i class="fa fa-save"></i> Enviar');
                        $(".bt_add_avisos").prop("disabled", false);
                       // $('#form_avisos')[0].reset();
                        ready_message();
                        countMessagens_ok();
                    } else {
                        $(".print-error-msgAddAvisos").css('display', 'block');
                        $(".print-error-msgAddAvisos").html(data.error);

                        $('#addAvisosSend').html('<i class="fa fa-save"></i> Enviar');
                        $(".bt_add_avisos").prop("disabled", false);
                    }
                }
            });
        });

        /**listagem da mensagens recebidas */
        function ready_message() {
            $.ajax({
                url: "<?= site_url('listando-mensagens') ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#div_avisos_fiscal').empty();
                    if (data != "") {
                        $.each(data, function(key, value) {
                            if (value.avs_status_de_leitura == '1') {
                                $('#div_avisos_fiscal').append(' <a href="#" class="viewMessageLer dropdown-item" id="' + value.avs_id + '"><span class="material-icons"> drafts </span>&nbsp;' + value.avs_assunto_title + '</a>');
                            } else {
                                $('#div_avisos_fiscal').append(' <a href="#" class="viewMessageLer dropdown-item" id="' + value.avs_id + '"><span class="material-icons"> mail_outline </span>&nbsp;' + value.avs_assunto_title + '</a>');
                            }

                        });
                    }

                }
            });
        }

        /**lista a mensagem recebida */
        $(document).on('click', '.viewMessageLer', function() {
            let id_ready_msg = $(this).attr("id");
            $.ajax({
                url: "<?= site_url('lendo-mensagem-recebida-do-fiscal/') ?>" + id_ready_msg,
                method: "GET",
                data: {
                    id_ready_msg: id_ready_msg
                },
                beforeSend: function() {
                    $(".loader").css('display', 'block');
                },
                complete: function() {
                    $(".loader").css('display', 'none');
                },
                dataType: "json",
                success: function(data) {
                    $('#lendoMensagemModalLong').modal('show');
                    $('#ready_titulo').val(data.ready_titulo);
                    $('#ready_descricao').val(data.ready_descricao);
                    $('#ready_destinatario').val(data.ready_destinatario);
                    $('#id_ready_msg').val(id_ready_msg);
                    ready_message();
                }
            })
        });


        /**maraca a mensagem como lida */
        $(document).on('submit', '#form_muda_status_da_visibilidade_avisos', function(event) {
            event.preventDefault();

            var str_marcando_lido = $("#form_muda_status_da_visibilidade_avisos").serialize();

            $('#sts_visible').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Marcando, aguarde....<span class="sr-only">Loading...</span>').prop("disabled", true);
            $(".bt_visible").prop("disabled", true);

            swal({
                    title: "Alterar visibilidade?",
                    text: "Ao confirmar a mensagem irá desapararecer da sua lista de mensagens!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "<?= site_url('altera-status-da-visibilidade') ?>",
                            type: 'POST',
                            dataType: "json",
                            data: str_marcando_lido,
                            success: function(data) {
                                if ($.isEmptyObject(data.error)) {
                                    $(".print-error-msg_stf_lido").css('display', 'none');
                                    swal(data.success, {
                                        icon: "success",
                                    });

                                    $('#sts_visible').html('<i class="fa fa-save"></i> Marcar como lido');
                                    $(".bt_visible").prop("disabled", false);
                                    ready_message();
                                    countMessagens_ok();
                                } else {
                                    $(".print-error-msg_stf_lido").css('display', 'block');
                                    $(".print-error-msg_stf_lido").html(data.error);

                                    $('#sts_visible').html('<i class="fa fa-save"></i> Marcar como lido');
                                    $(".bt_visible").prop("disabled", false);
                                }
                            }
                        });

                    } else {
                        swal("Você desisitiu de altera o status!");
                        $('#sts_visible').html('<i class="fa fa-save"></i> Marcar como lido');
                        $(".bt_visible").prop("disabled", false);
                    }
                });
        });

        /**usuarios como fiscais */
        function usuaruis_avisos_fiscal() {
            $.ajax({
                url: "<?= site_url('users-fiscais') ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="select_users_fiscal"]').empty();
                    $('select[name="select_users_fiscal"]').append('<option selected disabled>Selecione aqui...</option>');
                    $.each(data, function(key, value) {
                        $('select[name="select_users_fiscal"]').append('<option value="' + value.id + '">' + value.user_nome + '</option>');
                    });
                }
            });
        }

        /**conta mensagens */
        function countMessagens_ok() {
            $.get("<?php echo site_url('contador-de-mensagens'); ?>", function(data) {
                $(".result_count_message").html(data);
            });
        }
    });
</script>