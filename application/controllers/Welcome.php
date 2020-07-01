<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Users_model');
	}
 
	public function index(){
		//restrict users to go back to login if session has been set
		if($this->session->userdata('user') && $this->session->userdata('user')['user_nivel'] == 'fiscal'){
			redirect('welcome/panel_fiscal');
		}elseif($this->session->userdata('user') && $this->session->userdata('user')['user_nivel'] == 'agente_vales'){
			redirect('welcome/venda_vales');
		}
		else{
			$data = array(
				'ip_vst' => $this->input->ip_address(),
				'agente_vst' => $this->input->user_agent()
			);
		
			$this->db->insert('tbl_visitas', $data);
			$this->load->view('welcome_message');
		}
	}

	/**login acesso */
	public function valida_acessos_users(){
		$output = array('error' => false);
 
		/**teste validação ===================================================================*/
		$this->form_validation->set_rules('acesso_login', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('acesso_senha', 'Senha', 'required|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+=!*()@%&]).{8,10}$/]');


        if ($this->form_validation->run() == FALSE){
			$output['error'] = true;
            $output['message'] = validation_errors();
            //echo json_encode(['error'=>$output]);
        }else{
			$email = $this->input->post('acesso_login', TRUE);
			$password = $this->input->post('acesso_senha', TRUE);

			$data = $this->Users_model->login($email, $password);
			if($data){

				$this->session->set_userdata('user', $data);
				$output['message'] = 'Iniciando sua sessão. Aguarde ...';
			}
			else{
				
				$output['error'] = true;
				$output['message'] = 'Login inválido. Usuário não encontrado.';
			}
        }
		/**fim teste validação ===================================================================*/
		echo json_encode($output); 
	}

	public function fiscal(){
		if($this->session->userdata('user') != NULL){
			$data['title'] = 'Ambiente-fiscal';
			$this->load->view('fiscal/partial/header-master', $data);
			$this->load->view('fiscal/home-master');
			$this->load->view('fiscal/partial/footer');
		}
		else{
			redirect('/');
		}
	}

	public function venda_vales(){
		if($this->session->userdata('user') != NULL){
			//$data['title'] = 'Ambiente-vendas';
			//$this->load->view('fiscal/partial/header-master', $data);
			$this->load->view('vendas/home-vendedor');
			//$this->load->view('fiscal/partial/footer');
		}
		else{
			redirect('/');
		}
	}

	/** */
	public function logout(){
		$this->session->unset_userdata('user');
		redirect('/welcome/usuarios_restrito');
	}

	public function trabalhe_aqui_page_cadastro($page = 'trabalhe-conosco')
	{
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            show_404();
        }
        $data['title'] = ucfirst($page); // Capitalize the first letter
        $this->load->view('pages/'.$page, $data);
	}

	public function usuarios_restrito()
	{
		if($this->session->userdata('user') && $this->session->userdata('user')['user_nivel'] == 'fiscal'){
			redirect('welcome/fiscal');
		}
		else{
			$data['title'] = 'Login'; // Capitalize the first letter
        	$this->load->view('pages/login-usuarios-restrito', $data);
		}
	}

	/**conta visitas */
	public function contaVisitas()
	{
		$query = $this->db->query('SELECT COUNT(id_vst) AS number_visitas FROM tbl_visitas');
		$row = $query->row();
		echo $row->number_visitas;
	}
}
