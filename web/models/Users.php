<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%users}}".
 * @property int $id
 * @property string $username
 * @property string $token
 * @property int $created_at
 * @property string $code
 * @property Rank[] $ranks
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * @return int
     */
    public static function generateUser()
    {
        $user_id = 0;
        $req = Yii::$app->request;
        $user = new self();
        $user->username = 'user' . ((int)self::find()->max('id') + 1);
        $user->token = md5($req->userAgent . $req->userIP) . $user->username;
        $user->code = date('Y-m-d') . $user->username;
        $user->created_at = time();
        if ($user->save()) {
            $user_id = $user->id;
        }

        return $user_id;
    }

    /**
     * @return array
     */
    public function toUserArray()
    {
        return [
            'id'          => $this->id,
            'username'    => $this->username,
            'authKey'     => $this->code,
            'accessToken' => $this->token,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'token', 'created_at', 'code'], 'required'],
            [['created_at'], 'integer'],
            [['username', 'token', 'code'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'username'   => 'Username',
            'token'      => 'Token',
            'created_at' => 'Created At',
            'code'       => 'Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRanks()
    {
        return $this->hasMany(Rank::className(), ['uid' => 'id']);
    }
}
