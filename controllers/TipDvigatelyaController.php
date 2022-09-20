<?php

namespace app\controllers;

use app\models\TipDvigatelya;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

class TipDvigatelyaController extends ActiveController
{
    public $modelClass = TipDvigatelya::class;

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

