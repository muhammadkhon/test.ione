<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%model}}`.
 */
class m220920_090804_create_model_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%model}}', [
            'id' => $this->primaryKey()->comment('ID'),
            'marka_id' => $this->integer(11)->notNull()->comment('Марка'),
            'name' => $this->string(50)->notNull()->comment('Модель'),
            'status' => "ENUM('on','off','deleted') NOT NULL DEFAULT 'off'  COMMENT 'Статус'",
        ], $tableOptions);

        $this->createIndex(
            'idx-model-marka_id',
            'model',
            'marka_id'
        );

        $this->addForeignKey(
            'fk-model-marka_id',
            'model',
            'marka_id',
            'marka',
            'id',
            'CASCADE'
        );

        $this->insert('model', [
            'marka_id' => 1,
            'name' => 'ES',
            'status' => 'on',
        ]);

        $this->insert('model', [
            'marka_id' => 1,
            'name' => 'GX',
            'status' => 'on',
        ]);

        $this->insert('model', [
            'marka_id' => 2,
            'name' => 'Camry',
            'status' => 'on',
        ]);

        $this->insert('model', [
            'marka_id' => 2,
            'name' => 'Corolla',
            'status' => 'on',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-model-marka_id',
            'model'
        );

        $this->dropIndex(
            'idx-model-marka_id',
            'model'
        );

        $this->dropTable('{{%model}}');
    }
}
