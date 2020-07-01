<?php

defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{

    public function linha_saindo_agora()
    {
        setlocale(LC_TIME, 'pt');
        date_default_timezone_set('America/Sao_Paulo');

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $data_hoje = date("Y-m-d");
        $query = $this->db->select('*')
                            ->from('atividades_trabalhos')
                            ->join('linhas', 'linhas.id_ln = atividades_trabalhos.fk_linha_tbl')
                            ->join('carro_frota', 'carro_frota.id_cr = atividades_trabalhos.fk_carro_tbl')
                            ->where('data_create_tbl >=', $data_hoje)
                            ->get();

        $data = [];

        foreach ($query->result() as $r) {
            $data[] = array(
                $r->linha_chegada.' / '.$r->linha_saida,
                date("H:i", strtotime($r->hora_saida_tbl)),
                $r->linha_chegada,
                $r->carro_codigo,
                strftime("%A", strtotime($r->data_create_tbl))
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

    public function linha_itinerario_fixo()
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
                date("H:i", strtotime($r->fk_hora_saida_it)),
                $r->l_chegada,
                $r->dias_it == 'ss' ? 'Segunda/Sábado' : 'Domingos',
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

    public function seleciona_cidades_curriculos($id) { 
        $result = $this->db->where("estado",$id)->get("cidade")->result();
        echo json_encode($result);
    }

    public function envia_curriculoUsuario()
    {
        $this->form_validation->set_rules('name_cur', 'nome completo', 'required');
        $this->form_validation->set_rules('phone_cur', 'telefone', 'required');
        $this->form_validation->set_rules('email_cur', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('estado_ct', 'estado', 'required');
        $this->form_validation->set_rules('city', 'cidade', 'required');
        $this->form_validation->set_rules('endereco_cur', 'endereço', 'required');
        $this->form_validation->set_rules('bairro_cur', 'bairro', 'required');
        $this->form_validation->set_rules('escola_cur', 'escolaridade', 'required');
        $this->form_validation->set_rules('pretende_vagas_cur', 'vagas pretendida', 'required');
        $this->form_validation->set_rules('message_cur', 'sobre você', 'required');


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
           echo json_encode(['success'=>'Currículo enviado com sucesso.']);
        }
    }
}

/* End of file HomeController.php */
