<?php
namespace app\components\widgets;

use Yii;
use yii\base\Widget;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\NotifyModel;

class TapsSign extends Widget {

    public function init() {
        
    }

    public function run() {
        
        if(\Yii::$app->user->isGuest){
            $login = new LoginForm();
            $signup = new SignupForm();
            
            $check = false;
            $signup_complete = false;

            $cookies = Yii::$app->request->cookies;
            if (($cookie = $cookies->get('rg_cp')) !== null) {
                $check = true;
                $signup_complete = true;
            }
            if ($login->load(Yii::$app->request->post()) && $login->login()) {
                Yii::$app->getResponse()->refresh();
            }
            if ($signup->load(Yii::$app->request->post())) {
                $check = true;
                
                if ($user = $signup->signup()) {
                    $this->setCookie('rg_cp');
                    $signup_complete = true;
                    Yii::$app->getResponse()->refresh();
                }
            }

            return $this->render('TapsGuest',
                    [
                        'login' => $login,
                        'signup' => $signup,
                        'check' => $check,
                        'signup_complete' => $signup_complete,
                    ]);
        }
        else{
            $notify = NotifyModel::find()->where(['id_user_owner'=>Yii::$app->user->id, 'active'=>0])->count();
            return $this->render('TapsUser',
                    [
                        //'count_taps' => $this->count_taps,
                        'notify' => $notify,
                    ]);
        }
    }
    
    public function setCookie($name){
        // get the cookie collection (yii\web\CookieCollection) from the "response" component
        $cookies = Yii::$app->response->cookies;

        // add a new cookie to the response to be sent
        $cookies->add(new \yii\web\Cookie([
            'name' => $name,
            'value' => substr(Yii::$app->getSecurity()->generateRandomString(),10),
            'expire' => time() + 15,
        ]));
    }

}
