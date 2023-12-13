<?php

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;port=3306;dbname=tutorias',
            'username' => 'tutorias',
            'password' => '@adm1n.sct',
            'charset' => 'utf8', 
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'sistemacontroltutorias@gmail.com',
                'password' => 'krsj tcpe rlxz nfbm',
                //'username' => 'santiagocahum25@gmail.com',
                //'password' => 'uoxf blhj ctrq jqlc',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ]
    ],
];
