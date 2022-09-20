<?php

namespace app\controllers;

use app\models\Marka;
use app\models\Privod;
use app\models\Product;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

class PrivodController extends ActiveController
{
    public $modelClass = Privod::class;

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
        ];
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();

        $actions['index']['dataFilter'] = [
            'class' => \yii\data\ActiveDataFilter::class,
            'searchModel' => $this->modelClass,
        ];

        unset($actions['update'], $actions['view'], $actions['delete']);

        return $actions;
    }
}

