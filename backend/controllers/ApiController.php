<?php
namespace app\controllers;

use Yii;
use yii\base\ErrorException;
use yii\base\Exception;
use yii\web\Controller; 

class ApiController extends Controller
{
    function actionError()
    {
        $e = Yii::$app->errorHandler->exception;
        return $this->asJson([
            "name" => ($e instanceof Exception || $e instanceof ErrorException) ? $e->getName() : 'Exception',
            "message" => $e->getMessage(),
            "code" => $e->getCode(),
            "status" => $e->statusCode,
            "type" => get_class($e),
        ]);
    }

    function actionTestRedis()
    {
        \Yii::$app->cache->multiSet([
            'posts{user1}' => 123,
            'settings{user1}' => [
                'showNickname' => false,
                'sortBy' => 'created_at',
            ],
            'unreadMessages{user1}' => 5,
        ]);

        return;
    }
}