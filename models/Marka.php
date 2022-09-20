<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "marka".
 *
 * @property int $id ID
 * @property string $name Марка
 * @property string $status Статус
 *
 * @property Model[] $models
 */
class Marka extends \yii\db\ActiveRecord
{
    const STATUS_ON = 'on';
    const STATUS_OFF = 'off';
    const STATUS_DELETED = 'deleted';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marka';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'string'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Марка',
            'status' => 'Статус',
        ];
    }

    public function fields()
    {
        return [
            'id',
            'name',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['marka_id' => 'id']);
    }

    /**
     * Gets query for [[Models]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModels()
    {
        return $this->hasMany(Model::class, ['marka_id' => 'id']);
    }
}
