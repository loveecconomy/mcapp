<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_report extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'report_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE
            ),
            'questionaire_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'report_date' => array(
                'type' => 'DATETIME',
                'default'    => '2018-08-13 06:00:00',
                'null' => TRUE,
            ),
            'completed' => array(
                'type' => 'BOOLEAN',
                'default' => FALSE
            ),
        ));
        $this->dbforge->add_key('report_id', TRUE);
        $this->dbforge->create_table('reports');
    }

    public function down()
    {
        $this->dbforge->drop_table('reports');
    }
}