<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%privod}}`.
 */
class m220920_093818_create_privod_table extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%privod}}', [
            'id' => $this->primaryKey()->comment('ID'),
            'name' => $this->string(50)->notNull()->comment('Привод'),
            'status' => "ENUM('on','off','deleted') NOT NULL DEFAULT 'off'  COMMENT 'Статус'",
        ], $tableOptions);

        $this->insert('privod', [
            'name' => 'Полный',
            'status' => 'on',
        ]);

        $this->insert('privod', [
            'name' => 'Передний',
            'status' => 'on',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%privod}}');
    }
}
