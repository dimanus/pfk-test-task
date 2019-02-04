<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%distr_import_template}}".
 * @property string $id
 * @property string $id_distr Дистрибьютер
 * @property string $template Шаблон импорта
 * @property string $split Разделитель
 * @property string $header Пример шапки
 * @property Distr $distr
 */
class DistrImportTemplate extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%distr_import_template}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_distr', 'template', 'split', 'header'], 'required'],
            [['id_distr'], 'integer'],
            [['template', 'header'], 'string', 'max' => 200],
            [['split'], 'string', 'max' => 10],
            [
                ['id_distr'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Distr::class,
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
            'id' => 'ID',
            'id_distr' => 'Дистрибьютер',
            'template' => 'Шаблон импорта',
            'split' => 'Разделитель',
            'header' => 'Пример шапки',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistr()
    {
        return $this->hasOne(Distr::class, ['id_distr' => 'id_distr']);
    }
}
