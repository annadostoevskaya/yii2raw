<?php declare(strict_types=1);

namespace app\commands;

use Yii;
use app\models\I18N;

class IntlController extends \yii\console\Controller
{
    public $outputDir = './public/i18n';
    private $registeredLanguages = ['en', 'ru', 'kz'];

    public function options($actionID)
    {
        return ['outputDir'];
    }
    
    public function optionAliases()
    {
        return ['d' => 'outputDir'];
    }
    
    public function actionIndex()
    {
        if (!is_dir($this->outputDir))
        {
            echo "ERROR: '{$this->outputDir}' is not a dir\n";
            return -1;
        }

        foreach ($this->registeredLanguages as $key => $language) {
            $selected = Yii::$app->db->createCommand('SELECT uid, message FROM t_i18n WHERE code=:code')
                ->bindValue(':code', $language)
                ->queryAll();

            $messages = [];
            foreach ($selected as $r) {
                $key = $r['uid'];
                $messages[$key] = $r['message'];
            }

            file_put_contents($this->outputDir . "/$language" . '.json', json_encode($messages));
        }

        return 0;
    }
}
