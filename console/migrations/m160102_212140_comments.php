<?php

use yii\db\Schema;
use yii\db\Migration;

class m160102_212140_comments extends Migration
{
    public function safeUp()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'post_id' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull(),
            'date_added' => $this->timestamp()->notNull(),
            'body' => $this->text()->notNull()
        ]);
        $this->addForeignKey('fk_comment_author', 'comment', 'author_id', 'user', 'id');
        $this->addForeignKey('fk_comment_post', 'comment', 'post_id', 'post', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_comment_author', 'comment');
        $this->dropForeignKey('fk_comment_post', 'comment');
        $this->dropTable('comment');
    }
}
