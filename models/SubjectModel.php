<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "subject".
 *
 * @property integer $subject_id
 * @property string $subject_name
 * @property resource $icon
 * @property integer $class_id
 */
class SubjectModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject';
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
            [['icon'], 'string'],
            [['class_id'], 'integer'],
            [['subject_name'], 'string', 'max' => 255],
            [['subject_name'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'subject_id' => 'Subject ID',
            'subject_name' => 'Subject Name',
            'icon' => 'Icon',
            'class_id' => 'Class ID',
        ];
    }
}
