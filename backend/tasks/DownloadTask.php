<?php 

namespace app\tasks;

class DownloadTask extends \yii\base\BaseObject implements \yii\queue\JobInterface
{
    public $url;
    public $file;

    public function execute($queue)
    {
        $i = 5;
        while ($i--)
        {
            echo "Downloading File [$this->url:$this->file]...\n";
            sleep(1);
        }
    }
};
