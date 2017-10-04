<?php
/**
 * Template Name: Q/R Question
 */
get_header();
redirect_if_not_logged('/login');

?>

<?php
    if(count($_POST) > 0):
        global $current_user;
        sendQuestion();
    else:
        ?>
        <div id="content">
            <div class="container no-padding">
                <div class="row no-margin">
                    <div class="col-xs-10 col-xs-offset-1 no-padding">
                        <h1>Poser une question</h1>
                        <form action="" method="post" class="form">
                            <?php
                            if (!session_id()) {
                                session_start();
                            }
                            // Error Handler
                            $cree_session = $_SESSION;
                            unset($_SESSION['flash']);
                            ?>

                            <?php if (isset($cree_session['flash']['cree_post_status'])) : ?>
                                <div class="alert alert-<?= $cree_session['flash']['cree_post_status'] ?>">
                                    <?= $cree_session['flash']['cree_post_status'] . ': ' . $cree_session['flash']['cree_message']; ?>
                                </div>
                            <?php endif; ?>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                                <div class="field">
                                    <label for="categories">Catégories</label>
                                    <select class="categorie inputSelect" name="categorie" id="categories">
                                        <?php
                                        // récupère les catégories
                                        $args = [
                                            'parent' => 0
                                        ];
                                        $categoriDropdown = get_categories($args);
                                        // Affiche les catégories dans un input select
                                        foreach ($categoriDropdown as $item) :
                                            if ($item->category_parent == 0 && $item->slug != "non-classe"):
                                                // value = id categorie
                                                ?>
                                                <option value="<?= $item->term_id ?>"><?= $item->name ?></option>
                                                <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                                <div class="field no-border-leftBefore">
                                    <label for="message">Questions</label>
                                    <textarea name="message"
                                              id="message"
                                              class="inputTextarea"><?= input_value($cree_session, 'message'); ?></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                                <div class="field no-border-leftBefore">
                                    <input type="submit" value="Envoyer" class="inputSubmit">
                                    <input type="hidden" name="action" value="ask_question">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
    endif;
?>


<?php
get_footer();