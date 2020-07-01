<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_add_linhas extends CI_Migration
{

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_ln' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'linha_saida' => array(
                'type'          => 'VARCHAR',
                'constraint'    => '60',
                'null'          => TRUE
            ),
            'linha_chegada' => array(
                'type'          => 'VARCHAR',
                'constraint'    => '60',
                'null'          => TRUE
            ),
            'linha_data_create' => array(
                'type'   => 'TIMESTAMP'
            ),
        ));
        $this->dbforge->add_key('id_ln', TRUE);
        $this->dbforge->create_table('linhas');
    }

    public function down()
    {
        $this->dbforge->drop_table('linhas');
    }
}

/* End of file add_usuarios.php */
