<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TrabalhosController extends CI_Controller
{

    public function lista_linha_trabalho(int $id)
    {
        $output = array();

        $this->db->select('*');
        $this->db->from('linhas_onibus');
        $this->db->join('carro_frota', 'carro_frota.id_cr = linhas_onibus.fk_carro_lc');
        $this->db->join('linhas', 'linhas.id_ln = linhas_onibus.fk_linha_lc');
        $this->db->where('id_lc', $id);

        $data = $this->db->get();

        foreach ($data->result() as $row) {
            $output['ln_tbl_carros'] = $row->fk_carro_lc;
            $output['ln_tbl_linhas'] = $row->linha_saida . ' / ' . $row->linha_chegada;
            $output['ln_tbl_linhas_id'] = $row->id_ln;
            $output['ln_tbl_chegada'] = $row->tipo_chegadada_lc;
            $output['ln_tbl_chegada_id'] = $row->tipo_chegadada_lc;
            $output['ln_tbl_saidas'] = $row->tipo_saida_lc;
        }
        echo json_encode($output);
    }

    /**lista dados para a saida */
    public function registra_saida_do_carro_pelo_fiscal(int $id)
    {

        $this->form_validation->set_rules('ln_tbl_linhas_sai_id', 'linhas', 'required');
        $this->form_validation->set_rules('ln_tbl_sai_carros', 'carro', 'required');
        $this->form_validation->set_rules('ln_tbl_ocorrencias', 'ocorrências', 'required');


        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {

            date_default_timezone_set('America/Sao_Paulo');

            $query = $this->db->query('SELECT MAX(id_tbl) as id FROM atividades_trabalhos WHERE fk_linha_tbl = "' . $id . '" ');
            $row = $query->row();
            $id_now = $row->id;

            $hours = date('H:i');
            $data = array(
                'fk_linha_tbl' => $this->input->post('ln_tbl_linhas_sai_id'),
                'fk_carro_tbl' => $this->input->post('ln_tbl_sai_carros'),
                'hora_saida_tbl' => $hours,
                'fk_ocorrencias_tbl' => $this->input->post('ln_tbl_ocorrencias')
            );

            $this->db->update('atividades_trabalhos', $data, array('id_tbl' => $id_now));
            echo json_encode(['success' => 'Registrada de saída realizado com sucesso.']);
        }
    }
    /**lista ocorrencias */
    public function listaOcorrencias_tbl()
    {
        $result = $this->db->get("ocorencias_tipos")->result();
        echo json_encode($result);
    }

    public function cadastraRegistroDaChegada()
    {
        $this->form_validation->set_rules('ln_tbl_chegada_tipo', 'tipo do regitro', 'required');
        $this->form_validation->set_rules('ln_tbl_linhas_id', 'linhas', 'required');
        $this->form_validation->set_rules('ln_tbl_carros', 'carro', 'required');
        $this->form_validation->set_rules('ln_tbl_ocorrencias', 'ocorrências', 'required');
        $this->form_validation->set_rules('user_fiscal_id', 'usuário', 'required');
        $this->form_validation->set_rules('ln_tbl_chegada_id', 'tipo chegada', 'required');


        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            $data = array(
                'fk_linha_tbl' => $this->input->post('ln_tbl_linhas_id'),
                'fk_carro_tbl' => $this->input->post('ln_tbl_carros'),
                'fk_usuario_fiscal_tbl' => $this->input->post('user_fiscal_id'),
                'fk_ocorrencias_tbl' => $this->input->post('ln_tbl_ocorrencias')
            );

            $this->db->insert('atividades_trabalhos', $data);
            echo json_encode(['success' => 'Chegada registrada com sucesso.']);
        }
    }

    /**LISTA TRABALHOS */
    public function get_lista_trabalhos()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $id = $this->session->userdata('user')['id'];
        $data_hoje = date("Y-m-d");
        $this->db->select('*');
        $this->db->from('atividades_trabalhos');
        $this->db->join('carro_frota', 'carro_frota.id_cr = atividades_trabalhos.fk_carro_tbl');
        $this->db->join('linhas', 'linhas.id_ln = atividades_trabalhos.fk_linha_tbl');
        $this->db->join('ocorencias_tipos', 'ocorencias_tipos.id_oc = atividades_trabalhos.fk_ocorrencias_tbl');
        $this->db->where('fk_usuario_fiscal_tbl', $id);
        $this->db->where('data_create_tbl >=', $data_hoje);
        $query = $this->db->get();

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                $r->id_tbl,
                $r->carro_codigo,
                $r->linha_saida . ' / ' . $r->linha_chegada,
                date("H:i", strtotime($r->data_create_tbl)),
                $r->hora_saida_tbl != '' ? date("H:i", strtotime($r->hora_saida_tbl)) : '--:--',
                $r->nome_ocorrencias_oc,
                '<button class="ver_acomnhamentos_id btn btn-primary btn-round" id="' . $r->id_tbl . '">
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

    /**ver acompnhamento */
    public function get_acomnhamentoRegistro(int $id)
    {
        $output = array();
        $data = $this->db->select('*')
            ->from('atividades_trabalhos')
            ->join('linhas', 'linhas.id_ln = atividades_trabalhos.fk_linha_tbl')
            ->join('carro_frota', 'carro_frota.id_cr = atividades_trabalhos.fk_carro_tbl')
            ->join('ocorencias_tipos', 'ocorencias_tipos.id_oc = atividades_trabalhos.fk_ocorrencias_tbl')
            ->where('id_tbl', $id)
            ->get()->result();

        foreach ($data as $row) {
            $output['acomp_linha'] = $row->linha_saida . ' / ' . $row->linha_chegada;
            $output['acomp_carro'] = $row->carro_codigo;
            $output['acomp_ocore'] = $row->nome_ocorrencias_oc;
            $output['acomp_h_cheg'] = date("H:i", strtotime($row->data_create_tbl));
            $output['acomp_h_saida'] = $row->hora_saida_tbl != NULL ? date("H:i", strtotime($row->hora_saida_tbl)) : '';
        }
        echo json_encode($output);
    }

    /**altera registro fiscais */
    public function altera_registro_hours_fiscal(int $id)
    {
        $this->form_validation->set_rules('acomp_h_cheg', 'hora de entrada', 'required');
        $this->form_validation->set_rules('acomp_h_saida', 'hora de saída', 'required');


        if ($this->form_validation->run() == FALSE) {
            $errors = validation_errors();
            echo json_encode(['error' => $errors]);
        } else {
            $data = array(
                'hora_chegada_tbl' => $this->input->post('acomp_h_cheg'),
                'hora_saida_tbl' => $this->input->post('acomp_h_saida')
            );

            $this->db->update('atividades_trabalhos', $data, array('id_tbl' => $id));
            echo json_encode(['success' => 'Alteração realizada com sucesso.']);
        }
    }

    public function get_espelho()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $data_hoje = date("Y-m-d");
        $query = $this->db->select('*')
            ->from('atividades_trabalhos')
            ->join('carro_frota', 'carro_frota.id_cr = atividades_trabalhos.fk_carro_tbl')
            ->join('linhas', 'linhas.id_ln = atividades_trabalhos.fk_linha_tbl')
            ->join('ocorencias_tipos', 'ocorencias_tipos.id_oc = atividades_trabalhos.fk_ocorrencias_tbl')
            ->where('data_create_tbl >=', $data_hoje)
            ->get();

        $data = [];

        foreach ($query->result() as $r) {
            $data[] = array(

                $r->carro_codigo,
                $r->linha_chegada.' / '.$r->linha_saida,
                date("H:i", strtotime($r->data_create_tbl)),
                $r->hora_saida_tbl == NULL ? "--:--" : $r->hora_saida_tbl,
                $r->nome_ocorrencias_oc
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

    /**contagem ocorrencias */
    public function total_ocoorencias()
    {
        $this->db->select('COUNT(fk_ocorrencias_tbl) AS total_ocorrencias');
        $this->db->from('atividades_trabalhos');
        $this->db->join('ocorencias_tipos', 'ocorencias_tipos.id_oc = atividades_trabalhos.fk_ocorrencias_tbl');
        $this->db->where('nome_ocorrencias_oc !=', 'Sem ocorrencias');
        $query = $this->db->get();
        $row = $query->row();
        echo $row->total_ocorrencias;
    }
}

/* End of file TrabalhosController.php */
