<?php

namespace app\models;

/**
 * This is the model class for table "{{%cross}}".
 * @property string $id_cross
 * @property string $id_distr Дистрибьютор
 * @property string $name Название
 * @property string $type Тип поля
 * @property string $id_inital Соответствие в БД
 * @property Distr $distr
 */
class Cross extends \yii\db\ActiveRecord
{
    const APTEKA = 1;
    const PRODUCT = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cross}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_distr', 'name', 'type', 'id_inital'], 'required'],
            [['id_distr', 'id_inital'], 'integer'],
            [['type'], 'integer', 'min' => 1, 'max' => 2],
            [['name'], 'string', 'max' => 255],
            [['id_distr', 'id_inital', 'type'], 'unique', 'targetAttribute' => ['id_distr', 'id_inital', 'type']],
            [
                ['id_distr'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Distr::className(),
                'targetAttribute' => ['id_distr' => 'id_distr']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cross' => 'Id Cross',
            'id_distr' => 'Дистрибьютор',
            'name' => 'Название',
            'type' => 'Тип поля',
            'id_inital' => 'Соответствие в БД',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistr()
    {
        return $this->hasOne(Distr::className(), ['id_distr' => 'id_distr']);
    }

    public function getApteka()
    {
        return $this->hasOne(Apteka::className(), ['id_apteka' => 'id_inital']);
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id_product' => 'id_inital']);
    }
}
