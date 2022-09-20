<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m220920_112156_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey()->comment('ID'),
            'marka_id' => $this->integer(11)->notNull()->comment('Марка'),
            'model_id' => $this->integer(11)->notNull()->comment('Модель'),
            'tip_dvigatelya_id' => $this->integer(11)->notNull()->comment('Тип двигателя'),
            'privod_id' => $this->integer(11)->notNull()->comment('Привод'),
            'kolichestvo' => $this->integer()->defaultValue(0)->notNull()->comment('Количество'),
            'price' => $this->decimal(9,2)->notNull()->comment('Цена'),
            'status' => "ENUM('on','off','deleted') NOT NULL DEFAULT 'off'  COMMENT 'Статус'",
        ], $tableOptions);

        // добавление индексов

        $this->createIndex(
            'idx-product-marka_id',
            'product',
            'marka_id'
        );

        $this->createIndex(
            'idx-product-model_id',
            'product',
            'model_id'
        );

        $this->createIndex(
            'idx-product-tip_dvigatelya_id',
            'product',
            'tip_dvigatelya_id'
        );

        $this->createIndex(
            'idx-product-privod_id',
            'product',
            'privod_id'
        );

        // добавление связей
        $this->addForeignKey(
            'fk-product-marka_id',
            'product',
            'marka_id',
            'marka',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-product-model_id',
            'product',
            'model_id',
            'model',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-product-tip_dvigatelya_id',
            'product',
            'tip_dvigatelya_id',
            'tip_dvigatelya',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-product-privod_id',
            'product',
            'privod_id',
            'privod',
            'id',
            'CASCADE'
        );

        //добавление данных
        $this->insert('product', [
            'marka_id' => 1,
            'model_id' => 1,
            'tip_dvigatelya_id' => 1,
            'privod_id' => 1,
            'kolichestvo' => 2,
            'price' => 600000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 1,
            'model_id' => 2,
            'tip_dvigatelya_id' => 1,
            'privod_id' => 1,
            'kolichestvo' => 2,
            'price' => 510000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 2,
            'model_id' => 3,
            'tip_dvigatelya_id' => 1,
            'privod_id' => 1,
            'kolichestvo' => 2,
            'price' => 600000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 2,
            'model_id' => 4,
            'tip_dvigatelya_id' => 1,
            'privod_id' => 1,
            'kolichestvo' => 2,
            'price' => 510000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 1,
            'model_id' => 1,
            'tip_dvigatelya_id' => 2,
            'privod_id' => 1,
            'kolichestvo' => 2,
            'price' => 600000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 1,
            'model_id' => 2,
            'tip_dvigatelya_id' => 2,
            'privod_id' => 1,
            'kolichestvo' => 2,
            'price' => 510000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 2,
            'model_id' => 3,
            'tip_dvigatelya_id' => 2,
            'privod_id' => 1,
            'kolichestvo' => 2,
            'price' => 600000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 2,
            'model_id' => 4,
            'tip_dvigatelya_id' => 2,
            'privod_id' => 1,
            'kolichestvo' => 2,
            'price' => 510000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 1,
            'model_id' => 1,
            'tip_dvigatelya_id' => 3,
            'privod_id' => 1,
            'kolichestvo' => 2,
            'price' => 600000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 1,
            'model_id' => 2,
            'tip_dvigatelya_id' => 3,
            'privod_id' => 1,
            'kolichestvo' => 2,
            'price' => 510000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 2,
            'model_id' => 3,
            'tip_dvigatelya_id' => 3,
            'privod_id' => 1,
            'kolichestvo' => 2,
            'price' => 600000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 2,
            'model_id' => 4,
            'tip_dvigatelya_id' => 3,
            'privod_id' => 1,
            'kolichestvo' => 2,
            'price' => 510000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 1,
            'model_id' => 1,
            'tip_dvigatelya_id' => 1,
            'privod_id' => 2,
            'kolichestvo' => 2,
            'price' => 600000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 1,
            'model_id' => 2,
            'tip_dvigatelya_id' => 1,
            'privod_id' => 2,
            'kolichestvo' => 2,
            'price' => 510000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 2,
            'model_id' => 3,
            'tip_dvigatelya_id' => 1,
            'privod_id' => 2,
            'kolichestvo' => 2,
            'price' => 600000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 2,
            'model_id' => 4,
            'tip_dvigatelya_id' => 1,
            'privod_id' => 2,
            'kolichestvo' => 2,
            'price' => 510000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 1,
            'model_id' => 1,
            'tip_dvigatelya_id' => 2,
            'privod_id' => 2,
            'kolichestvo' => 2,
            'price' => 600000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 1,
            'model_id' => 2,
            'tip_dvigatelya_id' => 2,
            'privod_id' => 2,
            'kolichestvo' => 2,
            'price' => 510000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 2,
            'model_id' => 3,
            'tip_dvigatelya_id' => 2,
            'privod_id' => 2,
            'kolichestvo' => 2,
            'price' => 600000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 2,
            'model_id' => 4,
            'tip_dvigatelya_id' => 2,
            'privod_id' => 2,
            'kolichestvo' => 2,
            'price' => 510000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 1,
            'model_id' => 1,
            'tip_dvigatelya_id' => 3,
            'privod_id' => 2,
            'kolichestvo' => 2,
            'price' => 600000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 1,
            'model_id' => 2,
            'tip_dvigatelya_id' => 3,
            'privod_id' => 2,
            'kolichestvo' => 2,
            'price' => 510000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 2,
            'model_id' => 3,
            'tip_dvigatelya_id' => 3,
            'privod_id' => 2,
            'kolichestvo' => 2,
            'price' => 600000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 2,
            'model_id' => 4,
            'tip_dvigatelya_id' => 3,
            'privod_id' => 2,
            'kolichestvo' => 2,
            'price' => 510000.00,
            'status' => 'on',
        ]);

        $this->insert('product', [
            'marka_id' => 1,
            'model_id' => 1,
            'tip_dvigatelya_id' => 3,
            'privod_id' => 2,
            'kolichestvo' => 2,
            'price' => 710000.00,
            'status' => 'on',
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
