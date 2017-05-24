<?php

namespace app\controllers;

use app\models\SubjectModel;
use app\models\ClassModel;
use yii;

class SubjectController extends \yii\web\Controller
{
    //

    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['login', 'logout', 'add-subject','update-subject','remove-subject'],
                'rules' => [
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['add-subject'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['update-subject'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['remove-subject'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $subject = SubjectModel::find()
                    ->where(['status' => 1])
                    ->all();
        return $this->render('index', ['subject'=>$subject]);
    }

    //edit subject moi
    public function actionUpdateSubject(){
        $rq =Yii::$app->request;
        $id = $rq->get('id');

        $rooms = ClassModel::find(['status' => 1])->all();
        $model = SubjectModel::findOne($id);
        if($model->load($rq->post()) && $model->validate() && $model->save()){
            return $this->redirect(['subject/index']);
        }
        return $this->render('subject-form', ['model' => $model, 'rooms' => $rooms]);
    }



    //Tao User Moi
     public function actionAddSubject(){
        $rq =Yii::$app->request;
        $rooms = ClassModel::find(['status' => 1])->all();
        $model = new SubjectModel();
        if($model->load($rq->post()) && $model->validate() && $model->save() ){
            return $this->redirect(['subject/index']);
        }else {
            $errors = $model->errors;
        }
        return $this->render('subject-form', ['model' => $model, 'rooms' => $rooms]);
    }


    public function actionRemoveSubject(){
        $rq =Yii::$app->request;
        $id = $rq->get('id');

        $model = SubjectModel::findOne($id);
        if ($id) {
             $model->status = 0;
        $model->save();
        return $this->redirect(['subject/index']);
         }
        return $this->redirect(['subject/index']);
    }



}
