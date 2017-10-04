<?php
/**
 * @return string
 * Insert an post with the contribution form
 */
$child = '';
function insert_post_contribution()
{
    if (!session_id()) {
        session_start();
    }
    global $current_user;
    $error = false;

    $contributionTitre = esc_html($_POST['contributionTitre']);
    $thematiqueCategorie = esc_html($_POST['thematiqueCategorie']);
    $rubriqueCategorie = esc_html($_POST['rubriqueCategorie']);
    $structure = esc_html($_POST['structure']);
    $type_structure = esc_html($_POST['type_structure']);
    $descriptionContenu = esc_html($_POST['descriptionContenu']);
    $mots_cles = esc_html($_POST['mots-cles']);
    $mots_cles = explode(',', $mots_cles);
    $legende = esc_html($_POST['legende']);
    $contribution_location = esc_html($_POST['contribution_location']);
    $contribution_contact = esc_html($_POST['contribution_contact']);
    $contribution_public = esc_html($_POST['contribution_public']);
    $date_start = esc_html($_POST['date_start']);
    $date_end = esc_html($_POST['date_end']);
    $image = $_FILES['image'];
    $pdf = $_FILES['pdf'];

    // get the parent categorie by the slug
    $cat = getCategorieBySlug($thematiqueCategorie);

    // If the categorie is "citoyennete", get his categorie without the "-" . $thematiqueCategorie
    // else get the categorie with the "-"
    if ($cat->term_id == 4):
        $child = getChildCategories($cat->term_id, $rubriqueCategorie);
    else:
        $child = getChildCategories($cat->term_id, $rubriqueCategorie . "-" . $thematiqueCategorie);
    endif;


    // get the page to verify that the parameter enter on $_POST already exist in database
    $unicity = get_page_by_title($contributionTitre, $output = OBJECT, $post_type = 'post');

    // Check if the message is long enough
    if ( strlen($contributionTitre) < 8 || strlen($contributionTitre) > 255 ) :
        $error = 'Le nombre de caractère requis est de 10';

    // Check if the title already exist
    elseif ($unicity) :
        $error = 'Le titre existe déjà';

    // Check if an image has been uploaded
    elseif ($image['size'] <= 0) :
        $error = 'Vous devez uploader une image';
    endif;

    /*if( !empty( $date_end ) ){
        if ( !is_a( $date_end, 'DateTime' ) ) {
            $error = 'Vous devez entrer une date valide';
        }
    }

    if( !empty( $date_end ) ){
        if ( !is_a( $date_end, 'DateTime' ) ) {
            $error = 'Vous devez entrer une date valide';
        }
    }*/

    $check_length_lieu = check_length( 'lieu',$contribution_location );
    if( !is_null($check_length_lieu) ){
        $error = $check_length_lieu;
    }
    $check_length_contact = check_length( 'contact',$contribution_contact );
    if( !is_null($check_length_contact) ){
        $error = $check_length_contact;
    }
    $check_length_public = check_length( 'public',$contribution_public );
    if( !is_null($check_length_public) ){
        $error = $check_length_public;
    }
    
    // Check then upload PDF
    if($pdf['size'] > 0){
        $pdf_type = [
            'application/octet-stream',
            'application/pdf'
        ];
        $upload_pdf = cree_upload_file($pdf, $pdf_type);
        if ($upload_pdf['status'] == 'error') {
            $error = $upload_pdf['message'];
        }
        else {
            $to_pdf = [
              'title' => $contributionTitre,
              'filename' => $upload_pdf['name'],
              'url' => $upload_pdf['url'],
              'alt' => $contributionTitre,
              'author' => $current_user->data->ID ? $current_user->data->ID : 1,
              'description' => $contributionTitre,
              'caption' => $contributionTitre,
              'name' => $contributionTitre,
              /*'date' => string '2017-06-15 13:20:33' (length=19)
              'modified' => string '2017-06-15 13:20:33' (length=19)*/
              'mime_type' => $upload_pdf['type'],
              'type' => $upload_pdf['extension'],
              'icon' => '/wp-includes/images/media/document.png'
            ];
            $pdf_file = $to_pdf;
        }
    }

    if (!$error) {
        // Check if the upload is done
        // If good, create the upload file
        $type = [
            'image/jpeg',
            'image/jpg',
            'image/png'
        ];
        $upload = cree_upload_file($image, $type);


        if ($upload['status'] == 'success') {
            //vd($current_user->data->ID);
            // Gather post data.

            $my_post = [
                'post_title' => $contributionTitre,
                'post_content' => $descriptionContenu,
                'post_status' => 'pending',
                'post_author' => $current_user->data->ID ? $current_user->data->ID : 1,
                //'post_category' => [$cat->term_id, $subCat->term_id],
                'post_category' => [$cat->term_id, $child->term_id],
                'post_type' => 'post'
            ];
                    //$count = get_field('pdf_file', 2124);

                    /*echo "<pre>";
                    var_dump($pdf_file);
                    var_dump($count);
                    //update_field('pdf_file', $pdf_file, 2124);

                    var_dump([ 'ID' => (int)$count['ID'] + 1 ] + $pdf_file);
                    var_dump([ 'ID' => (int)$count['ID'] + 1 ] + $pdf_file);

                    echo "</pre>";
                    die();*/
            // Create new post
            $newPost = wp_insert_post($my_post);
            //dd($newPost);

            // Add metas
            if ($newPost) {
                update_field('structure_porteuse_de_laction', $structure, $newPost);
                update_field('type_de_structure', $type_structure, $newPost);
                update_field('label_img', $legende, $newPost);
                update_field('date_start', $date_start, $newPost);
                update_field('date_end', $date_end, $newPost);
                update_field('contribution_location', $contribution_location, $newPost);
                update_field('contribution_contact', $contribution_contact, $newPost);
                update_field('contribution_public', $contribution_public, $newPost);
                if(isset($pdf_file)){
                    update_field('pdf_file', $pdf_file, $newPost);
                    //update_field('pdf_file', $pdf_file, 2125 );
                    update_field('_pdf_file', 'field_[field_id]', $newPost );
                }
                wp_set_post_tags($newPost, $mots_cles);

                // Prepare an array of post data for the attachment.
                $attachment = [
                    'guid' => $upload['file'],
                    'post_mime_type' => $upload['type'],
                    'post_title' => $upload['name'],
                    'post_content' => '',
                    'post_status' => 'inherit'
                ];
                // Insert the attachment.
                include(ABSPATH . 'wp-admin/includes/image.php');
                $attach_id = wp_insert_attachment($attachment, $upload['file'], $newPost);
                $attach_data = wp_generate_attachment_metadata($attach_id, $upload['file']);

                wp_update_attachment_metadata($attach_id, $attach_data);
                set_post_thumbnail($newPost, $attach_id);

                //Send email to admin
                /*$to = get_option( 'admin_email' );
                $subject = 'Nouvelle contribution à vérifier';
                $message = $current_user->data->user_login . ' a transmis une nouvelle contribution. Veuillez vous rendre dans le back office afin de la valider.';
                $email_sent = mail( $to, $subject, $message );
                vd($current_user);
                die();*/

                $message = 'Votre contribution a bien été prise en compte, elle sera publiée d’ici 24H si celle-ci respecte les termes des conditions d’utilisations';
                cree_flash('success', $message, '/contribution');

            } else {
                dd("L'article n'a pas été créer");
            }
        } else {
            cree_flash('danger', $upload['message'], '/contribution', $_POST);
        }
    } else {
        cree_flash('danger', $error, '/contribution', $_POST);
    }
}

