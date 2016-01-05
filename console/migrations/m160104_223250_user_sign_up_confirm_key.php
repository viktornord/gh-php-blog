<?php

use yii\db\Migration;

class m160104_223250_user_sign_up_confirm_key extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'activated', $this->boolean()->defaultValue(false));
        $this->addColumn('user', 'confirm_key', $this->string());
    }

    public function down()
    {
        $this->dropColumn('user', 'activated');
        $this->dropColumn('user', 'confirm_key');
    }
}
