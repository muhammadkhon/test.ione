<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tip_dvigatelya}}`.
 */
class m220920_092350_create_tip_dvigatelya_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%tip_dvigatelya}}', [
            'id' => $this->primaryKey()->comment('ID'),
            'name' => $this->string(50)->notNull()->comment('Тип двигателя'),
            'status' => "ENUM('on','off','deleted') NOT NULL DEFAULT 'off'  COMMENT 'Статус'",
        ], $tableOptions);

        $this->insert('tip_dvigatelya', [
            'name' => 'Бензин',
            'status' => 'on',
        ]);

        $this->insert('tip_dvigatelya', [
            'name' => 'Дизель',
            'status' => 'on',
        ]);

        $this->insert('tip_dvigatelya', [
            'name' => 'Гибрид',
            'status' => 'on',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tip_dvigatelya}}');
    }
}
