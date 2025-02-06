<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Devices extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'device_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'latitude' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'longitude' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'location' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('devices');
    }

    public function down()
    {
        $this->forge->dropTable('devices');
    }
}
