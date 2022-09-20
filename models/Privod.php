<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "privod".
 *
 * @property int $id ID
 * @property string $name Привод
 * @property string $status Статус
 *
 * @property Product[] $products
 */
class Privod extends \yii\db\ActiveRecord
{
    const STATUS_ON = 'on';
    const STATUS_OFF = 'off';
    const STATUS_DELETED = 'deleted';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'privod';
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
            'name' => 'Привод',
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
        return $this->hasMany(Product::class, ['privod_id' => 'id']);
    }
}
