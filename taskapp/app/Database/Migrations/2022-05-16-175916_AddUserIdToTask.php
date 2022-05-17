<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserIdToTask extends Migration
{
    public function up()
    {
        $this->forge->addColumn('task', [
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ]
        ]);

        $sql = "ALTER TABLE task ADD CONSTRAINT TASK_USER_ID_FK FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE";

        $this->db->simpleQuery($sql);

    }

    public function down()
    {
        $this->forge->dropForeignKey('task', 'TASK_USER_ID_FK');
        $this->forge->dropColumn('task', 'user_id');
    }
}
