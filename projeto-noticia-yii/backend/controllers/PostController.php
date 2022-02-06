<?php

namespace app\controllers;

use app\models\Post;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;

class PostController extends \yii\web\Controller
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
        $posts = Post::find()->all();
        return $this->asJson($posts);
    }

    public function actionCreate()
    {
        $request = \Yii::$app->request;
        if ($request->isPost) {
            $now = (new \DateTime)->format('Y-m-d h:i:s');
            $post = new Post();
            $post->attributes = [
                'title' => $request->post("title"),
                'body' => $request->post("body"),
                'created_at' => $now,
                'updated_at' => $now
            ];
            $post->save(false);
            return $this->asJson($post);
        }
    }
}
