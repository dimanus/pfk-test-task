<?php

use yii\db\Migration;

/**
 * Class m190204_154633_distr_import_template
 */
class m190204_154633_distr_import_template extends Migration
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
        $this->createTable('{{%distr_import_template}}', [
            'id' => $this->bigPrimaryKey(10)->unsigned(),
            'id_distr' => $this->bigInteger(10)->unsigned()->notNull()->comment('Дистрибьютер'),
            'template' => $this->string(200)->notNull()->comment('Шаблон импорта'),
            'split' => $this->string(10)->notNull()->comment('Разделитель'),
            'header' => $this->string(200)->notNull()->comment(('Пример шапки'))
        ], $tableOptions);
        $this->createIndex('{{%distr_import_template_id_distr}}', '{{%distr_import_template}}', 'id_distr');
        $this->addForeignKey(
            '{{%distr_import_fk_id_distr}}',
            '{{%distr_import_template}}',
            'id_distr',
            '{{%distr}}',
            'id_distr',
            'cascade',
            'cascade'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%distr_import_template}}');
    }
}
