<?php
/**
 * Template Name: Search Results
 */
get_header();
$results = cree_search_results();
//$count = count($results['count']);
?>

<form method="GET" class="search-responsive">
	<input type="text" name="s">
	<input type="submit" value="search">
</form>

<?php if( ! is_string($results) ) : ?>

    <div class="search-container">
	    <p><strong><?= $results['count'] ?></strong> Résultats trouvés pour <strong><?= $results['query'] ?></strong></p>
	    <?php foreach ($results['posts'] as $result) : ?>
	        <div class="search-result">
	            <h1><?= $result->post_type ?></h1>
	            <p><?= $result->post_title ?></p>
	            <a href="<?= $result->guid ?>">Lien</a>
	        </div>
	    <?php endforeach; ?>
    </div>

<?php else: ?>

    <p class="danger">
    	<?= $results; ?>
    </p>

<?php endif; ?>

<?php get_footer(); ?>