add_action('admin_post_nopriv_cree_contribution', 'insert_post_contribution');
add_action('admin_post_cree_contribution', 'insert_post_contribution');



/**
 * @param string $name
 * @param string $content 
 * @return string or null
 * Check if the length is between 4 and $max_length
 */
function check_length( $name, $content, $max_length = 200 )
{
    if( !empty( $content ) )
    {
        if( strlen( $content ) < 4 )
        {
            $error = 'le contenu du champ '. $name .' est trop court';
        }
        elseif( strlen( $content ) > $max_length )
        {
            $error = 'le contenu du champ '. $content .' contact est trop long';
        }
    }
    if( isset( $error ) ){
        return $error;  
    }
}


function ajax_contribution_answer(){
    $answer = esc_html( $_POST['answer'] );
    $comment = esc_html( $_POST['comment'] );
    $post_ID = esc_html( $_POST['post'] );
    if( $answer == 'yes' || $answer == 'no' ){
        $template = '<div class="alert alert-success">Email envoyé</div>';
        send_email_to_admin( $answer, $comment );
        wp_reset_postdata();
        wp_send_json_success($template);    
    }else{
        $template = '<div class="alert alert-danger">Réponse inconnue</div>' . $answer;
        wp_reset_postdata();
        wp_send_json_error($template);    
    }
}

add_action( 'wp_ajax_cree_contribution_answer', 'ajax_contribution_answer' );
add_action( 'wp_ajax_nopriv_cree_contribution_answer', 'ajax_contribution_answer' );


function send_email_to_admin( $answer, $post_ID, $comment = '' ){
    $the_post = get_post($post_ID);
    $email_author = get_the_author_meta('user_email', intval($the_post->post_author));
    $thePermalink = get_permalink($the_post->ID);
    if( $answer == 'yes' ){
        $message = "<p>l'article, ". $the_post->post_title . " a été valider par le contributeur</p>";
    }else{
        $message = "<p>l'article, ". $the_post->post_title . " n'a pas été valider par le contributeur</p><br>";
        $message .= "<p>Commentaire du client:<br>" . $comment . "<p>";
    }
    $content_mail = "
        <html>
            <head>
              <title>Validation d'un post</title>
            </head>
            <body>
                $message
            </body>
        </html>
    ";
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=utf-8';
    wp_mail($email_author, "Validation d'un post sur LesFrancas", $content_mail, $headers);
}
?>
