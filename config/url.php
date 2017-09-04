<?php

return [
            'enablePrettyUrl' => TRUE,
            'showScriptName' => FALSE,
            'enableStrictParsing' => FALSE,
            'rules' => [

                'personal/alert/<action:.*?>' => 'personal/alert/',
                'gallery/manage/<album:.*?>' => 'gallery/manage',
                'gallery/view/<slug:.*?>' => 'gallery/view/',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<modules:\w+>/<controller:\w+>/<action:\w+>' => '<modules>/<controller>/<action>',
                '<modules:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<modules>/<controller>/<action>',
                //'wtf' => 'wonder',

                [
                    'class' => 'app\components\UrlRules',
                    // ...configure other properties...
                ],
            ]
        ];