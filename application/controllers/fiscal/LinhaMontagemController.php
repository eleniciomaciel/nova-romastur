<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LinhaMontagemController extends CI_Controller
{

    public function index()
    {
        $result = $this->db->order_by('carro_codigo', 'DESC')->get("carro_frota")->result();
        echo json_encode($result);
    }

    public function linhas()
    {
        $result = $this->db->order_by('id_ln', 'DESC')->get("linhas")->result();
        echo json_encode($result);
    }
    /**linha adiciona itinerario */
    public function dd_linha_itinerario()
    {
        $this->form_validation->set_rules('select_carro_montagem', 'carro', 'required');
        $this->form_validation->set_rules('select_linhas_montagem', 'linha', 'required|callback_unique_onibusLinha');
        $this->form_validation->set_rules('meu_user', 'usuario', 'required');

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            $data = array(
                'fk_usuario_lc' => $this->input->post('meu_user'),
                'fk_carro_lc' => $this->input->post('select_carro_montagem'),
                'fk_linha_lc' => $this->input->post('select_linhas_montagem')
            );

            $this->db->insert('linhas_onibus', $data);
            echo json_encode(['success' => 'Cadastro realizado com sucesso.']);
        }
    }

    /**verificando se o clube da cidade já está cadastrado */
    public function unique_onibusLinha()
    {
        $fk_carro = $this->input->post('select_carro_montagem');
        $fk_linha = $this->input->post('select_linhas_montagem');

        $check = $this->db->get_where('linhas_onibus', array('fk_carro_lc' => $fk_carro, 'fk_linha_lc' => $fk_linha), 1);

        if ($check->num_rows() > 0) {
            $this->form_validation->set_message('unique_onibusLinha', 'O carro já está cadastrado na linha e só pode haver um.');
            return FALSE;
        }
        return TRUE;
    }

    /**cadastro das linhas get */
    public function get_carros_linhas()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $this->db->select('*');
        $this->db->from('linhas_onibus');
        $this->db->join('carro_frota', 'carro_frota.id_cr = linhas_onibus.fk_carro_lc');
        $this->db->join('linhas', 'linhas.id_ln = linhas_onibus.fk_linha_lc');
        $query = $this->db->get();

        $data = [];
        foreach ($query->result() as $r) {

            $data[] = array(
                '<button class="btn_chega btn btn-info btn-round" id="'.$r->id_lc.'">
                    <i class="material-icons">settings</i> CONFIRMAR
                </button>',
                $r->carro_codigo,
                $r->linha_saida.' / '.$r->linha_chegada,
                '<button class="btn_sai btn btn-warning btn-round" id="'.$r->id_lc.'">
                    <i class="material-icons">settings</i> CONFIRMAR
                </button>',
            );
        }

        $result = array(
            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data
        );
        echo json_encode($result);
        exit();
    }
}

/* End of file LinhaMontagemController.php */
