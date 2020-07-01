<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PerfilController extends CI_Controller {

    public function index(int $id)
    {
        $output = array();  
           $data = $this->db->get_where('usuarios', array('id' => $id));
           foreach($data->result() as $row)  
           {  
                $output['fiscal_nome'] = $row->user_nome;  
                $output['fiscal_email'] = $row->user_email;    
                $output['fiscal_login'] = $row->user_login;    
           }  
           echo json_encode($output);
    }

    /**altera perfil usuario */
    public function alteraPerfil(int $id)
    {
        $this->form_validation->set_rules('fiscal_nome', 'Nome', 'required|max_length[50]');
        $this->form_validation->set_rules('fiscal_email', 'email pessoal', 'required|valid_email');


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $data = array(
                'user_nome' => strtoupper($this->input->post('fiscal_nome')),
                'user_email' => strtolower($this->input->post('fiscal_email'))
            );
            $this->db->update('usuarios', $data, array('id' => $id));
           echo json_encode(['success'=>'Perfíl alterado com sucesso.']);
        }
    }
    /**altera dados do login */
    public function alteraLogin(int $id)
    {
        $this->form_validation->set_rules('fiscal_login', 'Login', 'required|valid_email');
        $this->form_validation->set_rules('fiscal_password', 'Senha', 'required|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+=!*()@%&]).{8,10}$/]',
		array('regex_match' => 'A senha deve conter pelo menos um número e uma letra maiúscula e minúscula, no mínimo 8 até 10 caracteres e um ou mais caracter especial #$^+=!*()@%&.'));


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $data = array(
                'user_login' => strtolower($this->input->post('fiscal_login')),
                'user_senha' => password_hash($this->input->post('fiscal_password'), PASSWORD_DEFAULT)
            );
            $this->db->update('usuarios', $data, array('id' => $id));
           echo json_encode(['success'=>'Login alterado com sucesso.']);
        }
    }

}

/* End of file PerfilController.php */
