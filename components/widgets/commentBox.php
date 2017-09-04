<?php
namespace app\components\widgets;

use Yii;
use yii\base\Widget;
use app\models\ContentModel;

class commentBox extends Widget {
    public $model;
    public $top_model = null;
    public $pagination = 0;
    public $title;
    public $category;
    public $id_category;
    public $_parent = null;
    private $banned1;
    private $banned2;

    public function init() {
        $this->banned1 = ContentModel::findOne(['type'=>'comment-banned','name'=>1])->content;
        $this->banned2 = ContentModel::findOne(['type'=>'comment-banned','name'=>2])->content;
    }

    public function run() {
        return $this->render('commentBox', 
        [
            'model' => $this->model,
            'top_model' => $this->top_model,
            'pagination' => $this->pagination,
            'title' => $this->title,
            'category' => $this->category,
            'id_category' => $this->id_category,
            'parent' => $this->_parent,
            'banned1' => $this->banned1,
            'banned2' => $this->banned2,
        ]);
    }
    
}
