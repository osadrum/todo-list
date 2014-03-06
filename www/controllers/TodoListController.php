<?php

namespace app\controllers;

use Yii;
use app\models\TodoList;
use app\models\search\TadoListSearch;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\VerbFilter;

/**
 * TodoListController implements the CRUD actions for TodoList model.
 */
class TodoListController extends Controller
{
	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					//'delete' => ['post'],
				],
			],
		];
	}

	/**
	 * Lists all TodoList models.
	 * @return mixed
	 */
	public function actionIndex()
	{
        $todoList = new TodoList;
		$searchModel = new TadoListSearch;
        $tasks = TodoList::find()
            ->from(TodoList::tableName())
            ->asArray(true)
            ->all();

		return $this->render('index', [
			'tasks' => $tasks,
			'searchModel' => $searchModel,
            'todoList' => $todoList,
		]);
	}

	/**
	 * Displays a single TodoList model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new TodoList model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new TodoList;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->renderPartial('create', [
                'model' => $model,
            ], false, true);
        }

	}

	/**
	 * Updates an existing TodoList model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{

		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['index']);
		} else {
			return $this->renderPartial('update', [
				'model' => $model,
			], false, true);
		}
	}

	/**
	 * Deletes an existing TodoList model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		if ( $this->findModel($id)->delete() ) {
            echo Json::encode([
                'errors'=>0
            ]);
        }

	}

	/**
	 * Finds the TodoList model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return TodoList the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if ($id !== null && ($model = TodoList::find($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
