<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;

class ApiController extends Controller
{
    function actionError()
    {
        $e = Yii::$app->errorHandler->exception;
        return $this->asJson([
            "success" => false,
            "error" => [
                "code" => $e->statusCode,
                "msg"  => $e->getMessage()
            ]
        ]);
    }
}