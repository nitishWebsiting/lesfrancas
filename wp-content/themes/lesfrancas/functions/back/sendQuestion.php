<?php
function sendQuestion()
{
    $error = '';
    if (isset($_POST['categorie']) && isset($_POST['message'])) {
        $message = esc_html($_POST['message']);
        $categorie = esc_html($_POST['categorie']);

        $unicity = get_page_by_title($message, $output = OBJECT, $post_type = 'q_and_r');
// Check if the message is long enough
        if (strlen($message) < 10 || strlen($message) > 255) {
            $status = 'danger';
            $error = 'Le nombre de caractère requis est de 10';
        } // Check if the title already exist
        elseif ($unicity) {
            $status = 'warning';
            $error = 'Cette question a déjà été posée. Nous vous invitons à regarder dans <a href="/qr-reponses"> les réponses</a>';
        }

        if (!$error) {
            $my_post = array(
                'post_title' => $message,
                'post_content' => '',
                'post_status' => 'publish',
                //'post_author'   => $current_user->data->ID ? $current_user->data->ID : 1,
                'post_category' => [$categorie],
                'post_type' => 'q_and_r'
            );

            // Create new post
            $newPost = wp_insert_post($my_post);

            if ($newPost) {
                $message = 'Votre question a été envoyé. Vous retrouvez votre réponse bientôt dans<a href="/qr-reponses"> les réponses</a>';
                cree_flash('success', $message, '/qr-questions');
            }
        } else {
            cree_flash($status, $error, '/qr-questions', $_POST);
        }
    } else {
        wp_redirect('/qr-questions');
    }
}