<?php
namespace app\commands;

use yii\console\Controller;
use app\models\Ref;

class RefController extends Controller
{
    public function actionFill()
    {
        $refs = Ref::find()->where(['title'=>null])->orWhere(['title'=>''])->all();
        foreach($refs as $ref) {
            try{
                $title = $this->getTitle($ref->url);
                if($title && $title != '') {
                    $ref->title = $title;
                    $ref->save();
                }
            }
            catch(\Exception $ex) {
                echo $ex->getMessage() . "\n";
            }
        }

        return 0;
    }

    public function getTitle($url)
    {
        $url = trim($url);

        if(!$p = file_get_contents($url))
            return null;
        $res = preg_match("/<title>(.*)<\/title>/siU", $p, $title_matches);
        if (!$res)
            return null; 

        // Clean up title: remove EOL's and excessive whitespace.
        $title = preg_replace('/\s+/', ' ', $title_matches[1]);
        $title = html_entity_decode(trim($title));
        return $title;
    }
}