<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_sheep extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'sheep_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'sheep_fullname' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'sheep_phone' => array(
                'type' => 'VARCHAR',
                'constraint' => '12',
            ),
            'sheep_address' => array(
                'type' => 'VARCHAR',
                'constraint' => '300',
            ),
            'sheep_leader' => array(
                'type' => 'INT',
                'null' => TRUE
            ),
            'sheep__leader_remark' => array(
                'type' => 'TEXT',
                'null' => FALSE,
            ),
        ));
        $this->dbforge->add_key('sheep_id', TRUE);
        $this->dbforge->create_table('sheeps');
    }

    public function down()
    {
        $this->dbforge->drop_table('sheeps');
    }
}