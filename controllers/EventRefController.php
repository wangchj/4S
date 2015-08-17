<?php

namespace app\controllers;

use Yii;
use app\models\EventRef;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EventRefController implements the CRUD actions for EventRef model.
 */
class EventRefController extends Controller
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
     * Lists all EventRef models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => EventRef::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EventRef model.
     * @param integer $eventId
     * @param integer $refId
     * @return mixed
     */
    public function actionView($eventId, $refId)
    {
        return $this->render('view', [
            'model' => $this->findModel($eventId, $refId),
        ]);
    }

    /**
     * Creates a new EventRef model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EventRef();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'eventId' => $model->eventId, 'refId' => $model->refId]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EventRef model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $eventId
     * @param integer $refId
     * @return mixed
     */
    public function actionUpdate($eventId, $refId)
    {
        $model = $this->findModel($eventId, $refId);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'eventId' => $model->eventId, 'refId' => $model->refId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EventRef model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $eventId
     * @param integer $refId
     * @return mixed
     */
    public function actionDelete($eventId, $refId)
    {
        $this->findModel($eventId, $refId)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EventRef model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $eventId
     * @param integer $refId
     * @return EventRef the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($eventId, $refId)
    {
        if (($model = EventRef::findOne(['eventId' => $eventId, 'refId' => $refId])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
