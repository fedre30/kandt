<?php

/**
 * @editPage form
 */
	include '../include/head.php';
	require '../include/db.php';

	$id = $_GET['id'];
	$page = getPageID($db, $id);
?>

<h2 class="admin-subtitle">Edit page</h2>

<form method="post" action="doedit.php" class="pages-form">
	<input name="id" type="hidden" value="<?=$page['id']?>">
	<input name="title" type="text" placeholder="<?=$page['title']?>">
	<input name="h1" type="text" placeholder="<?=$page['h1']?>">
	<input name="p" type="text" placeholder="<?=$page['p']?>">
	<input name="span_class" type="text" placeholder="<?=$page['span_class']?>">
	<input name="span_text" type="text" placeholder="<?=$page['span_text']?>">
	<input name="img_alt" type="text" placeholder="<?=$page['img_alt']?>">
	<input name="img_src" type="text" placeholder="<?=$page['img_src']?>">
	<input name="nav_title" type="text" placeholder="<?=$page['nav_title']?>">
	<input type="submit">
</form>

<div class="website-link"><a href="index.php" class="website-link">Back to Admin Page</a></div>