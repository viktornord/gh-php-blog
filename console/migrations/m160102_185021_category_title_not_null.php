<?php

use yii\db\Schema;
use yii\db\Migration;

class m160102_185021_category_title_not_null extends Migration
{
    public function safeUp()
    {
        $this->alterColumn('category', 'title', $this->string()->notNull());
    }

    public function down()
    {
        echo "m160102_185021_category_title_not_null cannot be reverted.\n";

        return false;
    }
}
