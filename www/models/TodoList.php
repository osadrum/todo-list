<?php

namespace app\models;

/**
 * This is the model class for table "todo_list".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property integer $status
 */
class TodoList extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'todo_list';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['text'], 'string'],
			[['status'], 'integer'],
			[['title'], 'string', 'max' => 255]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'title' => 'Title',
			'text' => 'Text',
			'status' => 'Status',
		];
	}
}
