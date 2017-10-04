<?php
function send_mail_at_update($post_ID)
{
    $the_post = get_post($post_ID);
    $email_author = get_the_author_meta('user_email', intval($the_post->post_author));
    $thePermalink = get_permalink($the_post->ID);
    $content_mail = "
        <html>
            <head>
              <title>Modification d'un post</title>
            </head>
            <body>
                <p>Votre article, $the_post->post_title a été modifié par l'administrateur</p>
                <a href='$thePermalink'>Lien</a>
            </body>
        </html>
    ";
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=utf-8';
    wp_mail($email_author, "Modification d'un post sur LesFrancas", $content_mail, $headers);
}

add_action('post_updated', 'send_mail_at_update');