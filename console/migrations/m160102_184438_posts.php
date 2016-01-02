<?php

use yii\db\Migration;

class m160102_184438_posts extends Migration
{
    public function up()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'body' => $this->text()->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('post');
    }
}
