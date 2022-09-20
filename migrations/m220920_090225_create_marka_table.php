<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%marka}}`.
 */
class m220920_090225_create_marka_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%marka}}', [
            'id' => $this->primaryKey()->comment('ID'),
            'name' => $this->string(50)->notNull()->comment('Марка'),
            'status' => "ENUM('on','off','deleted') NOT NULL DEFAULT 'off'  COMMENT 'Статус'",
        ], $tableOptions);

        $this->insert('marka', [
            'name' => 'Lexus',
            'status' => 'on',
        ]);

        $this->insert('marka', [
            'name' => 'Toyota',
            'status' => 'on',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%marka}}');
    }
}
