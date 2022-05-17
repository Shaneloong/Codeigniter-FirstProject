<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTask extends Migration
{
    public function up() // Making changes needed to create the table
    {
        //
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'description' => [
                'type'           => 'VARCHAR',
                'constraint'     => '128',
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('task');
    }

    public function down() // Undoing or rolling back these changes
    {
        //
        $this->forge->dropTable('task');
    }
}
 