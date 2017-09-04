<?php

namespace app\modules\wonderkide\controllers;

use Yii;
use app\models\MatchModel;
use app\models\MatchSearchModel;
use app\components\api\getOdds;
use app\components\api\getScoreResult;

class MatchController extends AdminController
{
    
    public function actionIndex(){

        $searchModel = new MatchSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionPull(){
        
        $this->view->params['league_selected'] = 1; //default dropdown
        
        if(Yii::$app->request->post()||!empty(Yii::$app->request->post()['league'])){
            //var_dump(Yii::$app->request->post()['league']);exit();
            //$date = '2016-03-05';
            //$date = null;
            if(empty($date)){
                $date = '';
            }
            $id_league = Yii::$app->request->post()['league'];
            $this->view->params['league_selected'] = $id_league;
            //Yii::$app->getSession()->set
            if(getOdds::addOdds($id_league, $date)){
                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fa fa-users',
                    'message' => 'Update was successful.',
                    'title' => 'Success!!',
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
            }
            else{
                Yii::$app->getSession()->setFlash('error', [
                    'type' => 'danger',
                    'duration' => 5000,
                    'icon' => 'fa fa-users',
                    'message' => 'Please check fixture and try again.',
                    'title' => 'Update error!!',
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
            }
        }

        return $this->render('pull', [
            //'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
        ]);
    }
    
    
    
    
    
    public function actionUpdateresult() {
        $searchModel = new MatchSearchModel();
        $dataProvider = $searchModel->searchActive(Yii::$app->request->queryParams);
        
        $this->view->params['league_selected'] = 1; //default dropdown
        //$id = 1;
        if(Yii::$app->request->post()||!empty(Yii::$app->request->post()['league'])){
            
            $id = Yii::$app->request->post()['league'];
            if(!Yii::$app->request->post()['date']){
                $date = Yii::$app->request->post()['date'];
            }
            else{
                $startDate = time();
                $date = date('Y-m-d', strtotime('-1 day', $startDate));
            }
            if(getScoreResult::updateScoreResult($id, $date)){
                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fa fa-users',
                    'message' => 'Update was successful.',
                    'title' => 'Success!!',
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
                return $this->redirect('/wonderkide/match/updateresult');
            }
        }
        return $this->render('updateresult', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionCancelmatch(){
        if(isset($_GET['id'])){
            $model = $this->findModel($_GET['id']);
            if($model){
                $model->active = -1;
                $model->update();
                
                return 999;
            }
            return 501;
        }
        return 191;
    }


    public function getMatchByFootballtip(){

        require_once Yii::$app->basePath . '/components/simple_html_dom.php';
        $url = 'http://www.footballtipswin.com/epl.html';
 
        $html = file_get_html($url);

        //$match = array();
        
        foreach($html->find('tr') as $article) {
            if(!empty($article->find('td div', 1)->plaintext)){
                
                $check = substr($article->find('td div', 0)->plaintext, 0,2);
                if($check == (date("d")+0)){
                    //var_dump($check);exit();
                    $item['date'] = $article->find('td div', 0)->plaintext;
                    $item['Match'] = $article->find('td div', 1)->plaintext;
                    $item['odds'] = $article->find('td div', 2)->plaintext;
                    $item['tips'] = $article->find('td div', 3)->plaintext;

                    $articles[] = $item;
                }
                
            }
            
        }
        var_dump($articles);exit();

        return $score;
    }
    public function updateScore($team) {
        //var_dump($team['id']);
                //exit();
        $model = LeagueScoresModel::find()->where(['id' => $team['id']])->one();

        if($model){
            //$model->id = $team['id'];
            //$model->league_id = $team['league_id'];
            //$model->no = $team['no'];
            //$model->season = '2015-2016';
            $model->team_name = $team['team_name'];
            $model->play = $team['play'];
            $model->h_win = $team['h_win'];
            $model->h_draw = $team['h_draw'];
            $model->h_lost = $team['h_lost'];
            $model->h_gfor = $team['h_gfor'];
            $model->h_against = $team['h_against'];
            $model->a_win = $team['a_win'];
            $model->a_draw = $team['a_draw'];
            $model->a_lost = $team['a_lost'];
            $model->a_gfor = $team['a_gfor'];
            $model->a_against = $team['a_against'];
            $model->goal_dif = $team['goal_dif'];
            $model->point = $team['point'];
            
            $model->update();
        }
        else{
            $model = new LeagueScoresModel();
            $model->id = $team['id'];
            $model->league_id = $team['league_id'];
            $model->no = $team['no'];
            $model->season = '2015-2016';
            $model->team_name = $team['team_name'];
            $model->play = $team['play'];
            $model->h_win = $team['h_win'];
            $model->h_draw = $team['h_draw'];
            $model->h_lost = $team['h_lost'];
            $model->h_gfor = $team['h_gfor'];
            $model->h_against = $team['h_against'];
            $model->a_win = $team['a_win'];
            $model->a_draw = $team['a_draw'];
            $model->a_lost = $team['a_lost'];
            $model->a_gfor = $team['a_gfor'];
            $model->a_against = $team['a_against'];
            $model->goal_dif = $team['goal_dif'];
            $model->point = $team['point'];
            
            $model->save();
        }
        
    }
    
    /**
     * Displays a single MatchModel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MatchModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MatchModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_match]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MatchModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MatchModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MatchModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MatchModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MatchModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    
}