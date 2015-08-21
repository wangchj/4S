<?php

namespace app\controllers;

use Yii;
use app\models\Event;
use app\models\Ref;
use app\models\EventRef;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EventController implements the CRUD actions for Event model.
 */
class EventController extends Controller
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
     * Lists all Event models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Event::find()->orderBy('year ASC, month ASC, date ASC'),
            'pagination' => ['pageSize' => -1]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Event model.
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
     * Creates a new Event model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $event = new Event();

        if ($event->load(Yii::$app->request->post()))
        {
            if(trim($event->season) != '')
                $this->setMonth($event);

            if($event->validate() && $event->save())
            {
                if(trim($event->refInput) != '')
                    $this->saveRefs($event);
                return $this->redirect(['view', 'id' => $event->eventId]);
            }
        }

        return $this->render('create', [
            'event' => $event,
        ]);
    }

    private function setMonth($event)
    {
        if($event->month != '' || $event->month)
            return;

        switch($event->season) {
            case 'Spring':
                return $event->month = 3;
            case 'Summer':
                return $event->month = 6;
            case 'Autumn':
                return $event->month = 10;
            case 'Winter':
                return $event->month = 12;
        }
    }

    private function saveRefs($event)
    {
        $urls = explode("\n", $event->refInput);
        foreach($urls as $url) {
            $ref = Ref::findOne(['url'=>$url]);
            
            if(!$ref) {
                $ref = new Ref();
                $ref->url = trim($url);
                $ref->save();
            }

            $eventRef = new EventRef();
            $eventRef->eventId = $event->eventId;
            $eventRef->refId = $ref->refId;
            $eventRef->save();
        }
    }

    /**
     * Updates an existing Event model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $event = $this->findModel($id);

        if ($event->load(Yii::$app->request->post()))
        {
            if(trim($event->season) != '')
                $this->setMonth($event);
            
            if($event->save())
                return $this->redirect(['view', 'id' => $event->eventId]);
        }

        return $this->render('update', [
            'event' => $event,
        ]);
    }

    /**
     * Deletes an existing Event model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Event::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
