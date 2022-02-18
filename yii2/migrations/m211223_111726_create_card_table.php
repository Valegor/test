<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%card}}`.
 */
class m211223_111726_create_card_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%card}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->notNull(),
            'code' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'category' => $this->string()->notNull(),
            'img1' => $this->string()->notNull(),
            'img2' => $this->string(),
            'backimg' => $this->string(),
            'notes' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%card}}');
    }
}
