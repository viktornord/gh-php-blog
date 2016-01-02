<?php

use yii\db\Schema;
use yii\db\Migration;

class m160102_154034_category extends Migration
{
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text()
        ]);
    }

    public function down()
    {
        $this->dropTable('category');
    }
}
