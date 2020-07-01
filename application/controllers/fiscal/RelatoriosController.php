<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RelatoriosController extends CI_Controller {

    public function index()
    {
        $result = $this->db->order_by('id_ln', 'DESC')->get("linhas")->result();
        echo json_encode($result);
    }

}

/* End of file RelatoriosController.php */
