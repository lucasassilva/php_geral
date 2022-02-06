<?php

namespace app\controllers;

use yii\filters\Cors;
use yii\helpers\ArrayHelper;

class EmailController extends \yii\web\Controller
{

    public function behaviors()
    {
        return ArrayHelper::merge([
            [
                'class' => Cors::class,
            ],
        ], parent::behaviors());
    }

    public function actionIndex()
    {
        $request = \Yii::$app->request;
        if ($request->isPost) {
            $now = (new \DateTime)->format('Y-m-d h:i:s');
            return $this->asJson([
                'name' => $request->post("name"),
                'email' => $request->post("email"),
                'phone' => $request->post("phone"),
                'message' => $request->post("message"),
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
