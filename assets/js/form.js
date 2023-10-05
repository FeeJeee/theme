jQuery(document).ready(function ($) {
    $(".modal_button").click(function (event) {
        event.preventDefault();
        var name = $("#name").val();
        var phone = $("#phone").val();
        var accept = $("#accept").prop('checked');

        var regex = /^((\+7|7|8)+[0-9]{10})/;

        if (name  === '') {
            $('#form-error').html("Заполните поле с имененем");
            return false;
        } else if (phone  === '') {
            $('#form-error').html('Заполните поле с номером телефона');
            return false;
        } else if (!regex.test(phone)) {
            $('#form-error').html('Телефон заполнен не верно');
            return false;
        } else if (accept === false) {
            $('#form-error').html('Примите условия');
            return false;
        } else {
            $('#form-error').html('');
        }

        $.ajax({
            url: formData.ajaxurl,
            method: 'post',
            data: {
                action: 'ajax_form',
                name: name,
                phone: phone
            },

            beforeSend: function() {
                $("#send-status").html("Отправляем данные...");
            },

            success: function(response){
                $('#send-status').html(response);
                if (response === "Ошибка при отправке") {
                    $('#form').trigger("reset");
                }
            },
        });
    });
});

