<?php

/**
 * @Delete form confirmation
 */
include '../include/head.php';
require '../include/db.php';

$id = $_GET['id'];
$page = getPageID($db, $id);
?>

<form method="post" action="dodelete.php" class="pages-form">
	<p>Voulez-vous vraiment supprimer la page <strong><?= $page['title']?></strong>?</p>
	<input name="id" type="hidden" value="<?=$page['id']?>">
	<input type="submit" value="OUI!">
</form>

<div class="website-link"><a href="index.php">Back to admin page</a></div>

