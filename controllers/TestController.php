<?php

namespace app\controllers;

use Yii;
use app\components\MyController;
use yii\filters\VerbFilter;
use app\models\UserModel;
use app\models\LogGameModel;
use app\models\LogZenyModel;
use app\models\RePasswordPersonal;
use yii\imagine\Image;
use yii\web\UploadedFile;

class TestController extends MyController
{
    public function behaviors()
    {
        return [
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
    
    public function actionTest() {
        //$this->sent();
        if($this->sent()){
            var_dump('Oh! yeah!!!');
        }

    }
    
    public function actionMedia(){
        
        //$this->ran();
        $this->newtitle();
        return $this->render('media', [
            //'modelUser' => $modelUser
        ]);
    }
    
    
    public function newtitle() {
        
        $content_arr = [
    'Aha 1 yeah 4 no 6 *** <br><br><br>'
    . '<hr>',
    'Aha 1 yeah 4 no 6 *** <br><br><br>'
    . '<hr>',
    'Aha 1 yeah 4 no 6 *** <br><br><br>'
    . '<hr>',
    'Aha 1 yeah 4 no 6 *** <br><br>'
    . '<hr>',
    'Aha 1 yeah 4 no 6 *** <br><br>'
    . '<hr>',
    'Aha 1 yeah 4 no 6 *** <br><br>'
    . '<hr>',
    'Aha 1 yeah 4 no 6 *** <br><br>'
    . '<hr>',
    'Aha 1 yeah 4 no 6 *** <br><br><br>'
    . '<hr>',
    'Aha 1 yeah 4 no 6 *** <br><br>'
    . '<hr>',
    'Aha 1 yeah 4 no 6 *** <br><br>'
    . '<hr>'];
        
        $all_content = implode(" ",$content_arr);
       
        require_once Yii::$app->basePath . '/components/simple_html_dom.php';
        
        //add tag to replace title
        $tag_to_replace = 'br';
        $tag_to_replace_box = '<'.$tag_to_replace.'>';
        
        $html_all = str_get_html($all_content);
        $html_all_row = $html_all->find($tag_to_replace);
        
        //count all tag to replage
        $all_round = count($html_all_row);
        
        //<generate balanced between title and tag>
        //$title = $this->genTitleUnique($all_round);
        //
        //<if you want to select <Null> from title with percent selected>
        $title = $this->genTitlePercentNull(20);
        
        
        $new_title = [];
        foreach ($content_arr as $key => $value) {
            
            $html = str_get_html($value);
        
            $all_row = $html->find($tag_to_replace);
            $all_mark_row = count($all_row);

            for($i=0;$i<$all_mark_row;$i++){
                
                //find position tag
                $position = strpos($value, $tag_to_replace_box, 0);
                
                //title random
                $ran = array_rand($title,1);
                $selected = $title[$ran];
                
                //if you want remove title after selected !!!remove if select title with percentNull
                //unset($title[$ran]);
                
                if($selected){
                    
                    //random header
                    $h = rand(1,4);
                    $value = substr_replace($value,'<h'.$h.'>'.$selected.'</h'.$h.'>',$position, strlen($tag_to_replace_box));
                }
                else{
                    $value = substr_replace($value,'',$position, strlen($tag_to_replace_box));
                }

            }
            $new_title[$key] = $value;
        }
        print_r($new_title);
        exit();
        
    }
    
    public function ran() {
        $content = [
    'Aha 1 yeah 4 no 6 *** <new1><new2><new3><br>'
    . 'yeah I love it<hr>',
    'Aha 1 yeah 4 no 6 *** <new1><new2><new3><br>'
    . 'yeah I love it<hr>',
    'Aha 1 yeah 4 no 6 *** <new1><new2><new3><br>'
    . 'yeah I love it<hr>',
    'Aha 1 yeah 4 no 6 *** <new1><new2><new3><br>'
    . 'yeah I love it<hr>',
    'Aha 1 yeah 4 no 6 *** <new1><new2><new3><br>'
    . 'yeah I love it<hr>',
    'Aha 1 yeah 4 no 6 *** <new1><new2><new3><br>'
    . 'yeah I love it<hr>',
    'Aha 1 yeah 4 no 6 *** <new1><new2><new3><br>'
    . 'yeah I love it<hr>',
    'Aha 1 yeah 4 no 6 *** <new1><new2><new3><br>'
    . 'yeah I love it<hr>',
    'Aha 1 yeah 4 no 6 *** <new1><new2><new3><br>'
    . 'yeah I love it<hr>',
    'Aha 1 yeah 4 no 6 *** <new1><new2><new3><br>'
    . 'yeah I love it<hr>'];


        
        
        $count_title_content = 10;
        $all_mark_title = 3;
        
        $all_round = $count_title_content*$all_mark_title;
        
        
        
        $add_all = $this->genTitle($all_round);
        
        for($round_content =0; $round_content<$count_title_content; $round_content++){
            for($round_mark =0; $round_mark<$all_mark_title; $round_mark++){
                
                $data = array_rand($add_all,1);
                $title = $add_all[$data];
                unset($add_all[$data]);
                
                $mark = $round_mark+1;
                if($title){
                    $content[$round_content] = str_replace("<new$mark>","<h$mark>$title</h$mark>",$content[$round_content]);
                }
                else{
                    $content[$round_content] = str_replace("<new$mark>","",$content[$round_content]);
                }
            }
        }
        
        var_dump($content);exit();
    }
    
    public function genTitleUnique($all_round){
        $title1 = [/*'title1_1',*/'title1_2','title1_3','title1_4','title1_5','title1_6','title1_7','title1_8','title1_9','title1_10'];
        $title2 = [/*'title2_1',*/'title2_2','title2_3','title2_4','title2_5','title2_6','title2_7','title2_8','title2_9','title2_10'];
        $allTi = array_merge($title1,$title2);
        
        $count_title_add = count($allTi);
        
        if($count_title_add<$all_round){
            $diff = $all_round-$count_title_add;

            for($i =0; $i<$diff; $i++){
                $add_ghost[$i] = null;
            }
            $add_all = array_merge($allTi,$add_ghost);
        }
        else{
            $add_all = $allTi;
        }
        return $add_all;
    }
    
    public function genTitlePercentNull($percent = null){
        $title1 = [/*'title1_1',*/'title1_2','title1_3','title1_4','title1_5','title1_6','title1_7','title1_8','title1_9','title1_10'];
        $title2 = [/*'title2_1',*/'title2_2','title2_3','title2_4','title2_5','title2_6','title2_7','title2_8','title2_9','title2_10'];
        $allTi = array_merge($title1,$title2);
        
        $count_title_add = count($allTi);
        if($percent){
            if($percent>=100){
                return [null];
            }
            $percent_have = 100-$percent;
            
            $null = round($count_title_add*100/$percent_have)-$count_title_add;
            
            for($i =0; $i<$null; $i++){
                $add_ghost[$i] = null;
            }
            $allTi = array_merge($allTi,$add_ghost);
        }
        
        return $allTi;
    }
    
    public function randomHeader() {
        
    }
    

}
