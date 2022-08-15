<?php

declare(strict_types=1);

namespace app\modules\admin\models\user;

use app\models\User;
use himiklab\yii2\recaptcha\ReCaptchaValidator3;
use JetBrains\PhpStorm\ArrayShape;
use yii\base\Model;
use Yii;

class Login extends Model
{
    public ?string $email = null;

    public ?string $password = null;

    public ?string $reCaptcha = null;

    #[ArrayShape(['email' => "string", 'password' => "string"])]
    public function attributeLabels(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Пароль',
        ];
    }

    public function loginRule(): void
    {
        if ($this->hasErrors()) {
            return;
        }

        $user = User::findOne([
            'email' => $this->email,
        ]);

        if (null == $user || !Yii::$app->getSecurity()->validatePassword($this->password, $user->password)) {
            $this->addError('password', 'Неправильные данные для входа');
        }
    }

    public function rules(): array
    {
        return [
            ['email', 'filter', 'filter'=>'trim'],
            ['email', 'filter', 'filter'=>'strtolower'],
            ['email', 'email'],
            ['email', 'required'],

            ['password', 'filter', 'filter'=>'trim'],
            ['password', 'required'],
            ['password', 'loginRule'],

            ['reCaptcha', ReCaptchaValidator3::class],
        ];
    }
}