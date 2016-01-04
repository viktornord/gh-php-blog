<?php

use yii\db\Schema;
use yii\db\Migration;

class m160104_204211_category_soft_delete extends Migration
{
    public function up()
    {
        $this->addColumn('category', 'active', $this->boolean()->defaultValue(true));
    }

    public function down()
    {
        $this->dropColumn('category', 'active');
    }
}
