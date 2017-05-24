<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class SignUpForm extends Model
{
    public $username;
    public $password;
    public $confirmPassword;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'password', 'confirmPassword'], 'required'],
            ['confirmPassword', 'compare', 'compareAttribute' => 'password',
            'message' => 'Compare password must be match with password']
        ];
    }
}
