$(document).ready(function() {
    var images = $('.main-slider').data('images').split(' ');
    var pathToTheme = $('.promo-block').data('path-to-theme');

    if (images.length > 1) {
        var imgIndex = 1;

        setInterval(function () {
            $('.main-slider').css({
                'background': 'url("' + pathToTheme + '/images/slider/' + images[imgIndex] + '") no-repeat center 0',
                'background-size': 'cover'
            });
            imgIndex++;

            if (imgIndex > images.length - 1) {
                imgIndex = 0;
            }
        }, 5000);
    }

    //---------------------- Sign up form --------------------------------------
    var patternName = /^[а-яА-ЯёЁіІїЇєЄґҐйЙa-zA-Z ]+$/;
    var patternEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{1,6})+$/;

    $("input[name='name']").focus(function(){
        $(this).tooltip('hide');
    });
    $("input[name='e-mail']").focus(function(){
        $(this).tooltip('hide');
    });
    $("textarea[name='message']").focus(function(){
        $(this).tooltip('hide');
    });

    //submit form stand-among-us
    $('.sign-up-form').submit(function(){
        var $clientName = $(this).find("input[name='name']");
        var $clientEmail = $(this).find("input[name='e-mail']");
        var $message = $(this).find("textarea[name='message']");

        var sentForm = true;

        if($.trim($clientName.val()) != '' && $clientName.val().length >= 2 && patternName.test($clientName.val())){
            $clientName.tooltip('hide');
        }
        else{
            $clientName.tooltip('show');
            sentForm = false;
        }

        if($.trim($clientEmail.val()) != '' && patternEmail.test($clientEmail.val())){
            $clientEmail.tooltip('hide');
        }
        else{
            $clientEmail.tooltip('show');
            sentForm = false;
        }

        if($.trim($message.val()) != ''){
            $message.tooltip('hide');
        }
        else{
            $message.tooltip('show');
            sentForm = false;
        }

        if(sentForm){
            var data = $(this).serialize();

            var $submutForm = $(this).find('input[type="submit"]');
            var messageSuccess = $(this).data('message-success');
            var messageDefault = $(this).data('message-default');

            var $messageFailed = $(this).find('p.error-while-submitting-message');

            var $imgLoader = $(this).find('img');
            $imgLoader.show();

            jQuery.ajax({
                type: 'POST',
                url: "/wp-admin/admin-ajax.php",
                data: data + '&action=sign_up_form',
                success: function (response) {
                    if(response){
                        $clientName.val('');
                        $clientEmail.val('');

                        $imgLoader.hide();

                        $message.val('');
                        $submutForm.val(messageSuccess);

                        setTimeout(function(){
                            $submutForm.val(messageDefault);
                        }, 5000);
                    }
                    else{
                        $imgLoader.hide();
                        $messageFailed.show();
                        setTimeout(function(){
                            $messageFailed.hide();
                        }, 5000);
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    $imgLoader.hide();
                    $messageFailed.show();
                    setTimeout(function(){
                        $messageFailed.hide();
                    }, 5000);
                    console.log(thrownError);
                }
            });
        }
    });
});
