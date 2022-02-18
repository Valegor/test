<?php

namespace app\components;

use app\models\PostCategory;
use yii\base\Widget;

class MenuWidget extends Widget
{

    public $tpl;
    public $ul_class;
    public $data;
    public $tree; // tree category
    public $menuHtml; // complete HTML
    public $cache_time = 60;

    public function init()
    {
        parent::init();
        if($this->ul_class === null){
            $this->ul_class = 'sub-menu';
        }
        if($this->tpl === null){
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run()
    {

        // get cache
        if($this->cache_time){
            $menu = \Yii::$app->cache->get('menu');
            if($menu){
                return $menu;
            }
        }

        $this->data = PostCategory::find()->all();
        // $this->data = PostCategory::find()->select('id, category')->indexBy('id')->asArray()->all();

        $this->menuHtml = '';

        $this->menuHtml = '<a href="' . \yii\helpers\Url::to(['post/index']) . '"><span>Статьи</span></a> <ul class="sub-menu">';

        foreach ($this->data as $cat) {
            $this->menuHtml = $this->menuHtml . '<li> <a href="' . \yii\helpers\Url::to(['post/view', 'id' => $cat->id]). '"><span>' . $cat->category . '</span></a> </li>';
        }       

        $this->menuHtml = $this->menuHtml . '</ul>';   
        
        if($this->cache_time){
            \Yii::$app->cache->set('menu', $this->menuHtml, $this->cache_time);
        }

        return $this->menuHtml;
    }
}