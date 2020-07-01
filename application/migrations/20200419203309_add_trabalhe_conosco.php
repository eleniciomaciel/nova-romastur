<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_add_trabalhe_conosco extends CI_Migration
{

    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_ct' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nome_completo_ct' => array(
                'type'          => 'VARCHAR',
                'constraint'    => '100',
                'null'          => TRUE,
                'unique'        => TRUE
            ),
            'email_ct' => array(
                'type'          => 'VARCHAR',
                'constraint'    => '60',
                'null'          => FALSE,
                'unique'        => TRUE
            ),
            'telefone_ct' => array(
                'type'          => 'VARCHAR',
                'constraint'    => '20',
                'null'          => FALSE
            ),
            'fk_estados_ct' => array(
                'type'          => 'INT',
                'constraint'    => '11',
                'null'          => TRUE
            ),
            'fk_cidades_ct' => array(
                'type'          => 'INT',
                'constraint'    => '11',
                'null'          => TRUE
            ),
            'bairro_ct' => array(
                'type'          => 'VARCHAR',
                'constraint'    => '50',
                'null'          => TRUE
            ),
            'endereco_ct' => array(
                'type'          => 'VARCHAR',
                'constraint'    => '100',
                'null'          => TRUE
            ),
            'arquivo_ct' => array(
                'type'          => 'VARCHAR',
                'constraint'    => '100',
                'null'          => TRUE
            ),
            'escolaridade_ct' => array(
                'type' => 'ENUM("Fundamental","Médio","Superior graduação","Superior tecnologo","Técnico")',
                'default' => 'Fundamental',
                'null' => FALSE
            ),'vaga_pretendida_ct' => array(
                'type'          => 'VARCHAR',
                'constraint'    => '50',
                'null'          => TRUE
            ),
            'description_ct' => array(
                'type' => 'TEXT',
                'null' => TRUE,
            ),
            'data_create_ct' => array(
                'type'   => 'TIMESTAMP'
            ),
        ));
        $this->dbforge->add_key('id_ct', TRUE);
        $this->dbforge->create_table('cadastros_curriculos');
    }

    public function down()
    {
        $this->dbforge->drop_table('cadastros_curriculos');
    }
}

/* End of file add_usuarios.php */
