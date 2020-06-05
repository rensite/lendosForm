<?php
    include('./form.config.php');
    
    $msg = ''; // Текст письма
    
    function exitError($message) {
        http_response_code(500);
        exit($message);
    }
    
    function exitSuccess($message) {
        http_response_code(200);
        exit($message);
    }

    // Пробегаемся по массиву POST данных
    // Существующие добавляем в текст письма
    foreach ($_POST as $key => $value) {
        if (array_key_exists($key, FIELDS)) {
            $msg .= FIELDS[$key]['caption'] .': ' . $value . '<br>';
        }
    } 
    
    // Не указаны контакты
    if (!isset($_POST['phone']) && !isset($_POST['email'])) {
        exitError('Impossible to call you back');
    }
    
    // Пустая форма
    if (strlen($msg) === 0) {
        exitError('The form is empty');
    }
    
    $msg = SUBJECT . ' ' . WEBSITE . '<br><br>' . $msg;
    
    // Настройка заголовков письма
    $from = 'robot@'.WEBSITE;
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: <".$from.">\r\n";

    // Отправка письма
    if ( mail(TO, SUBJECT, $msg, $headers) ) {
        exitSuccess('Success!');
    } else {
        exitError('Mail send error');
    }
    
