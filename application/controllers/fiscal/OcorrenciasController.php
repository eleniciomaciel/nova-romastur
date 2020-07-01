<?php

defined('BASEPATH') or exit('No direct script access allowed');

class OcorrenciasController extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules(
            'add_correncia_input',
            'ocorrência',
            'required|is_unique[ocorencias_tipos.nome_ocorrencias_oc]|max_length[50]',
            array('is_unique' => 'Essa %s já foi adicionada, crie outra.')
        );

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            $data = array(
                'nome_ocorrencias_oc' => strip_tags($this->input->post('add_correncia_input', TRUE))
            );

            $this->db->insert('ocorencias_tipos', $data);
            echo json_encode(['success' => 'Ocorrência adicionada com sucesso.']);
        }
    }

    /**listando todas as ocorrencias */


    public function get_ocorrencias()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->db->get("ocorencias_tipos");

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                $r->nome_ocorrencias_oc,
                '<button class="btn_ver_ocorrencia btn btn-success btn-round" id="' . $r->id_oc . '">
                    <i class="material-icons">visibility</i> Ver
                </button>'
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

    /**ver ocorrencia */
    public function ver_ocorrencias(int $id)
    {
        $output = array();
        $data = $this->db->get_where('ocorencias_tipos', array('id_oc' => $id));
        foreach ($data->result() as $row) {
            $output['dados_correncia'] = $row->nome_ocorrencias_oc;
        }
        echo json_encode($output);
    }

    /**alterar ocorrencia */
    public function alterar_ocorrencias(int $id)
    {
        $this->form_validation->set_rules(
            'dados_correncia',
            'ocorrência',
            'required|is_unique[ocorencias_tipos.nome_ocorrencias_oc]|max_length[50]',
            array('is_unique' => 'Essa %s já foi adicionada, crie outra.')
        );

        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            $data = array(
                'nome_ocorrencias_oc' => strip_tags($this->input->post('dados_correncia', TRUE))
            );

            $this->db->update('ocorencias_tipos', $data, array('id_oc' => $id));
            echo json_encode(['success' => 'Ocorrência adicionada com sucesso.']);
        }
    }
}

/* End of file OcorrenciasController.php */
