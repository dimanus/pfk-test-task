<?php

namespace app\models;

/**
 * This is the model class for table "{{%apteka}}".
 * @property string $id_apteka
 * @property string $name Название
 * @property Sells[] $sells
 */
class Apteka extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%apteka}}';
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
            'id_apteka' => 'Id Apteka',
            'name' => 'Название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSells()
    {
        return $this->hasMany(Sells::className(), ['id_apteka' => 'id_apteka']);
    }
}
