<?php get_header(); ?>
<?php
/**
 * Template Name: Login Register
 */
?>

<?php
if (is_user_logged_in()):
    $centerElement = 'centerElement';
endif;

if(!isset($centerElement)):
    $centerElement = '';
endif;
?>

<?php
if (!is_user_logged_in()):
?>
<div class="container text-center">
    <div class="col-lg-12 alert alert-info marginTop-3">
        S'inscrire vos permet de contribuer et de se constituer un classeur personnel des différentes contributions
    </div>
</div>
<?php
endif;
?>
<div class="loginRegister <?= $centerElement ?>">
    <div class="loginRegister__login">
        <h2 class="loginRegister__title">Connexion</h2>
        <div class="loginRegister__lrContainer">
            <a href="<?= home_url() ?>" class="closeIcon">
                <span></span>
                <span></span>
            </a>
            <?= do_shortcode('[ultimatemember form_id=177]'); ?>
            <a href="" class="loginRegister__switchForm">Inscription</a>
        </div>
    </div>
    <?php
    if (!is_user_logged_in()):
        ?>
        <div class="loginRegister__register">
            <h2 class="loginRegister__title">Inscription</h2>
            <div class="loginRegister__lrContainer">
                <a href="<?= home_url() ?>" class="closeIcon">
                    <span></span>
                    <span></span>
                </a>
                <?= do_shortcode('[ultimatemember form_id=176]'); ?>
                <a href="" class="loginRegister__switchForm">Connexion</a>
            </div>
        </div>
        <?php
    endif;
    ?>
</div>

<?php get_footer(); ?>
