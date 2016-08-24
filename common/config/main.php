<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
	    'user' => [
	        'class' => 'dektrium\user\Module',
	        // you will configure your module inside this file
	        // or if need different configuration for frontend and backend you may
	        // configure in needed configs
	    ],
	    'rbac' => 'dektrium\rbac\RbacWebModule',
	],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
		    'class' => Zelenin\yii\modules\I18n\components\I18N::className(),
		    'languages' => ['ru', 'uz', 'uzl']
		],
    ],
];
