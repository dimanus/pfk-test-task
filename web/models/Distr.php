<?php

namespace app\models;

/**
 * This is the model class for table "{{%distr}}".
 * @property string $id_distr
 * @property string $name Название
 * @property Cross[] $crosses
 * @property Sells[] $sells
 */
class Distr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%distr}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_distr' => 'Id Distr',
            'name' => 'Название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrosses()
    {
        return $this->hasMany(Cross::className(), ['id_distr' => 'id_distr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSells()
    {
        return $this->hasMany(Sells::className(), ['id_distr' => 'id_distr']);
    }
}
