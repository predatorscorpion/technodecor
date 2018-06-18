(function($){
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

        //Masonry
        $('.elements-gride').masonry({
            itemSelector: '.masonry-item',
            columnWidth: 300,
            isFitWidth: true
        });

        $('.masonry-item').hover(function () {
            $(this).find('a').append('<div class="masonry-item-hover"><img src="' + pathToTheme + '/images/icons/white-arrow.png"></div>');
        }, function () {
            $('div.masonry-item-hover').remove();
        });

        //Slick
        $('.galleries-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            asNavFor: '.galleries-nav'
        });
        $('.galleries-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.galleries-for',
            dots: true,
            focusOnSelect: true
        });

        var menuOpened = false;
        $('.menu__icon').on('click', function() {
            if (!menuOpened) {
                menuOpened = true;
                $(this).closest('.menu').toggleClass('menu_state_open');
                $('.menu').find('nav').slideToggle(400, 'swing', function () {
                    menuOpened = false;
                });
            }
        });

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

        //submit form contacts-form
        $('.contacts-form').submit(function(){
            var $client_name = $(this).find("input[name='name']");
            var $client_email = $(this).find("input[name='e-mail']");

            var $client_comments = $(this).find("textarea[name='user-comments']");

            var sentForm = true;

            if($.trim($client_name.val()) != '' && $client_name.val().length >= 2 && patternName.test($client_name.val())){
                $client_name.tooltip('hide');
            }
            else{
                $client_name.tooltip('show');
                sentForm = false;
            }

            if($.trim($client_email.val()) != '' && patternEmail.test($client_email.val())){
                $client_email.tooltip('hide');
            }
            else{
                $client_email.tooltip('show');
                sentForm = false;
            }

            if($.trim($client_comments.val()) != ''){
                $client_comments.tooltip('hide');
            }
            else{
                $client_comments.tooltip('show');
                sentForm = false;
            }

            if(sentForm){
                var data = $(this).serialize();

                var $message_successfully = $(this).find('p.message-successfully-submitted');
                var $message_failed = $(this).find('p.error-while-submitting-message');

                var $img_loader = $(this).find('img');
                $img_loader.show();

                jQuery.ajax({
                    type: 'POST',
                    url: "/wp-admin/admin-ajax.php",
                    data: data + '&action=contacts_form',
                    success: function (response) {
                        if(response){
                            $client_name.val('');
                            $client_email.val('');
                            $client_comments.val('');

                            $img_loader.hide();

                            $message_successfully.show();
                            setTimeout(function(){
                                $message_successfully.hide();
                            }, 5000);
                        }
                        else{
                            $img_loader.hide();
                            $message_failed.show();
                            setTimeout(function(){
                                $message_failed.hide();
                            }, 5000);
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        $img_loader.hide();
                        $message_failed.show();
                        setTimeout(function(){
                            $message_failed.hide();
                        }, 5000);
                        alert(thrownError);
                    }
                });
            }
        });
    });
})(jQuery);
