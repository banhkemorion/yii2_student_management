<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $user_name
 * @property string $firt_name
 * @property string $last_name
 * @property string $password
 * @property resource $avatar
 * @property integer $class_id
 * @property string $notes
 */
class UserModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $imageFile;

    public static function tableName()
    {
        return 'user';
    }

    public function getClass(){
        return $this->hasOne(ClassModel::className(), ['room_id' => 'class_id'])
                    ->where(['room_id' => $this->class_id])->one();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['avatar', 'notes'], 'string' ],
            [['class_id'], 'integer'],
            [['user_name', 'firt_name', 'last_name'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 255],
            [['user_name'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'User Name',
            'firt_name' => 'Firt Name',
            'last_name' => 'Last Name',
            'password' => 'Password',
            'avatar' => 'Avatar',
            'class_id' => 'Class ID',
            'notes' => 'Notes',
        ];
    }
}
