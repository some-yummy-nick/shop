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
use yii\web\HttpException;


class ProductController extends AppController
{

    public function actionView($id)
    {
        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if (empty($product)) {
            throw  new HttpException(404, 'Такого продукта нет');
        }
        $this->setMeta('E-SHOPPER | ' . $product->name, $product->keywords, $product->description);

        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        return $this->render('view', compact('product', 'hits'));
    }
}
