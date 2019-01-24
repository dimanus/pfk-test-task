<?php

namespace app\models;

/**
 * This is the model class for table "{{%sells}}".
 * @property int $id_sell
 * @property string $id_distr Дистрибьютор
 * @property string $id_product Товар
 * @property string $id_apteka Аптека
 * @property int $quantity Кол-во
 * @property string $dt_create Дата импорта
 * @property Apteka $apteka
 * @property Distr $distr
 * @property Product $product
 */
class Sells extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sells}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_distr', 'id_product', 'id_apteka', 'quantity', 'dt_create'], 'required'],
            [['id_distr', 'id_product', 'id_apteka', 'quantity', 'dt_create'], 'integer'],
            [
                ['id_distr', 'id_product', 'id_apteka'],
                'unique',
                'targetAttribute' => ['id_distr', 'id_product', 'id_apteka']
            ],
            [
                ['id_apteka'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Apteka::className(),
                'targetAttribute' => ['id_apteka' => 'id_apteka']
            ],
            [
                ['id_distr'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Distr::className(),
                'targetAttribute' => ['id_distr' => 'id_distr']
            ],
            [
                ['id_product'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Product::className(),
                'targetAttribute' => ['id_product' => 'id_product']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sell' => 'Id Sell',
            'id_distr' => 'Дистрибьютор',
            'id_product' => 'Товар',
            'id_apteka' => 'Аптека',
            'quantity' => 'Кол-во',
            'dt_create' => 'Дата импорта',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApteka()
    {
        return $this->hasOne(Apteka::className(), ['id_apteka' => 'id_apteka']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistr()
    {
        return $this->hasOne(Distr::className(), ['id_distr' => 'id_distr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id_product' => 'id_product']);
    }
}
