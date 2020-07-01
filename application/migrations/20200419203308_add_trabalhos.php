<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_add_trabalhos extends CI_Migration
{

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_tbl' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'fk_linha_tbl' => array(
                'type'          => 'INT',
                'constraint'    => '11',
                'null'          => TRUE
            ),
            'fk_carro_tbl' => array(
                'type'          => 'INT',
                'constraint'    => '11',
                'null'          => TRUE
            ),
            'hora_chegada_tbl' => array(
                'type'          => 'TIME',
                'null'          => TRUE
            ),
            'hora_saida_tbl' => array(
                'type'          => 'TIME',
                'null'          => TRUE
            ),
            'fk_usuario_fiscal_tbl' => array(
                'type'          => 'INT',
                'constraint'    => '11',
                'null'          => TRUE
            ),
            'fk_ocorrencias_tbl' => array(
                'type'          => 'INT',
                'constraint'    => '11',
                'null'          => TRUE
            ),
            'data_create_tbl' => array(
                'type'   => 'TIMESTAMP'
            ),
        ));
        $this->dbforge->add_key('id_tbl', TRUE);
        $this->dbforge->create_table('atividades_trabalhos');
    }

    public function down()
    {
        $this->dbforge->drop_table('atividades_trabalhos');
    }
}

/* End of file add_usuarios.php */
