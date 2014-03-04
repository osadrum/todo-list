<?php

use yii\db\Schema;

class m140304_120439_create_todo_list extends \yii\db\Migration
{
	public function up()
	{
        $this->createTable('{{todo_list}}',[
           'id'=>'pk',
            'title'=>'string',
            'text'=>'text',
            'status'=>'int'
        ]);

	}

	public function down()
	{
		$this->dropTable('{{todo_list}}');
	}
}
