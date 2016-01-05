<?php

namespace backend\controllers;

use common\models\Category;
use common\models\Comment;
use Yii;
use common\models\Post;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
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
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->unlinkAll('categories', true);
            foreach(Category::getCategoriesById($model->categories_id) as $category) {
                $model->link('categories', $category);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model->categories_id = ArrayHelper::getColumn($model->categories, 'id');
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionSetactivity($id)
    {
        $model = $this->findModel($id);
        if ($model) {
            $model->active = !$model->active;
            /** @var Category $category */
            if ($model->active) {
                foreach($model->categories as $category) {
                    if (!$category->active) {
                        $category->unlink('posts', $model, true);
                    }
                }
            }
            $model->save();
        }
        return $this->redirect('index');
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        Comment::deleteAll(['post_id' => $id]);
        $model->unlinkAll('categories', true);
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
