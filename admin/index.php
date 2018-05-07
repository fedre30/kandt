<?php

/**
 * @adminPage
 * Pages' titles and IDs which are a link to page's details (show.php?id=PAGEID)
 * Form to add a page
 */
include "../include/head.php";
require '../include/db.php'
?>

<h2 class="admin-title">Admin page</h2>

<ul class="pages-list">
	<?php
	$page  = isset( $_GET['page'] ) ? max( 0, intval( $_GET['page'] ) ) : 0;
	$pages = getPages( $db, $page );

	foreach ( $pages as $page ) {
		?>

        <li class="pages-items">
            <a href="show.php?id=<?= $page['id'] ?>">
				<?= $page['id'] ?>: <?= $page['title'] ?>
            </a>
        </li>
	<?php } ?>


</ul>

<h3 class="admin-subtitle">Ajouter une page</h3>

<form method="post" action="doadd.php" class="pages-form">
    <input name="title" type="text" placeholder="Title">
    <input name="h1" type="text" placeholder="Page title">
    <input name="p" type="text" placeholder="Text">
    <input name="span_class" type="text" placeholder="Tag class (ex. label-success)">
    <input name="span_text" type="text" placeholder="Tag text">
    <input name="img_alt" type="text" placeholder="Image description">
    <input name="img_src" type="text" placeholder="Image source (ex.teletubbies.jpg)">
    <input name="nav_title" type="text" placeholder="Menu title">
    <input type="submit">
</form>

<div class="website-link"><a href="../index.php" class="website-link">Go to website</a></div>