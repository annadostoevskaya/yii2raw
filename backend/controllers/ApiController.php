<?php
namespace app\controllers;

use Yii;
use yii\base\ErrorException;
use yii\base\Exception;
use yii\web\Controller;

use app\tasks\DownloadTask;

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

    function actionTestQueue()
    {
        $taskId = Yii::$app->queue->push(new DownloadTask([
            'url' => 'https://google.com/img',
            'file' => '/tmp/image.jpg',
        ]));
        return $this->asJson([
            'id' => $taskId,
            'success' => true
        ]);
    }
}