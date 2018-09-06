<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_question extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'question_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'question' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'question_answer_field' => array(
                'type' => 'DATETIME',
                'default'    => '2018-08-13 06:00:00',
                'null' => TRUE,
            ),
            'questionaire_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE
            ),
        ));
        $this->dbforge->add_key('question_id', TRUE);
        $this->dbforge->create_table('questions');
    }

    public function down()
    {
        $this->dbforge->drop_table('questions');
    }
}