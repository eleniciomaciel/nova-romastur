<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_add_usuarios extends CI_Migration
{

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_nome' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'user_email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'user_login' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'user_senha' => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => TRUE,
            ),
            'user_status' => array(
                'type' => 'ENUM("0","1")',
                'default' => '0',
                'null' => FALSE
            ),
            'user_nivel' => array(
                'type' => 'ENUM("admin","fiscal","motorista", "gestor", "socios","agente_vales")',
                'default' => 'fiscal',
                'null' => FALSE
            ),
            'user_data_create' => array(
                'type'   => 'TIMESTAMP'
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('usuarios');
    }

    public function down()
    {
        $this->dbforge->drop_table('usuarios');
    }
}

/* End of file add_usuarios.php */
