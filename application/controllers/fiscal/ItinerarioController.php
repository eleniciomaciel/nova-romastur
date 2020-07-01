<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ItinerarioController extends CI_Controller
{

    public function index()
    {
        $result = $this->db->order_by('id_ln', 'DESC')->group_by("linha_saida")->get("linhas")->result();
        echo json_encode($result);
    }

    public function destino()
    {
        $result = $this->db->order_by('id_ln', 'DESC')->group_by("linha_chegada")->get("linhas")->result();
        echo json_encode($result);
    }

    /**cadastra itinerario */
    public function cadastraItinerario()
    {
        $this->form_validation->set_rules('seleciona_ls_1', 'saída', 'required');
        $this->form_validation->set_rules('seleciona_ls_2', 'chegada', 'required');
        $this->form_validation->set_rules('select_dias', 'dias', 'required');
        $this->form_validation->set_rules('horario_itinerario', 'Horario', 'required');


        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            $data = array(
                'fk_linha_saida_it' => $this->input->post('seleciona_ls_1'),
                'fk_linha_chegada_it' => $this->input->post('seleciona_ls_2'),
                'fk_hora_saida_it' => $this->input->post('horario_itinerario'),
                'dias_it' => $this->input->post('select_dias'),
            );

            $this->db->insert('itinerarios_onibus', $data);
            echo json_encode(['success' => 'Registro adicionado com sucesso.']);
        }
    }

    /**lista itinerarios */
    public function get_Itinerario()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));


        $this->db->select('*, l1.linha_saida as l_saida, l2.linha_chegada as l_chegada ');
        $this->db->from('itinerarios_onibus');
        $this->db->join('linhas as l1', 'l1.id_ln = itinerarios_onibus.fk_linha_saida_it');
        $this->db->join('linhas as l2', 'l2.id_ln = itinerarios_onibus.fk_linha_chegada_it');
        $query = $this->db->get();

        $data = [];
        foreach ($query->result() as $r) {

            $data[] = array(
                $r->l_saida . ' / ' . $r->l_chegada,
                $r->dias_it == 'ss' ? 'Segunda/Sábado' : 'Domingos',
                $r->linha_saida,
                date("H:i", strtotime($r->fk_hora_saida_it)),
                '<div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Opções
                    </button>
                    <div class="dropdown-menu">
                        <a class="verSelectItinerarios dropdown-item" href="#" id="' . $r->id_it . '">
                            <span class="material-icons"> visibility </span>&nbsp;Visualizar
                        </a>
                    <div class="dropdown-divider"></div>
                        <a class="deleteItinerario dropdown-item" href="#" id="' . $r->id_it . '">
                            <span class="material-icons"> delete_forever </span>&nbsp;Deletar
                        </a>
                    </div>
                </div>',
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

    /**lista itinerarios dados */
    public function get_linha_Itinerario(int $id)
    {
        $output = array();

        $this->db->select('*');
        $this->db->from('itinerarios_onibus');
        $this->db->where('id_it', $id);
        $data = $this->db->get()->result();

        foreach ($data as $row) {
            $output['itiner_saida'] = $row->fk_linha_saida_it;
            $output['itiner_chega'] = $row->fk_linha_chegada_it;
            $output['itiner_hora'] = $row->fk_hora_saida_it;
            $output['itiner_dias'] = $row->dias_it;
        }
        echo json_encode($output);
    }

    /**cadastra itinerario alterar */
    public function altera_linha_Itinerario(int $id)
    {
        $this->form_validation->set_rules('linha_altera_saida', 'saída', 'required');
        $this->form_validation->set_rules('linha_altera_chegada', 'chegada', 'required');
        $this->form_validation->set_rules('itiner_dias', 'dias', 'required');
        $this->form_validation->set_rules('itiner_hora', 'Horario', 'required');


        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            $data = array(
                'fk_linha_saida_it' => $this->input->post('linha_altera_saida'),
                'fk_linha_chegada_it' => $this->input->post('linha_altera_chegada'),
                'fk_hora_saida_it' => $this->input->post('itiner_hora'),
                'dias_it' => $this->input->post('itiner_dias'),
            );
            $this->db->update('itinerarios_onibus', $data, array('id_it' => $id));
            echo json_encode(['success' => 'Registro adicionado com sucesso.']);
        }
    }

    /**deleta itinerarios */
    public function deleta_linha_Itinerario(int $id)
    {
        $this->db->delete('itinerarios_onibus', array('id_it' => $id));
        echo 'Itinerário deletado com sucesso!';
    }
}

/* End of file ItinerarioController.php */
