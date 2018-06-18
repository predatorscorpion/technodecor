<?php
function contacts_form(){
    $name = trim(htmlspecialchars($_POST['name']));
    $mail = trim(htmlspecialchars($_POST['e-mail']));
    $comment = trim(htmlspecialchars($_POST['user-comments']));

    $headers[] = 'Content-type: text/html; charset=utf-8';

    $textMessage = "<table>
        <tr>
            <td style='padding: 5px 0px;'><b>Ім'я:</b></td>
            <td style='padding: 5px 0px; padding-left: 20px;'>".$name."</td>
        </tr>
        <tr>
            <td style='padding: 5px 0px;'><b>E-mail:</b></td>
            <td style='padding: 5px 0px; padding-left: 20px;'>".$mail."</td>
        </tr>
		<tr>
            <td style='padding: 5px 0px;'><b>Повідомлення:</b></td>
            <td style='padding: 5px 0px; padding-left: 20px;'>".$comment."</td>
        </tr>";

    $textMessage .= "</table>";

    $technodecorEmail = get_option('technodecorEmail');
    if (!$technodecorEmail) {
        $technodecorEmail = 'technodecor@ukr.net';
    }

    if(wp_mail($technodecorEmail, 'Технології декору', $textMessage, $headers)){
        echo 1;
    }
    else{
        echo 0;
    }

    wp_die();
}

add_action('wp_ajax_contacts_form', 'contacts_form');
add_action('wp_ajax_nopriv_contacts_form', 'contacts_form');