<?php

use yii\db\Migration;

/**
 * Class m190712_143303_users
 */
class m190712_143303_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id'         => $this->primaryKey()->unsigned(),
            'username'   => $this->string(100)->notNull(),
            'token'      => $this->string(100)->notNull(),
            'created_at' => $this->integer()->unsigned()->notNull(),
            'code'       => $this->string(100)->notNull(),
        ]);
        $this->createTable('{{%rank}}', [
            'id'         => $this->primaryKey()->unsigned(),
            'uid'        => $this->integer()->unsigned(),
            'rank'       => $this->integer()->unsigned(),
            'created_at' => $this->integer()->unsigned(),
        ]);
        $this->createIndex('{{%rank_id_user}}', '{{%rank}}', ['id', 'uid']);
        $this->createIndex('{{%users_id_user}}', '{{%users}}', 'id');
        $this->addForeignKey(
            '{{%rank_fk_id_user}}',
            '{{%rank}}',
            'uid',
            '{{%users}}',
            'id',
            'NO ACTION',
            'NO ACTION'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
        $this->dropTable('{{%rank}}');
    }
}
