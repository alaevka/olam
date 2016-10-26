<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\helpers\Json;

class TvController extends Controller
{
    public function actionIndex()
    {
    	$now_day_of_week = date('w');
    	$model = new \common\models\TvSearch;

    	$channels = \common\models\Tvprogramms::find()->groupBy('channel')->all();

        

        return $this->render('index', [
            'now_day_of_week' => $now_day_of_week,
            'model' => $model,
            'time_array' => $this->hoursRange(),
            'channels' => $channels,

        ]);
    }

    private function hoursRange( $lower = 0, $upper = 86400, $step = 3600, $format = '' ) {
	    $times = array();

	    if ( empty( $format ) ) {
	        $format = 'g:i a';
	    }

	    foreach ( range( $lower, $upper, $step ) as $increment ) {
	        $increment = gmdate( 'H:i', $increment );

	        list( $hour, $minutes ) = explode( ':', $increment );

	        $date = new \DateTime( $hour . ':' . $minutes );

	        $times[(string) $increment] = (string) $increment;
	    }

	    return $times;
	}

}