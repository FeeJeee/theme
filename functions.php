<?php
    add_action('wp_enqueue_scripts', 'add_scripts_and_styles');

    function add_scripts_and_styles() {
        wp_enqueue_script('jquery');
        wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/popup.js', false, null, true);
        wp_enqueue_style('fonts', get_template_directory_uri() . '/assets/css/fonts.css');
        wp_enqueue_style('main', get_stylesheet_uri(), array('fonts'));

        wp_enqueue_script('form', get_template_directory_uri() . '/assets/js/form.js', array('jquery'));

        wp_localize_script('form', 'formData', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
        ));
    }

    use PHPMailer\PHPMailer\PHPMailer;

    add_action( 'phpmailer_init', 'mihdan_send_smtp_email' );
    function mihdan_send_smtp_email( PHPMailer $phpmailer ) {
        $phpmailer->isSMTP();
        $phpmailer->Host       = SMTP_HOST;
        $phpmailer->SMTPAuth   = SMTP_AUTH;
        $phpmailer->Port       = SMTP_PORT;
        $phpmailer->Username   = SMTP_USER;
        $phpmailer->Password   = SMTP_PASS;
        $phpmailer->SMTPSecure = SMTP_SECURE;
        $phpmailer->From       = SMTP_FROM;
        $phpmailer->FromName   = SMTP_NAME;
    }

    function ajax_form(){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $response = '';

        $to = "v.tumaev99@gmail.com";
        $subject = "Письмо с обратной связи";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: <test@mail.ru>\r\n";

        $message .= "Имя пользователя: ".$name."\n";
        $message .= "Телефон: ".$phone."\n";

        if(wp_mail($to, $subject, $message, $headers)) {
            $response = 'Сообщение отправлено';
        } else {
            $response = 'Ошибка при отправке';
        }

        if ( !empty($response) ){
            echo $response;
        }

        wp_die();
    }

    add_action('wp_ajax_nopriv_ajax_form', 'ajax_form' );
    add_action('wp_ajax_ajax_form', 'ajax_form' );
?>