<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=123.57.66.116;dbname=reap',
            'username' => 'aqian',
            'password' => 'root',
            'charset' => 'utf8',
        ],

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [  
       'class' => 'Swift_SmtpTransport',  
       'host' => 'smtp.163.com',  //每种邮箱的host配置不一样
       'username' => 'wd1310phpc@163.com',  
       'password' => 'z123456',  
       'port' => '25',  
       'encryption' => 'tls',  
                           
                   ],   
   'messageConfig'=>[  
       'charset'=>'UTF-8',  
       'from'=>['wd1310phpc@163.com'=>'admin']  
       ],  /*
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.163.com',
                'username' => '15810339670@163.com',
                'password' => 'QQMIMA0926d',        //如果是163邮箱，此处要填授权码
                'port' => '25',
                'encryption' => 'tls',
            ],
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,*/
        ],






    ],
];
