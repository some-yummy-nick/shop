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
use yii\data\Pagination;
use yii\web\HttpException;

class CategoryController extends AppController
{
    public function actionIndex()
    {
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('E-SHOPPER');
        return $this->render('index', compact('hits'));
    }

    public function actionView($id)
    {
        $category = Category::findOne($id);
        if (empty($category)) {
            throw  new HttpException(404, 'Такой категории нет');
        }

        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('E-SHOPPER | ' . $category->name, $category->keywords, $category->description);
        return $this->render('view', compact('products', 'pages', 'category'));
    }
}
