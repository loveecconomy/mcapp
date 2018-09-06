<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_questionaire extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'questionaire_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'questionaire_title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'questionaire_date_created' => array(
                'type' => 'DATETIME',
                'default'    => '2018-08-13 06:00:00',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('questionaire_id', TRUE);
        $this->dbforge->create_table('questionaires');
    }

    public function down()
    {
        $this->dbforge->drop_table('questionaires');
    }
}