<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'language' => 'ru',
    'modules' => [
        'user' => [
            // following line will restrict access to admin controller from frontend application
            'as frontend' => 'dektrium\user\filters\FrontendFilter',
            'class' => 'dektrium\user\Module',
            'modelMap' => [
                'User' => 'common\models\User',
                'RegistrationForm' => 'frontend\models\RegistrationForm',
                'LoginForm' => 'frontend\models\LoginForm',
            ],
            'controllerMap' => [
                'security' => 'frontend\controllers\user\SecurityController',
                'registration' => 'frontend\controllers\user\RegistrationController'
            ],
        ],
        'comments' => [
            'class' => 'rmrevin\yii\module\Comments\Module',
            'userIdentityClass' => 'common\models\User',
            'useRbac' => false,
            'modelMap' => [
                'Comment' => 'common\models\CommentModel',
                'CommentCreateForm' => 'common\models\CommentCreateFormModel',
            ]
        ]
    ],
    'components' => [
        'formatter' => [
           'dateFormat' => 'php:d.m.Y',
           'datetimeFormat' => 'd-M-Y H:i:s',
           'timeFormat' => 'H:i:s',
           'locale' => 'ru', //your language locale
           'defaultTimeZone' => 'Europe/Berlin', // time zone
        ],
        'authClientCollection' => [
            'class'   => \yii\authclient\Collection::className(),
            'clients' => [
                'vkontakte' => [
                    'class'        => 'dektrium\user\clients\VKontakte',
                    'clientId'     => 'CLIENT_ID',
                    'clientSecret' => 'CLIENT_SECRET',
                ],
                'facebook' => [
                    'class'        => 'dektrium\user\clients\Facebook',
                    'clientId'     => 'APP_ID',
                    'clientSecret' => 'APP_SECRET',
                ],
                'twitter' => [
                    'class'          => 'dektrium\user\clients\Twitter',
                    'consumerKey'    => 'CONSUMER_KEY',
                    'consumerSecret' => 'CONSUMER_SECRET',
                ],
                'google' => [
                    'class'        => 'dektrium\user\clients\Google',
                    'clientId'     => 'CLIENT_ID',
                    'clientSecret' => 'CLIENT_SECRET',
                ],
                'github' => [
                    'class'        => 'dektrium\user\clients\GitHub',
                    'clientId'     => 'CLIENT_ID',
                    'clientSecret' => 'CLIENT_SECRET',
                ],
                'yandex' => [
                    'class'        => 'dektrium\user\clients\Yandex',
                    'clientId'     => 'CLIENT_ID',
                    'clientSecret' => 'CLIENT_SECRET'
                ],
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user',
                    '@vendor/rmrevin/yii2-comments/widgets/views' => '@app/views/comments'
                ],
            ],
        ],
        'CbRF' => [
            'class' => 'microinginer\CbRFRates\CBRF',
            'defaultCurrency' => "EUR"
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        // 'user' => [
        //     'identityClass' => 'common\models\User',
        //     'enableAutoLogin' => true,
        //     'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        // ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'class' => 'codemix\localeurls\UrlManager',
            'languages' => ['ru', 'uz', 'uzl'],
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                //'realty/view/' => 'news/archive',
                'news/archive' => 'news/archive',
                'news/<slug>' => 'news/index',
                'news/<category>/<slug>' => 'news/view',
                'realty' => 'realty/index',
                'realty/search/<params>' => 'realty/search',
                'auto/search/<params>' => 'auto/search',
                'auto' => 'auto/index',
                '/work/create/resume' => 'work/createresume',
                '/work/search/resume' => 'work/searchresume',
                '/work/view/resume/<id:\d+>' => 'work/viewresume',
                '/work/create/vacancy' => 'work/createvacancy',
                '/work/view/companies' => 'work/companies',
                '/work/create/company' => 'work/createcompany',
                '/work/delete/company/<id:\d+>' => 'work/deletecompany',
                '/work/search/vacancy' => 'work/searchvacancy',
                '/work/view/vacancy/<id:\d+>' => 'work/viewvacancy',

            ],
        ],
        
    ],
    'params' => $params,
];
