<?php

use yii\db\Schema;
use yii\db\Migration;

class m160102_184503_category_post_many_to_many extends Migration
{
    public function safeUp()
    {
        $this->createTable('category_post', [
            'category_id' => $this->integer()->notNull(),
            'post_id' => $this->integer()->notNull()
        ]);
        $this->addForeignKey('fk_category_post', 'category_post', 'category_id', 'category', 'id');
        $this->addForeignKey('fk_post_category', 'category_post', 'post_id', 'post', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_category_post', 'category_post');
        $this->dropForeignKey('fk_category_post', 'category_post');
        $this->dropTable('category_post');
    }
}
