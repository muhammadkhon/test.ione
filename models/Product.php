<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id ID
 * @property int $marka_id Марка
 * @property int $model_id Модель
 * @property int $tip_dvigatelya_id Тип двигателя
 * @property int $privod_id Привод
 * @property int $kolichestvo Количество
 * @property float $price Цена
 * @property string $status Статус
 *
 * @property Marka $marka
 * @property Model $model
 * @property Privod $privod
 * @property TipDvigatelya $tipDvigatelya
 */
class Product extends \yii\db\ActiveRecord
{
    const STATUS_ON = 'on';
    const STATUS_OFF = 'off';
    const STATUS_DELETED = 'deleted';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['marka_id', 'model_id', 'tip_dvigatelya_id', 'privod_id', 'kolichestvo', 'price'], 'required'],
            [['id', 'marka_id', 'model_id', 'tip_dvigatelya_id', 'privod_id', 'kolichestvo'], 'integer'],
            [['price'], 'number'],
            [['status', 'privod'], 'string'],
            [['marka_id'], 'exist', 'skipOnError' => true, 'targetClass' => Marka::class, 'targetAttribute' => ['marka_id' => 'id']],
            [['model_id'], 'exist', 'skipOnError' => true, 'targetClass' => Model::class, 'targetAttribute' => ['model_id' => 'id']],
            [['privod_id'], 'exist', 'skipOnError' => true, 'targetClass' => Privod::class, 'targetAttribute' => ['privod_id' => 'id']],
            [['tip_dvigatelya_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipDvigatelya::class, 'targetAttribute' => ['tip_dvigatelya_id' => 'id']],
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
            'model_id' => 'Модель',
            'tip_dvigatelya_id' => 'Тип двигателя',
            'privod_id' => 'Привод',
            'kolichestvo' => 'Количество',
            'price' => 'Цена',
            'status' => 'Статус',
        ];
    }

    public function fields()
    {
        return [
            'id',
            'marka',
            'model',
            'tipDvigatelya',
            'privod',
            'kolichestvo',
            'price',
            'status'
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
     * Gets query for [[Model]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    /**
     * Gets query for [[Privod]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrivod()
    {
        return $this->hasOne(Privod::class, ['id' => 'privod_id']);
    }

    /**
     * Gets query for [[TipDvigatelya]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipDvigatelya()
    {
        return $this->hasOne(TipDvigatelya::class, ['id' => 'tip_dvigatelya_id']);
    }
}
