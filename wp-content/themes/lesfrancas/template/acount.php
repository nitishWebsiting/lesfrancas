<?php
/**
 * Template Name: Acount
 */

redirect_if_not_logged('/login');
get_header(); 
?>

<?php
    global $current_user;
//    vd($current_user);
    $contribution = getPagesById(["209"]);
//    vd($contribution);
//    $contribution_link = $contribution->guid;


//echo do_shortcode('[ultimatemember form_id=178]');

?>


<a href="<?= $contribution->guid ?>">Contribution</a>
<?php
	wp_redirect('/mon-compte/mon-classeur/');
?>
<?php get_footer(); ?>
