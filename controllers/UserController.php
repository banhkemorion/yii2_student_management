<?php

namespace app\controllers;
use app\models\UserModel;
use app\models\ClassModel;
use yii;

use yii\web\UploadedFile;


class UserController extends \yii\web\Controller
{	
	//acsess
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['login', 'logout', 'add-user','update-user','remove-user'],
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
                        'actions' => ['add-user'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['update-user'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['remove-user'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $user = UserModel::find()
                    ->where(['status' => 1])
                    ->all();
        return $this->render('index', ['user'=>$user]);
    }






    public function actionUpdateUser(){
        $rq =Yii::$app->request;
        $id = $rq->get('id');
        if ($id) {
            $rooms = ClassModel::find(['status' => 1])->all();
            $model = UserModel::findOne($id);
            if ($model) {
                if ($rq->isGet) {           
                    return $this->render('user-form', ['model' => $model, 'rooms' => $rooms]);
                }else{
                    $model->load($rq->post());
                    $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                    if ($model->validate()) {
                        $file = $model->imageFile;
                        if ($file) {
                                $fileName ='uploads/' . $file->basename . '-' . time() . '.' . $file->extension;
                                $model->avatar = $fileName ;
                                $model->save();
                                $file->saveAs($fileName);                       
                        } else{
                            $model->save();
                        }
                        return $this->redirect(['user/index']);            
                    }  
                }   
            }   else{
                    return $this->redirect(['user/index']);
                }                       
        } else{
            return $this->redirect(['user/index']);
        }
    }



    //Tao User Moi
     public function actionAddUser(){
        $rq =Yii::$app->request;
        $rooms = ClassModel::find(['status' => 1])->all();
        $model = new UserModel();
        if($model->load($rq->post())){
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->validate()) {
                $file = $model->imageFile;
                if($file){
                    $fileName = 'uploads/' . $file->basename . '-' . time() . '.' . $file->extension;
                    $model->avatar = $fileName;
                    $model->save();
                    $file->saveAs($fileName);                    
                }
                else{
                    $model->save();
                }
                return $this->redirect(['user/index']);

            }
        }

        return $this->render('user-form', ['model' => $model, 'rooms' => $rooms]);
    }


    public function actionRemoveUser(){
        $rq =Yii::$app->request;
        $id = $rq->get('id');
        if ($id) {
            $model = UserModel::findOne($id);
            if ($model)  {
                $model->status = 0;
                $model->save();
                return $this->redirect(['user/index']);
            }
            
         }
        return $this->redirect(['user/index']);
    }

}
