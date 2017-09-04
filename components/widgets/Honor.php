<?php
namespace app\components\widgets;

use yii\base\Widget;
use app\models\LogGameModel;
use app\models\LogZenyModel;

class Honor extends Widget {
    
    public $type = null;
    public $status = null;

    public function init() {

    }

    public function run() {

        if($this->type == 'game'){
            if($this->status == 'win'){
                $model = LogGameModel::find()->select('id_user, COUNT(*) AS count')->where(['status'=>1])->groupBy('id_user')->limit(3)->orderBy(['count' => SORT_DESC])->all();
            }
            
            else{
                $model = LogGameModel::find()->select('id_user, COUNT(*) AS count')->where(['status'=>-1])->groupBy('id_user')->limit(3)->orderBy(['count' => SORT_DESC])->all();
            }
            return $this->render('HonorGame', 
                [
                    'model' => $model,
                    'status' => $this->status,
                ]);
        }

        if($this->type == 'zeny'){
            if($this->status == 'win'){
                $model = LogZenyModel::find()->where(['status'=>1])->limit(3)->orderBy(['zeny' => SORT_DESC])->all();
            }
            
            else{
                $model = LogZenyModel::find()->where(['status'=>-1])->limit(3)->orderBy(['zeny' => SORT_DESC])->all();
            }
            return $this->render('HonorZeny', 
                [
                    'model' => $model,
                    'status' => $this->status,
                ]);
        }
        throw new NotFoundHttpException('Honor type, status not found!');
    }
    public function checkPlayed($id){
        $model = LogGameModel::find()->select('COUNT(*) AS count')->where(['id_user'=>$id])->one();
        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Honor user not found!');
        }
    }
    public function getUser($id) {
        $model = \app\models\UserModel::findOne($id);
        if($model){
            return $model;
        }
        
    }
}
