<?php
/**
 * Created by PhpStorm.
 * User: Marat
 * Date: 29.07.2019
 * Time: 18:23
 */

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;

class CategoryController extends AppController
{
    public function actionIndex()
    {
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        return $this->render('index', compact('hits'));
    }
}
