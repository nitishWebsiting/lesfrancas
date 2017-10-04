<?php
/**
 * Template Name: Edit Profil
 */

redirect_if_not_logged('/login');
get_header();
        global $ultimatemember;
        //vd($ultimatemember);
?>

<div class="userWidget">
    <ul class="userWidget__lists">
        <li class="userWidget__item">
            <a href="<?= home_url() . '/logout' ?>" class="userWidget__link">
                <img src="<?= get_stylesheet_directory_uri() . '/dist/img/deconnexion.png' ?>" alt="logout" class="logout userWidget__image">
            </a>
        </li>
        <li class="userWidget__item">
            <a href="<?= home_url() . '/contribution' ?>" class="userWidget__link">
                <img src="<?= get_stylesheet_directory_uri() . '/dist/img/Laicite.png' ?>" alt="binder" class="binder userWidget__image">
            </a>
        </li>
        <li class="userWidget__item">
            <a href="<?= home_url() . '/mon-classeur' ?>" class="userWidget__link">
                <img src="<?= get_stylesheet_directory_uri() . '/dist/img/Classeur.png' ?>" alt="binder" class="binder userWidget__image">
            </a>
        </li>
    </ul>
</div>


<div class="editProfil loginRegister">

    <?php //do_action('um_profile_before_header', $args ); ?>
    <?php 
//        $core_form_meta_all = $ultimatemember;
//        $args['cover_enabled'] = $core_form_meta_all->setup->core_form_meta_all['_um_profile_cover_enabled'];
//        $args['photosize'] = $core_form_meta_all->setup->core_form_meta_all['_um_profile_photosize'];
//        $args['show_name'] = $core_form_meta_all->setup->core_form_meta_all['_um_profile_show_name'];
//        $args['show_bio'] = $core_form_meta_all->setup->core_form_meta_all['_um_profile_show_bio'];
        $args = null;
        do_action('um_profile_header', $args);
    ?>
    <?= do_shortcode('[ultimatemember_account]'); ?>
</div>

<?php get_footer(); ?>
