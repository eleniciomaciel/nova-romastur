<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_add_linhas_carros extends CI_Migration
{

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_lc' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'fk_usuario_lc' => array(
                'type'          => 'INT',
                'constraint'    => '11',
                'null'          => TRUE
            ),
            'fk_carro_lc' => array(
                'type'          => 'INT',
                'constraint'    => '11',
                'null'          => TRUE
            ),
            'fk_linha_lc' => array(
                'type'          => 'INT',
                'constraint'    => '11',
                'null'          => TRUE
            ),
            'tipo_chegadada_lc' => array(
                'type'          => 'VARCHAR',
                'constraint'    => '10',
                'default'       => 'Chegada',
                'null'          => FALSE
            ),
            'tipo_saida_lc' => array(
                'type'          => 'VARCHAR',
                'constraint'    => '10',
                'default'       => 'Saída',
                'null'          => FALSE
            ),
            'linha_data_create_lc' => array(
                'type'   => 'TIMESTAMP'
            ),
        ));
        $this->dbforge->add_key('id_lc', TRUE);
        $this->dbforge->create_table('linhas_onibus');
    }

    public function down()
    {
        $this->dbforge->drop_table('linhas_onibus');
    }
}

/* End of file add_usuarios.php */
