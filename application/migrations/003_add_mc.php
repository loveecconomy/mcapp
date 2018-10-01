<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_mc extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'mc_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'mc_pastor' => array(
                'type' => 'INT',
                'constraint' => 5,
            ),
            'mc_address' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'mc_meeting' => array(
                'type' => 'VARCHAR',
                'constraint' => '300',
            ),
            'mc_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '300',
            ),
            'mc_password' => array(
                'type' => 'VARCHAR',
                'constraint' => '300',
            ),
            'mc_date_added' => array(
                'type' => 'DATETIME',
                'default'    => '2018-08-13 06:00:00',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('mc_id', TRUE);
        $this->dbforge->create_table('mcs');
    }

    public function down()
    {
        $this->dbforge->drop_table('mcs');
    }
}