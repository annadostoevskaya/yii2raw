<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%i18n}}`.
 */
class m240229_043351_create_i18n_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%i18n}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string()->notNull(),
            'code' => $this->string()->notNull(),
            'message' => $this->string()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%i18n}}');
    }
}
