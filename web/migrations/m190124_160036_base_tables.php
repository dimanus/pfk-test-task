<?php

use yii\db\Migration;

/**
 * Class m190124_160036_base_tables
 */
class m190124_160036_base_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%apteka}}', [
            'id_apteka' => $this->bigPrimaryKey(10)->unsigned(),
            'name' => $this->string(255)->notNull()->comment('Название'),
        ],$tableOptions);
        $this->createTable('{{%product}}', [
            'id_product' => $this->bigPrimaryKey(10)->unsigned(),
            'name' => $this->string(255)->notNull()->comment('Название')
        ],$tableOptions);
        $this->createTable('{{%distr}}', [
            'id_distr' => $this->bigPrimaryKey(10)->unsigned(),
            'name' => $this->string(255)->notNull()->comment('Название')
        ],$tableOptions);
        $this->createTable('{{%cross}}', [
            'id_cross' => $this->bigPrimaryKey(10)->unsigned(),
            'id_distr' => $this->bigInteger(10)->unsigned()->notNull()->comment('Дистрибьютор'),
            'name' => $this->string(255)->notNull()->comment('Название'),
            'type' => $this->bigInteger(10)->unsigned()->notNull()->comment('Тип поля'),
            'id_inital' => $this->bigInteger(10)->unsigned()->notNull()->comment('Соответствие в БД'),
        ],$tableOptions);
        $this->createIndex('{{%cross_id_distr}}', '{{%cross}}', ['id_distr', 'id_inital', 'type'], true);
        $this->createIndex('{{%cross_id_distr_fk}}', '{{%cross}}', 'id_distr');
        $this->addForeignKey(
            '{{%cross_fk_id_distr}}',
            '{{%cross}}',
            'id_distr',
            '{{%distr}}',
            'id_distr',
            'NO ACTION',
            'NO ACTION'
        );
        $this->createTable('{{%sells}}', [
            'id_sell' => $this->bigPrimaryKey(10),
            'id_distr' => $this->bigInteger(10)->unsigned()->notNull()->comment('Дистрибьютор'),
            'id_product' => $this->bigInteger(10)->unsigned()->notNull()->comment('Товар'),
            'id_apteka' => $this->bigInteger(10)->unsigned()->notNull()->comment('Аптека'),
            'quantity' => $this->integer(10)->unsigned()->notNull()->comment('Кол-во'),
            'dt_create' => $this->bigInteger(10)->unsigned()->notNull()->comment('Дата импорта'),
        ],$tableOptions);
        $this->createIndex('{{%sells_product_id}}', '{{%sells}}', ['id_distr', 'id_product', 'id_apteka']);
        $this->addForeignKey(
            '{{%sells_fk_id_distr}}',
            '{{%sells}}',
            'id_distr',
            '{{%distr}}',
            'id_distr',
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            '{{%sells_fk_id_product}}',
            '{{%sells}}',
            'id_product',
            '{{%product}}',
            'id_product',
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            '{{%sells_fk_id_apteka}}',
            '{{%sells}}',
            'id_apteka',
            '{{%apteka}}',
            'id_apteka',
            'NO ACTION',
            'NO ACTION'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sells}}');
        $this->dropTable('{{%cross}}');
        $this->dropTable('{{%apteka}}');
        $this->dropTable('{{%product}}');
        $this->dropTable('{{%distr}}');
    }
}
