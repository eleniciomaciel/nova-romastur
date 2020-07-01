<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_add_carros extends CI_Migration
{

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_cr' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'carro_codigo' => array(
                'type'          => 'VARCHAR',
                'constraint'    => '30',
                'null'          => TRUE,
                'unique'        => TRUE
            ),
            'carro_placa' => array(
                'type'          => 'VARCHAR',
                'constraint'    => '15',
                'null'          => TRUE,
                'unique'        => TRUE
            ),
            'carro_data_create' => array(
                'type'   => 'TIMESTAMP'
            ),
        ));
        $this->dbforge->add_key('id_cr', TRUE);
        $this->dbforge->create_table('carro_frota');
    }

    public function down()
    {
        $this->dbforge->drop_table('carro_frota');
    }
}

/* End of file add_usuarios.php */
