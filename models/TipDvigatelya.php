<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tip_dvigatelya".
 *
 * @property int $id ID
 * @property string $name Тип двигателя
 * @property string $status Статус
 *
 * @property Product[] $products
 */
class TipDvigatelya extends \yii\db\ActiveRecord
{
    const STATUS_ON = 'on';
    const STATUS_OFF = 'off';
    const STATUS_DELETED = 'deleted';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tip_dvigatelya';
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
            'name' => 'Тип двигателя',
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
        return $this->hasMany(Product::class, ['tip_dvigatelya_id' => 'id']);
    }
}
