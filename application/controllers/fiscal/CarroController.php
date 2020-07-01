<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CarroController extends CI_Controller {

    public function index()
    {
        $this->form_validation->set_rules('numero_carro', 'número do carro', 'required|is_unique[carro_frota.carro_codigo]|max_length[10]');
        $this->form_validation->set_rules('placa_carro', 'placa do carro', 'required|is_unique[carro_frota.carro_placa]|max_length[8]');


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $data = array(
                'carro_codigo' => $this->input->post('numero_carro'),
                'carro_placa' => $this->input->post('placa_carro')
            );
            $this->db->insert('carro_frota', $data);
           echo json_encode(['success'=>'Carro adicionado com sucesso.']);
        }
    }

    /**lista carro */
    public function get_listaTodosCarros()
   {
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      $query = $this->db->get("carro_frota");
      $data = [];
      foreach($query->result() as $r) {
           $data[] = array(
                $r->id_cr,
                $r->carro_codigo,
                $r->carro_placa,
                '<button type="button" class="viewCarroOne btn btn-warning" id="'. $r->id_cr.'">Alterar</button>'
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

   /**visualiza o carro */
   public function visulizaCarroOne(int $id)
   {
    $output = array();  
    $data = $this->db->get_where('carro_frota', array('id_cr' => $id));
    foreach($data->result() as $row)  
    {  
         $output['ft_car_numero'] = $row->carro_codigo;  
         $output['ft_car_placa'] = $row->carro_placa;     
    }  
    echo json_encode($output);
   }

   /**altera dados do carro */
   public function alteraCarroOne(int $id)
   {
    $this->form_validation->set_rules('ft_car_numero', 'número do carro', 'required|max_length[10]');
    $this->form_validation->set_rules('ft_car_placa', 'placa do acarro', 'required|max_length[8]');


    if ($this->form_validation->run() == FALSE){
        $errors = validation_errors();
        echo json_encode(['error'=>$errors]);
    }else{
        $data = array(
            'carro_codigo' => strtoupper($this->input->post('ft_car_numero')),
            'carro_placa' => strtolower($this->input->post('ft_car_placa'))
        );
        $this->db->update('carro_frota', $data, array('id_cr' => $id));
       echo json_encode(['success'=>'Carro alterado com sucesso.']);
    }
   }

}

/* End of file CarroController.php */
