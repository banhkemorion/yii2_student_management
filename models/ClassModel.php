<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "class_room".
 *
 * @property integer $room_id
 * @property string $room_name
 */
class ClassModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'class_room';
    }

   

    public function getUser()
    {
        return $this->hasMany(UserModel::className(), ['class_id' => 'room_id'])
                    ->where(['class_id' => $this->room_id])
                    ->andWhere(['status' => 1])
                    ->all();
    }

    
    public function getSubject()
    {
        return $this->hasMany(SubjectModel::className(), ['class_id' => 'room_id'])
                    ->where(['class_id' => $this->room_id])
                    ->andWhere(['status' => 1])
                    ->all();
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room_id'], 'integer'],
            [['room_name'], 'string', 'max' => 255],
            ['room_name', 'unique', 'targetAttribute' => ['room_name'], 'message' => 'Username must be unique.'],
            [['room_name'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'room_id' => 'Class ID',
            'room_name' => 'Class Name',
        ];
    }
}
