<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MensagensController extends CI_Controller
{

    public function index()
    {
        $result = $this->db->where("user_nivel", 'fiscal')->get("usuarios")->result();
        echo json_encode($result);
    }

    /**adiciona avisos */
    public function addMessage()
    {
        $this->form_validation->set_rules('select_users_fiscal', 'Usuário', 'required');
        $this->form_validation->set_rules('msg_assunto', 'Assunto', 'required|max_length[20]');
        $this->form_validation->set_rules('msg_mensagem', 'Mensagem', 'required|max_length[500]');
        $this->form_validation->set_rules('id_avs', 'ID', 'required');


        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {

            $data = array(
                'avs_assunto_title' => $this->input->post('msg_assunto', TRUE),
                'avs_description' => $this->input->post('msg_mensagem', TRUE),
                'avs_remetente' => $this->input->post('id_avs', TRUE),
                'avs_fk_destinatario' => $this->input->post('select_users_fiscal', TRUE),
            );
            $this->db->insert('avisos_fiscais', $data);

            echo json_encode(['success' => 'Mensagem Enviada com sucesso.']);
        }
    }

    /**listando mensagens */
    public function get_message()
    {
        $id = $this->session->userdata('user')['id'];
        $array = array('avs_fk_destinatario' => $id, 'avs_status_de_visibilidade' => '0');
        $result = $this->db->where($array)->get("avisos_fiscais")->result();
        echo json_encode($result);
    }

    /**lendo a mensagem recebida do fiscal */
    public function lendoMensagemRecebidaDoFiscal(int $id)
    {
        $this->mensagemLida($id);
        $output = array();

        $this->db->select('*');
        $this->db->from('avisos_fiscais');
        $this->db->join('usuarios', 'usuarios.id = avisos_fiscais.avs_remetente');
        $this->db->where('avs_id', $id);

        $data = $this->db->get()->result();


        foreach ($data as $row) {
            $output['ready_titulo'] = $row->avs_assunto_title;
            $output['ready_descricao'] = $row->avs_description;
            $output['ready_destinatario'] = $row->user_nome;
        }
        echo json_encode($output);
    }

    /**marcar mensagem como lido */
    public function mensagemLida($id)
    {
        $data = array(
            'avs_status_de_leitura' => '1',
        );

        $this->db->where('avs_id', $id);
        return $this->db->update('avisos_fiscais', $data);
    }

    /**soma mensagens ativas */
    public function contaMensagens()
    {
        $id = $this->session->userdata('user')['id'];
        $this->db->select('COUNT(avs_id) AS total_mensagens');
        $this->db->where('avs_status_de_visibilidade !=', '1');
        $this->db->where('avs_fk_destinatario', $id);
        $query = $this->db->get('avisos_fiscais');
        $row = $query->row();
        echo $row->total_mensagens;
    }

    /**marcando como visivel */
    public function marcarComoVisivel()
    {
        $this->form_validation->set_rules('id_ready_msg', 'id da mensagem', 'required');
        
        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $id = $this->input->post('id_ready_msg');
            
            $data = array(
                    'avs_status_de_visibilidade' => '1',
            );
            $this->db->update('avisos_fiscais', $data, array('avs_id' => $id));

           echo json_encode(['success'=>'Visibilidade alterada com sucesso.']);
        }
    }
}

/* End of file MensagensController.php */
