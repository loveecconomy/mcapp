<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_answer extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'answer_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'report_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE
            ),
            'question_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE
            ),
            'answer' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            )
        ));
        $this->dbforge->add_key('answer_id', TRUE);
        $this->dbforge->create_table('answers');
    }

    public function down()
    {
        $this->dbforge->drop_table('answers');
    }
}