<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_add_itinerarios extends CI_Migration
{

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_it' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'fk_linha_saida_it' => array(
                'type'          => 'INT',
                'constraint'    => '11',
                'null'          => TRUE
            ),
            'fk_linha_chegada_it' => array(
                'type'          => 'INT',
                'constraint'    => '11',
                'null'          => TRUE
            ),
            'fk_hora_saida_it' => array(
                'type'          => 'TIME',
                'null'          => TRUE
            ),
            'dias_it' => array(
                'type' => 'ENUM("ss","dm")',
                'default' => 'ss',
                'null' => FALSE
            ),
            'data_create_it' => array(
                'type'   => 'TIMESTAMP'
            ),
        ));
        $this->dbforge->add_key('id_it', TRUE);
        $this->dbforge->create_table('itinerarios_onibus');
    }

    public function down()
    {
        $this->dbforge->drop_table('itinerarios_onibus');
    }
}

/* End of file add_usuarios.php */
