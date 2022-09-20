<?php

namespace app\controllers;

use app\models\Model;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

class ModelController extends ActiveController
{
    public $modelClass = Model::class;

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

