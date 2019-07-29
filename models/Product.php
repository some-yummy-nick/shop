<?php
/**
 * Created by PhpStorm.
 * User: Marat
 * Date: 24.07.2019
 * Time: 17:09
 */

namespace app\models;
use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
public static function tableName()
{
    return 'product';
}
public function getCategory(){
    return $this->hasOne(Category::className(), ['id'=>'category_id']);
}
}
