<script>
    $(document).ready(function() {
        $(document).on('click', '.vewMewPerfil', function() {
            let id_meu_pf = $(this).attr("id");
            $.ajax({
                url: "<?=site_url('lista-dados-do-meu-perfil/')?>" + id_meu_pf,
                method: "GET",
                data: {
                    id_meu_pf: id_meu_pf
                },
                beforeSend: function(){
                    $(".loader").css('display', 'block');
                },
                complete: function () {  
                    $(".loader").css('display', 'none');
                },
                dataType: "json",
                success: function(data) {
                    $('#perfilModal').modal('show');
                    $('#fiscal_nome').val(data.fiscal_nome);
                    $('#fiscal_email').val(data.fiscal_email);
                    $('#fiscal_nivel').val(data.fiscal_nivel);
                    $('#id_meu_pf').val(id_meu_pf);
                }
            })
        });

        /**altera perfil */
        $(document).on('submit', '#form_perfil', function(event){  
           event.preventDefault();

            let id_pf = $("input[name='id_meu_pf']").val();
            let str_form_perfil = $( "#form_perfil" ).serialize();

            $('#upPerfil').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Alterando, aguarde....<span class="sr-only">Loading...</span>').prop("disabled", true);
            $(".bt_atera_perfil").prop("disabled", true);

	        $.ajax({
	            url:"<?=site_url('altera-dados-perfil/')?>" + id_pf,
	            type:'POST',
	            dataType: "json",
	            data: str_form_perfil,
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	$(".print-error-msgFromPerfil").css('display','none');
                        swal("OK!", data.success, "success");

                        $('#upPerfil').html('<i class="fa fa-save"></i> Alterar');
                        $(".bt_atera_perfil").prop("disabled", false);
	                }else{
						$(".print-error-msgFromPerfil").css('display','block');
	                	$(".print-error-msgFromPerfil").html(data.error);

                        $('#upPerfil').html('<i class="fa fa-save"></i> Alterar');
                        $(".bt_atera_perfil").prop("disabled", false);
	                }
	            }
	        });
	    });

        /**visualiza dados do login */
        $(document).on('click', '.dadosLoginAcesso', function() {
            let id_meu_pf_log = $(this).attr("id");
            $.ajax({
                url: "<?=site_url('lista-dados-do-meu-perfil/')?>" + id_meu_pf_log,
                method: "GET",
                data: {
                    id_meu_pf_log: id_meu_pf_log
                },
                beforeSend: function(){
                    $(".loader").css('display', 'block');
                },
                complete: function () {  
                    $(".loader").css('display', 'none');
                },
                dataType: "json",
                success: function(data) {
                    $('#loginPasswordModal').modal('show');
                    $('#fiscal_login').val(data.fiscal_login);
                    $('#id_meu_pf_log').val(id_meu_pf_log);
                }
            })
        });

        /**alterando dados de acesso do fiscal */
        $(document).on('submit', '#form_login', function(event){  
           event.preventDefault();

            let id_log_fisc = $("input[name='id_meu_pf_log']").val();
            let str_form_login = $( "#form_login" ).serialize();

            $('#upPerfilLOgin').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Alterando, aguarde....<span class="sr-only">Loading...</span>').prop("disabled", true);
            $(".bt_atera_perfil_login").prop("disabled", true);

	        $.ajax({
	            url:"<?=site_url('altera-dados-login-d0-fiscal/')?>" + id_log_fisc,
	            type:'POST',
	            dataType: "json",
	            data: str_form_login,
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	$(".print-error-msgFromPerfil_login").css('display','none');
                        swal("OK!", data.success, "success");

                        $('#upPerfilLOgin').html('<i class="fa fa-save"></i> Alterar');
                        $(".bt_atera_perfil_login").prop("disabled", false);
	                }else{
						$(".print-error-msgFromPerfil_login").css('display','block');
	                	$(".print-error-msgFromPerfil_login").html(data.error);

                        $('#upPerfilLOgin').html('<i class="fa fa-save"></i> Alterar');
                        $(".bt_atera_perfil_login").prop("disabled", false);
	                }
	            }
	        });
	    });
    });
</script>