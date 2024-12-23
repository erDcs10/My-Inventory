<?php

namespace app\controllers;

use app\models\Barang;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ProductController extends Controller
{

    public function actionView($id)
    {
    $product = Barang::findOne($id);
    if ($product === null) {
        throw new NotFoundHttpException('Product not found.');
    }
    return $this->render('view', ['product' => $product]);
    }

}