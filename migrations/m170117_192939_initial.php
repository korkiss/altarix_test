<?php

use yii\db\Migration;
use yii\db\Schema;

class m170117_192939_initial extends Migration
{

  public function up()
  {
    $this->createTable('cron_results', [
      'id' => Schema::TYPE_PK,
      'body' => Schema::TYPE_TEXT,
      'headers' => Schema::TYPE_TEXT,
      'date_request' => Schema::TYPE_TIMESTAMP,
      'date_response' => Schema::TYPE_TIMESTAMP,
      'delay' => Schema::TYPE_INTEGER,
      'result' => Schema::TYPE_BOOLEAN
    ]);
  }

  public function down()
  {
    echo "m170117_192939_initial cannot be reverted.\n";

    return false;
  }

  /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
   */
}
