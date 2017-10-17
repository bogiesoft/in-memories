<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\components\MyController;
use yii\filters\VerbFilter;
use app\models\MatchTicketModel;
use app\models\LogGameModel;
use app\models\MatchModel;
use app\models\UserModel;
use app\models\LogZenyModel;
use app\models\LeagueModel;
use app\models\LeagueScoreSearch;

class GamesController extends MyController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    public function actionIndex() {
        $this->isLogin();
        $league = LeagueModel::find()->all();
        //$match = MatchModel::find()->where(['active' => 0])->andWhere(['like', 'play_time', date('Y-m-d')])->all();
        $match = MatchModel::find()->where(['active' => 0])->andWhere([
                    'or',
                    ['like', 'play_time', date('Y-m-d')],
                    ['like', 'play_time', date('Y-m-d',strtotime("+1 day"))],
                ])->all();
        return $this->render('index', [
            'league' => $league,
            'match' => $match,
        ]);
    }
    
    public function actionLeague($id) {
        /*$season = '2015-2016';
        $league = LeagueScoresModel::find()->where(['league_id'=>$id,'season' => $season])->orderBy(['no' => SORT_ASC])->all();
        return $this->render('league', [
            'league' => $league,
            //'match' => $match,
        ]);*/
        $league = LeagueModel::findOne($id);
        $searchModel = new LeagueScoreSearch();
        $dataProvider = $searchModel->searchByLeague(Yii::$app->request->queryParams, $id);

        return $this->render('league', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'league' => $league,
        ]);
    }
    
    public function actionCheckmatch() {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if(Yii::$app->request->post()){

            $zeny = Yii::$app->request->post()['zeny'];
            $match = Yii::$app->request->post();

            foreach ($match as $row) {
                $cut[] = explode('_', $row);
            }
            foreach ($cut as $check) {
                if(!empty($check[0]) && !empty($check[1]) && ($check[0]!='' || $check[1]='')){
                    $search = MatchModel::findOne($check[0]);
                    
                        if($check[1] == 'h'){
                            $team[] = $search->home;
                        }
                        else{
                            $team[] = $search->away;
                        }
                }
            }
            if(Yii::$app->user->isGuest){
                    return 1;
                }
            if(!empty($team)){
                if(count($team)<3 || count($team)>10){
                    return 37;
                }
                if(empty($zeny) || $zeny == ''){
                    return 88;
                }
                if($zeny < 50 || $zeny > 10000){
                    return 888;
                }
                $currentZeny = $this->checkZeny();
                if($zeny > $currentZeny){
                    return 8;
                }
                $params = 'ท่านเลือกเล่น '.  count($team).' ทีม มีทีม '.implode(',', $team).' จำนวนเงินเดิมพัน '.$zeny.' zeny';
                return $params;
            }
            else{
                return 0;
            }
        }
    }
    
    public function actionAddmatch()
    {
        if(Yii::$app->request->post()){

            $match = Yii::$app->request->post();

            foreach ($match as $row) {
                $cut[] = explode('_', $row);

            }
            $zeny = Yii::$app->request->post()['zeny'];
            $zeny = (int)$zeny;

            $logGame = $this->updatePlayed(1, $zeny);
            $this->updateZeny($zeny);

            $flag = FALSE;
            $status = 500;
            foreach ($cut as $check) {

                if(!empty($check[0]) && !empty($check[1]) && ($check[0]!='' || $check[1]='')){

                    if(!$this->updateTicket($check, $logGame)){
                        $status = 501;
                        $flag = FALSE;
                    }
                    else{
                        $flag = TRUE;
                    }
                }
            }
            if($flag){
                $status = 'ok';
            }
        }
        return $status;
    }

    protected function findTeamName($data) {
        $team = MatchModel::findOne($data[0]);
        if($team){
            if($data[1] == 'h'){
                return $team->home;
            }
            if($data[1] == 'a'){
                return $team->away;
            }
        }
        return FALSE;
    }
    
    protected function updateTicket($selected, $log) {

        $model = new MatchTicketModel();
        $step = $this->findStep();
        
        if($step){
            $step = ($step->step + 1);
        }
        else{
            $step = 1;
        }

        $model->id_match = $selected[0];
        $model->id_user = Yii::$app->user->id;
        $model->id_game_log = $log;
        $model->step = $step;
        $model->team_selected = $selected[1];
        $model->rate = 0;
        $model->update_time = date("Y-m-d H:i:s");
        $model->ip_address = Yii::$app->request->getUserIP();
        
        if($model->save()){
            return TRUE;
        }
        return FALSE;
    }
    
    protected function updatePlayed($id_game, $zeny) {

        $model = LogGameModel::find()->where(['id_user' => Yii::$app->user->id, 'game_type' => $id_game, 'play_date' => date("Y-m-d")])->orderBy(['play_count' => SORT_DESC])->one();
        if($model){

            $count = ($model->play_count + 1);
            $model = new LogGameModel();

            $model->id_user = Yii::$app->user->id;
            $model->game_type = $id_game;
            $model->play_count = $count;
            $model->zeny = $zeny;
            $model->play_date = date("Y-m-d");
            $model->play_ip = Yii::$app->request->getUserIP();
            $model->status = 0;
            
            $model->save();
        }
        else{
            $model = new LogGameModel();

            $model->id_user = Yii::$app->user->id;
            $model->game_type = $id_game;
            $model->play_count = 1;
            $model->zeny = $zeny;
            $model->play_date = date("Y-m-d");
            $model->play_ip = Yii::$app->request->getUserIP();
            $model->status = 0;
            
            $model->save();
        }
        return $model->id_game_log;
    }
    
    protected function findStep() {
        $step = MatchTicketModel::find()->where(['id_user' => Yii::$app->user->id])->andFilterWhere(['or',['like', 'update_time', date("Y-m-d")]])->orderBy(['step' => SORT_DESC])->one();
        if($step){
            return $step;
        }
        return FALSE;
    }
    
    protected function updateZeny($zeny) {
        $logZeny = new LogZenyModel();
        
            $logZeny->id_user = Yii::$app->user->id;
            $logZeny->text = Yii::$app->params['buyTicket'];
            $logZeny->zeny = $zeny;
            $logZeny->update_time = date('Y-m-d H:i:s');
            $logZeny->status = -1;
            
            if($logZeny->save()){
                $this->clearZeny($zeny);
            }
    }
    
    protected function clearZeny($zeny) {
        $model = UserModel::findOne(Yii::$app->user->id);
        $update = $model->zeny - $zeny;
        
        $model->zeny = $update;
        $model->update();
    }
    
    protected function checkZeny() {
        $model = UserModel::findOne(Yii::$app->user->id);
        return $model->zeny;
    }
    
    public function actionUpdatezeny() {
        if(isset($_GET['log'])){
            
            $model = LogZenyModel::findOne($_GET['log']);
            if($model->status!=0){
                return 191;
            }
            else{
                if($this->incomeZeny($model->id_user, $model->zeny)){
                    $model->status = 1;
                    $model->update();
                    
                    return 1;
                }
                return 501;
            }
        }
        return 191;
    }
    
    protected function incomeZeny($user, $zeny) {
        $model = UserModel::findOne($user);
        if($model){
            $model->zeny = $model->zeny + $zeny;
            $model->update();
            
            return TRUE;
        }
        return FALSE;
    }
    
    public function actionMakhos() {
        return $this->render('new', [
            //'modelUser' => $modelUser
        ]);
    }
    
    /************ new project FM **********/
    public function actionRun() {
        $fn = Yii::$app->params['fn_model'];
        $ln = Yii::$app->params['ln_model'];
        
        $fn_se = array_rand($fn,1);
        $fn_get = $fn[$fn_se];
        $ln_se = array_rand($ln,1);
        $ln_get = $ln[$ln_se];
        echo $fn_get.' '.$ln_get;
    }
    
    public function actionPlay() {
        
        $time = 10;
        $score_a = 0;
        $score_b = 0;
        
        $a = Yii::$app->params['Ateam'];
        $b = Yii::$app->params['Bteam'];
        
        $flag = FALSE;
        if($this->randomAtk($a, $b)){
            $flag = true;
        }
        for($i=0;$i<$time; $i++){
            
            if($flag){
                $finish = $this->randonFinish($a, $b);
                if($finish){
                    $score_a += 1;
                    $flag = FALSE;
                }
            }
            else{
                $finish = $this->randonFinish($b, $a);
                if($finish){
                    $score_b += 1;
                    $flag = true;
                }
            }
        }
        
        echo $score_a.' : '.$score_b;
    }
    
    public function randomAtk($a, $b){
        $ran = rand(1,$a['atk']+$b['atk']);
        if($ran <= $a['atk']){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    public function randonFinish($atk, $def){
        $finish = $atk['finish'];
        $block = $def['def']+$def['clear'];
        $ran = rand(1,$finish+$block);
        if($ran <= $finish){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

}
