<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "model".
 *
 * @property int $id ID
 * @property int $marka_id Марка
 * @property string $name Модель
 * @property string $status Статус
 *
 * @property Marka $marka
 * @property Product[] $products
 */
class Model extends \yii\db\ActiveRecord
{
    const STATUS_ON = 'on';
    const STATUS_OFF = 'off';
    const STATUS_DELETED = 'deleted';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'model';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['marka_id', 'name'], 'required'],
            [['marka_id'], 'integer'],
            [['status'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['marka_id'], 'exist', 'skipOnError' => true, 'targetClass' => Marka::class, 'targetAttribute' => ['marka_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'marka_id' => 'Марка',
            'name' => 'Модель',
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
     * Gets query for [[Marka]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarka()
    {
        return $this->hasOne(Marka::class, ['id' => 'marka_id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['model_id' => 'id']);
    }
}
