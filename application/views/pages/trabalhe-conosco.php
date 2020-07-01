<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Site made with Mobirise Website Builder v4.12.3, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.12.3, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta name="description" content="">


    <title><?= $title ?></title>

    <link  type="image/x-icon" rel="apple-touch-icon" sizes="57x57" href="assets/home/images/favicon/apple-icon-57x57.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="60x60" href="assets/home/images/favicon/apple-icon-60x60.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="72x72" href="assets/home/images/favicon/apple-icon-72x72.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="76x76" href="assets/home/images/favicon/apple-icon-76x76.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="114x114" href="assets/home/images/favicon/apple-icon-114x114.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="120x120" href="assets/home/images/favicon/apple-icon-120x120.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="144x144" href="assets/home/images/favicon/apple-icon-144x144.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="152x152" href="assets/home/images/favicon/apple-icon-152x152.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="180x180" href="assets/home/images/favicon/apple-icon-180x180.png">
    <link  type="image/x-icon" rel="icon" type="image/png" sizes="192x192" href="assets/home/images/favicon/android-icon-192x192.png">
    <link  type="image/x-icon" rel="icon" type="image/png" sizes="32x32" href="assets/home/images/favicon/favicon-32x32.png">
    <link  type="image/x-icon" rel="icon" type="image/png" sizes="96x96" href="assets/home/images/favicon/favicon-96x96.png">
    <link  type="image/x-icon" rel="icon" type="image/png" sizes="16x16" href="assets/home/images/favicon/favicon-16x16.png">
    <link  type="image/x-icon" rel="manifest" href="assets/home/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/home/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <link rel="stylesheet" href="<?= base_url(); ?>assets/trabalhe-aqui/web/assets/mobirise-icons/mobirise-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/trabalhe-aqui/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/trabalhe-aqui/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/trabalhe-aqui/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/trabalhe-aqui/facebook-plugin/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/trabalhe-aqui/tether/tether.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/trabalhe-aqui/socicon/css/styles.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/trabalhe-aqui/theme/css/style.css">
    <link rel="preload" as="style" href="<?= base_url(); ?>assets/trabalhe-aqui/mobirise/css/mbr-additional.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/trabalhe-aqui/mobirise/css/mbr-additional.css" type="text/css">

</head>

