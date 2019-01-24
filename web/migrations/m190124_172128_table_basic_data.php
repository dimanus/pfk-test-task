<?php

use yii\db\Migration;

/**
 * Class m190124_172128_table_basic_data
 */
class m190124_172128_table_basic_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%apteka}}',['name'],[
            ['36.6',],
            ['Нео-Фарм'],
            ['Здоров.ру'],
            ['Ригла'],
            ['Имплозия'],
            ['Планета здоровья'],
            ['Первая Помощь'],
            ['Фармакопейка'],
            ['Фармаимпекс'],
            ['Мелодия здоровья'],
            ['Аптека-Таймер'],
            ['Самсон-Фарма'],
            ['Апрель'],
            ['Классика'],
            ['Новая аптека'],
            ['Невис']
        ]);

        $this->batchInsert('{{%distr}}',['name'],[
            ['Дистрибьютор 1'],
            ['Дистрибьютор 2'],
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%apteka}}');
        $this->delete('{{%distr}}');
    }


}
