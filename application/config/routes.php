<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['trabalhe-conosco'] = 'welcome/trabalhe_aqui_page_cadastro';
$route['login-usuarios'] = 'welcome/usuarios_restrito';
$route['valida-acesso-do-usuario'] = 'welcome/valida_acessos_users';
$route['sair'] = 'welcome/logout';

/**rota perfil */
$route['lista-dados-do-meu-perfil/(:num)'] = 'fiscal/PerfilController/index/$1';
$route['altera-dados-perfil/(:num)'] = 'fiscal/PerfilController/alteraPerfil/$1';
$route['altera-dados-login-d0-fiscal/(:num)'] = 'fiscal/PerfilController/alteraLogin/$1';

/**rota carro */
$route['adiciona-carro'] = 'fiscal/CarroController/index';
$route['lista-carros-cadastrados'] = 'fiscal/CarroController/get_listaTodosCarros';
$route['visualiza-dados-Carro/(:num)'] = 'fiscal/CarroController/visulizaCarroOne/$1';
$route['altera-dados-do-carro/(:num)'] = 'fiscal/CarroController/alteraCarroOne/$1';

/**adiciona linhas */
$route['adiciona-linha'] = 'fiscal/LinhaController/index';
$route['lista-todas-linha'] = 'fiscal/LinhaController/get_lista_linhas';
$route['visualiza-dados-linha/(:num)'] = 'fiscal/LinhaController/get_linha/$1';
$route['altera-dados-da-linha/(:num)'] = 'fiscal/LinhaController/alteraLinha/$1';

/**rota monta linha */
$route['lista-todos-carros'] = 'fiscal/LinhaMontagemController/index';
$route['lista-todas-linhas'] = 'fiscal/LinhaMontagemController/linhas';
$route['adiciona-linha-montagem'] = 'fiscal/LinhaMontagemController/dd_linha_itinerario';
$route['lista-linhas-onibus'] = 'fiscal/LinhaMontagemController/get_carros_linhas';


/**adicionando ocorrencias */
$route['adiciona-ocorrencia'] = 'fiscal/OcorrenciasController/index';
$route['lista-ocorrencias'] = 'fiscal/OcorrenciasController/get_ocorrencias';
$route['visualiza-ocorrencia/(:num)'] = 'fiscal/OcorrenciasController/ver_ocorrencias/$1';
$route['adiciona-ocorrencia/(:num)'] = 'fiscal/OcorrenciasController/alterar_ocorrencias/$1';
$route['contador-de-ocorrencias'] = 'fiscal/TrabalhosController/total_ocoorencias';


/**rota relatorios */
$route['lista-linhas-para-relatorios'] = 'fiscal/RelatoriosController/index';
$route['consulta-relatorios'] = 'fiscal/Excel_export/generateXls';

/**rota avisos */
$route['users-fiscais'] = 'fiscal/MensagensController/index';
$route['sender-avisos'] = 'fiscal/MensagensController/addMessage';
$route['listando-mensagens'] = 'fiscal/MensagensController/get_message';
$route['lendo-mensagem-recebida-do-fiscal/(:num)'] = 'fiscal/MensagensController/lendoMensagemRecebidaDoFiscal/$1';
$route['contador-de-mensagens'] = 'fiscal/MensagensController/contaMensagens';
$route['altera-status-da-visibilidade'] = 'fiscal/MensagensController/marcarComoVisivel';

/**rota itinerio */
$route['seleciona-linhas-itinerario1'] = 'fiscal/ItinerarioController/index';
$route['seleciona-linhas-itinerario2'] = 'fiscal/ItinerarioController/destino';
$route['cadastra-itinerario'] = 'fiscal/ItinerarioController/cadastraItinerario';
$route['lista-etinearios-todos'] = 'fiscal/ItinerarioController/get_Itinerario';
$route['lista-dados-da-linha/(:num)'] = 'fiscal/ItinerarioController/get_linha_Itinerario/$1';
$route['altera-dados-itinerario/(:num)'] = 'fiscal/ItinerarioController/altera_linha_Itinerario/$1';
$route['deleta-itinerario/(:num)'] = 'fiscal/ItinerarioController/deleta_linha_Itinerario/$1';

/**listagen dados trabalhos atividades */
$route['listagem-dados-linha-trbalhos/(:num)'] = 'fiscal/TrabalhosController/lista_linha_trabalho/$1';
$route['listagem-dados-linha-trbalhos_saida/(:num)'] = 'fiscal/TrabalhosController/lista_linha_trabalho_saidas_carro/$1';
$route['listagem-das-ocorrencias_tbl'] = 'fiscal/TrabalhosController/listaOcorrencias_tbl';
$route['registrar-chegada-fiscal'] = 'fiscal/TrabalhosController/cadastraRegistroDaChegada';
$route['lista-todos-trabalhos-atividades'] = 'fiscal/TrabalhosController/get_lista_trabalhos';
$route['registrar-saida-carro-fiscal/(:num)'] = 'fiscal/TrabalhosController/registra_saida_do_carro_pelo_fiscal/$1';
$route['ver-acomnhamento-id/(:num)'] = 'fiscal/TrabalhosController/get_acomnhamentoRegistro/$1';
$route['altera-registro-atividade-horas-carro-fiscal/(:num)'] = 'fiscal/TrabalhosController/altera_registro_hours_fiscal/$1';
$route['lista-fluxo-hoje-espelho'] = 'fiscal/TrabalhosController/get_espelho';

/** rota home */
$route['lista-carros-sando-agora'] = 'home/HomeController/linha_saindo_agora';
$route['lista-linhas-itinerarios-fixos'] = 'home/HomeController/linha_itinerario_fixo';
$route['seleciona-cidade-curriculos/(:num)'] = 'home/HomeController/seleciona_cidades_curriculos/$1';
$route['send-dados-curriculo'] = 'home/HomeController/envia_curriculoUsuario';
