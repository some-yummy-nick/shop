<?php
/**
 * Created by PhpStorm.
 * User: Marat
 * Date: 29.07.2019
 * Time: 18:23
 */

namespace app\controllers;

use Yii;
use app\models\Product;
use yii\data\Pagination;

class SearchController extends AppController
{

    public function actionSearch()
    {
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('E-SHOPPER | ' . $q);

        if (!$q) {
            return $this->render('search');
        }
        $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('products', 'pages', 'q'));
    }
}
