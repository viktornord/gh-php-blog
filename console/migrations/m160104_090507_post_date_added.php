<?php

use yii\db\Schema;
use yii\db\Migration;

class m160104_090507_post_date_added extends Migration
{
    public function up()
    {
        $this->addColumn('post', 'date_added', $this->timestamp()->notNull());
    }

    public function down()
    {
        $this->dropColumn('post', 'date_added');
    }
}
