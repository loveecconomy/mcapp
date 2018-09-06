<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_user extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_fname' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'user_lname' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'user_mc' => array(
                'type' => 'INT',
                'constraint' => 5,
            ),
            'user_role' => array(
                'type' => 'ENUM("leader","elder","pastor")',
                'default' => 'leader',
                'null' => FALSE
            ),
            'user_password' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            )
        ));
        $this->dbforge->add_key('user_id', TRUE);
        $this->dbforge->create_table('users');
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}