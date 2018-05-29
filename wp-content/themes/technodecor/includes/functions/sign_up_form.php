<?php
function sign_up_form(){
    $name = trim(htmlspecialchars($_POST['name']));
    $mail = trim(htmlspecialchars($_POST['e-mail']));
    $message = trim(htmlspecialchars($_POST['message']));

    $headers[] = 'Content-type: text/html; charset=utf-8';

    $textMessage = "<table>
        <tr>
            <td style='padding: 5px 0px;'><b>Ім'я:</b></td>
            <td style='padding: 5px 0px; padding-left: 20px;'>" . $name . "</td>
        </tr>
        <tr>
            <td style='padding: 5px 0px;'><b>E-mail:</b></td>
            <td style='padding: 5px 0px; padding-left: 20px;'>" . $mail . "</td>
        </tr>
        <tr>
            <td style='padding: 5px 0px;'><b>Повідомлення:</b></td>
            <td style='padding: 5px 0px; padding-left: 20px;'>" . $message . "</td>
        </tr>
    </table>";

    if(wp_mail('technodecor@ukr.net', 'Технології декору', $textMessage, $headers)){
        echo 1;
    }
    else{
        echo 0;
    }

    wp_die();
}

add_action('wp_ajax_sign_up_form', 'sign_up_form');
add_action('wp_ajax_nopriv_sign_up_form', 'sign_up_form');