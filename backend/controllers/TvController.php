<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use Faker;
use GuzzleHttp\Client;

class TvController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    
    public function actionIndex()
    {
        $days_of_week_array = [
            'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'
        ];

        $channels_url_array = [
            'ortwordsng' => 'http://tv.afisha.uz/channel/ortwordsng/dayofweek/fullday',
            'russia' => 'http://tv.afisha.uz/channel/russia/dayofweek/fullday',
            'ntv' => 'http://tv.afisha.uz/channel/russia/dayofweek/fullday',
            'tnt1' => 'http://tv.afisha.uz/channel/russia/dayofweek/fullday',
            'home' => 'http://tv.afisha.uz/channel/russia/dayofweek/fullday',
            'sts' => 'http://tv.afisha.uz/channel/russia/dayofweek/fullday',
            'tv3' => 'http://tv.afisha.uz/channel/russia/dayofweek/fullday',
            'darial' => 'http://tv.afisha.uz/channel/russia/dayofweek/fullday',
            'cultura' => 'http://tv.afisha.uz/channel/russia/dayofweek/fullday',
            'rentv1' => 'http://tv.afisha.uz/channel/russia/dayofweek/fullday',
            'tvcen1' => 'http://tv.afisha.uz/channel/russia/dayofweek/fullday',
            'rtr_sport' => 'http://tv.afisha.uz/channel/russia/dayofweek/fullday',
            'ort' => 'http://tv.afisha.uz/channel/russia/dayofweek/fullday',
            'muztv' => 'http://tv.afisha.uz/channel/russia/dayofweek/fullday',
            'mtvros' => 'http://tv.afisha.uz/channel/russia/dayofweek/fullday',
        ];


        foreach($channels_url_array as $st =>$channel) {
            foreach ($days_of_week_array as $day) {
                $url = str_replace('dayofweek', $day, $channel);

                $client = new Client();
                $res = $client->request('GET', $url);
                $body = $res->getBody();
                $document = \phpQuery::newDocumentHTML($body);
                $list = $document["div.channel table tr"]; 

                foreach ($list as $elem) {
                    if(!empty(pq($elem)->find('td.time')->text())) {
                        //echo $st.' - '.$day.' - '.pq($elem)->find('td.time')->text().' - '.pq($elem)->find('td.show')->text().'<br>';
                        $tvprogramms = new \common\models\Tvprogramms;
                        $tvprogramms->channel = $st;
                        $tvprogramms->day = $day;
                        $tvprogramms->time = pq($elem)->find('td.time')->text();
                        $tvprogramms->show = trim(pq($elem)->find('td.show')->text());
                        $tvprogramms->save();
                    }
                }
                sleep(2);
            }
        }
        
    }

}