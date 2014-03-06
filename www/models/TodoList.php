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
    const STATUS_IN_WORK = 1;
    const STATUS_CANCELED = 2;
    const STATUS_FINISHED = 3;
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

    public static function getListStatus(){
        return [
            self::STATUS_IN_WORK => 'в работе',
            self::STATUS_CANCELED => 'отменено',
            self::STATUS_FINISHED => 'завершено',
        ];
    }

    public static function getStatusClass($status_id){
        if ( $status_id == self::STATUS_IN_WORK ){
            $status = '';
        } else if ( $status_id == self::STATUS_CANCELED ){
            $status = 'class="canceled"';
        } else if ( $status_id == self::STATUS_FINISHED ){
            $status = 'class="finished"';
        }
        return  $status;
    }
}
