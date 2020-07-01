<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_export_model extends CI_Model {

    public function exportList() {

        $fiscal         = $this->input->post('id_uss_relat', TRUE);
        $data_inicial   = $this->input->post('data_consulta', TRUE);
        $selectTipo     = $this->input->post('select_linhas_reatorios_get_all', TRUE);

        if ($selectTipo == 'todas-linhas') {
            $this->db->select('*');
            $this->db->from('atividades_trabalhos');
            $this->db->join('linhas', 'linhas.id_ln = atividades_trabalhos.fk_linha_tbl');
            $this->db->join('carro_frota', 'carro_frota.id_cr = atividades_trabalhos.fk_carro_tbl');
            $this->db->join('usuarios', 'usuarios.id = atividades_trabalhos.fk_usuario_fiscal_tbl');
            $this->db->join('ocorencias_tipos', 'ocorencias_tipos.id_oc = atividades_trabalhos.fk_ocorrencias_tbl');
            $this->db->where('fk_usuario_fiscal_tbl', $fiscal);
            $this->db->where('data_create_tbl >=', $data_inicial);
            $this->db->order_by('data_create_tbl', 'desc');
            
        
            $query = $this->db->get();
            return $query->result();
        }else {
            $this->db->select('*');
            $this->db->from('atividades_trabalhos');
            $this->db->join('linhas', 'linhas.id_ln = atividades_trabalhos.fk_linha_tbl');
            $this->db->join('carro_frota', 'carro_frota.id_cr = atividades_trabalhos.fk_carro_tbl');
            $this->db->join('usuarios', 'usuarios.id = atividades_trabalhos.fk_usuario_fiscal_tbl');
            $this->db->join('ocorencias_tipos', 'ocorencias_tipos.id_oc = atividades_trabalhos.fk_ocorrencias_tbl');
            $this->db->where('fk_usuario_fiscal_tbl', $fiscal);
            $this->db->where('fk_linha_tbl', $selectTipo);
            $this->db->where('data_create_tbl >=', $data_inicial);
            
            $query = $this->db->get();
            return $query->result();
        }

    }

}

/* End of file Excel_export_model.php */
