<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Websting
 * @subpackage lesfrancas
 * @since lesfrancas 1.0
 */
?>
<div class="container-fluid no-padding bottomPage">
    <div class="row no-margin">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
            <footer class="footer">
                <div class="footer__container">
                    <?php
                    // Footer Menu
                    $args = [
                        'menu' => 'Footer Menu',
                        'container_class' => 'footer__containerMenu',
                        'menu_class' => 'footer__menu'
                    ];
                    wp_nav_menu($args);
                    ?>

                    <?php
                    /*if (is_active_sidebar('footer_right')) : 
                        dynamic_sidebar('footer_right');
                    endif;*/
                    ?>

                    <?php if (is_active_sidebar('popups')) : ?>
                        <?php dynamic_sidebar('popups'); ?>
                    <?php endif; ?>
                </div>
            </footer>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
