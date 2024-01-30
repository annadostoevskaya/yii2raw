<?php 
namespace app\controllers;

use yii\rest\ActiveController;

class UserController extends ActiveController
{
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            [
                'class' => \yii\filters\ContentNegotiator::class,
                'only' => ['index', 'view'],
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON,
                ],
            ],
        ];
    }

    public $modelClass = 'app\models\User';
}

?>