<?php
namespace frontend\components;

use Yii;
use yii\base\Widget;
use yii\helpers\Url;

class LanguageWidget extends Widget
{
    private static $_labels;
    private $items;

    private $_isError;

    public function init()
    {
        $route = Yii::$app->controller->route;
        $appLanguage = Yii::$app->language;
        $params = $_GET;
        $this->_isError = $route === Yii::$app->errorHandler->errorAction;

        array_unshift($params, '/'.$route);

        foreach (Yii::$app->urlManager->languages as $language) {
            // $isWildcard = substr($language, -2)==='-*';
            // if (
            //     $language===$appLanguage ||
            //     // Also check for wildcard language
            //     $isWildcard && substr($appLanguage,0,2)===substr($language,0,2)
            // ) {
            //     continue;   // Exclude the current language
            // }
            // if ($isWildcard) {
            //     $language = substr($language,0,2);
            // }
            $params['language'] = $language;
            $this->items[] = [
                'label' => self::label($language),
                'url' => $params,
            ];
        }
    }

    public function run()
    {
        // Only show this widget if we're not on the error page
        if ($this->_isError) {
            return '';
        } else {
            $lang_array = $this->items;
            // echo Yii::$app->language;
            // echo '<pre>';
            // print_r($lang_array); die();
            $result_html = '';
            foreach ($lang_array as $item) {
                $active_string = '';
                if($item['url']['language'] == Yii::$app->language) {
                    $active_string = 'active';
                }
                $result_html .= '<a class="'.$active_string.'" href="'.Url::to('/'.$item['url']['language'].$item['url'][0]).'">'.$item['label'].'</a>';
            }
            //$result_html .= '</ul>';
            return $result_html;
        }
    }

    public static function label($code)
    {
        if (self::$_labels===null) {
            self::$_labels = [
                'ru' => Yii::t('app', 'lng.ru'),
                'uz' => Yii::t('app', 'lng.uz'),
                'uzl' => Yii::t('app', 'lng.uzl'),
            ];
        }

        return isset(self::$_labels[$code]) ? self::$_labels[$code] : null;
    }
}