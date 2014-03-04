<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TodoList;

/**
 * TadoListSearch represents the model behind the search form about `app\models\TodoList`.
 */
class TadoListSearch extends Model
{
	public $id;
	public $title;
	public $text;
	public $status;

	public function rules()
	{
		return [
			[['id', 'status'], 'integer'],
			[['title', 'text'], 'safe'],
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

	public function search($params)
	{
		$query = TodoList::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$this->addCondition($query, 'id');
		$this->addCondition($query, 'title', true);
		$this->addCondition($query, 'text', true);
		$this->addCondition($query, 'status');
		return $dataProvider;
	}

	protected function addCondition($query, $attribute, $partialMatch = false)
	{
		if (($pos = strrpos($attribute, '.')) !== false) {
			$modelAttribute = substr($attribute, $pos + 1);
		} else {
			$modelAttribute = $attribute;
		}

		$value = $this->$modelAttribute;
		if (trim($value) === '') {
			return;
		}
		if ($partialMatch) {
			$query->andWhere(['like', $attribute, $value]);
		} else {
			$query->andWhere([$attribute => $value]);
		}
	}
}
