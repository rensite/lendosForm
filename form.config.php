<?php
    define('WEBSITE','website.ru');
    define('TO','test@website.ru');
    define('SUBJECT','Заказ звонка с сайта');
    define('BUTTON', 'Заказать звонок');
    define('FIELDS', [
        'orgname' => [
            'caption' => 'Название организации',
            'required' => true
            ],
        'name' => [
            'caption' => 'Меня зовут',
            'required' => false
            ],
        'phone' => [
            'caption' => 'Телефон',
            'required' => true
            ],
        'email' => [
            'caption' => 'Email',
            'required' => false
            ],
        'message' => [
            'caption' => 'Сообщение',
            'required' => false
            ]
    ]);