<body>
    <section class="header1 cid-rWg89GoJ4M mbr-parallax-background" id="header1-0" style="background-image: url('<?= base_url(); ?>assets/trabalhe-aqui/images/background4.jpg');">



        <div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(20, 157, 204);">
        </div>

        <div class="container">
            <div class="row justify-content-md-center">
                <div class="mbr-white col-md-10">
                    <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1">VAGAS</h1>
                    <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-2">Adm Tur - Marcio Alves Teixeira Eireli.</h3>
                    <p class="mbr-text align-center pb-3 mbr-fonts-style display-5">
                        Faça parte de nosso banco de talentos. Somos uma empresa parceira da Romastur S/A.&nbsp;</p>
                    <div class="mbr-section-btn align-center"><a class="btn btn-md btn-secondary display-4" href="#"><span class="mbri-file mbr-iconfont mbr-iconfont-btn"></span>FALE CONOSCO</a></div>
                </div>
            </div>
        </div>

    </section>

    <section class="engine"><a href="#">free amp template</a></section>
    <section class="mbr-section form1 cid-rWg8t9JYm5" id="form1-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="title col-12 col-lg-8">
                    <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                        CURRÍCULO BANCO DE TALENTOS</h2>
                    <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">Faça aqui o seu currículo que nós procuraremos vagas para você. Fazendo parte de nosso perfíl retornaremos o contato.</h3>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="media-container-column col-lg-8" data-form-type="formoid">
                    <!---Formbuilder Form--->
                    <form id="form_curriculo" class="mbr-form form-with-styler">
                        
                        <?php
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );
                        ?>
                        <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />


                        <div class="dragArea row">

                            <div class="col-md-12  form-group" data-for="name">
                                <label for="name-form1-1" class="form-control-label mbr-fonts-style display-7">Nome completo:</label>
                                <input type="text" name="name_cur" data-form-field="Name" required="required" class="form-control display-7" placeholder="Ex.: Ana Silva" id="name-form1-1">
                            </div>

                            <div class="col-md-6  form-group" data-for="email">
                                <label for="email-form1-1" class="form-control-label mbr-fonts-style display-7">Seu melhor email:</label>
                                <input type="email" name="email_cur" data-form-field="Email" required="required" class="form-control display-7" placeholder="Ex.: ana@email.com" id="email-form1-1">
                            </div>

                            <div data-for="phone" class="col-md-6  form-group">
                                <label for="phone-form1-1" class="form-control-label mbr-fonts-style display-7">Telefone:</label>
                                <input type="tel" name="phone_cur" data-form-field="Phone" class="form-control display-7" placeholder="Ex.: (00) 9 0000-0000" id="phone-form1-1">
                            </div>

                            <div data-for="phone" class="col-md-4  form-group">
                                <label for="phone-form1-1" class="form-control-label mbr-fonts-style display-7">Estado:</label>
                                <select class="form-control display-7" name="estado_ct" id="estado_ct" required="required">
                                    <option value="" selected disabled>Selecione aqui.</option>
                                    <?php
                                    $data = $this->db->get('estado');
                                    foreach ($data->result() as $key) {
                                        ?>
                                            <option value="<?php echo $key->id?>"><?php echo $key->nome?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div data-for="phone" class="col-md-8  form-group">
                                <label for="phone-form1-1" class="form-control-label mbr-fonts-style display-7">Cidade:</label>
                                <select class="form-control display-7" name="city" id="city" required="required">
                                    <option value="" selected disabled>Selecione aqui.</option>
                                </select>
                            </div>

                            <div data-for="phone" class="col-md-6  form-group">
                                <label for="phone-form1-1" class="form-control-label mbr-fonts-style display-7">Endereço:</label>
                                <input type="tel" name="endereco_cur" required="required" class="form-control display-7" placeholder="Ex.: Rua 13 de maio, nº 458">
                            </div>

                            <div data-for="phone" class="col-md-6  form-group">
                                <label for="phone-form1-1" class="form-control-label mbr-fonts-style display-7">Bairro:</label>
                                <input type="tel" name="bairro_cur" required="required" class="form-control display-7" placeholder="Ex.: Centro">
                            </div>

                            <div data-for="phone" class="col-md-12  form-group">
                                <label for="phone-form1-1" class="form-control-label mbr-fonts-style display-7">adicione seu currículo aqui:</label>
                                <input type="file" name="file_cur"  class="form-control display-7" placeholder="Ex.: Centro">
                            </div>

                            <div data-for="phone" class="col-md-6  form-group">
                                <label for="phone-form1-1" class="form-control-label mbr-fonts-style display-7">Escolaridade:</label>
                                <select class="form-control display-7" name="escola_cur" id="escola_cur" required="required">
                                    <option value="">Selecione aqui.</option>
                                    <option value="Fundamental">Fundamental</option>
                                    <option value="Médio">Médio</option>
                                    <option value="Superior graduação">Superior graduação</option>
                                    <option value="Superior tecnologo">Superior tecnologo</option>
                                    <option value="Técnico">Técnico</option>
                                </select>
                            </div>

                            <div data-for="phone" class="col-md-6  form-group">
                                <label for="phone-form1-1" class="form-control-label mbr-fonts-style display-7">Vaga pretendida:</label>
                                <input type="tel" name="pretende_vagas_cur" class="form-control display-7" placeholder="Ex.: Motorista" required="required">
                            </div>

                            <div data-for="message" class="col-md-12 form-group">
                                <label for="message-form1-1" class="form-control-label mbr-fonts-style display-7">Sobre você:</label>
                                <textarea name="message_cur" data-form-field="Message" class="form-control display-7" required="required" placeholder="Mais sobre você aqui, vaga pretendida e suas esperiências profissional..." id="message-form1-1"></textarea>
                            </div>

                            <div class="col-md-12 input-group-btn align-center"><button type="submit" class="btn btn-primary btn-form display-4"><span class="mbri-letter mbr-iconfont mbr-iconfont-btn"></span>ENVIAR CURRÍCULO</button></div>
                        </div>
                    </form>
                    <br>
                    <div class="alert alert-danger print-error-msg_crs" style="display:none"></div>
                    <!---Formbuilder Form--->
                </div>
            </div>
        </div>
    </section>

    <section class="cid-rWnn9yKuZT" id="social-buttons2-7">





        <div class="container">
            <div class="media-container-row">
                <div class="col-md-8 align-center">
                    <h2 class="pb-3 mbr-fonts-style display-2">COMPARTILHE NAS REDES SOCIAIS!
                    </h2>
                    <div class="social-list pl-0 mb-0">
                        <a href="https://twitter.com/mobirise" target="_blank">
                            <span class="px-2 mbr-iconfont mbr-iconfont-social socicon-messenger socicon"></span>
                        </a>
                        <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
                            <span class="px-2 socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                        <a href="https://instagram.com/mobirise" target="_blank">
                            <span class="px-2 socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                        <a href="https://www.youtube.com/c/mobirise" target="_blank">

                        </a>
                        <a href="https://www.behance.net/Mobirise" target="_blank">

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section once="footers" class="cid-rWg8APT9U9 mbr-reveal" id="footer6-3">





        <div class="container">
            <div class="media-container-row align-center mbr-white">
                <div class="col-12">
                    <p class="mbr-text mb-0 mbr-fonts-style display-7">
                        © Copyright 2019 T&amp;A Consultoria- Todos os direitos reservados.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <script src="<?= base_url(); ?>assets/trabalhe-aqui/web/assets/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/trabalhe-aqui/popper/popper.min.js"></script>
    <script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5"></script>
    <script src="https://apis.google.com/js/plusone.js"></script>
    <script src="<?= base_url(); ?>assets/trabalhe-aqui/facebook-plugin/facebook-script.js"></script>
    <script src="<?= base_url(); ?>assets/trabalhe-aqui/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/trabalhe-aqui/smoothscroll/smooth-scroll.js"></script>
    <script src="<?= base_url(); ?>assets/trabalhe-aqui/parallax/jarallax.min.js"></script>
    <script src="<?= base_url(); ?>assets/trabalhe-aqui/sociallikes/social-likes.js"></script>
    <script src="<?= base_url(); ?>assets/trabalhe-aqui/tether/tether.min.js"></script>
    <script src="<?= base_url(); ?>assets/trabalhe-aqui/theme/js/script.js"></script>
    <script src="<?= base_url(); ?>assets/trabalhe-aqui/formoid/formoid.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('select[name="estado_ct"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: "<?=site_url('seleciona-cidade-curriculos/')?>" +stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city"]').append('<option value="'+ value.estado +'">'+ value.nome +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });

$(document).on('submit', '#form_curriculo', function(event){  
           event.preventDefault(); 

           var str_form_curriculo = $("#form_curriculo").serialize();

	        $.ajax({
	            url: "<?=site_url('send-dados-curriculo')?>",
	            type:'POST',
	            dataType: "json",
	            data: str_form_curriculo,
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	$(".print-error-msg_crs").css('display','none');
	                	alert(data.success);
	                }else{
						$(".print-error-msg_crs").css('display','block');
	                	$(".print-error-msg_crs").html(data.error);
	                }
	            }
	        });
	    }); 
        
    });
</script>

</body>

</html>