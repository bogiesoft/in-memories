<?php

namespace app\modules\wonderkide\controllers;

use Yii;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\UserModel;
use app\models\UserAuth;

class AuthController extends Controller {

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect('/wonderkide');
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/wonderkide');
        } else {
            return $this->render('login', ['model' => $model]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->redirect('login');
    }

    public function actionAdduser($id) {
        if ($id <= 2) {
            if (!UserAuth::findOne($id)) {
                if ($id == 1) {
                    $username = 'admin';
                    $password = 'admin1234';
                } else {
                    $username = 'moderator';
                    $password = 'moderator1234';
                }
                $userModel = new UserModel();
                $userModel->id = $id;
                $userModel->username = $username;
                $userModel->auth_key = Yii::$app->security->generateRandomString();
                $userModel->password_hash = Yii::$app->getSecurity()->generatePasswordHash($password);
                $userModel->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
                $userModel->email = $username . '@doofootball.com';
                $userModel->status = 10;
                $userModel->created_at = time();
                $userModel->updated_at = time();
                if ($userModel->save()) {
                    echo "SUCCESS";
                    return TRUE;
                }
            } else {
                echo "DUPLICATE";
                return FALSE;
            }
        } else {
            echo "INVALID";
            return FALSE;
        }
        echo 'FAILED';
    }

}
