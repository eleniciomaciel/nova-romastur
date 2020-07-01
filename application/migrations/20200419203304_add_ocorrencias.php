<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_add_ocorrencias extends CI_Migration
{

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_oc' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nome_ocorrencias_oc' => array(
                'type'          => 'VARCHAR',
                'constraint'    => '50',
                'null'          => TRUE
            ),
            'data_create_oc' => array(
                'type'   => 'TIMESTAMP'
            ),
        ));
        $this->dbforge->add_key('id_oc', TRUE);
        $this->dbforge->create_table('ocorencias_tipos');
        //$this->db->query('ALTER TABLE ocorencias_tipos ADD FOREIGN KEY(fk_usuario_oc) REFERENCES usuarios(id) ON DELETE CASCADE ON UPDATE CASCADE;');
    }

    public function down()
    {
        $this->dbforge->drop_table('ocorencias_tipos');
    }
}

/* End of file add_usuarios.php */
