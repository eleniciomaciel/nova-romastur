<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_avisos extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'avs_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'avs_assunto_title' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
            ),
            'avs_description' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'avs_status_de_leitura' => array(
                'type' => 'ENUM("0","1")',
                'default' => '0',
                'null' => FALSE
            ),
            'avs_status_de_visibilidade' => array(
                'type' => 'ENUM("0","1")',
                'default' => '0',
                'null' => FALSE
            ),
            'avs_data_create_lc' => array(
                'type'   => 'TIMESTAMP'
            ),
        ));
        $this->dbforge->add_key('avs_id', TRUE);
        $this->dbforge->create_table('avisos_fiscais');
    }

    public function down()
    {
        $this->dbforge->drop_table('avisos_fiscais');
    }
}
