<?php
namespace app\controllers;


use Yii;
use app\models\ClassModel;


class ClassController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['login', 'logout', 'add-room','update-room','remove-room'],
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
                        'actions' => ['add-room'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['update-room'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['remove-room'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    // ham them lop hoc
    public function actionAddRoom(){
	    $rq = Yii::$app->request;
	    $class = new ClassModel();
	    if($rq->isGet){
	        // Sinh ra view room-form với biến model = $room
	        return $this->render('room-form', ['model' => $class]);
	    }else{
	        //Load data từ request dạng post đè lên dữ liệu đã lấy đc từ db
	        $class->load($rq->post());

	        // b1: thực hiện validate dữ liệu của model hiện tại (data mới)
	        // với rules của model
	        // b2: save vào cơ sở dữ liệu
	        if($class->save()){ // Nếu save thành công thì đưa về trang chủ
	            return $this->redirect(['site/index']);
	        }
	    }
	}

	//ham xoa lop hoc
	public function actionRemoveRoom()
    {
        $rq = Yii::$app->request;
        $id = $rq->get('id');

        $room = ClassModel::findOne($id);

        // Lay ra toan bo chair
        $user = $room->getUser();
        $subject = $room->getSubject();
        if($user){
            foreach ($user as $key => $value) {

                // Set status cua chair ve 0 roi save
                $value->status = 0;
                $value->save();
            }
        }
        if($subject){
            foreach ($subject as $key => $value) {

                // Set status cua subject ve 0 roi save
                $value->status = 0;
                $value->save();
            }
        }
        // Set status cua room ve 0 va save
        $room->status = 0;
        $room->save();

        return $this->redirect(['site/index']);
    }

    public function actionUpdateRoom(){
        $rq = Yii::$app->request;

        // Lấy dữ liệu id từ url
        $id = $rq->get('id');

        // Lấy data từ db với id tìm đc
        $room = ClassModel::findOne($id);

        /**
        * Nếu room tồn tại thì sinh ra cái view update
        * Nếu room không tồn tại thì đưa về homepage
        */
        if($room){
            if($rq->isGet){

                // Sinh ra view room-form với biến model = $room
                return $this->render('room-form', ['model' => $room]);
            }else{
                //Load data từ request dạng post đè lên dữ liệu đã lấy đc từ db
                $room->load($rq->post());

                // b1: thực hiện validate dữ liệu của model hiện tại (data mới)
                // với rules của model
                // b2: save vào cơ sở dữ liệu
                if($room->validate() && $room->save()){ // Nếu save thành công thì đưa về trang chủ
                    return $this->redirect(['site/index']);
                }
            }
        }

        return $this->redirect(['site/index']);
        

    }

}


