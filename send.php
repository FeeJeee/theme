
////mail('asd173rus@yandex.ru', 'My Subject', 'DIana');
////wp_mail( 'asd173rus@yandex.ru', 'Сообщение с сайта',  '23131');
//// подключаем WP, можно конечно обойтись без этого, но зачем?
////require( dirname(__FILE__) . '/wp-load.php');
//
//// следующий шаг - проверка на обязательные поля, у нас это емайл, имя и сообщение
//if( !empty( $_POST['name'] ) ){
//
//
//        header('Location:' . 'http://wordpress/?msg=success' );
//        exit;
//
//
//}
//
//header('Location:' . 'http://wordpress/?msg=error' );
//exit;
//
//?

<?php
/*ПОМЕЩАЕМ ДАННЫЕ ИЗ ПОЛЕЙ В ПЕРЕМЕННЫЕ*/
$name = $_POST["name"];
$email = $_POST["email"];
$tel = $_POST["phone"];


/*ЗДЕСЬ ПРОВЕРЯЕМ ЕСЛИ ХОТЯ БЫ ОДНО ИЗ ПОЛЕЙ НЕ ЗАПОЛНЕНО МЫ ВОЗВРАЩАЕМ СООБЩЕНИЕ*/
if($name=="" or $email=="" or $tel==""){
    echo "Заполните все поля";
}

else{
    /*ЕСЛИ ВСЕ ПОЛЯ ЗАПОЛНЕНЫ НАЧИНАЕМ СОБИРАТЬ ДАННЫЕ ДЛЯ ОТПРАВКИ*/
    $to = "asd173rus@yandex.ru"; /* Адрес, куда отправляем письма*/
    $subject = "Письмо с обратной связи"; /*Тема письма*/
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: <test@mail.ru>\r\n";/*ОТ КОГО*/

    /*ВО ВНУТРЬ ПЕРЕМЕННОЙ $message ЗАПИСЫВАЕМ ДАННЫЕ ИЗ ПОЛЕЙ */
    $message .= "Имя пользователя: ".$name."\n";
    $message .= "Почта: ".$email."\n";
    $message .= "Телефон: ".$tel."\n";

    /*ДЛЯ ОТЛАДКИ ВЫ МОЖЕТЕ ПРОВЕРИТЬ ПРАВИЛЬНО ЛИ ЗАПИСАЛИCM ДАННЫЕ ИЗ ПОЛЕЙ*/
    //print_r($message);

    $send = wp_mail($to, $subject, $message, $headers);

    /*ЕСЛИ ПИСЬМО ОТПРАВЛЕНО УСПЕШНО ВЫВОДИМ СООБЩЕНИЕ*/
    if ($send == "true")
    {
        echo "<p style='color: green;'>Ваше сообщение отправлено. Мы ответим вам в ближайшее время.\r\n</p>";
    }
    /*ЕСЛИ ПИСЬМО НЕ УДАЛОСЬ ОТПРАВИТЬ ВЫВОДИМ СООБЩЕНИЕ ОБ ОШИБКЕ*/
    else
    {
        echo "<p style='color: red;'>Не удалось отправить, попробуйте снова!</p>";
    }
}
?>