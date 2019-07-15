<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%rank}}".
 * @property int $id
 * @property int $uid
 * @property int $rank
 * @property int $created_at
 * @property Users $u
 */
class Rank extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%rank}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'rank', 'created_at'], 'integer'],
            [
                ['uid'],
                'exist',
                'skipOnError'     => true,
                'targetClass'     => Users::className(),
                'targetAttribute' => ['uid' => 'id'],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'uid'        => 'Uid',
            'rank'       => 'Rank',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getU()
    {
        return $this->hasOne(Users::className(), ['id' => 'uid']);
    }
}
