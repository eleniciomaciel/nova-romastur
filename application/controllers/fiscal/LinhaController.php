<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LinhaController extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('linha_saida', 'linha de saída', 'required|max_length[30]');
        $this->form_validation->set_rules('linha_chegada', 'linha de destino', 'required|callback_unique_saida_chegada|max_length[30]');


        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            $data = array(
                'linha_saida' => strtoupper($this->input->post('linha_saida')),
                'linha_chegada' => strtoupper($this->input->post('linha_chegada'))
            );
            $this->db->insert('linhas', $data);
            echo json_encode(['success' => 'Linha adicionado com sucesso.']);
        }
    }

    /**verificando se o clube da cidade já está cadastrado */
    public function unique_saida_chegada()
    {
        $ln_saida = $this->input->post('linha_saida');
        $ln_chegada = $this->input->post('linha_chegada');

        $check = $this->db->get_where('linhas', array('linha_saida' => $ln_saida, 'linha_chegada' => $ln_chegada), 1);

        if ($check->num_rows() > 0) {
            $this->form_validation->set_message('unique_saida_chegada', 'Essa linha já foi cadastrada.');
            return FALSE;
        }
        return TRUE;
    }
    /**lista linhas */
    public function get_lista_linhas()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->db->get("linhas");
        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                $r->id_ln,
                $r->linha_saida . ' / ' . $r->linha_chegada,
                $r->linha_saida,
                $r->linha_chegada,
                '<button type="button" class="verLinha btn btn-success" id="' . $r->id_ln . '">Visualizar</button>'
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

    /**get_linha */

    public function get_linha(int $id)
    {
        $output = array();
        $data = $this->db->get_where('linhas', array('id_ln' => $id));
        foreach ($data->result() as $row) {
            $output['linha_up_saida'] = $row->linha_saida;
            $output['linha_up_chega'] = $row->linha_chegada;
        }
        echo json_encode($output);
    }

    /**altera linha */
    public function alteraLinha(int $id)
    {
        $this->form_validation->set_rules('linha_up_saida', 'linha de saída', 'required|max_length[30]');
        $this->form_validation->set_rules('linha_up_chega', 'linha de chegada', 'required|max_length[30]|callback_unique_saida_chegada_altera');


        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            $data = array(
                'linha_saida' => strtoupper($this->input->post('linha_up_saida')),
                'linha_chegada' => strtoupper($this->input->post('linha_up_chega'))
            );
            $this->db->update('linhas', $data, array('id_ln' => $id));
            echo json_encode(['success' => 'Linha   alterado com sucesso.']);
        }
    }

    /**verificando se o clube da cidade já está cadastrado */
    public function unique_saida_chegada_altera()
    {
        $ln_saida = $this->input->post('linha_up_saida');
        $ln_chegada = $this->input->post('linha_up_chega');

        $check = $this->db->get_where('linhas', array('linha_saida' => $ln_saida, 'linha_chegada' => $ln_chegada), 1);

        if ($check->num_rows() > 0) {
            $this->form_validation->set_message('unique_saida_chegada_altera', 'Essa linha já foi cadastrada.');
            return FALSE;
        }
        return TRUE;
    }
}

/* End of file LinhaController.php */
