<?php

namespace common\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        return $user->save() && $this->sendEmail($user);
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                
            )
            ->setHtmlBody('
                        <div class="container bg-white">
                            <p>
                                <b>Los datos de su cuenta en Sistema de control de Tutorias son los siguientes</b>
                            </p>
                            <em class="text-warning"><b>Usuario: ' . $this->username . '</b></em>
                            <br>
                            <em class="text-warning"><b>Contraseña: ' . $this->password . '</b></em>
                            <p>
                                Por favor, espera a que el administrador active tu cuenta para poder ingresar al sistema.
                                <br>
                                <a href="http://sct.valladolid.tecnm.mx/">http://sct.valladolid.tecnm.mx/</a>
                            </p>
                        </div>
                        ')
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
            ->setTo($this->email)
            ->setSubject('NUEVA CUENTA EN ' . Yii::$app->name)
            ->send();
            //wait to active you acount for the admin user
    }
}
